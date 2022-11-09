@extends('dashboard.templates.main')

@section('content')
    <div class="col-lg-5 mb-5">
        <form action="/dashboard/course/{{ $course->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <input type="hidden" value="{{ $course->id }}" name="id">
              <label for="date" class="form-label">Date</label>
              <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required autofocus value="{{ old('date', $course->date) }}">
              @error('date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="lessons" class="form-label">Lessons</label>
                <input type="text" class="form-control @error('lesson') is-invalid @enderror" id="lessons" name="lessons" required autofocus value="{{ old('lessons', $course->lessons) }}">
                @error('lessons')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3 d-flex flex-column">
                <label for="student" class="form-label">Student</label>
                <select name="id_students" id="student" class="form-select">
                  @foreach ($students as $student)
                    @if(old('student', $course->id_students) == $student->id)
                      <option value="{{ $student->id }}" selected>{{ $student->name }}</option>
                    @else
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endif
                  @endforeach
                </select>
                @error('student')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
    </div>

@endsection