@extends('dashboard.templates.main')

@section('content')
    {{-- <h1>{{ $student->name }}'s Presence</h1> --}}
    <div class="col-6">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="/dashboard/course/create" class="btn btn-primary my-3">Create New Course</a>
        <table class="table table-striped">
            <thead>
                <th>No</th>
                <th>Date</th>
                <th>Lesson</th>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->date }}</td>
                    <td>{{ $course->lessons }}</td>
                    <td>
                        <a href="/dashboard/students/{{ $course->id_students }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="/dashboard/students/{{ $course->id_students }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $courses->links() }}
    </div>
@endsection