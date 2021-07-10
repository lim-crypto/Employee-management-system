@extends('adminlte::page')

@section('title', 'Role')

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
<x-alerts></x-alerts>
<x-alert></x-alert>
<div class="card card-purple collapsed-card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-lg fa-fw fa-users-cog  mr-2"></i> Role
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas  fa-plus"></i> Add Role </button>
        </div>
    </div>
    <div class="card-body" style="display: none;">

        <form action="{{route('roles.store')}}" method="POST">
            @csrf
            <div class="card card-purple col-12 col-md-6 mx-auto">
                <div class="row card-body">
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="">Add Role</label>
                            <input type="text" class="form-control" name="name" value="{{  old('name')   }}" id="" placeholder="Enter Role Name" required>
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
        @foreach ($role as $r)
        <tr>
            <td> {{$r->id }} </td>

            <td> {{ $r->name }}</td>
            <td>
                <nobr>

                    <button class="btn btn-xs btn-default text-purple mx-1 shadow" title="Edit" data-toggle="modal" data-target="#edit{{$r->id}}">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#delete{{$r->id}}">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </nobr>
            </td>

        </tr>

        <!-- edit-->
        <x-adminlte-modal id="edit{{$r->id}}" title="Edit Role" theme="purple" icon="fas fa-user-cog" size='md' v-centered disable-animations>
            <form action="{{route('roles.update', $r->id)}}" method="POST" id="{{'form-edit-'.$r->id}}">
                @method('patch')
                @csrf

                <div class="col-12">
                    <div class="form-group ">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name')?old('name'):$r->name }}" id="" placeholder="Enter Full Name" required>
                    </div>

                </div>

                <x-slot name="footerSlot">
                    <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                    <x-adminlte-button class="bg-purple" type="submit" label="Save" onclick="event.preventDefault();document.getElementById('form-edit-{{$r->id}}').submit()" />
                </x-slot>

            </form>

        </x-adminlte-modal>

        <!-- delete-->
        <x-adminlte-modal id="delete{{$r->id}}" title="Delete Role?" size="sm" theme="danger" icon="fas fa-user-cog" v-centered scrollable>


            <div class="text-center">
                <small>This action is irreversable</small>
                <p>Are you sure you want to delete <b> {{$r->name}} </b> </p>

            </div>

            <x-slot name="footerSlot">
                <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                <x-adminlte-button theme="danger" label="Delete" onclick="event.preventDefault();document.getElementById('form-delete-{{$r->id}}').submit()" />
                <form action="{{route('roles.destroy',$r->id)}}" id="{{'form-delete-'.$r->id}}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                </form>
            </x-slot>
        </x-adminlte-modal>


        @endforeach
    </x-adminlte-datatable>
</x-adminlte-card>



@stop 