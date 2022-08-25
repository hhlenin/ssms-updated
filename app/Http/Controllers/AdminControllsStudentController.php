<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminControllsStudentController extends Controller
{
    public function index()
    {
        return view('admin.student.index', [
            'students' => Student::orderBy('id', 'desc')->get()
        ]);
    }
    public function statusChange($id)
    {
        $student = Student::find($id);
        if ($student->status == 0) {
            $student->update([
                'status' => 1,
            ]);
        }
        elseif ($student->status == 1) {
            $student->update([
                'status' => 0,
            ]);
        }
        return back()->with('message', 'Status updated successfully ');
    }

    public function destroy($id)
    {
        $enroll = Enroll::where('student_id', $id)->where('status', 1)->first();
        if ($enroll) {
            $message = "Student is Enrolled, unable to delete";
        }
        else {
            Student::where('id', $id)->delete();
            Enroll::where('student_id', $id)->delete();
            $message = "Student deleted successfully";
        }
        return back()->with('message', $message);
    }
}
