@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Module for {{ $module->course->name }}</h1>
        <form action="{{ route('modules.update', $module->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $module->code }}" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $module->name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <input type="text" class="form-control" id="semester" name="semester" value="{{ $module->semester }}"
                    required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $module->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="credit">Credit</label>
                <input type="number" class="form-control" id="credit" name="credit" value="{{ $module->credit }}"
                    required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="draft" {{ $module->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="publish" {{ $module->status == 'publish' ? 'selected' : '' }}>Publish</option>
                </select>
            </div>
            <div class="form-group">
                <label for="batch_year">Batch Year</label>
                <input type="text" class="form-control" id="batch_year" name="batch_year"
                    value="{{ $module->batch_year }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
