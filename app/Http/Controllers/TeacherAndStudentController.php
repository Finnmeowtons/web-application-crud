<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherAndStudentController extends Controller
{
    
    public function index(){
        $students = Student::all();
        $teachers = Teacher::all();

        return view('index', ['students' => $students, 'teachers' => $teachers]);
    }

    //Students
    public function create_student(){
        return view('student.create')->with('database', 'students');
    }

    public function store_student(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'address' => 'required',
            'course' => 'required',
            'subject' => 'required'
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
            'course' => 'required',
            'subject' => 'required'
        ]);

        $student->update($data);

        return redirect(route('index'))->with('success student', 'Student updated successfully');
    }


    public function delete_student(Student $student){
        $student->delete();

        return redirect(route('index'))->with('success student', 'Student deleted successfully');
    }


    //Teacher

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

        return redirect(route('index'))->with('success teacher', 'Teacher updated successfully');
    }


    public function delete_teacher(Teacher $teacher){
        $teacher->delete();

        return redirect(route('index'))->with('success teacher', 'Teacher deleted successfully');
    }
}
