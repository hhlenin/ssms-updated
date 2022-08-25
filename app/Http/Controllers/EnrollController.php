<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollFormRequest;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class EnrollController extends Controller
{
    public function enroll($id)
    {
        $enroll_check = Enroll::where('student_id', Session::get('student_id'))->where('course_id', $id)->first();
        if (is_null($enroll_check))
        {
            return view('front.home.auth-no-login', [
                'course_id' => $id,
                'message' => 'Please Fill Up the form',
            ]);
        }
        else{
            return back()->with('message', 'You are already Enrolled in this course');
        }
        
    }

    public function create(EnrollFormRequest $request, $course_id)
    {
        if (!Session::has('student_id')) {
            // return $request;
            $input = $request->only(['name', 'email', 'phone', 'payment_type']);
            $student = Student::storeStudent($input);

            Session::put('student_id', $student->id);
            Session::put('student_name', $student->name);
            Session::put('student_email', $student->email);
            Session::put('student_phone', $student->phone);

        }
        else {
            // return $request;
            $input = $request->only(['payment_type']);
        }
            $enroll = Enroll::storeEnroll($course_id, isset($student->id)? $student->id: Session::get('student_id'), $input['payment_type']);
            $course = Course::find($course_id);
            $result = [
                'course_name' => $course->name,
                'start_date' => $course->start_date,
                'fee' => $course->fee,
                'teacher' => $course->teacher->name,
                'status' => $enroll->status,
            ];

            return view('front.enroll.detail', compact(['result']));
        
        
    }
}
