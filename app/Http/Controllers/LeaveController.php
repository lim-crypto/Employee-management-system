<?php

namespace App\Http\Controllers;

use App\Department;
use App\Leave;
use App\Position;
use App\Rules\DateRange;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }
    public function create() {
        $user = auth()->user() ;
        $leave= $user->leave;
        return view('leave.create', compact('user', 'leave'));
    }
  
    public function index()
    { 
        $leave = Leave::all();
        $leave = $leave->map(function($leave) {
            $user = User::find($leave->user_id);
            $user->department = Department::find($user->department_id)->name;
            $user->position = Position::find($user->position_id)->name;
            $leave->user = $user;
            return $leave;
        });
        return view('leave.index', compact('leave'));
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->back()->with('message', 'Leave deleted');
    }



    public function store(Request $request)
    { 
           
        if($request->input('multiple-days') == 'yes') {
            $this->validate($request, [
                'reason' => 'required',
                'description' => 'required',
                'date_range' => new DateRange
            ]);
        } else {
            $this->validate($request, [
                'reason' => 'required',
                'description' => 'required'
            ]);
        }
        
        $values = [
            'user_id' => auth()->user()->id,
            'reason' => $request->input('reason'),
            'description' => $request->input('description'),
            'half_day' => $request->input('half-day')
        ];
        if($request->input('multiple-days') == 'yes') {
            [$start, $end] = explode(' - ', $request->input('date_range'));
            $values['start_date'] = Carbon::parse($start);
            $values['end_date'] = Carbon::parse($end);
        } else {
            $values['start_date'] = Carbon::parse($request->input('date'));
          
        }
        Leave::create($values); 
        return redirect()->back()->with('message','Request Sent, wait for approval.'); 
    } 
 
    public function show()
    {  
    }
 
    public function update(Leave $leave, Request $request)
    { 
        if($request->input('multiple-days') == 'yes') {
            $this->validate($request, [
                'reason' => 'required',
                'description' => 'required',
                'date_range' => new DateRange
            ]);
        } else {
            $this->validate($request, [
                'reason' => 'required',
                'description' => 'required'
            ]);
        }

        $values = [ 
            'reason' => $request->input('reason'),
            'description' => $request->input('description'),
            'half_day' => $request->input('half-day')
        ];
        if($request->input('multiple-days') == 'yes') {
            [$start, $end] = explode(' - ', $request->input('date_range'));
            $values['start_date'] = Carbon::parse($start);
            $values['end_date'] = Carbon::parse($end);
        } else {
            $values['start_date'] = Carbon::parse($request->input('date'));
          
        }

        $leave->update($values);
        return redirect()->back()->with('message', 'Edit Saved!');
    }

    public function updateStatus(Leave $leave, Request $request)
    { 
        $leave->update(['status' => $request->status ]  );
        return redirect()->back()->with('message', 'Edit Saved!');
    }
}
