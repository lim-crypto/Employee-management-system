@extends('adminlte::page')
@section('title', 'Add Employee')

@section('content_header')
<h1>Add Employee</h1>
@stop

@section('content')

<x-alert></x-alert>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('users.store')}}" method="POST">

                @csrf
                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Personal Information</h3>
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="">First Name</label>
                                <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" id="" placeholder="Enter first name">
                                @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-control" name="middleName" value="{{ old('middleName') }}" id="" placeholder="Enter middle name">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" id="" placeholder="Enter last name">
                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group ">
                                <label for="">Birthdate</label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="" value="{{ old('dob') }}" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="">Gender</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                                    <option disabled selected>Select gender</option>
                                    <option value="Male" {{ (old('gender')=='Male' ) ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ (old('gender')=='Female' ) ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="">Civil Status</label>
                                <select class="form-control @error('civilStatus') is-invalid @enderror" name="civilStatus" id="gender">
                                    <option value="" disabled selected>Select status</option>
                                    <option {{ (old('civilStatus')=='Single' ) ? 'selected' : '' }}>Single</option>
                                    <option {{ (old('civilStatus')=='Married' ) ? 'selected' : '' }}>Married</option>
                                    <option {{ (old('civilStatus')=='Widowed' ) ? 'selected' : '' }}>Widowed</option>
                                    <option {{ (old('civilStatus')=='Divorced' ) ? 'selected' : '' }}>Divorced</option>
                                </select>
                                @error('civilStatus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Job Information</h3>
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Job Title</label>

                                <select class="form-control @error('position_id') is-invalid @enderror" name="position_id">
                                    <option value="" disabled selected>Select Position</option>
                                    @foreach($data['position'] as $p)
                                    <option value="{{$pp=$p->id}}" {{  old('position_id')==$pp ? 'selected' : '' }}>{{$p->name}}</option>
                                    @endforeach
                                </select>
                                @error('position_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Date Hired</label>
                                <input type="date" class="form-control @error('dateHired') is-invalid @enderror" name="dateHired" value="{{ old('dateHired') }}" id="" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
                                @error('dateHired')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- <div class="form-group">
                                <label for="">Employee ID</label>
                                <input type="text" class="form-control" id="" placeholder="Enter employee id">
                            </div> -->
                            <div class="form-group">
                                <label for="">Department</label>
                                <select class="form-control @error('department_id') is-invalid @enderror" name="department_id">
                                    <option value="" disabled selected>Select Department</option>
                                    @foreach($data['department'] as $d)
                                    <option value="{{$dd=$d->id}}" {{  old('department_id')==$dd ? 'selected' : '' }}>{{$d->name}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                                    <option value="" disabled selected>Select Role</option>
                                    @foreach($data['role'] as $r)
                                    <option value="{{$rr=$r->id}}" {{  old('role_id')==$rr ? 'selected' : '' }}>{{$r->name}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Register Employee</h3>
                    </div>

                    <div class="row card-body">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="" placeholder="Enter email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="" placeholder="Enter Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control @error('confirmPassword') is-invalid @enderror" name="confirmPassword" id="" placeholder="Enter Password">
                                @error('confirmPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control bg-purple" value="Add Employee">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop