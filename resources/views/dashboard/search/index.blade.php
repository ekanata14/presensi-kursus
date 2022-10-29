@extends('dashboard.templates.main')

@section('content')
    <div class="row">
        @if($students->count() == 0 && $courses->count() == 0)
            <h3>No Result Found</h3>
        @else
            @if($students->count())
            <div class="col-10">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Grade</th>
                        <th>School</th>
                        <th>Origin</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->school }}</td>
                            <td>{{ $student->grade }}</td>
                            <td>{{ $student->origin }}</td>
                            <td>
                                <a href="/dashboard/students/{{ $student->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                <form action="/dashboard/students/{{ $student->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @if($courses->count())
            <div class="col-6">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Date</th>
                        <th>Lessons</th>
                        <th>Student</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->date }}</td>
                            <td>{{ $course->lessons }}</td>

                            <td>
                                <a href="/dashboard/course/{{ $course->id_students }}" class="btn btn-info"> Detail</a>
                                <a href="/dashboard/course/{{ $course->id }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
                                <form action="/dashboard/course/{{ $course->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        @endif
    </div>
@endsection