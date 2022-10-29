<?php

namespace App\Http\Controllers;

use App\Models\Students;
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
            'students' => Students::all(),
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
            'email' => 'required|email|unique:students',
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
    public function show(Students $students)
    {
        //
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
            'email' => 'required',
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
