
<?php $__env->startSection('title', 'Edit Profile'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Edit Profile</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Picture</h3>
                </div>
                <div class="row card-body ">
                    <img class="m-auto img-fluid img-circle" src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" id="preview" alt="img" data-toggle="modal" data-target="#view" />

                    <div class="col-12">
                        <form action="<?php echo e(route('upload', $user->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('patch'); ?>
                            
                             <?php if (isset($component)) { $__componentOriginalf427a5460c61b026be0c5903b1b89d03937e4531 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\InputFile::class, ['name' => 'image','igroupSize' => 'sm','placeholder' => 'Edit Your Profile Picture']); ?>
<?php $component->withName('adminlte-input-file'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['onchange' => 'document.getElementById(\'preview\').src = window.URL.createObjectURL(this.files[0])']); ?>
                                 <?php $__env->slot('prependSlot'); ?> 
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                 <?php $__env->endSlot(); ?>
                                 <?php $__env->slot('appendSlot'); ?> 
                                     <?php if (isset($component)) { $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\Button::class, ['type' => 'submit','icon' => 'fas fa-save','label' => 'Save']); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => ' bg-purple']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                 <?php $__env->endSlot(); ?>
                             <?php if (isset($__componentOriginalf427a5460c61b026be0c5903b1b89d03937e4531)): ?>
<?php $component = $__componentOriginalf427a5460c61b026be0c5903b1b89d03937e4531; ?>
<?php unset($__componentOriginalf427a5460c61b026be0c5903b1b89d03937e4531); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        </form>
                    </div>
                </div>
            </div> -->
            <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST">
                <?php echo method_field('patch'); ?>
                <?php echo csrf_field(); ?>
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
                                    <option id="<?php echo e($c=$user->civilStatus); ?>" value="" disabled selected>Certificate Level</option>
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
                <div class="col-12">
                    <div class="form-group">
                        <input type="submit" class="form-control bg-purple" value="Save">
                    </div>
                </div>
            </form>
            <br><br><br>
            <!-- <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Delete Account</h3>
                </div>
                <div class="card-body">
                    <span class="btn btn-outline-danger" onclick="event.preventDefault(); 
                                    if(confirm('Are you sure you want to delete?')){
                                        document.getElementById('form-delete-<?php echo e($user->id); ?>').submit() }">
                        Delete Account
                    </span>
                    <form action="<?php echo e(route('users.destroy',$user->id)); ?>" id="<?php echo e('form-delete-'.$user->id); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                    </form>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    console.log('Hi!');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_mangement_system\resources\views/users/edit.blade.php ENDPATH**/ ?>