<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $position = Position::all();
        return view('position.index', compact('position'));
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect(route('positions.index'))->with('message', 'Position deleted');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' =>  ['required'],
        ]);
        Position::create(['name' => $request->name]);
        return redirect(route('positions.index'))->with('message', 'New Position added');
    }

    public function show()
    {
    }

    public function update(Position $position, Request $request)
    {
        $request->validate([
            'name' =>  ['required'],
        ]);
        $position->update($request->all());
        return redirect()->back()->with('message', 'Edit Saved!');
    }
}
