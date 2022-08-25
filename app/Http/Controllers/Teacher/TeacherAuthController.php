<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Session;

class TeacherAuthController extends Controller
{
    protected $teacher;
    public function login()
    {
        return view('teacher.auth.login');
    }

    public function auth(Request $request) 
    {
        // return $request;
        $this->teacher = Teacher::where('status', 1)->where('email', $request->email)->first();
        if ($this->teacher) {
            if(password_verify($request->password, $this->teacher->password)) {
                Session::put('teacher_id',      $this->teacher->id);
                Session::put('teacher_name',    $this->teacher->name);
                Session::put('teacher_email',   $this->teacher->email);
                Session::put('teacher_image',   $this->teacher->image);

                return redirect(route('teacher.dashboard'))->with('message', 'Logged In Successfully');
            }
            else {
                return back()->with('error', "Password Doesn't Match"); 
            }

        }
        else {
            return back()->with('error', "Email Doesn't Match, Please Contact Administrator");
        }
    }


    public function logout()
    {
        Session::forget('teacher_id');
        Session::forget('teacher_name');
        Session::forget('teacher_email');
        Session::forget('teacher_image');

        return redirect(route('loginView.teacher'))->with('message', 'Logged Out Successfully');
    }
}