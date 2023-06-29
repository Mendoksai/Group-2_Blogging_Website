<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'min:2', 'string'],
            'last_name' => ['required', 'min:2', 'string'],
            'student_instructor_id' => [
                'required',
                'regex:/^\d{2}-[A-Z]{2}-\d{4}$/'
            ],
            'account_role' => ['required'],
            'degree_name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => ['required', 'same:password'],
        ], [
            //customized error message
            'name.min' => 'The :attribute should be at least :min',
            'student_instructor_id.min' => 'The :attribute should be at least :min',
            'student_instructor_id.regex' => 'The :attribute should be like 20-AC-9029, try again.',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'student_instructor_id' => $request->student_instructor_id,
            'email' => $request->email,
            'account_role' => $request->account_role,
            'degree_name' => $request->degree_name,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
