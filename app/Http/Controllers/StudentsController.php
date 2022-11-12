<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Students $students)
    {
        return view('dashboard.students.index',[
            'students' => Students::paginate(10),
            'title' => 'Students'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.students.create',[
            'title' => 'Students'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'email|unique:students|nullable',
            'grade' => 'required',
            'school' => 'required',
            'origin' => 'required',
            'status' => 'required'
        ]);

        Students::create($validatedData);

        return redirect('dashboard/students')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Students $student, Course $course)
    {
        return view("dashboard.course.show",[
            // 'student' => Students::all(),
            'courses' => $course->latest()->where('id_students', $student->id)->paginate(8),
            'student' => $student->where('id', $student->id)->get(),
            'title' => 'Course'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $Students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {
        return view('dashboard.students.edit',[
            'title' => 'Students',
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $Students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $student)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'email|unique:students|nullable',
            'school' => 'required',
            'grade' => 'required',
            'origin' => 'required'
        ]);

        Students::where('id', $student->id)->update($validatedData);
        
        return redirect('/dashboard/students')->with('success', 'Student successfully edited');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $student)
    {
        Students::destroy($student->id);
        return redirect('/dashboard/students/')->with('success', 'Students Successfully deleted');
    }
}
