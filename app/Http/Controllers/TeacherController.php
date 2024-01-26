<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::all();

        return view('index', ['teachers' => $teachers]);
    }

    public function create_teacher(){
        return view('teacher.create')->with('database', 'teacher');
    }

    public function store_teacher(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            'department' => 'required'
        ]);

        $newteacher = Teacher::create($data);

        response() -> json('Added Successfully');
        return redirect(route('index'));
    }


    public function edit_teacher(Teacher $teacher){
        

        return view('teacher.edit', ['teacher' => $teacher]);
    }

    public function update_teacher(Teacher $teacher, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            'department' => 'required'
        ]);

        $teacher->update($data);

        return redirect(route('index'))->with('success', 'Teacher updated successfully');
    }


    public function delete_teacher(Teacher $teacher){
        $teacher->delete();

        return redirect(route('index'))->with('success', 'Teacher deleted successfully');
    }
}
