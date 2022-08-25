<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request; 

class AdminCourseController extends Controller
{
    public function index() {
        $courses = Course::latest('updated_at')->get();
        return view('admin.course.index', compact('courses'));
    }

    public function statusChange($id)
    {
        $course = Course::find($id);
        if ($course->status == 0) {
            $course->status = 1;
            $message = 'Course Approved Successfully';
        }
        elseif ($course->status == 1) {
            $course->status = 0;
            $message = 'Course Unapproved Successfully';
        }
        elseif ($course->status == 2) {
            $course->status = 0;
            $course->rejection_cause = null;
            $message = 'Course Unapproved Successfully';
        }
        $course->save();
        return back()->with('message' , $message);
    }

    public function details($id)
    {
        return view('admin.course.detail', [
            'course' => Course::find($id)
         ]);
    }

    public function rejection(Request $request, $id)
    {
        $input = $request->only(['rejection_cause']);
        Course::updateOrCreate(['id' => $id],[
            'rejection_cause' => $input['rejection_cause'],
            'status' => 2,
        ]);
        return redirect(route('admin.courses.index'))->with('message', 'Course Rejected successfully');
    }

    public function destroy($id)
    {
        Course::find($id)->delete();
        return back()->with('message', 'Course Deleted successfully');
    }

}
