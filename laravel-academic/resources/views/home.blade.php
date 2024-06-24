@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid bg-primary text-white">
        <div class="container text-center">
            <h1 class="display-4">Welcome to Your Academic Environment</h1>
            <p class="lead">Manage courses and modules efficiently with our platform.</p>
            <a class="btn btn-light btn-lg" href="{{ route('login') }}">Get Started</a>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Explore Courses</h2>

        {{-- Create Course button --}}
        @if (Auth::check() && Auth::user()->hasAnyRole(['Admin', 'Academic Head']))
            <div class="text-right mb-3">
                <a href="{{ route('courses.create') }}" class="btn btn-primary">Create Course</a>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class="row">
                    @foreach ($courses as $course)
                        <div class="col-md-4 mb-4">
                            <div class="card border-0 shadow">
                                {{-- <img src="{{ asset('images/explore-courses.jpg') }}" class="card-img-top"
                                    alt="Course Image"> --}}
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">{{ $course->name }}</h3>
                                        @if (Auth::check() && Auth::user()->hasAnyRole(['Admin', 'Academic Head']))
                                            <span class="badge badge-course">{{ $course->status }}</span>
                                        @endif
                                    </div>
                                    <p class="card-text">{{ $course->description }}</p>
                                    <p class="card-text"><strong>Faculty:</strong> {{ $course->faculty }}</p>
                                    <p class="card-text"><strong>Category:</strong> {{ $course->category }}</p>
                                    <p class="card-text"><strong>SEO URL:</strong> {{ $course->seo_url }}</p>

                                    @if (Auth::check() && Auth::user()->hasAnyRole(['Admin', 'Academic Head']))
                                        <div class="mt-3">
                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                class="btn btn-secondary mb-2">Edit</a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this course?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mb-2">Delete</button>
                                            </form>
                                            <a href="{{ route('courses.modules.create', $course->id) }}"
                                                class="btn btn-success mb-2">Add Module</a>
                                        </div>
                                    @endif
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-primary">View
                                        Course</a>
                                </div>
                                @if ($course->modules->isNotEmpty())
                                    <div class="card-footer bg-transparent">
                                        <h5>Modules</h5>
                                        <ul class="list-group">
                                            @foreach ($course->modules as $module)
                                                <li class="list-group-item">
                                                    <div>
                                                        <strong>Name:</strong> <a
                                                            href="{{ route('modules.show', $module->id) }}">{{ $module->name }}</a><br>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
