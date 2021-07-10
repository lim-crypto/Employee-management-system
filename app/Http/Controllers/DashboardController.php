<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Leave;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    if(auth()->user()->role_id!=1){
      return redirect()->back()->with('error', 'You are not authorize to access the page');
    }
    $employee = User::all()->count();
    $employee - 1; // to exclude the admin

    $attendances = $this->attendanceToday(Carbon::now());
    $attendance = $attendances->count();
    $leaves = $this->leaveToday(Carbon::now());
    $leave = $leaves->count();
    return view('dashboard.index', compact('employee', 'attendance', 'leave'));
  }

  public function attendanceToday($date)
  {
    $attendances = Attendance::all()->filter(function ($attendance) use ($date) {
      return $attendance->created_at->dayOfYear == $date->dayOfYear;
    });
    return $attendances;
  }
  public function leaveToday($date)
  {
    $leaves = Leave::all()->filter(function ($leave) use ($date) {
      return ($leave->created_at->dayOfYear == $date->dayOfYear) && ($leave->status == 'Approved') ;
    });
    return $leaves;
  }
}
