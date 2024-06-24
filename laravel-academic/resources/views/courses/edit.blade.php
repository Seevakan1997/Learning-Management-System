@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Course</h1>
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
            </div>
            <div class="form-group">
                <label for="seo_url">SEO URL</label>
                <input type="text" class="form-control" id="seo_url" name="seo_url" value="{{ $course->seo_url }}"
                    required>
            </div>
            <div class="form-group">
                <label for="faculty">Faculty</label>
                <input type="text" class="form-control" id="faculty" name="faculty" value="{{ $course->faculty }}"
                    required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="{{ $course->category }}"
                    required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="draft" {{ $course->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="publish" {{ $course->status === 'publish' ? 'selected' : '' }}>Publish</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
