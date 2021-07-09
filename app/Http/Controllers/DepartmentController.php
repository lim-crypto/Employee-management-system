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
        $department = Department::all() ;
        return view('department.index', compact('department'));
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect(route('departments.index'))->with('message', 'department deleted');
    }



    public function store(Request $request)
    { 
            Department::create([ 'name'=> $request->name ]);
            return redirect(route('departments.index'))->with('message', 'New Department added'); 
    } 
 
    public function show()
    {  
    }
 
    public function update(Department $department, Request $request)
    {
 
        $department->update($request->all());
        return redirect()->back()->with('message', 'Edit Saved!');
    }
}
