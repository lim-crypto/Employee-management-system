@extends('adminlte::page')
@section('title', 'Edit Profile')

@section('content_header')
<h1>Edit Profile</h1>
@stop

@section('content')

<x-alert></x-alert>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('users.update', $user->id)}}" method="POST">
                @method('patch')
                @csrf
                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Personal Information</h3>
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="">First Name</label>
                                <input type="text" class="form-control  @error('firstName') is-invalid @enderror" name="firstName" value="{{  old('firstName') ? old('firstName') : $user->firstName   }}" id="" placeholder="Enter first name">
                                @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-control" name="middleName" value="{{ old('middleName') ? old('middleName') : $user->middleName }}" id="" placeholder="Enter middle name">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') ? old('lastName') : $user->lastName }}" id="" placeholder="Enter last name">
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
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" id="" value="{{ old('dob') ? old('dob') : $user->dob }}" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
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
                                    <option value="Male" {{ (old('gender')=='Male' ) ? 'selected' : ( ( $user->gender =='Male' ) ? 'selected' : '') }}>Male</option>
                                    <option value="Female" {{ (old('gender')=='Female') ? 'selected'  : ( ( $user->gender =='Female' ) ? 'selected' : '' ) }}>Female</option>
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
                                    <option  value="" disabled selected>Select status</option>
                                    <option {{ (old('civilStatus')=='Single' ) ? 'selected' : ( ( $user->civilStatus =='Single' ) ? 'selected' : '') }}>Single</option>
                                    <option {{ (old('civilStatus')=='Married' ) ? 'selected' : ( ( $user->civilStatus =='Married' ) ? 'selected' : '') }}>Married</option>
                                    <option {{ (old('civilStatus')=='Widowed' ) ? 'selected' : ( ( $user->civilStatus =='Widowed' ) ? 'selected' : '') }}>Widowed</option>
                                    <option {{ (old('civilStatus')=='Divorced' ) ? 'selected' : ( ( $user->civilStatus =='Divorced' ) ? 'selected' : '') }}>Divorced</option>
                                </select>
                                @error('civilStatus')
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
                        <h3 class="card-title">Contact Information</h3>
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="">Phone Number</label>
                                <input type="tel" class="form-control" name="phoneNumber" value="{{ old('phoneNumber')?old('phoneNumber'):$user->phoneNumber }}" id="" placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="email" class="form-control" name="email" id="" value="{{ $user->email }}" disabled placeholder="Enter email">
                            </div>
                        </div>
                    </div>

                    <div class="row card-body">

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="">House Number</label>
                                <input type="text" class="form-control" name="houseNumber" value="{{ old('houseNumber')?old('houseNumber'):$user->houseNumber }}" id="" placeholder="Enter House number">
                            </div>
                            <div class="form-group ">
                                <label for="">Street</label>
                                <input type="text" class="form-control" name="street" value="{{ old('street')?old('street'):$user->street }}" id="" placeholder="Enter Street">
                            </div>
                            <div class="form-group ">
                                <label for="">Barangay</label>
                                <input type="text" class="form-control" name="brgy" value="{{ old('brgy')?old('brgy'):$user->brgy }}" id="" placeholder="Enter Barangay">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group ">
                                <label for="">City</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city')?old('city'):$user->city }}" id="" placeholder="Enter City">
                            </div>
                            <div class="form-group ">
                                <label for="">Province</label>
                                <input type="text" class="form-control" name="province" value="{{ old('province')?old('province'):$user->province }}" id="" placeholder="Enter Province">
                            </div>
                            <div class="form-group ">
                                <label for="">Country</label>
                                <input type="text" class="form-control" name="country" value="{{ old('country')?old('country'):$user->country }}" id="" placeholder="Enter Country" value="Philippines">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Education Information</h3>
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">School</label>
                                <input type="text" class="form-control" name="school" value="{{ old('school')?old('school'):$user->school }}" id="" placeholder="Enter school">
                            </div>
                            <div class="form-group">
                                <label for="">Course</label>
                                <input type="text" class="form-control" name="course" value="{{ old('course')?old('course'):$user->course }}" id="" placeholder="Enter field of study">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group ">
                                <label for="">Certificate Level</label>
                                <select class="form-control" name="certificate" id="gender">
                                    <option value="" disabled {{(($user->certificate)==null ) ? 'selected' : ''}}>Certificate Level</option>
                                    <option {{ (old('certificate')=='HighSchool' ) ? 'selected' : ( ( $user->certificate =='HighSchool' ) ? 'selected' : '') }}>HighSchool Diploma</option>
                                    <option {{ (old('certificate')=='Undergraduate' ) ? 'selected' : ( ( $user->certificate =='undergraduate' ) ? 'selected' : '') }}>Undergraduate</option>
                                    <option {{ (old('certificate')=='Graduate' ) ? 'selected' : ( ( $user->certificate =='Graduate' ) ? 'selected' : '') }}>Graduate</option>
                                    <option {{ (old('certificate')=='Bachelor' ) ? 'selected' : ( ( $user->certificate =='Bachelor' ) ? 'selected' : '') }}>Bachelor</option>
                                    <option {{ (old('certificate')=='Master' ) ? 'selected' : ( ( $user->certificate =='Master' ) ? 'selected' : '') }}>Master</option>
                                    <option {{ (old('certificate')=='Doctor' ) ? 'selected' : ( ( $user->certificate =='Doctor' ) ? 'selected' : '') }}>Doctor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Skill</label>
                                <input type="text" class="form-control" name="skill" value="{{ old('skill')?old('skill'):$user->skill }}" id="" placeholder="Enter Skills">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Emergency Contact</h3>
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="ename" value="{{ old('ename')?old('ename'):$user->ename }}" id="" placeholder="Enter Full Name">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="tel" class="form-control" name="ephone" value="{{ old('ephone')?old('ephone'):$user->ephone }}" id="" placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="">Relationship</label>
                                <input type="text" class="form-control" name="relationship" value="{{ old('relationship')?old('relationship'):$user->relationship }}" id="" placeholder="Enter relationship">
                            </div>
                            <div class="form-group">
                                <label for="">Full Address</label>
                                <textarea type="text" class="form-control" name="eFullAddress" id="" placeholder="Enter full address (House no., Street, Barangay, City, Province)" rows="3">{{old('eFullAddress')?old('eFullAddress'):$user->eFullAddress }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="submit" class="form-control bg-purple" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
 