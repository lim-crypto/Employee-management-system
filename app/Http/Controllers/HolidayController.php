<?php

namespace App\Http\Controllers;

use App\Holiday;
use App\Rules\DateRange;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $holiday = Holiday::all();
        return view('holiday.index', compact('holiday'));
    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return redirect(route('holidays.index'))->with('message', 'Holiday deleted');
    }



    public function store(Request $request)
    { 
        if ($request->input('multiple-days') == "no") {
            $request->validate([
                'name' => 'required',
                'date' => 'required'
            ]);
            Holiday::create([
                'name' => $request->name,
                'start_date' => Carbon::create($request->date)
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'date_range' => new DateRange,
            ]);
            [$start, $end] = explode(' - ', $request->date_range);
            Holiday::create([
                'name' => $request->name,
                'start_date' => $start,
                'end_date' => $end
            ]);
        }
        return redirect(route('holidays.index'))->with('message', 'New Holiday added');
    }

    public function show()
    {
    }

    public function update(Holiday $holiday, Request $request)
    {
        $request->validate([
            'name' =>  ['required'],
        ]);
        if ($request->input('multiple-days') == "no") {


            $holiday->name = $request->name;
            $holiday->start_date = Carbon::create($request->date);
            $holiday->end_date = null;
        } else {

            [$start, $end] = explode(' - ', $request->date_range);
            $holiday->name = $request->name;
            $holiday->start_date = $start;
            $holiday->end_date = $end;
        }
        $holiday->save();
        return redirect()->back()->with('message', 'Edit Saved!');
    }
}
