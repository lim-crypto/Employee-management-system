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
  public function index()
  {
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
