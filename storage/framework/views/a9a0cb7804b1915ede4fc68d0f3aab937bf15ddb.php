
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
                                <input type="text" class="form-control  <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="firstName" value="<?php echo e(old('firstName') ? old('firstName') : $user->firstName); ?>" id="" placeholder="Enter first name">
                                <?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-control" name="middleName" value="<?php echo e(old('middleName') ? old('middleName') : $user->middleName); ?>" id="" placeholder="Enter middle name">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="lastName" value="<?php echo e(old('lastName') ? old('lastName') : $user->lastName); ?>" id="" placeholder="Enter last name">
                                <?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group ">
                                <label for="">Birthdate</label>
                                <input type="date" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dob" id="" value="<?php echo e(old('dob') ? old('dob') : $user->dob); ?>" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
                                <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group ">
                                <label for="">Gender</label>
                                <select class="form-control <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="gender" id="gender">
                                    <option disabled selected>Select gender</option>
                                    <option value="Male" <?php echo e((old('gender')=='Male' ) ? 'selected' : ( ( $user->gender =='Male' ) ? 'selected' : '')); ?>>Male</option>
                                    <option value="Female" <?php echo e((old('gender')=='Female') ? 'selected'  : ( ( $user->gender =='Female' ) ? 'selected' : '' )); ?>>Female</option>
                                </select>
                                <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group ">
                                <label for="">Civil Status</label>
                                <select class="form-control <?php $__errorArgs = ['civilStatus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="civilStatus" id="gender">
                                    <option  value="" disabled selected>Select status</option>
                                    <option <?php echo e((old('civilStatus')=='Single' ) ? 'selected' : ( ( $user->civilStatus =='Single' ) ? 'selected' : '')); ?>>Single</option>
                                    <option <?php echo e((old('civilStatus')=='Married' ) ? 'selected' : ( ( $user->civilStatus =='Married' ) ? 'selected' : '')); ?>>Married</option>
                                    <option <?php echo e((old('civilStatus')=='Widowed' ) ? 'selected' : ( ( $user->civilStatus =='Widowed' ) ? 'selected' : '')); ?>>Widowed</option>
                                    <option <?php echo e((old('civilStatus')=='Divorced' ) ? 'selected' : ( ( $user->civilStatus =='Divorced' ) ? 'selected' : '')); ?>>Divorced</option>
                                </select>
                                <?php $__errorArgs = ['civilStatus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                    <option value="" disabled <?php echo e((($user->certificate)==null ) ? 'selected' : ''); ?>>Certificate Level</option>
                                    <option <?php echo e((old('certificate')=='HighSchool' ) ? 'selected' : ( ( $user->certificate =='HighSchool' ) ? 'selected' : '')); ?>>HighSchool Diploma</option>
                                    <option <?php echo e((old('certificate')=='Undergraduate' ) ? 'selected' : ( ( $user->certificate =='undergraduate' ) ? 'selected' : '')); ?>>Undergraduate</option>
                                    <option <?php echo e((old('certificate')=='Graduate' ) ? 'selected' : ( ( $user->certificate =='Graduate' ) ? 'selected' : '')); ?>>Graduate</option>
                                    <option <?php echo e((old('certificate')=='Bachelor' ) ? 'selected' : ( ( $user->certificate =='Bachelor' ) ? 'selected' : '')); ?>>Bachelor</option>
                                    <option <?php echo e((old('certificate')=='Master' ) ? 'selected' : ( ( $user->certificate =='Master' ) ? 'selected' : '')); ?>>Master</option>
                                    <option <?php echo e((old('certificate')=='Doctor' ) ? 'selected' : ( ( $user->certificate =='Doctor' ) ? 'selected' : '')); ?>>Doctor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Skill</label>
                                <input type="text" class="form-control" name="skill" value="<?php echo e(old('skill')?old('skill'):$user->skill); ?>" id="" placeholder="Enter Skills">
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

<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/users/edit.blade.php ENDPATH**/ ?>