@extends('adminlte::page')

@section('title', 'Leave')

@section('content')
@section('plugins.Datatables', true)


{{-- Setup data for datatables --}}
@php
$heads = [
'Applied on',
'Name',
'Position',
'Date',
'Status',
['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
@endphp
<br><br><br>
<x-alert></x-alert>

<x-adminlte-card title="Leave" theme="purple" icon="fas fa-lg fa-fw fa-calendar-times">
    <x-adminlte-datatable id="table1" :heads="$heads" theme="ligth" striped hoverable beautify compressed>

        @foreach ($leave as $leave)
        <tr>
            <td>{{ $leave->created_at->format('m-d-Y') }}</td>
            <td>{{ $leave->user->firstName.' '.$leave->user->lastName }}</td>
            <td>{{ $leave->user->position }}</td>
            <!-- <td>{{ $leave->start_date->format('F d, Y') }}</td> -->
            <td>{{ $leave->start_date->format('F d, Y') }}
                @if($leave->end_date)
                - {{ $leave->end_date->format('F d, Y') }}
                @endif
            </td>
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
        <x-adminlte-modal id="view{{$leave->id}}" title="Request Leave Details" theme="purple" icon="fas fa-info-circle" size='lg' scrollable v-centered>
            <dl class="row">

                <dt class="col-sm-6">Applied on </dt>
                <dd class="col-sm-6">{{ $leave->created_at->format('F d, Y') }}</dd>

                <dt class="col-sm-6">Name</dt>
                <dd class="col-sm-6"> {{ $leave->user->firstName.' '.$leave->user->lastName }} </dd>
                <dt class="col-sm-6">Position</dt>
                <dd class="col-sm-6"> {{ $leave->user->position }} </dd>

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
        <x-adminlte-modal id="edit{{$leave->id}}" title="Edit Leave" theme="purple" icon="fas fa-user-cog" size='md' v-centered scrollable>
            <form action="{{route('leave.updateStatus', $leave->id)}}" method="POST" id="{{'form-edit-'.$leave->id}}">
                @method('patch')
                @csrf
                <div class="col-12">
                    <div class="form-group ">
                        <label for="">Status</label>
                        <select class="form-control" name="status" id="">
                            <option>Pending</option>
                            <option>Approved</option>
                            <option>Declined</option>
                        </select>
                    </div>
                </div>
                <x-slot name="footerSlot">
                    <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                    <x-adminlte-button class="bg-purple" type="submit" label="Save" onclick="event.preventDefault();document.getElementById('form-edit-{{$leave->id}}').submit()" />
                </x-slot>
            </form>

        </x-adminlte-modal>

        <!-- delete-->
        <x-adminlte-modal id="delete{{$leave->id}}" title="Delete leave request?" size="md" theme="danger" icon="fas fa-calendar-times" v-centered>


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
</script>
@stop