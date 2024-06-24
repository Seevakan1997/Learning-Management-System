@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Courses</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Create Course</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>SEO URL</th>
                    <th>Faculty</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->seo_url }}</td>
                        <td>{{ $course->faculty }}</td>
                        <td>{{ $course->category }}</td>
                        <td>{{ $course->status }}</td>
                        <td>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
