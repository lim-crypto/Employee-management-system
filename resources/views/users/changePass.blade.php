@extends('adminlte::page')
@section('title', 'Add Employee')

@section('content_header')
<h1>Edit Profile</h1>
@stop
@section('content')
<x-alert></x-alert>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('users.updatePass', auth()->user()->id)}}" method="POST">
                @method('patch')
                @csrf

                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    <div class="row card-body">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Current Password</label>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="" placeholder="Enter Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" class="form-control  @error('newPassword') is-invalid @enderror" name="newPassword" id="" placeholder="Enter Password">
                                @error('newPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control  @error('cPassword') is-invalid @enderror" name="cPassword" id="" placeholder="Enter Password">
                                @error('cPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control bg-purple" value="Save">
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@stop