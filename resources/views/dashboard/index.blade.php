@extends('dashboard.templates.main')

@section('content')
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <div class="row">
        <div class="col-6">
            <hr>
            <h4>Upcoming Course</h4>
        </div>
    </div>
@endsection