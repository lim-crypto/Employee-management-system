<!-- attendance
list of leaves
Profile -->


<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('content_header'); ?> <br>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
             <?php if (isset($component)) { $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Widget\Card::class, ['theme' => 'purple','themeMode' => 'outline']); ?>
<?php $component->withName('adminlte-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <div class="text-center">
                    <img class="profile-user-img elevation-2 img-fluid img-circle" src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" alt="img" data-toggle="modal" data-target="#view" />

                </div>

                <h3 class="profile-username text-center"><?php echo e($user->firstName.' '.$user->lastName); ?></h3>

                <p class="text-muted text-center "><?php echo e($user->position->name); ?></p>

             <?php if (isset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6)): ?>
<?php $component = $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6; ?>
<?php unset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

            
             <?php if (isset($component)) { $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'view','title' => ''.e($user->firstName .' '. $user->lastName).'','size' => 'md','theme' => 'purple','vCentered' => true,'scrollable' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <?php if(auth()->user()->id==$user->id): ?>
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
                <?php endif; ?>

                <div class="card">
                    <img src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" id="preview" alt="img" data-toggle="modal" data-target="#view" />
                </div>

             <?php if (isset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0)): ?>
<?php $component = $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0; ?>
<?php unset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            



            <!-- About Me Box -->
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                        <?php echo e($user->course.' '.$user->school); ?>

                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted"><?php echo e($user->city.', '.$user->province.', '.$user->country); ?></p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted"> <?php echo e($user->skill); ?>

                    </p>

                </div>
            </div>
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
                        <dd class="col-sm-8"><?php echo e($user->position->name); ?></dd>
                        <dd class="col-sm-8 offset-sm-4"><?php echo e($user->department->name); ?></dd>
               
                        <dt class="col-sm-4">Name </dt>
                        <dd class="col-sm-8"><?php echo e($user->firstName.' '.$user->middleName.' '.$user->lastName); ?></dd>

                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8"><?php echo e($user->email); ?></dd>

                        <!-- <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd> -->

                        <dt class="col-sm-4">Phone number</dt>
                        <dd class="col-sm-8"><?php echo e($user->phoneNumber); ?></dd>

                        <dt class="col-sm-4">Address</dt>
                        <dd class="col-sm-8"><?php echo e($user->houseNumber.', '.$user->street.', '.$user->brgy.', '.$user->city.', '.$user->province.', '.$user->country); ?></dd>

                        <dt class="col-sm-4">Birthday</dt>
                        <dd class="col-sm-8"><?php echo e($user->dob); ?></dd>
                        <dt class="col-sm-4">Gender</dt>
                        <dd class="col-sm-8"><?php echo e($user->gender); ?></dd>
                        <dt class="col-sm-4">Civil Status</dt>
                        <dd class="col-sm-8"><?php echo e($user->civilStatus); ?></dd>
                      
                        <dt class="col-sm-4">Education</dt>
                        <dd class="col-sm-8"><?php echo e($user->course.' '.$user->school); ?></dd>
                        <dd class="col-sm-8 offset-sm-4"><?php echo e($user->certificate); ?></dd>
                  
                        <dt class="col-sm-4">Skill</dt>
                        <dd class="col-sm-8"><?php echo e($user->skill); ?></dd>

                        <dt class="col-sm-4">Emergency Contact</dt>
                        <dd class="col-sm-8"><?php echo e($user->ename .' ('.$user->relationship.')'); ?></dd>
                        <dd class="col-sm-8 offset-sm-4"><?php echo e($user->ephone.' '.' : '.$user->eFullAddress); ?></dd>
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<!-- 
@ section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@ stop

@ section('js')
<script>
    console.log('Hi!');
</script>
@ stop -->
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_mangement_system\resources\views/users/show.blade.php ENDPATH**/ ?>