<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin|Academic Head')->except(['index', 'store', 'show', 'create', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $course = new Course($request->all());
        if ($request->has('status') && $request->status === 'publish') {
            $course->published_at = Carbon::now();
        }
        $course->save();
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $this->authorize('update', $course);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $this->authorize('update', $course);


        if ($request->status === 'publish' && $course->status !== 'publish') {
            $course->published_at = Carbon::now();
        }

        if ($course->status === 'publish' && !Auth::user()->hasRole('Admin')) {
            if (Carbon::parse($course->published_at)->addHours(6)->isPast()) {
                abort(403, 'Unauthorized action. Course cannot be updated after 6 hours of publishing.');
            }
        }

        $course->update($request->all());
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);
        $course->delete();
        return redirect()->route('courses.index');
    }
}
