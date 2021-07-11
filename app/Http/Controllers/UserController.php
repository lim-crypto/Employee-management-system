<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\UserRequest;
use App\Position;
use App\Role;
use Illuminate\Http\Request;
use App\user;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'position' => Position::all(),
            'department' => Department::all(),
            'role' => Role::all(),
        ];
        $users = User::all();
        return view('users.index', compact('users', 'data'));
    }

    public function create()
    {
        if (auth()->user()->role_id == 1) {
            $data = [
                'position' => Position::all(),
                'department' => Department::all(),
                'role' => Role::all(),
            ];
            return view('users.add', compact('data'));
        } else {
            $users = User::all();
            return redirect(route('users.index', compact('users')));
        }
    }
    public function store(UserRequest $request)
    {  
            User::create([
                'firstName' => $request->firstName,
                'middleName' =>  $request->middleName,
                'lastName' => $request->lastName,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'civil' => $request->civilStatus,
                'role_id' => $request->role_id,
                'position_id' => $request->position_id,
                'department_id' => $request->department_id,
                'dateHired' => $request->dateHired,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect(route('users.create'))->with('message', 'New Employee added'); 
    }
    public function edit()
    {
        $user = auth()->user();
        return view('users.edit', compact('user'));
    }
    public function showEmployee(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function show()
    {
        $user = auth()->user();
        return view('users.show', compact('user'));
    }

    public function uploadAvatar(User $user,  Request $request)
    {
        if ($request->hasFile('image')) {
            if ($user->avatar) {
                Storage::delete('/public/images/' . $user->avatar);
            } 
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $user->update(['avatar' => $filename]);
            return redirect()->back()->with('message', 'image is uploaded');
        }
        return redirect()->back()->with('error', 'image not is uploaded');
    }

    public function update(User $user, Request $request)
    { 
        $this->validate($request, [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'gender' => ['required'], 
            'avatar' => 'image|nullable',
        ]);
        $user->update($request->all());
        return redirect()->back()->with('message', 'Edit Saved!');
    }

    public function changePass()
    {
        return view('users.changePass');
    }
    public function updatePass(User $user, Request $request)
    { 
        $this->validate($request, [
            'password' => 'required',
            'newPassword' =>  'required',
            'cPassword' => 'required|same:newPassword',
        ]);

        if (Auth::Check()) {
            $requestData = $request->All();
            $currentPassword = Auth::User()->password;
            if (Hash::check($requestData['password'], $currentPassword)) { 
                $user->update([
                    'password' => Hash::make($request->cPassword)
                ]);
                return redirect()->back()->with('message', 'Password successfully changed');
            } else {
                return  redirect()->back()->with('error', 'Sorry, your current password was not recognised. Please try again.');
            }
        }
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->with('message', 'User deleted');
    }
}
