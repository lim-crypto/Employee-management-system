 

 <?php $__env->startSection('title', 'Employee'); ?>

 <?php $__env->startSection('content'); ?>
 
 <?php $__env->startSection('plugins.Datatables', true); ?>


 
 <?php
 $heads = [
 'ID',
 'Avatar',
 'Employee Name',
 ['label' => 'Position', 'width' => 40],
 ['label' => 'Actions', 'no-export' => true, 'width' => 5],
 ];

 ?>

 

 <!-- "collapsed" -->
 <?php if(auth()->user()->role_id==1): ?>

  <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, []); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
  <?php if (isset($component)) { $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Widget\Card::class, ['title' => 'Employee','theme' => 'purple','icon' => 'fas fa-lg fa-fw fa-users ','collapsible' => true]); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
      <?php if (isset($component)) { $__componentOriginal5c3a95af394031b1bfa79f2f00cd6019494000a3 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Datatable::class, ['id' => 'table1','heads' => $heads,'theme' => 'ligth','striped' => true,'hoverable' => true,'beautify' => true,'compressed' => true]); ?>
<?php $component->withName('adminlte-datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
         <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <tr>
             <td> <?php echo e($user->id); ?> </td>
             <td>
             
                     <img class="profile-user-img elevation-2 img-fluid img-circle" src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" alt="img">
            
             </td>
             <td> <?php echo e($user->firstName.' '.$user->lastName); ?></td> 
             <td> <?php echo e($user->position->name); ?></td>
             <td>
                 <nobr>
                     <button class="btn btn-xs btn-default text-purple mx-1 shadow" title="Details" data-toggle="modal" data-target="#view<?php echo e($user->id); ?>">
                         <i class="fa fa-lg fa-fw fa-eye"></i>
                     </button>
                     <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" data-toggle="modal" data-target="#edit<?php echo e($user->id); ?>">
                         <i class="fa fa-lg fa-fw fa-pen"></i>
                     </button>
                     <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#delete<?php echo e($user->id); ?>">
                         <i class="fa fa-lg fa-fw fa-trash"></i>
                     </button>

                 </nobr>
             </td>

         </tr>
         <!-- view -->
          <?php if (isset($component)) { $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'view'.e($user->id).'','title' => 'User Profile','theme' => 'purple','icon' => 'far fa-user-circle','size' => 'lg','vCentered' => true,'disableAnimations' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

             <dl class="row">

                 <dt class="col-sm-6">Job Information</dt>
                 <dd class="col-sm-6"><?php echo e($user->position->name); ?></dd>
                 <dd class="col-sm-6 offset-sm-6"><?php echo e($user->department->name); ?></dd>

                 <dt class="col-sm-6">Name </dt>
                 <dd class="col-sm-6"><?php echo e($user->firstName.' '.$user->middleName.' '.$user->lastName); ?></dd>

                 <dt class="col-sm-6">Email</dt>
                 <dd class="col-sm-6"><?php echo e($user->email); ?></dd>

                 <?php if($user->phoneNumber): ?>
                        <dt class="col-sm-6">Phone number</dt>
                        <dd class="col-sm-6"><?php echo e($user->phoneNumber); ?></dd>
                        <?php endif; ?>

                        <?php if($user->city): ?>
                        <dt class="col-sm-6">Address</dt>
                        <dd class="col-sm-6"><?php echo e($user->houseNumber.', '.$user->street.', '.$user->brgy.', '.$user->city.', '.$user->province.', '.$user->country); ?></dd>
                        <?php endif; ?>

                        <?php if($user->dob): ?>
                        <dt class="col-sm-6">Birthday</dt>
                        <dd class="col-sm-6"><?php echo e($user->dob); ?></dd>
                        <?php endif; ?>

                        <?php if($user->gender): ?>
                        <dt class="col-sm-6">Gender</dt>
                        <dd class="col-sm-6"><?php echo e($user->gender); ?></dd>
                        <?php endif; ?>

                        <?php if($user->civilStatus): ?>
                        <dt class="col-sm-6">Civil Status</dt>
                        <dd class="col-sm-6"><?php echo e($user->civilStatus); ?></dd>
                        <?php endif; ?>

                        <?php if($user->course): ?>
                        <dt class="col-sm-6">Education</dt>
                        <dd class="col-sm-6"><?php echo e($user->course.' '.$user->school); ?></dd>
                        <?php endif; ?>

                        <?php if($user->certificate): ?>
                        <dd class="col-sm-6 offset-sm-6"><?php echo e($user->certificate); ?></dd>
                        <?php endif; ?>

                        <?php if($user->skill): ?>
                        <dt class="col-sm-6">Skill</dt>
                        <dd class="col-sm-6"><?php echo e($user->skill); ?></dd>
                        <?php endif; ?>

                        <?php if($user->ename): ?>
                        <dt class="col-sm-6">Emergency Contact</dt>
                        <dd class="col-sm-6"><?php echo e($user->ename .' ('.$user->relationship.')'); ?></dd>
                        <?php endif; ?>

                        <?php if($user->ephone): ?>
                        <dd class="col-sm-6 offset-sm-6"><?php echo e($user->ephone); ?></dd>
                        <dd class="col-sm-6 offset-sm-6"><?php echo e($user->eFullAddress); ?></dd>
                        <?php endif; ?>
      
             </dl>
          <?php if (isset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0)): ?>
<?php $component = $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0; ?>
<?php unset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

         <!-- edit-->
          <?php if (isset($component)) { $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'edit'.e($user->id).'','title' => 'Edit Profile','icon' => 'fas fa-user-edit','size' => 'lg','vCentered' => true,'scrollable' => true,'disableAnimations' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
             <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST" id="<?php echo e('form-edit-'.$user->id); ?>">
                 <?php echo method_field('patch'); ?>
                 <?php echo csrf_field(); ?>
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
                                     <?php $__currentLoopData = $data['position']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($pp=$p->id); ?>" id="<?php echo e($up=$user->position_id); ?>" <?php echo e(old('position_id')==$pp ? 'selected' :( ($up==$pp) ? 'selected': ''  )); ?>><?php echo e($p->name); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="">Date Hired</label>
                                 <input type="date" class="form-control" name="dateHired" value="<?php echo e(old('dateHired')? old('dateHired')  : $user->dob); ?>" id="" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Department</label>
                                 <select class="form-control" name="department_id">
                                     <option value="" disabled selected>Select Department</option>
                                     <?php $__currentLoopData = $data['department']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($dd=$d->id); ?>" id="<?php echo e($ud=$user->department_id); ?>" <?php echo e(old('department_id')==$dd ? 'selected' : ( ($ud==$dd) ? 'selected': ''  )); ?>><?php echo e($d->name); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="">Role</label>
                                 <!-- <input type="text" class="form-control" name="role_id" id="" placeholder="Enter role"> -->
                                 <select class="form-control" name="role_id">
                                     <option value="" disabled selected>Select Role</option>
                                     <?php $__currentLoopData = $data['role']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($rr=$r->id); ?>" id="<?php echo e($ur=$user->role_id); ?>" <?php echo e(old('role_id')==$rr ? 'selected' : ( ($ur==$rr) ? 'selected': ''  )); ?>><?php echo e($r->name); ?></option>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                             </div>
                         </div>
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <div class="card card-purple">
                     <div class="card-header">
                         <h3 class="card-title">Personal Information</h3>
                     </div>
                     <div class="row card-body">
                         <div class="col-md-6">
                             <div class="form-group ">
                                 <label for="">First Name</label>
                                 <input type="text" class="form-control" name="firstName" value="<?php echo e(old('firstName') ? old('firstName') : $user->firstName); ?>" id="" placeholder="Enter first name">
                             </div>
                             <div class="form-group">
                                 <label for="">Middle Name</label>
                                 <input type="text" class="form-control" name="middleName" value="<?php echo e(old('middleName') ? old('middleName') : $user->middleName); ?>" id="" placeholder="Enter middle name">
                             </div>
                             <div class="form-group">
                                 <label for="">Last Name</label>
                                 <input type="text" class="form-control" name="lastName" value="<?php echo e(old('lastName') ? old('lastName') : $user->lastName); ?>" id="" placeholder="Enter last name">
                             </div>

                         </div>
                         <div class="col-md-6">

                             <div class="form-group ">
                                 <label for="">Birthdate</label>
                                 <input type="date" class="form-control" name="dob" id="" value="<?php echo e(old('dob') ? old('dob') : $user->dob); ?>" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
                             </div>
                             <div class="form-group ">
                                 <label for="">Gender</label>
                                 <select class="form-control" name="gender" id="gender">
                                     <option id="<?php echo e($g=$user->gender); ?>" disabled selected>Select gender</option>
                                     <option value="Male" <?php echo e((old('gender')=='Male' ) ? 'selected' : ( ( ($g) =='Male' ) ? 'selected' : '')); ?>>Male</option>
                                     <option value="Female" <?php echo e((old('gender')=='Female') ? 'selected'  : ( ( ($g) =='Female' ) ? 'selected' : '' )); ?>>Female</option>
                                 </select>
                             </div>
                             <div class="form-group ">
                                 <label for="">Civil Status</label>
                                 <select class="form-control" name="civilStatus" id="gender">
                                     <option id="<?php echo e($cs=$user->civilStatus); ?>" value="" disabled selected>Select status</option>
                                     <option <?php echo e((old('civilStatus')=='Single' ) ? 'selected' : ( ( ($cs) =='Single' ) ? 'selected' : '')); ?>>Single</option>
                                     <option <?php echo e((old('civilStatus')=='Married' ) ? 'selected' : ( ( ($cs) =='Married' ) ? 'selected' : '')); ?>>Married</option>
                                     <option <?php echo e((old('civilStatus')=='Widowed' ) ? 'selected' : ( ( ($cs) =='Widowed' ) ? 'selected' : '')); ?>>Widowed</option>
                                     <option <?php echo e((old('civilStatus')=='Divorced' ) ? 'selected' : ( ( ($cs) =='Divorced' ) ? 'selected' : '')); ?>>Divorced</option>
                                 </select>
                             </div>
                         </div>
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <div class="card card-purple">
                     <div class="card-header">
                         <h3 class="card-title">Contact Information</h3>
                     </div>
                     <div class="row card-body">
                         <div class="col-md-6">
                             <div class="form-group ">
                                 <label for="">Phone Number</label>
                                 <input type="tel" class="form-control" name="phoneNumber" value="<?php echo e(old('phoneNumber')?old('phoneNumber'):$user->phoneNumber); ?>" id="" placeholder="Enter phone number">
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="">Email address</label>
                                 <input type="email" class="form-control" name="email" id="" value="<?php echo e($user->email); ?>" disabled placeholder="Enter email">
                             </div>
                         </div>
                     </div>

                     <div class="row card-body">

                         <div class="col-md-6">
                             <div class="form-group ">
                                 <label for="">House Number</label>
                                 <input type="text" class="form-control" name="houseNumber" value="<?php echo e(old('houseNumber')?old('houseNumber'):$user->houseNumber); ?>" id="" placeholder="Enter House number">
                             </div>
                             <div class="form-group ">
                                 <label for="">Street</label>
                                 <input type="text" class="form-control" name="street" value="<?php echo e(old('street')?old('street'):$user->street); ?>" id="" placeholder="Enter Street">
                             </div>
                             <div class="form-group ">
                                 <label for="">Barangay</label>
                                 <input type="text" class="form-control" name="brgy" value="<?php echo e(old('brgy')?old('brgy'):$user->brgy); ?>" id="" placeholder="Enter Barangay">
                             </div>

                             <!-- <div class="form-group">
                                <label for="">Full Address</label>
                                <textarea type="text" class="form-control" id="" placeholder="Enter full address (House no., Street, Barangay, City, Province)" rows="3"></textarea>
                            </div> -->
                         </div>
                         <div class="col-md-6">

                             <div class="form-group ">
                                 <label for="">City</label>
                                 <input type="text" class="form-control" name="city" value="<?php echo e(old('city')?old('city'):$user->city); ?>" id="" placeholder="Enter City">
                             </div>
                             <div class="form-group ">
                                 <label for="">Province</label>
                                 <input type="text" class="form-control" name="province" value="<?php echo e(old('province')?old('province'):$user->province); ?>" id="" placeholder="Enter Province">
                             </div>
                             <div class="form-group ">
                                 <label for="">Country</label>
                                 <input type="text" class="form-control" name="country" value="<?php echo e(old('country')?old('country'):$user->country); ?>" id="" placeholder="Enter Country" value="Philippines">
                             </div>
                             <!-- <div class="form-group">
                                <label for="">Full Address</label>
                                <textarea type="text" class="form-control" id="" placeholder="Enter full address (House no., Street, Barangay, City, Province)" rows="3"></textarea>
                            </div> -->
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
                                 <input type="text" class="form-control" name="school" value="<?php echo e(old('school')?old('school'):$user->school); ?>" id="" placeholder="Enter school">
                             </div>
                             <div class="form-group">
                                 <label for="">Course</label>
                                 <input type="text" class="form-control" name="course" value="<?php echo e(old('course')?old('course'):$user->course); ?>" id="" placeholder="Enter field of study">
                             </div>
                         </div>
                         <div class="col-md-6">

                             <div class="form-group ">
                                 <label for="">Certificate Level</label>
                                 <select class="form-control" name="certificate" id="gender">    
                                    <option id="<?php echo e($c=$user->certificate); ?>" value="" disabled <?php echo e((($c)==null ) ? 'selected' : ''); ?> >Certificate Level</option>
                                    <option <?php echo e((old('certificate')=='HighSchool' ) ? 'selected' : ( ( ($c) =='HighSchool' ) ? 'selected' : '')); ?>>HighSchool Diploma</option>
                                    <option <?php echo e((old('certificate')=='Undergraduate' ) ? 'selected' : ( ( ($c) =='undergraduate' ) ? 'selected' : '')); ?>>Undergraduate</option>
                                    <option <?php echo e((old('certificate')=='Graduate' ) ? 'selected' : ( ( ($c) =='Graduate' ) ? 'selected' : '')); ?>>Graduate</option>
                                    <option <?php echo e((old('certificate')=='Bachelor' ) ? 'selected' : ( ( ($c) =='Bachelor' ) ? 'selected' : '')); ?>>Bachelor</option>
                                    <option <?php echo e((old('certificate')=='Master' ) ? 'selected' : ( ( ($c) =='Master' ) ? 'selected' : '')); ?>>Master</option>
                                    <option <?php echo e((old('certificate')=='Doctor' ) ? 'selected' : ( ( ($c) =='Doctor' ) ? 'selected' : '')); ?>>Doctor</option>
                                </select>
                             </div>
                             <div class="form-group">
                                 <label for="">Skill</label>
                                 <input type="text" class="form-control" name="skill" value="<?php echo e(old('skill')?old('skill'):$user->skill); ?>" id="" placeholder="Enter Skills">
                             </div>
                         </div>
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <div class="card card-purple">
                     <div class="card-header">
                         <h3 class="card-title">Emergency Contact</h3>
                     </div>
                     <div class="row card-body">
                         <div class="col-md-6">
                             <div class="form-group ">
                                 <label for="">Name</label>
                                 <input type="text" class="form-control" name="ename" value="<?php echo e(old('ename')?old('ename'):$user->ename); ?>" id="" placeholder="Enter Full Name">
                             </div>
                             <div class="form-group">
                                 <label for="">Phone Number</label>
                                 <input type="tel" class="form-control" name="ephone" value="<?php echo e(old('ephone')?old('ephone'):$user->ephone); ?>" id="" placeholder="Enter phone number">
                             </div>
                         </div>
                         <div class="col-md-6">

                             <div class="form-group">
                                 <label for="">Relationship</label>
                                 <input type="text" class="form-control" name="relationship" value="<?php echo e(old('relationship')?old('relationship'):$user->relationship); ?>" id="" placeholder="Enter relationship">
                             </div>
                             <div class="form-group">
                                 <label for="">Full Address</label>
                                 <textarea type="text" class="form-control" name="eFullAddress" id="" placeholder="Enter full address (House no., Street, Barangay, City, Province)" rows="3"><?php echo e(old('eFullAddress')?old('eFullAddress'):$user->eFullAddress); ?></textarea>
                             </div>
                         </div>
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- <div class="col-12">
                     <div class="form-group">
                         <input type="submit" class="form-control bg-purple" value="Save">
                     </div>
                 </div> -->

                  <?php $__env->slot('footerSlot'); ?> 
                      <?php if (isset($component)) { $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\Button::class, ['theme' => 'light','label' => 'Cancel']); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mr-auto','data-dismiss' => 'modal']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                      <?php if (isset($component)) { $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\Button::class, ['type' => 'submit','label' => 'Save']); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-purple','onclick' => 'event.preventDefault();document.getElementById(\'form-edit-'.e($user->id).'\').submit()']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                     <!--  <?php if (isset($component)) { $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\Button::class, ['theme' => 'success','label' => 'Accept']); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mr-auto']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  -->
                     <!-- <input type="submit" class="bg-purple" value="Save"> -->
                  <?php $__env->endSlot(); ?>
             </form>

          <?php if (isset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0)): ?>
