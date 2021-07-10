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
        if (auth()->user()->role_id != 1) {
            return redirect()->back()->with('error', 'You are not authorize to access the page');
        }
        $role = Role::all();
        return view('role.index', compact('role'));
    }

    public function destroy(Role $role)
    {
        if ($role->users()->count() > 0) {
            return redirect(route('roles.index'))->with('error', 'Cannot Delete role because of assiociated employee');
        }

        $role->delete();
        return redirect(route('roles.index'))->with('message', 'Role deleted');
    }

    public function store(Request $request)
    {
        Role::create(['name' => $request->name]);
        return redirect(route('roles.index'))->with('message', 'New Role added');
    }

    public function update(Role $role, Request $request)
    {
        $role->update($request->all());
        return redirect()->back()->with('message', 'Edit Saved!');
    }
}
