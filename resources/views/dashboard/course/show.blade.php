@extends('dashboard.templates.main')

@section('content')
    <div class="col-6">
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h4>{{ $student[0]['name'] }}</h4>
        <a href="/dashboard/course" class="btn btn-success"><i class="fa fa-solid fa-arrow-left"></i> Back</a>
        <a href="/dashboard/course/create?student={{ $student[0]['id'] }}" class="btn btn-primary my-3">Create New Course <i class="fa fa-solid fa-plus"></i></a>
        @if(!$courses)
            <h3>There are no courses, create course</h3>
        @else
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Date</th>
                    <th>Lesson</th>
                </thead>
                <tbody>
                    @if($courses->count() == 0)
                        <h3>No Courses Found, Create One</h3>
                    @else
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->date }}</td>
                            <td>{{ $course->lessons }}</td>
                            <td>
                                <a href="/dashboard/course/{{ $course->id }}/edit" class="btn btn-warning"><i class="fa fas fa-pen-to-square"></i></a>
                                <form action="/dashboard/course/{{ $course->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        @endif
        
        {{ $courses->links() }}
    </div>
@endsection