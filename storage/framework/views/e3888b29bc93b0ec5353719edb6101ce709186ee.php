
<?php $__env->startSection('title', 'Add Employee'); ?>

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
            <form action="<?php echo e(route('users.updatePass', $user->id)); ?>" method="POST">
                <?php echo method_field('patch'); ?>
                <?php echo csrf_field(); ?>

                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>

                    <div class="row card-body">
                        <div class="col-12">
                            <!-- <div class="form-group">
                                <label for="">Current Password</label>
                                <input type="password" class="form-control" name="oldPassword" id="" placeholder="Enter Password">
                            </div> -->
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" class="form-control" name="newPassword" id="" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" name="cPassword" id="" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control bg-purple" value="Save">
                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_mangement_system\resources\views/users/changePass.blade.php ENDPATH**/ ?>