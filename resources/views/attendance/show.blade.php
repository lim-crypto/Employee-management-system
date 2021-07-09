@extends('adminlte::page')
@section('title', 'Your Attendance')
@section('content')
@section('plugins.Datatables', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.DateRangePicker', true)
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
{{-- Setup data for datatables --}}
@php
$heads = [ 
['label' => 'Date', 'no-export' => true, 'width' => 10],
'Status','Entry Time','Entry Location','Exit Time','Exit Location', ];
@endphp

<div class="card card-purple collapsed-card">
    <div class="card-header">
        <h5 class=" card-title  ">
            Attendances
            @if ($filter)
            of a range
            @endif</h5>
 
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-lg fa-search"></i> Search date <i class="fas fa-lg fa-calendar-alt"></i></button>
        </div>
    </div>
    <div class="card-body" style="display: none;">
        <form action="{{ route('attendances.show') }}" method="POST">
            @csrf
            <div class="card card-purple col-12 col-md-6 mx-auto">
                <div class=" card-body">
                    <div class="col-12">
                        <x-adminlte-date-range name="date_range" placeholder="Select a date range..." label="Date Range">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-purple">
                                    <i class="far fa-lg fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-date-range>
                        @push('js')<script>
                            $(() => $("#drPlaceholder").val(''))
                        </script>@endpush
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" class="form-control bg-purple" value="Search   ">
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>

</div>

<x-adminlte-card>
    <x-adminlte-datatable id="table1" :heads="$heads" theme="ligth" striped hoverable beautify compressed>

        @foreach($attendances as $index => $attendance)
        <tr>
            @if ($attendance->registered == 2)
                <td>{{ $attendance->created_at->format('m-d-Y') }}</td>
                <td>
                    <h5 class="text-center"><span class="badge badge-pill badge-success">Present</span> </h5>
                </td>
                <td>{{ $attendance->created_at->format('H:i:s') }}</td>
                <td>{{ $attendance->entry_location }}</td>
                <td>{{ $attendance->updated_at->format('H:i:s') }}</td>
                <td>{{ $attendance->exit_location }}</td>
            @elseif($attendance->registered == 'no')
                <td>{{ $attendance->created_at->format('m-d-Y') }}</td>
                <td>
                    <h5 class="text-center"><span class="badge badge-pill badge-danger">Absent</span> </h5>
                </td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
            @elseif($attendance->registered == 'sun')
                <td>{{ $attendance->created_at->format('m-d-Y') }}</td>
                <td>
                    <h5 class="text-center"><span class="badge badge-pill badge-info">Sunday</span> </h5>
                </td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
            @elseif($attendance->registered == 'leave')
                <td>{{ $attendance->created_at->format('m-d-Y') }}</td>
                <td>
                    <h5 class="text-center"><span class="badge badge-pill badge-info">Leave</span> </h5>
                </td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
            @elseif($attendance->registered == 'holiday')
                <td>{{ $attendance->created_at->format('m-d-Y') }}</td>
                <td>
                    <h5 class="text-center"><span class="badge badge-pill badge-secondary">Holiday</span> </h5>
                </td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
                <td class="text-center">No records</td>
            @else
                <td>{{ $attendance->created_at->format('m-d-Y') }}</td>
                <td>
                    <h5 class="text-center"><span class="badge badge-pill badge-warning">Half Day</span> </h5>
                </td>
                <td>{{ $attendance->created_at->format('H:i:s') }}</td>
                <td>{{ $attendance->entry_location }}</td>
                <td>No entry</td>
                <td>No entry</td>
            @endif
        </tr>
        @endforeach
    </x-adminlte-datatable>
</x-adminlte-card>





@stop
@section('css')
@stop


 