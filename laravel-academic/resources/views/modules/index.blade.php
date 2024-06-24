@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modules for {{ $course->name }}</h1>
        <a href="{{ route('courses.modules.create', $course->id) }}" class="btn btn-primary">Create Module</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Semester</th>
                    <th>Credit</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $module)
                    <tr>
                        <td>{{ $module->id }}</td>
                        <td>{{ $module->code }}</td>
                        <td>{{ $module->name }}</td>
                        <td>{{ $module->semester }}</td>
                        <td>{{ $module->credit }}</td>
                        <td>{{ $module->status }}</td>
                        <td>
                            <a href="{{ route('modules.show', $module->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('modules.destroy', $module->id) }}" method="POST"
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
