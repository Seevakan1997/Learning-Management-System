<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin|Academic Head')->except(['index', 'store', 'show', 'create', 'edit', 'update', 'destroy', 'studentCourses']);
    }

    public function index(Course $course)
    {
        $batchYear = Auth::user()->batch_year;
        $modules = Module::where('batch_year', $batchYear)->get();

        return view('modules.index', compact('modules', 'course'));
    }

    public function create(Course $course)
    {
        return view('modules.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {

        $moduleData = $request->all();

        $module = new Module($moduleData);

        if ($request->status === 'publish' && $module->status !== 'publish') {
            $module->published_at = Carbon::now();
        }

        $course->modules()->save($module);

        return redirect()->route('home', $course)->with('success', 'Module created successfully');
    }

    public function show(Module $module)
    {
        return view('modules.show', compact('module'));
    }

    public function edit(Module $module)
    {
        return view('modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        if ($request->status === 'publish' && $module->status !== 'publish') {
            $module->published_at = Carbon::now();
        }

        if ($module->status === 'publish' && !Auth::user()->hasRole('Admin')) {
            if (Carbon::parse($module->published_at)->addHours(6)->isPast()) {
                abort(403, 'Unauthorized action. Course cannot be updated after 6 hours of publishing.');
            }
        }

        $module->update($request->all());
        return redirect()->route('home', $module->course_id)->with('success', 'Module updated successfully');
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('home', $module->course_id)->with('success', 'Module deleted successfully');
    }

    public function studentCourses()
    {
        $batchYear = Auth::user()->batch_year;
        $modules = Module::where('batch_year', $batchYear)->get();
        return view('modules.student_courses', compact('modules'));
    }
}
