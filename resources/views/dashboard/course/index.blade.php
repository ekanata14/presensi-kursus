@extends('dashboard.templates.main')

@section('content')
    <div class="row">
        <div class="col-8">
            <h1>Students Data</h1>
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            <a href="/dashboard/course/{{ $course[0]->id_students }}" class="btn btn-info"><i class="fa-solid fa-circle-info"></i> Detail</a>
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
    </div>
@endsection