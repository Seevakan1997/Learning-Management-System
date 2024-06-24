@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Module for {{ $course->name }}</h1>
        <form action="{{ route('courses.modules.store', $course->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="text" class="form-control" id="semester" name="semester" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="credit">Credit</label>
                <input type="number" class="form-control" id="credit" name="credit" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>
                </select>
            </div>
            <div class="form-group">
                <label for="batch_year">Batch Year</label>
                <input type="text" class="form-control" id="batch_year" name="batch_year"
                    value="{{ Auth::user()->batch_year }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
