@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1>{{ $module->name }}</h1>
            </div>
            <div class="card-body">
                <p><strong>Code:</strong> {{ $module->code }}</p>
                <p><strong>Semester:</strong> {{ $module->semester }}</p>
                @if (Auth::check() && Auth::user()->hasAnyRole(['Admin', 'Academic Head']))
                    <p><strong>Description:</strong> {{ $module->description }}</p>
                @endif
                <p><strong>Credit:</strong> {{ $module->credit }}</p>
                <p><strong>Status:</strong> {{ $module->status }}</p>
                <p><strong>Batch Year:</strong> {{ $module->batch_year }}</p>
            </div>
            <div class="card-footer bg-light">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
                    </div>
                    @if (Auth::check() && Auth::user()->hasAnyRole(['Admin', 'Academic Head']))
                        <div class="col-auto">
                            <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('modules.destroy', $module->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this module?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
