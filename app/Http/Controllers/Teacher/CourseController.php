<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseFormRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Session;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::where('teacher_id', Session::get('teacher_id'))
            ->latest()
            ->get();
        return view('teacher.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseFormRequest $request)
    {
        $input = $request->only(['name', 'start_date', 'end_date', 'fee', 'image', 'short_description', 'long_description']);
        Course::storeCourse($input);
        return back()->with('message', 'Course Saved Successfully, Awaiting for Approval');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        if (Session::get('teacher_id') == $course->teacher_id) {
            return view('teacher.course.detail', compact(['course']));
        }
        else {
            return back()->with('error', 'Not Enough Permission');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        if ($course->status != 1) {
            if (Session::get('teacher_id') == $course->teacher_id) {
                return view('teacher.course.edit', compact('course'));
            } else {
                return back()->with('error', 'Not Enough Permission');
            }
        }
        else {
            return redirect(route('courses.index'))->with('error', 'Course Approved, Changes not allowed');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseFormRequest $request, $id)
    {
        // return Session::get('teacher_id');
        $course = Course::find($id);
        $input = $request->only(['name', 'start_date', 'end_date', 'fee', 'image', 'short_description', 'long_description']);
        if (Session::get('teacher_id') == $course->teacher_id) {
            Course::storeCourse($input, $id);
            Course::updateOrCreate(['id' => $id],[
                'rejection_cause' => null,
                'status' => 0,
            ]);
            return redirect(route('courses.index'))->with('message', 'Course Saved Successfully, Awaiting for Approval');
        } else {
            return redirect(route('courses.index'))->with('error', 'Not Enough Permission');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if ($course->teacher_id == Session::get('teacher_id') && $course->status != 1) {
            if ($course->image) {
                if (file_exists($course->image)) {
                    unlink($course->image);
                }
            }
            $course->delete();
            return back()->with('message', 'Course Deleted Successfully');
        } else {
            return back()->with('error', 'Course Approved or Not Enough Permission');
        }
    }
}
