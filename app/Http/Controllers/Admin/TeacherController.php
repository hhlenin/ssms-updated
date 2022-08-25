<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherFormRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public $teacher;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->get();

        return view('admin.teacher.index', compact(['teachers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherFormRequest $request)
    {
        $input = $request->only([
            'name', 'email', 'password', 'phone', 'address', 'image', 'nid', 'district_id', 'status',
            'designation', 'link_1', 'link_2', 'link_3', 'link_4'
        ]);
        Teacher::storeTeacher($input);
        return redirect(route('teachers.index'))->with('message', 'Data Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'showafiafajfliaflifasf';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('admin.teacher.edit', [
            'teacher' => Teacher::find($id)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherUpdateRequest $request, $id)
    {
        // return $request;
        $input = $request->only([
            'name', 'email', 'password', 'phone', 'address', 'image', 'nid', 'district_id', 'status',
            'designation', 'link_1', 'link_2', 'link_3', 'link_4'
        ]);

        Teacher::storeTeacher($input, $id);
        return redirect(route('teachers.index'))->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->teacher = Teacher::find($id);
        if ($this->teacher->image) {
            unlink($this->teacher->image);
        }
        $this->teacher->delete();
        return back()->with('message', 'Data Deleted Successfully');

    }

    public function statusChange($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher->status == 0) {
            $teacher->update([
                'status' => 1,
            ]);
        }
        elseif ($teacher->status == 1) {
            $teacher->update([
                'status' => 0,
            ]);
        }
        return back()->with('message', 'Status updated successfully ');
    }
}
