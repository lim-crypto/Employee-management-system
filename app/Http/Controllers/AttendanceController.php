<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Holiday;
use Illuminate\Http\Request;
use App\Rules\DateRange;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\Location;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDate(Request $request)
    {
        $date = Carbon::create($request->date);
        $users = $this->attendanceByDate($date);
        echo json_encode($users); 
    }

    public function index(Request $request)
    {
        $data = [
            'date' => null
        ];
        if ($request->all()) {
            $date = Carbon::create($request->date);
            $users = $this->attendanceByDate($date);
            $data['date'] = $date->format('d M, Y');
        } else {
            $users = $this->attendanceByDate(Carbon::now());
        }
        $data['users'] = $users;
        return view('attendance.index')->with($data);
    }
    public function attendanceByDate($date)
    {
        $users = DB::table('users')->select('id', 'firstName', 'lastName')->get();
        $attendances = Attendance::all()->filter(function ($attendance, $key) use ($date) {
            return $attendance->created_at->dayOfYear == $date->dayOfYear;
        });
        return $users->map(function ($user, $key) use ($attendances) {
            $attendance = $attendances->where('user_id', $user->id)->first();
            $user->attendanceToday = $attendance;
            return $user;
        });
    }
    public function create()
    {
        $attendance = Auth::user()->attendance->last();
        if ($attendance) {
            if ($attendance->created_at->format('Y-m-d') != Carbon::now()->format('Y-m-d')) { 
                $attendance->entry_location = null; 
                $attendance->exit_location = null;
                $attendance->registered = 0;
            }
        }
        return view('attendance.create', compact('attendance'));
    }
    public function store(Request $request)
    {
        $attendance = new Attendance([
            'user_id' => auth()->user()->id, 
            'entry_location' => $request->entry_location,
            'registered' => 1
        ]);
        $attendance->save();
        return redirect()->back()->with('message', 'Attendance entry success');
    }
    public function update(Request $request, $attendance_id)
    {
        $attendance = Attendance::findOrFail($attendance_id); 
        $attendance->exit_location = $request->exit_location;
        $attendance->registered = 2;
        $attendance->save();
        return redirect()->back()->with('message', 'Attendance exit success');
    }


    public function show()
    {
        $user = Auth::user();
        $attendances = $user->attendance;

        $filter = false;
        if (request()->all()) {
            $this->validate(request(), ['date_range' => new DateRange]);
            if ($attendances) {
                [$start, $end] = explode(' - ', request()->input('date_range'));
                $start = Carbon::parse($start);
                $end = Carbon::parse($end)->addDay();
                $filtered_attendances = $this->attendanceOfRange($attendances, $start, $end);
                $leaves = $this->leavesOfRange($user->leave, $start, $end);
                $holidays = $this->holidaysOfRange(Holiday::all(), $start, $end);
                $attendances = collect();
                $count = $filtered_attendances->count();
                if ($count) {
                    $first_day = $filtered_attendances->first()->created_at->dayOfYear;
                    $attendances = $this->get_filtered_attendances($start, $end, $filtered_attendances, $first_day, $count, $leaves, $holidays);
                } else {
                    while ($start->lessThan($end)) {
                        $attendances->add($this->attendanceIfNotPresent($start, $leaves, $holidays));
                        $start->addDay();
                    }
                }
                $filter = true;
            }
        }
        if ($attendances)
            $attendances = $attendances->reverse()->values();
        $data = [
            'employee' => $user,
            'attendances' => $attendances,
            'filter' => $filter
        ];
        return view('attendance.show')->with($data);
    }

    
    public function get_filtered_attendances($start, $end, $filtered_attendances, $first_day, $count, $leaves, $holidays)
    {
        $found_start = false;
        $key = 1;
        $attendances = collect();
        while ($start->lessThan($end)) {
            if (!$found_start) {
                if ($first_day == $start->dayOfYear()) {
                    $found_start = true;
                    $attendances->add($filtered_attendances->first());
                } else {
                    $attendances->add($this->attendanceIfNotPresent($start, $leaves, $holidays));
                }
            } else {
                // iterating over the 2nd to .. n dates
                if ($key < $count) {
                    if ($start->dayOfYear() != $filtered_attendances->get($key)->created_at->dayOfYear) {
                        $attendances->add($this->attendanceIfNotPresent($start, $leaves, $holidays));
                    } else {
                        $attendances->add($filtered_attendances->get($key));
                        $key++;
                    }
                } else {
                    $attendances->add($this->attendanceIfNotPresent($start, $leaves, $holidays));
                }
            }
            $start->addDay();
        }

        return $attendances;
    }
    public function checkLeave($leaves, $date)
    {
        if ($leaves->count() != 0) {
            $leaves = $leaves->filter(function ($leave, $key) use ($date) {
                // checks if the end date has a value
                if ($leave->end_date) {
                    // if it does then checks if the $date falls between the leave range
                    $condition1 = intval($date->dayOfYear) >= intval($leave->start_date->dayOfYear);
                    $condition2 = intval($date->dayOfYear) <= intval($leave->end_date->dayOfYear);
                    return $condition1 && $condition2;
                }
                // else checks if this day is a leave
                return $date->dayOfYear == $leave->start_date->dayOfYear;
            });
        }
        return $leaves->count();
    }
    public function checkHoliday($holidays, $date)
    {
        if ($holidays->count() != 0) {
            $holidays = $holidays->filter(function ($holiday, $key) use ($date) {
                // checks if the end date has a value
                if ($holiday->end_date) {
                    // if it does then checks if the $date falls between the holiday range
                    $condition1 = intval($date->dayOfYear) >= intval($holiday->start_date->dayOfYear);
                    $condition2 = intval($date->dayOfYear) <= intval($holiday->end_date->dayOfYear);
                    return $condition1 && $condition2;
                }
                // else checks if this day is a holiday
                return $date->dayOfYear == $holiday->start_date->dayOfYear;
            });
        }
        return $holidays->count();
    }
    public function attendanceIfNotPresent($start, $leaves, $holidays)
    {
        $attendance = new Attendance();
        $attendance->created_at = $start;
        if ($this->checkHoliday($holidays, $start)) {
            $attendance->registered = 'holiday';
        } elseif ($start->dayOfWeek == 0) {
            $attendance->registered = 'sun';
        } elseif ($this->checkLeave($leaves, $start)) {
            $attendance->registered = 'leave';
        } else {
            $attendance->registered = 'no';
        }

        return $attendance;
    }
    public function leavesOfRange($leaves, $start, $end)
    {
        return $leaves->filter(function ($leave, $key) use ($start, $end) {
            // checks if the start date is between the range
            $condition1 = (intval($start->dayOfYear) <= intval($leave->start_date->dayOfYear)) && (intval($end->dayOfYear) >= intval($leave->start_date->dayOfYear));
            // checks if the end date is between the range
            $condition2 = false;
            if ($leave->end_date)
                $condition2 = (intval($start->dayOfYear) <= intval($leave->end_date->dayOfYear)) && (intval($end->dayOfYear) >= intval($leave->end_date->dayOfYear));
            // checks if the leave status is approved
            $condition3 = $leave->status == 'Approved';
            // combining all the conditions
            return ($condition1 || $condition2) && $condition3;
        });
    }
    public function attendanceOfRange($attendances, $start, $end)
    {
        return $attendances->filter(function ($attendance, $key) use ($start, $end) {
            $date = Carbon::parse($attendance->created_at);
            if ((intval($date->dayOfYear) >= intval($start->dayOfYear)) && (intval($date->dayOfYear) <= intval($end->dayOfYear)))
                return true;
        })->values();
    }
    public function holidaysOfRange($holidays, $start, $end)
    {
        return $holidays->filter(function ($holiday, $key) use ($start, $end) {
            // checks if the start date is between the range
            $condition1 = (intval($start->dayOfYear) <= intval($holiday->start_date->dayOfYear)) && (intval($end->dayOfYear) >= intval($holiday->start_date->dayOfYear));
            // checks if the end date is between the range
            $condition2 = false;
            if ($holiday->end_date)
                $condition2 = (intval($start->dayOfYear) <= intval($holiday->end_date->dayOfYear)) && (intval($end->dayOfYear) >= intval($holiday->end_date->dayOfYear));
            return ($condition1 || $condition2);
        });
    }
}
