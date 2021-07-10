@extends('adminlte::page')

@section('title', 'Holiday')

@section('content')
@section('plugins.Datatables', true)
@section('plugins.TempusDominusBs4', true)
@section('plugins.DateRangePicker', true) 
{{-- Setup data for datatables --}}
@php

if(auth()->user()->role_id!=1){
$title='Holiday';
$theme='purple';
$icon='fas fa-lg fa-fw fa-calendar-minus';
$heads = [
'Name',
'Date',
];
}
if(auth()->user()->role_id==1){
$title='';
$theme='';
$icon='';
$heads = [
'Name',
'Date',
['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
}

@endphp

{{-- Minimal example / fill data using the component slot --}}

<!-- "collapsed" -->
<x-alert></x-alert>
<x-alerts></x-alerts> 

@if(auth()->user()->role_id==1)
<div class="card card-purple collapsed-card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-lg fa-fw fa-calendar-minus  mr-2"></i> Holidays
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i> Add Holiday</button>
        </div>

    </div>
    <div class="card-body" style="display: none;">
        <form action="{{route('holidays.store')}}" method="POST">
            @csrf
            <div class="card card-purple col-12 col-md-6 mx-auto">
                <div class="row card-body">
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="">Add Holiday </label>
                            <input type="text" class="form-control" name="name" required value="{{old('name')}}" id="" placeholder="Enter Holiday Name">
                        </div>
                        <div class="form-group">
                            <label for="">Multiple Days</label>
                            <select name="multiple-days" class="form-control" onchange="showInput()">
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
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
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" class="form-control bg-purple" value="Add">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

</div>
@endif

<x-adminlte-card :title="$title" :theme="$theme" :icon="$icon">

    <x-adminlte-datatable id="table1" :heads="$heads" theme="ligth" striped hoverable beautify compressed>
        @foreach ($holiday as $h)
        <tr>
            <td> {{ $h->name }}</td>
            <td>{{ $h->start_date->format('F d, Y') }}
                @if($h->end_date)
                - {{ $h->end_date->format('F d, Y') }}
                @endif
            </td>

            @if(auth()->user()->role_id==1)
            <td>
                <nobr>

                    <button class="btn btn-xs btn-default text-purple mx-1 shadow" title="Edit" data-toggle="modal" data-target="#edit{{$h->id}}">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#delete{{$h->id}}">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </nobr>
            </td>
            @endif

        </tr>

        <!-- edit-->
        <x-adminlte-modal id="edit{{$h->id}}" title="Edit Holiday" theme="purple" icon="fas fa-calendar-minus" size='md' disable-animations>
            <form action="{{route('holidays.update', $h->id)}}" method="POST" id="{{'form-edit-'.$h->id}}">
                @method('patch')
                @csrf

                <div class="col-12">
                    <div class="form-group ">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name')?old('name'):$h->name }}" placeholder="Enter Holiday Name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Multiple Days</label>
                        <select name="multiple-days" class="form-control" onchange="document.getElementById('single-date{{$h->id}}').classList.toggle('d-none');   document.getElementById('multiple-date{{$h->id}}').classList.toggle('d-none');">
                            <option value="no" {{!($h->end_date) ? 'selected' : '' }}>No</option>
                            <option value="yes" {{($h->end_date) ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                    @php
                    $config = ['format' => 'L'];
                    @endphp
                    <div id="single-date{{$h->id}}" class="{{($h->end_date) ? 'd-none' : '' }}">
                        <x-adminlte-input-date name="date" id="s-date{{$h->id}}" value="{{$h->start_date->format('m/d/Y')}}" :config="$config" label="Date" placeholder="Choose a date...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-white">
                                    <i class="far fa-lg fa-calendar-alt text-purple"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                    </div>

                    <div id="multiple-date{{$h->id}}" class=" {{!($h->end_date) ? 'd-none' : '' }}">
                        <x-adminlte-date-range name="date_range" id="m-date{{$h->id}}" value="{{$h->start_date->format('m/d/Y')}}' - '{{( $h->end_date) ?  $h->end_date->format('m/d/Y') : $h->start_date->format('m/d/Y') }}" placeholder="Select a date range..." label="Date Range">
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

                </div>
                <x-slot name="footerSlot">
                    <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                    <x-adminlte-button class="bg-purple" type="submit" label="Save" onclick="event.preventDefault();document.getElementById('form-edit-{{$h->id}}').submit()" />
                </x-slot>
            </form>

        </x-adminlte-modal>

        <!-- delete-->
        <x-adminlte-modal id="delete{{$h->id}}" title="Delete Holiday?" size="md" theme="danger" icon="fas fa-calendar-minus" v-centered scrollable>
            <p>Are you sure you want to delete <b> {{$h->name}} </b> </p>
            <x-slot name="footerSlot">
                <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                <x-adminlte-button theme="danger" label="Delete" onclick="event.preventDefault();document.getElementById('form-delete-{{$h->id}}').submit()" />
                <form action="{{route('holidays.destroy',$h->id)}}" id="{{'form-delete-'.$h->id}}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            </x-slot>
        </x-adminlte-modal>


        @endforeach
    </x-adminlte-datatable>
</x-adminlte-card>



@stop 
@section('js')

<script>
    function showInput() {
        document.getElementById("single-date").classList.toggle("d-none");
        document.getElementById("multiple-date").classList.toggle("d-none");
    }
</script>
@stop