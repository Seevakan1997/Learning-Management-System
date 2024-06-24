@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h1>{{ $course->name }}</h1>
            </div>
            <div class="card-body">
                <p><strong>SEO URL:</strong> {{ $course->seo_url }}</p>
                <p><strong>Faculty:</strong> {{ $course->faculty }}</p>
                <p><strong>Category:</strong> {{ $course->category }}</p>
                <p><strong>Status:</strong> {{ $course->status }}</p>
            </div>
            <div class="card-footer bg-light">
                <div class="my-4">
                    <h2>Modules</h2>
                    @if ($course->modules->isEmpty())
                        <p>No modules found for this course.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($course->modules as $module)
                                <li class="list-group-item">
                                    <div>
                                        <h4>{{ $module->name }} <span
                                                class="badge badge-{{ $module->status === 'publish' ? 'success' : 'secondary' }}">{{ $module->status }}</span>
                                        </h4>
                                        <p><strong>Code:</strong> {{ $module->code }}</p>
                                        <p><strong>Semester:</strong> {{ $module->semester }}</p>
                                        @if (Auth::check() && Auth::user()->hasAnyRole(['Admin', 'Academic Head']))
                                            <p><strong>Description:</strong> {{ $module->description }}</p>
                                        @endif
                                        <p><strong>Credit:</strong> {{ $module->credit }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="col">
                    <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
