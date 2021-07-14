 @extends('adminlte::page')

 @section('title', 'Employee')

 @section('content')

 @section('plugins.Datatables', true)

 {{-- Setup data for datatables --}}
 @php
 $heads = [
 'ID',
 'Avatar',
 'Employee Name',
 ['label' => 'Position', 'width' => 40],
 ['label' => 'Actions', 'no-export' => true, 'width' => 5],
 ];

 @endphp


 @if(auth()->user()->role_id==1)

 <x-alerts></x-alerts>
 <x-adminlte-card title="Employee" theme="purple" icon="fas fa-lg fa-fw fa-users " collapsible>
     <x-adminlte-datatable id="table1" :heads="$heads" theme="ligth" striped hoverable beautify compressed>
         @foreach ($users as $user)

         <tr>
             <td> {{$user->id }} </td>
             <td>
                 <img class="profile-user-img elevation-2 img-fluid img-circle" src="/storage/images/{{($user->avatar) ? $user->avatar:'user.png'}}" alt="img">
             </td>
             <td> {{ $user->firstName.' '.$user->lastName }}</td>
             <td> {{ $user->position->name }}</td>
             <td>
                 <nobr>
                     <button class="btn btn-xs btn-default text-purple mx-1 shadow" title="Details" data-toggle="modal" data-target="#view{{$user->id}}">
                         <i class="fa fa-lg fa-fw fa-eye"></i>
                     </button>
                     <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" data-toggle="modal" data-target="#edit{{$user->id}}">
                         <i class="fa fa-lg fa-fw fa-pen"></i>
                     </button>
                     <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#delete{{$user->id}}">
                         <i class="fa fa-lg fa-fw fa-trash"></i>
                     </button>

                 </nobr>
             </td>

         </tr>
         <!-- view -->
         <x-adminlte-modal id="view{{$user->id}}" title="User Profile" theme="purple" icon="far fa-user-circle" size='lg' v-centered disable-animations>

             <dl class="row">

                 <dt class="col-sm-6">Job Information</dt>
                 <dd class="col-sm-6">{{$user->position->name}}</dd>
                 <dd class="col-sm-6 offset-sm-6">{{$user->department->name}}</dd>

                 <dt class="col-sm-6">Name </dt>
                 <dd class="col-sm-6">{{$user->firstName.' '.$user->middleName.' '.$user->lastName}}</dd>

                 <dt class="col-sm-6">Email</dt>
                 <dd class="col-sm-6">{{$user->email}}</dd>

                 @if($user->phoneNumber)
                 <dt class="col-sm-6">Phone number</dt>
                 <dd class="col-sm-6">{{$user->phoneNumber}}</dd>
                 @endif

                 @if($user->city)
                 <dt class="col-sm-6">Address</dt>
                 <dd class="col-sm-6">{{$user->houseNumber.', '.$user->street.', '.$user->brgy.', '.$user->city.', '.$user->province.', '.$user->country}}</dd>
                 @endif

                 @if($user->dob)
                 <dt class="col-sm-6">Birthday</dt>
                 <dd class="col-sm-6">{{$user->dob}}</dd>
                 @endif

                 @if($user->gender)
                 <dt class="col-sm-6">Gender</dt>
                 <dd class="col-sm-6">{{$user->gender}}</dd>
                 @endif

                 @if($user->civilStatus)
                 <dt class="col-sm-6">Civil Status</dt>
                 <dd class="col-sm-6">{{$user->civilStatus}}</dd>
                 @endif

                 @if($user->course)
                 <dt class="col-sm-6">Education</dt>
                 <dd class="col-sm-6">{{$user->course.' '.$user->school}}</dd>
                 @endif

                 @if($user->certificate)
                 <dd class="col-sm-6 offset-sm-6">{{$user->certificate}}</dd>
                 @endif

                 @if($user->skill)
                 <dt class="col-sm-6">Skill</dt>
                 <dd class="col-sm-6">{{$user->skill}}</dd>
                 @endif

                 @if($user->ename)
                 <dt class="col-sm-6">Emergency Contact</dt>
                 <dd class="col-sm-6">{{$user->ename .' ('.$user->relationship.')' }}</dd>
                 @endif

                 @if($user->ephone)
                 <dd class="col-sm-6 offset-sm-6">{{$user->ephone}}</dd>
                 <dd class="col-sm-6 offset-sm-6">{{ $user->eFullAddress}}</dd>
                 @endif

             </dl>
         </x-adminlte-modal>

         <!-- edit-->
         <x-adminlte-modal id="edit{{$user->id}}" title="Edit Profile" icon="fas fa-user-edit" size='lg' v-centered scrollable disable-animations>
             <form action="{{route('users.update', $user->id)}}" method="POST" id="{{'form-edit-'.$user->id}}">
                 @method('patch')
                 @csrf
                 <div class="card card-purple">
                     <div class="card-header">
                         <h3 class="card-title">Job Information</h3>
                     </div>
                     <div class="row card-body">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Job Title</label>

                                 <select class="form-control" name="position_id">
                                     <option value="" disabled selected>Select Position</option>
                                     @foreach($data['position'] as $position)
                                     <option value="{{$position->id}}"  {{  old('position_id')==$position->id ? 'selected' :( ($user->position_id==$position->id) ? 'selected': ''  )}} >{{$position->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="">Date Hired</label>
                                 <input type="date" class="form-control" name="dateHired" value="{{ old('dateHired')? old('dateHired')  : $user->dob }}" id="" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Department</label>
                                 <select class="form-control" name="department_id">
                                     <option value="" disabled selected>Select Department</option>
                                     @foreach($data['department'] as $department)
                                     <option value="{{$department->id}}" {{  old('department_id')==$department->id ? 'selected' : ( ($user->department_id==$department->id) ? 'selected': ''  ) }}>{{$department->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="">Role</label>
                                 <select class="form-control" name="role_id">
                                     <option value="" disabled selected>Select Role</option>
                                     @foreach($data['role'] as $role)
                                     <option value="{{$role->id}}"  {{  old('role_id')==$role->id ? 'selected' : ( ($user->role_id==$role->id) ? 'selected': ''  ) }}>{{$role->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="card card-purple">
                     <div class="card-header">
                         <h3 class="card-title">Personal Information</h3>
                     </div>
                     <div class="row card-body">
                         <div class="col-md-6">
                             <div class="form-group ">
                                 <label for="">First Name</label>
                                 <input type="text" class="form-control" name="firstName" value="{{  old('firstName') ? old('firstName') : $user->firstName   }}" id="" placeholder="Enter first name">
                             </div>
                             <div class="form-group">
                                 <label for="">Middle Name</label>
                                 <input type="text" class="form-control" name="middleName" value="{{ old('middleName') ? old('middleName') : $user->middleName }}" id="" placeholder="Enter middle name">
                             </div>
                             <div class="form-group">
                                 <label for="">Last Name</label>
                                 <input type="text" class="form-control" name="lastName" value="{{ old('lastName') ? old('lastName') : $user->lastName }}" id="" placeholder="Enter last name">
                             </div>

                         </div>
                         <div class="col-md-6">

                             <div class="form-group ">
                                 <label for="">Birthdate</label>
                                 <input type="date" class="form-control" name="dob" id="" value="{{ old('dob') ? old('dob') : $user->dob }}" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
                             </div>
                             <div class="form-group ">
                                 <label for="">Gender</label>
                                 <select class="form-control" name="gender" id="gender">
                                     <option disabled selected>Select gender</option>
                                     <option value="Male" {{ (old('gender')=='Male' ) ? 'selected' : ( ( $user->gender =='Male' ) ? 'selected' : '') }}>Male</option>
                                     <option value="Female" {{ (old('gender')=='Female') ? 'selected'  : ( ( $user->gender =='Female' ) ? 'selected' : '' ) }}>Female</option>
                                 </select>
                             </div>
                             <div class="form-group ">
                                 <label for="">Civil Status</label>
                                 <select class="form-control" name="civilStatus" id="gender">
                                     <option  value="" disabled selected>Select status</option>
                                     <option {{ (old('civilStatus')=='Single' ) ? 'selected' : ( ( $user->civilStatus =='Single' ) ? 'selected' : '') }}>Single</option>
                                     <option {{ (old('civilStatus')=='Married' ) ? 'selected' : ( ( $user->civilStatus =='Married' ) ? 'selected' : '') }}>Married</option>
                                     <option {{ (old('civilStatus')=='Widowed' ) ? 'selected' : ( ( $user->civilStatus =='Widowed' ) ? 'selected' : '') }}>Widowed</option>
                                     <option {{ (old('civilStatus')=='Divorced' ) ? 'selected' : ( ( $user->civilStatus =='Divorced' ) ? 'selected' : '') }}>Divorced</option>
                                 </select>
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
                                     <option  value="" disabled {{($user->certificate==null ) ? 'selected' : ''}}>Select Certificate Level</option>
                                     <option {{ (old('certificate')=='HighSchool' ) ? 'selected' : ( ( $user->certificate =='HighSchool' ) ? 'selected' : '') }}>HighSchool Diploma</option>
                                     <option {{ (old('certificate')=='Undergraduate' ) ? 'selected' : ( ( $user->certificate =='Undergraduate' ) ? 'selected' : '') }}>Undergraduate</option>
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
                 <x-slot name="footerSlot">
                     <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                     <x-adminlte-button class="bg-purple" type="submit" label="Save" onclick="event.preventDefault();document.getElementById('form-edit-{{$user->id}}').submit()" />
                 </x-slot>
             </form>

         </x-adminlte-modal>

         <!-- delete-->
         {{-- Custom --}}
         <x-adminlte-modal id="delete{{$user->id}}" title="Delete Employee?" size="md" theme="danger" icon="fas fa-user-times" v-centered scrollable>

             <div class="text-center">
                 <small>This action is irreversable</small>
                 <p>Are you sure you want to delete <b> {{$user->firstName . $user->lastName}} </b> </p>
             </div>
             <x-slot name="footerSlot">
                 <x-adminlte-button theme="light" label="Cancel" class="mr-auto" data-dismiss="modal" />
                 <x-adminlte-button theme="danger" label="Delete" onclick="event.preventDefault();document.getElementById('form-delete-{{$user->id}}').submit()" />
                 <form action="{{route('users.destroy',$user->id)}}" id="{{'form-delete-'.$user->id}}" method="POST" style="display: none;">
                     @csrf
                     @method('delete')
                 </form>
             </x-slot>
         </x-adminlte-modal>


         @endforeach
     </x-adminlte-datatable>

 </x-adminlte-card>
 @endif
 @if(auth()->user()->role_id!=1)
 <x-adminlte-card title="Employee" theme="purple" icon="fas fa-lg fa-fw fa-users "> </x-adminlte-card>
 @endif

 <div class="container-fluid">
     <div class="row">
         @forelse($users as $user)

         <div class="col-6 col-sm-3 col-md-2 col-lg-2 ">
             <x-adminlte-card theme="purple" theme-mode="outline">
                 <div class="text-center">
                     <img class="profile-user-img elevation-2 img-fluid img-circle" src="/storage/images/{{($user->avatar) ? $user->avatar:'user.png'}}" alt="img">
                 </div>

                 <h6 class=" h6 mt-3  text-center"> <a class="cursor-pointer " href="{{route('employee', $user->id)}}">{{$user->firstName.' '.$user->lastName}} </a></h6>

                 <p class="text-muted text-center">{{$user->position->name}}</p>
             </x-adminlte-card>
         </div>

         @empty
         <p>no User</p>
         @endforelse

     </div>
 </div>


 @stop