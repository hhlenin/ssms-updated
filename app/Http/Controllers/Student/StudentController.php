<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;
use Session;

class StudentController extends Controller
{
    public function enrollHistory()
    {
        $enrolls = Enroll::where('student_id', Session::get('student_id'))->with('course')->get();
         
        return view('front.student.enrolls', compact(['enrolls']));
    }
    public function editProfile()
    {
        return view('front.student.profile', [
            'student' => Student::find(Session::get('student_id'))
        ]);
    }

    public function updateProfile(Request $request)
    {

        $input = $request->only([
            'name', 'email', 'password', 'phone', 'image', 'address'
        ]);
        
        Student::storeStudent($input, Session::get('student_id'));
        return redirect(route('student.dashboard'))->with('message', 'Profile Updated Successfully');

    }
    
    public function storeProfile(Request $request)
    {

        $input = $request->only([
            'name', 'email', 'password', 'phone', 'image', 'address'
        ]);
        
        Student::storeStudent($input);
        return back()->with('message', 'Please Login Now');

    }
}
