@extends('dashboard.templates.main')

@section('content')
    <div class="row">
        <div class="col-4">
            <h1>Students Data</h1>
            <table class="table table-striped">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            <a href="/dashboard/course/{{ $student->id }}" class="btn btn-info"><i class="fa fa-solid fa-circle-info"></i></a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $students->links() }}
        </div>
    </div>
@endsection