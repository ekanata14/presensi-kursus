@extends('dashboard.templates.main')

@section('content')
    <div class="col-lg-5 mb-5">
        <form method="post" action="/dashboard/course">
          @csrf
            <div class="mb-3">
                {{-- <input type="hidden" value="{{ $course->user->id }}"> --}}
              <label for="date" class="form-label">Date</label>
              <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required autofocus value="{{ old('date') }}">
              @error('date')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="lessons" class="form-label">Lessons</label>
                <input type="text" class="form-control @error('lesson') is-invalid @enderror" id="lessons" name="lessons" required autofocus value="{{ old('lessons') }}">
                @error('lessons')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
            <input type="hidden" name="student" value="{{ $students[0]['id'] }}">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>

@endsection