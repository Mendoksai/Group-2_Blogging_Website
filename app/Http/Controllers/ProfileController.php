<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function showProfile($id)
    {
        // Query the user information based on the provided id
        $user = User::findOrFail($id);
        //return dd($user);

        return view('user.show-profile', ['user' => $user]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        // Check if a file was uploaded
        if ($request->hasFile('profile_picture')) {

            if ($request->hasFile('profile_picture')) {
                $profilePicture = $request->file('profile_picture');

                // Check if the uploaded file is valid
                if ($profilePicture->isValid()) {
                    // getting the original file name
                    $imgName = $profilePicture->getClientOriginalName();
                    // storing the file
                    $profilePicture->storeAs('public/profilePictures', $imgName);

                    $profilePictureUrl = 'storage/profilePictures/' . $imgName;
                    $request->user()->profile_picture = $profilePictureUrl;
                    $request->user()->save();
                    return Redirect::route('profile.edit')->with('status', 'pic-success');
                }
            }
        }

        $request->user()->fill($request->validated());




        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        if ($request->user()->wasChanged()) {
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        } else {
            return Redirect::route('profile.edit')->with('status', 'no-changes');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}