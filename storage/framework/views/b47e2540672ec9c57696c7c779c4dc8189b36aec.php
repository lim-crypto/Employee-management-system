
<?php $__env->startSection('title', 'Profile'); ?>
<?php $__env->startSection('content_header'); ?>
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
                    <a href="#">
                        <img class="profile-user-img elevation-2 img-fluid img-circle" src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" alt="img" data-toggle="modal" data-target="#view" />
                    </a>
                </div>

                <h3 class="profile-username text-center"><?php echo e($user->firstName.' '.$user->lastName); ?></h3>

                <p class="text-muted text-center "><?php echo e($user->position->name); ?></p>
                <?php if(auth()->user()->id==$user->id): ?>
                <a href="#" data-toggle="modal" data-target="#view">
                    <i class="fas fa-camera text-purple"> </i>
                    <small class="text-muted">edit picture</small>
                </a>
                <?php endif; ?>
             <?php if (isset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6)): ?>
<?php $component = $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6; ?>
<?php unset($__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

            
             <?php if (isset($component)) { $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'view','title' => ''.e($user->firstName .' '. $user->lastName).'','size' => 'sm','theme' => 'purple','vCentered' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                <div class="card">
                    <img src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" id="preview" alt="img" />
                </div>
                <?php if(auth()->user()->id==$user->id): ?>
                <form action="<?php echo e(route('upload', $user->id)); ?>" method="POST" id="<?php echo e('form-edit-'.$user->id); ?>" enctype="multipart/form-data">
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
                     <?php if (isset($__componentOriginalf427a5460c61b026be0c5903b1b89d03937e4531)): ?>
<?php $component = $__componentOriginalf427a5460c61b026be0c5903b1b89d03937e4531; ?>
<?php unset($__componentOriginalf427a5460c61b026be0c5903b1b89d03937e4531); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>  
                </form>
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
                 <?php $__env->endSlot(); ?>
                <?php endif; ?>
             <?php if (isset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0)): ?>
<?php $component = $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0; ?>
<?php unset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            


            <?php if($user->course.$user->city.$user->skill): ?>
            <!-- About Me Box -->
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?php if($user->course): ?>
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>
                    <p class="text-muted">
                        <?php echo e($user->course.' '.$user->school); ?>

                    </p>
                    <hr>
                    <?php endif; ?>
                    <?php if($user->city): ?>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                    <p class="text-muted"><?php echo e($user->city.', '.$user->province.', '.$user->country); ?></p>
                    <hr>
                    <?php endif; ?>
                    <?php if($user->skill): ?>
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                    <p class="text-muted"> <?php echo e($user->skill); ?>

                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
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
                        <?php if($user->phoneNumber): ?>
                        <dt class="col-sm-4">Phone number</dt>
                        <dd class="col-sm-8"><?php echo e($user->phoneNumber); ?></dd>
                        <?php endif; ?>

                        <?php if($user->city): ?>
                        <dt class="col-sm-4">Address</dt>
                        <dd class="col-sm-8"><?php echo e($user->houseNumber.', '.$user->street.', '.$user->brgy.', '.$user->city.', '.$user->province.', '.$user->country); ?></dd>
                        <?php endif; ?>

                        <?php if($user->dob): ?>
                        <dt class="col-sm-4">Birthday</dt>
                        <dd class="col-sm-8"><?php echo e($user->dob); ?></dd>
                        <?php endif; ?>

                        <?php if($user->gender): ?>
                        <dt class="col-sm-4">Gender</dt>
                        <dd class="col-sm-8"><?php echo e($user->gender); ?></dd>
                        <?php endif; ?>

                        <?php if($user->civilStatus): ?>
                        <dt class="col-sm-4">Civil Status</dt>
                        <dd class="col-sm-8"><?php echo e($user->civilStatus); ?></dd>
                        <?php endif; ?>

                        <?php if($user->course): ?>
                        <dt class="col-sm-4">Education</dt>
                        <dd class="col-sm-8"><?php echo e($user->course.' '.$user->school); ?></dd>
                        <?php endif; ?>

                        <?php if($user->certificate): ?>
                        <dd class="col-sm-8 offset-sm-4"><?php echo e($user->certificate); ?></dd>
                        <?php endif; ?>

                        <?php if($user->skill): ?>
                        <dt class="col-sm-4">Skill</dt>
                        <dd class="col-sm-8"><?php echo e($user->skill); ?></dd>
                        <?php endif; ?>

                        <?php if($user->ename): ?>
                        <dt class="col-sm-4">Emergency Contact</dt>
                        <dd class="col-sm-8"><?php echo e($user->ename .' ('.$user->relationship.')'); ?></dd>
                        <?php endif; ?>

                        <?php if($user->ephone): ?>
                        <dd class="col-sm-8 offset-sm-4"><?php echo e($user->ephone); ?></dd>
                        <dd class="col-sm-8 offset-sm-4"><?php echo e($user->eFullAddress); ?></dd>

                        <?php endif; ?>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/users/show.blade.php ENDPATH**/ ?>