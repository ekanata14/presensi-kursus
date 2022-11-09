<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Students;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Input

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.course.index",[
            'students' => Students::latest()->paginate(10),
            'course' => Course::all(),
            'title' => 'Course'
        ]);
    }

    public function studentsCourse(Students $students){
        return view('dashboard.course.index',[
            'title' => 'Students Course',
            'students' => $students->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response        
     */
    public function create(Students $student, Course $course, Request $request)
    {
        $key = $request->student;
        
        return view("dashboard.course.create",[
            'students' =>  $student->where('id', $key)->get(),
            'course' => $course,
            'title' => 'Course'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'lessons' => 'required',
            'student' => 'required'
        ]);

        $validatedData['id_students'] = $validatedData['student'];

        Course::create($validatedData);

        return redirect('/dashboard/students/' . $request->student)->with('success', 'Course successfully created');

        // $validatedData['id_'] = 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Students $student)
    {
        return view("dashboard.course.show",[
            // 'student' => Students::all(),
            'courses' => $course->where('id_students', $course->id_students)->paginate(8),
            'student' => $student->where('id', $course->id_students)->get(),
            'title' => 'Course'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Request $request)
    {
        // dd($course, $request);
        return view('dashboard.course.edit',[
            'course' => $course->where('id', $course->id)->first(),
            'students' => Students::all(),
            'title' => 'Course'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'date' => 'required',
            'lessons' => 'required',
            'id_students' => 'required'
        ]);

        // $validatedData['id_students'] = $validatedData['id_students'];

        Course::where('id', $course->id)->update($validatedData);

        // return redirect('dashboard/students/' . $course->student->id)->with('success', 'Course successfully updated');
        // return back();
        return redirect('dashboard/students/' . $request->id_students)->with('success', 'Course Successfully Deleted');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Students $student, Request $request)
    {
        // dd($course, $student, $request);
        Course::destroy($course->id);
        return redirect('dashboard/students/' . $course->id_students)->with('success', 'Course Successfully Deleted');
    }
}
