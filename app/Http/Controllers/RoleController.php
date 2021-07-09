<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    { 
        $role = Role::all() ;
        return view('role.index', compact('role'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('roles.index'))->with('message', 'Role deleted');
    }



    public function store(Request $request)
    { 
            Role::create([ 'name'=> $request->name ]);
            return redirect(route('roles.index'))->with('message', 'New Role added'); 
    } 
 
    public function show()
    {  
    }
 
    public function update(Role $role, Request $request)
    {
 
        $role->update($request->all());
        return redirect()->back()->with('message', 'Edit Saved!');
    }

}
