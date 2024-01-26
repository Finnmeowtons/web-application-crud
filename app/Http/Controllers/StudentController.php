<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        return view('index', ['students' => $students]);
    }

    public function create_student(){
        return view('student.create')->with('database', 'students');
    }

    public function store_student(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            'department' => 'required'
        ]);

        $newstudent = Student::create($data);

        response() -> json('Added Successfully');
        return redirect(route('index'));
    }


    public function edit_student(Student $student){
        

        return view('student.edit', ['student' => $student]);
    }

    public function update_student(Student $student, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            'department' => 'required'
        ]);

        $student->update($data);

        return redirect(route('index'))->with('success', 'Student updated successfully');
    }


    public function delete_student(Student $student){
        $student->delete();

        return redirect(route('index'))->with('success', 'Student deleted successfully');
    }
}
