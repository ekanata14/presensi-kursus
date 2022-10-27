@extends('dashboard.templates.main')

@section('content')
    <div class="row">
        <div class="col-10">
            <a href="/dashboard/students/create" class="btn btn-primary my-3">Create New Student</a>
            <h1>Students Data</h1>
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Grade</th>
                    <th>School</th>
                    <th>Origin</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->grade }}</td>
                        <td>{{ $student->school }}</td>
                        <td>{{ $student->origin }}</td>
                        <td>{{ $student->status }}</td>
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
            {{ $students->links() }}
        </div>
    </div>
@endsection