<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherFormRequest;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Session;
use DB;

class TeacherFunctionsController extends Controller
{
    public function dashboard()
    {
        return view('teacher.home.dashboard');
    }
    public function edit()
    {
        // return 143343;
        return view('teacher.profile.edit', [
            'teacher' => Teacher::find(Session::get('teacher_id'))
        ]);
    }
    public function update(Request $request, $id)
    {
        // return 1111;
        $input = $request->only([
            'name', 'email', 'password', 'phone', 'address', 'image', 'nid', 'district_id'
        ]);

        Teacher::storeTeacher($input, $id);
        return redirect(route('teacher.dashboard'))->with('message', 'Data Updated Successfully');
    }

    public function manage()
    {
        $courses = Course::where('teacher_id', Session::get('teacher_id'))->get('id');
        $enrolls = Enroll::whereIn('course_id', $courses)->orderBy('id', 'desc')->get();

        return view('teacher.enroll.index', [
            'enrolls' => $enrolls,
        ]);
    }
}