<?php $component = $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0; ?>
<?php unset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

         <!-- delete-->
         
          <?php if (isset($component)) { $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'delete'.e($user->id).'','title' => 'Delete Employee?','size' => 'md','theme' => 'danger','icon' => 'fas fa-user-times','vCentered' => true,'scrollable' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

             <div class="text-center">
                 <small>This action is irreversable</small>
                 <p>Are you sure you want to delete <b> <?php echo e($user->firstName . $user->lastName); ?> </b> </p>
             </div>
              <?php $__env->slot('footerSlot'); ?> 
                  <?php if (isset($component)) { $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\Button::class, ['theme' => 'light','label' => 'Cancel']); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mr-auto','data-dismiss' => 'modal']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                  <?php if (isset($component)) { $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\Button::class, ['theme' => 'danger','label' => 'Delete']); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['onclick' => 'event.preventDefault();document.getElementById(\'form-delete-'.e($user->id).'\').submit()']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                 <form action="<?php echo e(route('users.destroy',$user->id)); ?>" id="<?php echo e('form-delete-'.$user->id); ?>" method="POST" style="display: none;">
                     <?php echo csrf_field(); ?>
                     <?php echo method_field('delete'); ?>
                 </form>
              <?php $__env->endSlot(); ?>
          <?php if (isset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0)): ?>
