<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Enroll;
use Session;

class FrontViewController extends Controller
{
    public function home()
    {
        $courses = Course::where('status', 1)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        $teachers = Teacher::where('status', 1)
            ->orderBy('id', 'desc')
            ->get(['name', 'email', 'image', 'designation', 'link_1', 'link_2', 'link_3', 'link_4']);

        return view('front.home.index', compact(['courses', 'teachers']));
    }
    public function allCourses()
    {
        $courses = Course::where('status', 1)
        ->orderBy('id', 'desc')
        ->get();
        return view('front.home.allcourses', compact(['courses']));
    }
    public function aboutUs()
    {
        return view('front.home.aboutus');
    }
    public function contact()
    {
        return view('front.home.contact');
    }
    public function auth()
    {
        return view('front.home.auth');
    }

    public function courseDetail($id)
    {
        $enroll_check = Enroll::where('student_id', Session::get('student_id'))
            ->where('course_id', $id)
            ->first();

        return view('front.course.detail', [
            'course' => Course::find($id),
            'enroll_check' => $enroll_check,
        ]);
    }
}
