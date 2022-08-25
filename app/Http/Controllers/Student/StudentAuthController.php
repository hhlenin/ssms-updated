<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class StudentAuthController extends Controller
{
    public function logout()
    {
        Session::forget('student_id');
        Session::forget('student_name');
        Session::forget('student_email');
        Session::forget('student_phone');

        return redirect(route('home'))->with('message', 'Successfully Logged Out');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $student = Student::where('email', $request->email)
            ->where('status', 1)
            ->first();
        if ($student) {
            if (password_verify($request->password, $student->password)) {
                Session::put('student_id', $student->id);
                Session::put('student_name', $student->name);
                Session::put('student_email', $student->email);
                Session::put('student_phone', $student->phone);

                return redirect(route('student.dashboard'))->with('message', 'Logged In Successfullly');

            } else {
                return back()->with('message', 'Password not matched');
            }

        } else {
            return back()->with('message', 'No account is registered with this email or account is suspended');
        }
    }

    public function dashboard()
    {
        return view('front.student.dashboard');
    }
}
