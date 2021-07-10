@extends('adminlte::page')
@section('title', 'Attendance')
@section('content')
@section('plugins.Datatables', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.DateRangePicker', true)
{{-- Setup data for datatables --}}
@php
$heads = [ 'ID','Name','Entry','Time','Location','Exit','Time','Location',
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<br><br>
<x-alert></x-alert>
<div class="card card-purple collapsed-card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-lg fa-fw fa-briefcase  mr-2"></i>
            @if ($date)
            Employee attendance on {{ $date }}
            @else
            Employee attendance
            @endif
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-lg fa-search"></i> Search date <i class="fas fa-lg fa-calendar-alt"></i></button>
        </div>
    </div>
    <div class="card-body" style="display: none;">
        <form id="getDate">

            <div class="card card-purple col-12 col-md-6 mx-auto">
                <div class="row card-body">
                    <div class="col-12">
                        @php
                        $config = ['format' => 'L'];
                        @endphp

                        <x-adminlte-input-date name="date" id="date" :config="$config" label="Date" placeholder="Choose a date...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-white">
                                    <i class="far fa-lg fa-calendar-alt text-purple"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
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

    <x-adminlte-datatable id="table1" :heads="$heads" theme="ligth" striped hoverable compressed>

        @foreach ($users as $user)
        <tr>
            <td>{{$user->id }}</td>
            <td>{{ $user->firstName.' '.$user->lastName }}</td>
            @if($user->attendanceToday)
            <td>
                <h6 class="text-center"><span class="badge badge-pill badge-success">Recorded</span></h6>
            </td>
            @else
            <td>
                <h6 class="text-center"><span class="badge badge-pill badge-danger">No Record</span></h6>
            </td>
            @endif

            <td> {{ $user->attendanceToday ?  $user->attendanceToday->created_at->format('H:i:s') :'' }}
            </td>
            <td>
                {{$user->attendanceToday ? $user->attendanceToday->entry_location :''}}
            </td>
            @if ($user->attendanceToday ? $user->attendanceToday->exit_location : 0 )
            <td>
                <h6 class="text-center"><span class="badge badge-pill badge-success">Recorded</span></h6>
            </td>
            @else
            <td>
                <h6 class="text-center"><span class="badge badge-pill badge-danger">No Record</span></h6>
            </td>
            @endif
            <td>
                {{$user->attendanceToday ? $user->attendanceToday->updated_at->format('H:i:s'):'' }}
            </td>
            <td>
                {{$user->attendanceToday ? $user->attendanceToday->exit_location :''}}
            </td>
        </tr>
        @endforeach
    </x-adminlte-datatable>
</x-adminlte-card>

@stop
@section('js')

<script> 
    document.getElementById('getDate').addEventListener('submit', getDate);

    function getDate(e) {
        e.preventDefault();
        var date = document.getElementById('date').value;
        var xhr = new XMLHttpRequest();
        xhr.open('get', 'getDate?date=' + date, true);
        xhr.onload = function() {
            var users = JSON.parse(this.responseText);
            var tbody = '<table id="table2" style="width:100%" class="table table-hover table-striped table-sm table-ligth dataTable no-footer" role="grid" aria-describedby="table1_info">';
            tbody += '<thead>' +
                '<tr role="row">' +
                '<th >ID</th>' +
                '<th >Name</th>' +
                '<th >Entry</th>' +
                '<th >Time</th>' +
                '<th >Location</th>' +
                '<th >Exit</th>' +
                '<th >Time</th>' +
                '<th >Location</th>' +
                '</tr>' +
                ' </thead>';
            for (var i in users) {
                if (users[i].attendanceToday) {
                    var entry = '<h6 class="text-center"><span class="badge badge-pill badge-success">Recorded</span></h6>';
                    var date = new Date(users[i].attendanceToday.created_at);
                    var created_at = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
                    var entry_location = users[i].attendanceToday.entry_location;
                    if (users[i].attendanceToday.exit_location) {
                        var exit = '<h6 class="text-center"><span class="badge badge-pill badge-success">Recorded</span></h6>';
                        var date2 = new Date(users[i].attendanceToday.created_at);
                        var updated_at = date2.getHours() + ':' + date2.getMinutes() + ':' + date2.getSeconds();
                        var exit_location = users[i].attendanceToday.exit_location;
                    }
                } else {
                    var entry = '<h6 class="text-center"><span class="badge badge-pill badge-danger">No Record</span></h6>';
                    var created_at = '';
                    var entry_location = '';
                    var exit = ' <h6 class="text-center"><span class="badge badge-pill badge-danger">No Record</span></h6>';
                    var updated_at = '';
                    var exit_location = '';
                }
                tbody += '<tr>' +
                    '<td>' + users[i].id + '</td>' +
                    '<td>' + users[i].firstName + ' ' + users[i].lastName + '</td>' +
                    '<td>' + entry + '</td>' +
                    '<td>' + created_at + '</td>' +
                    '<td>' + entry_location + '</td>' +
                    '<td>' + exit + '</td>' +
                    '<td>' + updated_at + '</td>' +
                    '<td>' + exit_location + '</td>' +
                    ' </tr>';
            }
            tbody += '</table>';
            document.getElementById('table1_wrapper').innerHTML = tbody;
        }
        xhr.send();
    } 
</script>
@stop