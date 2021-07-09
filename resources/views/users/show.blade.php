@extends('adminlte::page')
@section('title', 'Profile')
@section('content_header')
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <x-adminlte-card theme="purple" theme-mode="outline">

                <div class="text-center">
                    <a href="#">
                        <img class="profile-user-img elevation-2 img-fluid img-circle" src="/storage/images/{{($user->avatar) ? $user->avatar:'user.png'}}" alt="img" data-toggle="modal" data-target="#view" />
                    </a>
                </div>

                <h3 class="profile-username text-center">{{$user->firstName.' '.$user->lastName}}</h3>

                <p class="text-muted text-center ">{{$user->position->name}}</p>
                @if(auth()->user()->id==$user->id)
                <a href="#" data-toggle="modal" data-target="#view">
                    <i class="fas fa-camera text-purple"> </i>
                    <small class="text-muted">edit picture</small>
                </a>
                @endif
            </x-adminlte-card>

            {{-- Custom --}}
            <x-adminlte-modal id="view" title="{{$user->firstName .' '. $user->lastName}}" size="sm" theme="purple" v-centered>
                <div class="card">
                    <img src="/storage/images/{{($user->avatar) ? $user->avatar:'user.png'}}" id="preview" alt="img" />
                </div>
                @if(auth()->user()->id==$user->id)
                <form action="{{route('upload', $user->id)}}" method="POST" id="{{'form-edit-'.$user->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    {{-- Placeholder, sm size and prepend icon --}}
                    <x-adminlte-input-file name="image" igroup-size="sm" placeholder="Edit Your Profile Picture" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-purple">
                                <i class="fas fa-camera"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-file> 
                </form>
                <x-slot name="footerSlot">
                    <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                    <x-adminlte-button class="bg-purple" type="submit" label="Save" onclick="event.preventDefault();document.getElementById('form-edit-{{$user->id}}').submit()" />
                </x-slot>
                @endif
            </x-adminlte-modal>
            {{-- Example button to open modal --}}


            @if($user->course.$user->city.$user->skill)
            <!-- About Me Box -->
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if($user->course)
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>
                    <p class="text-muted">
                        {{$user->course.' '.$user->school}}
                    </p>
                    <hr>
                    @endif
                    @if($user->city)
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                    <p class="text-muted">{{ $user->city.', '.$user->province.', '.$user->country}}</p>
                    <hr>
                    @endif
                    @if($user->skill)
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                    <p class="text-muted"> {{$user->skill}}
                    </p>
                    @endif
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-9">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">
                        Profile
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">

                        <dt class="col-sm-4">Job Information</dt>
                        <dd class="col-sm-8">{{$user->position->name}}</dd>
                        <dd class="col-sm-8 offset-sm-4">{{$user->department->name}}</dd>

                        <dt class="col-sm-4">Name </dt>
                        <dd class="col-sm-8">{{$user->firstName.' '.$user->middleName.' '.$user->lastName}}</dd>

                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{$user->email}}</dd>

                        <!-- <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd> -->
                        @if($user->phoneNumber)
                        <dt class="col-sm-4">Phone number</dt>
                        <dd class="col-sm-8">{{$user->phoneNumber}}</dd>
                        @endif

                        @if($user->city)
                        <dt class="col-sm-4">Address</dt>
                        <dd class="col-sm-8">{{$user->houseNumber.', '.$user->street.', '.$user->brgy.', '.$user->city.', '.$user->province.', '.$user->country}}</dd>
                        @endif

                        @if($user->dob)
                        <dt class="col-sm-4">Birthday</dt>
                        <dd class="col-sm-8">{{$user->dob}}</dd>
                        @endif

                        @if($user->gender)
                        <dt class="col-sm-4">Gender</dt>
                        <dd class="col-sm-8">{{$user->gender}}</dd>
                        @endif

                        @if($user->civilStatus)
                        <dt class="col-sm-4">Civil Status</dt>
                        <dd class="col-sm-8">{{$user->civilStatus}}</dd>
                        @endif

                        @if($user->course)
                        <dt class="col-sm-4">Education</dt>
                        <dd class="col-sm-8">{{$user->course.' '.$user->school}}</dd>
                        @endif

                        @if($user->certificate)
                        <dd class="col-sm-8 offset-sm-4">{{$user->certificate}}</dd>
                        @endif

                        @if($user->skill)
                        <dt class="col-sm-4">Skill</dt>
                        <dd class="col-sm-8">{{$user->skill}}</dd>
                        @endif

                        @if($user->ename)
                        <dt class="col-sm-4">Emergency Contact</dt>
                        <dd class="col-sm-8">{{$user->ename .' ('.$user->relationship.')' }}</dd>
                        @endif

                        @if($user->ephone)
                        <dd class="col-sm-8 offset-sm-4">{{$user->ephone}}</dd>
                        <dd class="col-sm-8 offset-sm-4">{{ $user->eFullAddress}}</dd>

                        @endif
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>
</div>
@stop

<!-- 
@ section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@ stop

@ section('js')
<script>
    console.log('Hi!');
</script>
@ stop -->