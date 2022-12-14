@extends('dashboard.templates.main')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Students</h1>
</div>
    <div class="col-lg-5 mb-5">
        <form method="post" action="/dashboard/students/{{ $student->id }}">
            @method('put')
          @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $student->name) }}">
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="school" class="form-label">School</label>
              <input type="text" class="form-control @error('school') is-invalid @enderror" id="school" name="school" required value="{{ old('school', $student->school) }}">
              @error('school')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="grade" class="form-label">Grade</label>
              <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" required value="{{ old('grade', $student->grade) }}">
              @error('grade')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="origin" class="form-label">Origin</label>
                <input type="text" class="form-control @error('lesson') is-invalid @enderror" id="origin" name="origin" required value="{{ old('origin', $student->origin) }}">
                @error('origin')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <input type="hidden" name="status" value="1">
            <button type="submit" class="btn btn-primary">Edit</button>
          </form>
    </div>

@endsection