<?php $component = $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0; ?>
<?php unset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 


         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php if (isset($__componentOriginal5c3a95af394031b1bfa79f2f00cd6019494000a3)): ?>
<?php $component = $__componentOriginal5c3a95af394031b1bfa79f2f00cd6019494000a3; ?>
<?php unset($__componentOriginal5c3a95af394031b1bfa79f2f00cd6019494000a3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

  <?php if (isset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6)): ?>
<?php $component = $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6; ?>
<?php unset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
 <?php endif; ?>
 <?php if(auth()->user()->role_id!=1): ?>
  <?php if (isset($component)) { $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Widget\Card::class, ['title' => 'Employee','theme' => 'purple','icon' => 'fas fa-lg fa-fw fa-users ']); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>  <?php if (isset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6)): ?>
<?php $component = $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6; ?>
<?php unset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
 <?php endif; ?>

 <div class="container-fluid">
     <div class="row">
         <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

         <div class="col-6 col-sm-3 col-md-2 col-lg-2 ">
              <?php if (isset($component)) { $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Widget\Card::class, ['theme' => 'purple','themeMode' => 'outline']); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                 <div class="text-center">
                     <img class="profile-user-img elevation-2 img-fluid img-circle" src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" alt="img">
                 </div>

                 <h6 class=" h6 mt-3  text-center"> <a class="cursor-pointer " href="<?php echo e(route('employee', $user->id)); ?>"><?php echo e($user->firstName.' '.$user->lastName); ?> </a></h6>

                 <p class="text-muted text-center"><?php echo e($user->position->name); ?></p>
              <?php if (isset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6)): ?>
<?php $component = $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6; ?>
<?php unset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
         </div>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
         <p>no User</p>
         <?php endif; ?>

     </div>
 </div>


 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('css'); ?>
 <link rel="stylesheet" href="/css/admin_custom.css">
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('js'); ?>

 <script>
     $(document).ready(function() {
         $('#dataTable').DataTable({
             responsive: true,
             autoWidth: false,
         });
     });
 </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/users/index.blade.php ENDPATH**/ ?>