<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (auth()->user()->role_id != 1) {
            return redirect()->back()->with('error', 'You are not authorize to access the page');
        }
        $department = Department::all();
        return view('department.index', compact('department'));
    }

    public function destroy(Department $department)
    {
        if ($department->users()->count() > 0) {
            return redirect(route('departments.index'))->with('error', 'Cannot Delete Department because of assiociated employee');
        }
        $department->delete();
        return redirect(route('departments.index'))->with('message', 'department deleted');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>  ['required'],
        ]);
        Department::create(['name' => $request->name]);
        return redirect(route('departments.index'))->with('message', 'New Department added');
    }

    public function update(Department $department, Request $request)
    {
        $request->validate([
            'name' =>  ['required'],
        ]);
        $department->update($request->all());
        return redirect()->back()->with('message', 'Edit Saved!');
    }
}
