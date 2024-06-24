@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h1 class="display-4">My Course Modules</h1>
                <p class="lead">Here are the modules for your batch year: {{ Auth::user()->batch_year }}</p>
            </div>
        </div>

        @if ($modules->isEmpty())
            <div class="alert alert-warning" role="alert">
                No modules found for your batch year.
            </div>
        @else
            <div class="row">
                @foreach ($modules as $module)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $module->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Code: {{ $module->code }}</h6>
                                <p class="card-text">
                                    <strong>Semester:</strong> {{ $module->semester }}<br>
                                    <strong>Credit:</strong> {{ $module->credit }}<br>
                                    <strong>Status:</strong> {{ ucfirst($module->status) }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('modules.show', $module->id) }}" class="btn btn-primary">View Module</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
