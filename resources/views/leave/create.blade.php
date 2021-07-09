@extends('adminlte::page')

@section('title', 'Leave')

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
'Applied on',
'Reason',
'Status',
['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
@endphp
<x-alert></x-alert>

<div class="card card-purple  ">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-lg fa-fw fa-calendar-times  mr-2"></i> Request Leave
        </h3>
    </div>

    <div class="card-body">
        <form action="{{ route('leave.store') }}" method="POST">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="">Multiple Days</label>
                    <select name="multiple-days" class="form-control" onchange="showInput()">
                        <option value="no" selected>No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                <div class="form-group hide-input" id="half-day">
                    <label>Half Day</label>
                    <select class="form-control" name="half-day">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

                <!-- date only, no time -->
                @php
                $config = ['format' => 'L'];
                @endphp
                <div id="single-date" class="">
                    <x-adminlte-input-date name="date" :config="$config" label="Date" placeholder="Choose a date...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-white">
                                <i class="far fa-lg fa-calendar-alt text-purple"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date>
                </div>

                <div id="multiple-date" class="d-none">
                    <x-adminlte-date-range name="date_range" :config="$config" placeholder="Select a date range..." label="Date Range">
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
                <div class="form-group">
                    <label for="">Reason</label>
                    <input type="text" name="reason" value="{{ old('reason') }}" class="form-control">
                    @error('reason')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control bg-purple" value="Send Request">
                </div>
            </div>

        </form>

    </div>

</div>


<x-adminlte-card title="List of leave request" theme="purple" icon="fas fa-lg fa-fw fa-calendar-times">
    <x-adminlte-datatable id="table1" :heads="$heads" theme="ligth" striped hoverable beautify compressed>

        @foreach ($leave as $leave)
        <tr>
            <td>{{ $leave->created_at->format('m-d-Y') }}</td>
            <td>{{ $leave->reason }}</td>
            <td>
                <h5>
                    <span @if ($leave->status == 'Pending')
                        class="badge badge-pill badge-warning"
                        @elseif($leave->status == 'Declined')
                        class="badge badge-pill badge-danger"
                        @elseif($leave->status == 'Approved')
                        class="badge badge-pill badge-success"
                        @endif
                        >
                        {{ ucfirst($leave->status) }}
                    </span>
                </h5>
            </td>
            <td>
                <nobr>
                    <button class="btn btn-xs btn-default text-purple mx-1 shadow" title="Details" data-toggle="modal" data-target="#view{{$leave->id}}">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" data-toggle="modal" data-target="#edit{{$leave->id}}">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#delete{{$leave->id}}">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </nobr>
            </td>

        </tr>
        <!-- view -->
        <x-adminlte-modal id="view{{$leave->id}}" title="Request Leave Details" theme="purple" icon="fas fa-info-circle" size='lg' v-centered disable-animations>
            <dl class="row">

                <dt class="col-sm-6">Applied on </dt>
                <dd class="col-sm-6">{{ $leave->created_at->format('F d, Y') }}</dd>
                <!-- <dd class="col-sm-8 offset-sm-4">{{$user->department->name}}</dd> -->

                <dt class="col-sm-6">Reason </dt>
                <dd class="col-sm-6">{{ $leave->reason }}</dd>

                <dt class="col-sm-6">Description</dt>
                <dd class="col-sm-6">{{ $leave->description }}</dd>

                <dt class="col-sm-6">Status</dt>
                <dd class="col-sm-6">
                    <h5>
                        <span @if ($leave->status == 'Pending')
                            class="badge badge-pill badge-warning"
                            @elseif($leave->status == 'Declined')
                            class="badge badge-pill badge-danger"
                            @elseif($leave->status == 'Approved')
                            class="badge badge-pill badge-success"
                            @endif
                            >
                            {{ ucfirst($leave->status) }}
                        </span>
                    </h5>
                </dd>

                <dt class="col-sm-6">Date</dt>
                <dd class="col-sm-6">
                    {{ $leave->start_date->format('F d, Y')}}
                    @if($leave->end_date)
                    - {{ $leave->end_date->format('F d, Y') }}
                    @endif
                </dd>
            </dl>
        </x-adminlte-modal>

        <!-- edit-->
        <x-adminlte-modal id="edit{{$leave->id}}" title="Edit Leave" theme="purple" icon="fas fa-edit" size='md' v-centered disable-animations>
            <form action="{{route('leave.update', $leave->id)}}" method="POST" id="{{'form-edit-'.$leave->id}}">
                @method('patch')
                @csrf

                <div class="col-12">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Multiple Days</label>
                            <select name="multiple-days" class="form-control" onchange="document.getElementById('single-date{{$leave->id}}').classList.toggle('d-none');
                                        document.getElementById('multiple-date{{$leave->id}}').classList.toggle('d-none');
                                        document.getElementById('half-day{{$leave->id}}').classList.toggle('d-none');">
                                <option value="no" {{!($leave->end_date) ? 'selected' : '' }}>No</option>
                                <option value="yes" {{($leave->end_date) ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        <div class="form-group hide-input {{($leave->end_date) ? 'd-none' : '' }}" id="half-day{{$leave->id}}">
                            <label>Half Day</label>
                            <select class="form-control" name="half-day">
                                <option value="no" {{$leave->half_day=='no' ? 'selected' : '' }}>No</option>
                                <option value="yes" {{$leave->half_day=='yes' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        @php
                        $config = ['format' => 'L'];
                        @endphp
                        <div id="single-date{{$leave->id}}" class="{{($leave->end_date) ? 'd-none' : '' }}">
                            <x-adminlte-input-date name="date" id="{{$leave->id}}" value="{{$leave->start_date->format('m/d/Y')}}" :config="$config" label="Date" placeholder="Choose a date...">
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-white">
                                        <i class="far fa-lg fa-calendar-alt text-purple"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-date>
                        </div>

                        <div id="multiple-date{{$leave->id}}" class=" {{!($leave->end_date) ? 'd-none' : '' }}">
                            <x-adminlte-date-range name="date_range" id="date_range{{$leave->id}}" value="{{$leave->start_date->format('m/d/Y')}}' - '{{( $leave->end_date) ?  $leave->end_date->format('m/d/Y') : $leave->start_date->format('m/d/Y') }}" :config="$config" placeholder="Select a date range..." label="Date Range">
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
                        <div class="form-group">
                            <label for="">Reason</label>
                            <input type="text" name="reason" value="{{ old('reason')  ?   old('reason')  : $leave->reason }}" class="form-control">
                            @error('reason')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control">{{ old('description') ? old('description') : $leave->description }}</textarea>
                            @error('description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <x-slot name="footerSlot">
                    <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                    <x-adminlte-button class="bg-purple" type="submit" label="Save" onclick="event.preventDefault();document.getElementById('form-edit-{{$leave->id}}').submit()" />
                </x-slot>
            </form>

        </x-adminlte-modal>

        <!-- delete-->
        <x-adminlte-modal id="delete{{$leave->id}}" title="Delete leave?" size="sm" theme="danger" icon="fas fa-calendar-times" v-centered scrollable>


            <div class="text-center">
                <small>This action is irreversable</small>
                <p>Are you sure you want to delete?</p>

            </div>

            <x-slot name="footerSlot">
                <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                <x-adminlte-button theme="danger" label="Delete" onclick="event.preventDefault();document.getElementById('form-delete-{{$leave->id}}').submit()" />
                <form action="{{route('leave.destroy',$leave->id)}}" id="{{'form-delete-'.$leave->id}}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            </x-slot>
        </x-adminlte-modal>


        @endforeach
    </x-adminlte-datatable>
</x-adminlte-card>



@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true,
            autoWidth: false,
        });
    });

    function showInput() {
        document.getElementById("single-date").classList.toggle("d-none");
        document.getElementById("multiple-date").classList.toggle("d-none");
        document.getElementById("half-day").classList.toggle("d-none");

    }
</script>
@stop