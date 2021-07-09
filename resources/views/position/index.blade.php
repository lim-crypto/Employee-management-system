@extends('adminlte::page')

@section('title', 'Position')

@section('content')
@section('plugins.Datatables', true)


{{-- Setup data for datatables --}}
@php
$heads = [
'ID',
'Name',
['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}

<!-- "collapsed" -->
<br><br><br>
<x-alert></x-alert>
<x-alerts></x-alerts>
<div class="card card-purple collapsed-card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-lg fa-fw fa-briefcase  mr-2"></i> Positions
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas  fa-plus"></i> Add Position </button>
        </div>
    </div>
    <div class="card-body" style="display: none;">
        <form action="{{route('positions.store')}}" method="POST">
            @csrf
            <div class="card card-purple col-12 col-md-6 mx-auto">
                <div class="row card-body">
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="">Add Position</label>
                            <input type="text" class="form-control" required name="name" value="{{old('name')}}" id="" placeholder="Enter Position Name" >
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


<x-adminlte-card>
    <x-adminlte-datatable id="table1" :heads="$heads" theme="ligth" striped hoverable beautify compressed>
        @foreach ($position as $p)
        <tr>
            <td> {{$p->id}} </td>
            <td> {{ $p->name }}</td>
            <td>
                <nobr>

                    <button class="btn btn-xs btn-default text-purple mx-1 shadow" title="Edit" data-toggle="modal" data-target="#edit{{$p->id}}">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
             
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#delete{{$p->id}}">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
    
                </nobr>
            </td>

        </tr>

        <!-- edit-->
        <x-adminlte-modal id="edit{{$p->id}}" title="Edit Position" theme="purple" icon="fas fa-briefcase" size='md' v-centered disable-animations>
            <form action="{{route('positions.update', $p->id)}}" method="POST" id="{{'form-edit-'.$p->id}}" >
                @method('patch')
                @csrf

                <div class="col-12">
                    <div class="form-group ">
                        <label for="">Name</label>
                        <input type="text" required class="form-control" name="name" value="{{ old('name')?old('name'):$p->name }}" id="" placeholder="Enter Position Name" required>
                    </div>

                </div> 
                <x-slot name="footerSlot">
                    <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                    <x-adminlte-button class="bg-purple" type="submit" label="Save" onclick="event.preventDefault();document.getElementById('form-edit-{{$p->id}}').submit()" />
                </x-slot>
            </form>

        </x-adminlte-modal>

        <!-- delete-->
        <x-adminlte-modal id="delete{{$p->id}}" title="Delete Position?" size="sm" theme="danger" icon="fas fa-briefcase" v-centered scrollable>
        <div class="text-center">
                    <small>This action is irreversable</small>
        <p>Are you sure you want to delete <b> {{$p->name}} </b> </p>

                </div>
            
            <x-slot name="footerSlot">
                <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                <x-adminlte-button theme="danger" label="Delete" onclick="event.preventDefault();document.getElementById('form-delete-{{$p->id}}').submit()" />
                <form action="{{route('positions.destroy',$p->id)}}" id="{{'form-delete-'.$p->id}}" method="POST" style="display: none;">
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