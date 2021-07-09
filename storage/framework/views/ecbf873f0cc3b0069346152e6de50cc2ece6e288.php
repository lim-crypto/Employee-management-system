
<?php $__env->startSection('title', 'Add Employee'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Add Employee</h1>
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
            <form action="<?php echo e(route('users.store')); ?>" method="POST">

                <?php echo csrf_field(); ?>
                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Personal Information</h3>
                    </div>
                    <div class="row card-body">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="firstName" value="<?php echo e(old('firstName')); ?>" id="" placeholder="Enter first name">
                            </div>

                            <!-- <?php $__errorArgs = ['firstName'];
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
unset($__errorArgs, $__bag); ?> -->
                            <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-control" name="middleName" value="<?php echo e(old('middleName')); ?>" id="" placeholder="Enter middle name">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="lastName" value="<?php echo e(old('lastName')); ?>" id="" placeholder="Enter last name">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group ">
                                <label for="">Birthdate</label>
                                <input type="date" class="form-control" name="dob" id="" value="<?php echo e(old('dob')); ?>" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="form-group ">
                                <label for="">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option disabled selected>Select gender</option>
                                    <option value="Male" <?php echo e((old('gender')=='Male' ) ? 'selected' : ''); ?>>Male</option>
                                    <option value="Female" <?php echo e((old('gender')=='Female' ) ? 'selected' : ''); ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="">Civil Status</label>
                                <select class="form-control" name="civilStatus" id="gender">
                                    <option value="" disabled selected>Select status</option>
                                    <option <?php echo e((old('civilStatus')=='Single' ) ? 'selected' : ''); ?>>Single</option>
                                    <option <?php echo e((old('civilStatus')=='Married' ) ? 'selected' : ''); ?>>Married</option>
                                    <option <?php echo e((old('civilStatus')=='Widowed' ) ? 'selected' : ''); ?>>Widowed</option>
                                    <option <?php echo e((old('civilStatus')=='Divorced' ) ? 'selected' : ''); ?>>Divorced</option>
                                </select>
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

                                <select class="form-control" name="position_id">
                                    <option value="" disabled selected>Select Position</option>
                                    <?php $__currentLoopData = $data['position']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pp=$p->id); ?>" <?php echo e(old('position_id')==$pp ? 'selected' : ''); ?>><?php echo e($p->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Date Hired</label>
                                <input type="date" class="form-control" name="dateHired" value="<?php echo e(old('dateHired')); ?>" id="" placeholder="Enter birth date" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Supervisor</label>
                                <input type="text" class="form-control" id="" placeholder="Enter supervisor">
                            </div> -->

                        </div>
                        <div class="col-md-6">
                            <!-- <div class="form-group">
                                <label for="">Employee ID</label>
                                <input type="text" class="form-control" id="" placeholder="Enter employee id">
                            </div> -->
                            <div class="form-group">
                                <label for="">Department</label>
                                <!-- <input type="text" class="form-control" name="department_id" id="" placeholder="Enter department"> -->
                                <select class="form-control" name="department_id">
                                    <option value="" disabled selected>Select Department</option>
                                    <?php $__currentLoopData = $data['department']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($dd=$d->id); ?>" <?php echo e(old('department_id')==$dd ? 'selected' : ''); ?>><?php echo e($d->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Role</label>
                                <!-- <input type="text" class="form-control" name="role_id" id="" placeholder="Enter role"> -->
                                <select class="form-control" name="role_id">
                                    <option value="" disabled selected>Select Role</option>
                                    <?php $__currentLoopData = $data['role']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($rr=$r->id); ?>" <?php echo e(old('role_id')==$rr ? 'selected' : ''); ?>><?php echo e($r->name); ?></option>
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
                        <h3 class="card-title">Register Employee</h3>
                    </div>

                    <div class="row card-body">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" id="" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password"  id="" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" name="cPassword"  id="" placeholder="Enter Password">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    console.log('Hi!');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_mangement_system\resources\views/users/add.blade.php ENDPATH**/ ?>