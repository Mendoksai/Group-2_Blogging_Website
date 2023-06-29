<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = User::where('account_role','Student')
            ->orWhere('account_role','Instructor')
            ->get();

        return view('admin.student.index',compact('students'));
    }

    //to create student form
    public function create(){
        return view('admin.student.create');
    }


   
    //search menu
    public function search(Request $request){
        //dd($request->all());

        $validateData = $request->validate([
            'search_value' => 'required'
        ]);

        if($validateData){
            $students = User::where('first_name','like','%'.$validateData['search_value'].'%')
                ->orWhere('last_name','like','%'.$validateData['search_value'].'%')
                ->get();
            return view('admin.student.index',compact('students'));
        }

    }



    //create menu store
    public function create_store(Request $request){
        //dd($request->all());

        $validateData = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'student_instructor_id' => ['required', 'max:255'],
            'degree_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        if($validateData){
            $student = User::create([
                'first_name' => $validateData['first_name'],
                'last_name' => $validateData['last_name'],
                'student_instructor_id' => $validateData['student_instructor_id'],
                'degree_name' => $validateData['degree_name'],
                'email' => $validateData['email'],
                'password' => Hash::make($validateData['password']),
            ]);
        }

        if($request->file('photo')){
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/students'),$filename);

            $student['profile_picture'] = "students/".$filename;
        }

        $student->save();
        return redirect()->back()->with('success','Student Added Successfully');
    }

   
    //update menu
    public function update($user_id){
        $student = User::find($user_id);
        return view('admin.student.update',compact('student'));
    }

    //update menu store
    public function update_store(Request $request){
       //dd($request->all());

        $validateData = $request->validate([
            'user_id' => ['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'student_instructor_id' => ['required', 'int', 'max:255'],
            'degree_name' => ['required', 'string', 'max:255'],
            'email' => ['required'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        if($validateData){
            $user = User::find($validateData['user_id']);
            $user['first_name'] = $validateData['first_name'];
            $user['last_name'] = $validateData['last_name'];
            $user['student_instructor_id'] = $validateData['student_instructor_id'];
            $user['email'] = $validateData['email'];
            $user['password'] = Hash::make($validateData['password']);
        }

        if($request->file('photo')){
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/students'),$filename);

            $user['photo'] = "students/".$filename;
        }

        $user->save();
        return redirect()->back()->with('success','Student Updated Successfully');
    }

    //delete menu
    public function delete(Request $request){
        $validateData = $request->validate([
            'user_id' => 'required'
        ]);

        $menu = User::find($validateData['user_id']);
        $menu->delete();
        return redirect('/admin/student/index')->with('success','Student Deleted Successfully');
    }
}
