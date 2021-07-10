

<?php $__env->startSection('title', 'Leave'); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('plugins.Datatables', true); ?>



<?php
$heads = [
'Applied on',
'Name',
'Position',
'Date',
'Status',
['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
?> 
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
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Widget\Card::class, ['title' => 'Leave','theme' => 'purple','icon' => 'fas fa-lg fa-fw fa-calendar-times']); ?>
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

        <?php $__currentLoopData = $leave; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($leave->created_at->format('m-d-Y')); ?></td>
            <td><?php echo e($leave->user->firstName.' '.$leave->user->lastName); ?></td>
            <td><?php echo e($leave->user->position); ?></td> 
            <td><?php echo e($leave->start_date->format('F d, Y')); ?>

                <?php if($leave->end_date): ?>
                - <?php echo e($leave->end_date->format('F d, Y')); ?>

                <?php endif; ?>
            </td>
            <td>
                <h5>
                    <span <?php if($leave->status == 'Pending'): ?>
                        class="badge badge-pill badge-warning"
                        <?php elseif($leave->status == 'Declined'): ?>
                        class="badge badge-pill badge-danger"
                        <?php elseif($leave->status == 'Approved'): ?>
                        class="badge badge-pill badge-success"
                        <?php endif; ?>
                        >
                        <?php echo e(ucfirst($leave->status)); ?>

                    </span>
                </h5>
            </td>
            <td>
                <nobr>
                    <button class="btn btn-xs btn-default text-purple mx-1 shadow" title="Details" data-toggle="modal" data-target="#view<?php echo e($leave->id); ?>">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit" data-toggle="modal" data-target="#edit<?php echo e($leave->id); ?>">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#delete<?php echo e($leave->id); ?>">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </nobr>
            </td>

        </tr>
        <!-- view -->
         <?php if (isset($component)) { $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'view'.e($leave->id).'','title' => 'Request Leave Details','theme' => 'purple','icon' => 'fas fa-info-circle','size' => 'lg','scrollable' => true,'vCentered' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <dl class="row">

                <dt class="col-sm-6">Applied on </dt>
                <dd class="col-sm-6"><?php echo e($leave->created_at->format('F d, Y')); ?></dd>

                <dt class="col-sm-6">Name</dt>
                <dd class="col-sm-6"> <?php echo e($leave->user->firstName.' '.$leave->user->lastName); ?> </dd>
                <dt class="col-sm-6">Position</dt>
                <dd class="col-sm-6"> <?php echo e($leave->user->position); ?> </dd>

                <dt class="col-sm-6">Reason </dt>
                <dd class="col-sm-6"><?php echo e($leave->reason); ?></dd>

                <dt class="col-sm-6">Description</dt>
                <dd class="col-sm-6"><?php echo e($leave->description); ?></dd>

                <dt class="col-sm-6">Status</dt>
                <dd class="col-sm-6">
                    <h5>
                        <span <?php if($leave->status == 'Pending'): ?>
                            class="badge badge-pill badge-warning"
                            <?php elseif($leave->status == 'Declined'): ?>
                            class="badge badge-pill badge-danger"
                            <?php elseif($leave->status == 'Approved'): ?>
                            class="badge badge-pill badge-success"
                            <?php endif; ?>
                            >
                            <?php echo e(ucfirst($leave->status)); ?>

                        </span>
                    </h5>
                </dd>

                <dt class="col-sm-6">Date</dt>
                <dd class="col-sm-6">
                    <?php echo e($leave->start_date->format('F d, Y')); ?>

                    <?php if($leave->end_date): ?>
                    - <?php echo e($leave->end_date->format('F d, Y')); ?>

                    <?php endif; ?>
                </dd>
            </dl>


         <?php if (isset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0)): ?>
<?php $component = $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0; ?>
<?php unset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

        <!-- edit-->
         <?php if (isset($component)) { $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'edit'.e($leave->id).'','title' => 'Edit Leave','theme' => 'purple','icon' => 'fas fa-user-cog','size' => 'md','vCentered' => true,'scrollable' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <form action="<?php echo e(route('leave.updateStatus', $leave->id)); ?>" method="POST" id="<?php echo e('form-edit-'.$leave->id); ?>">
                <?php echo method_field('patch'); ?>
                <?php echo csrf_field(); ?>
                <div class="col-12">
                    <div class="form-group ">
                        <label for="">Status</label>
                        <select class="form-control" name="status" id="">
                            <option>Pending</option>
                            <option>Approved</option>
                            <option>Declined</option>
                        </select>
                    </div>
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
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\Button::class, ['type' => 'submit','label' => 'Save']); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'bg-purple','onclick' => 'event.preventDefault();document.getElementById(\'form-edit-'.e($leave->id).'\').submit()']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
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
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'delete'.e($leave->id).'','title' => 'Delete leave request?','size' => 'md','theme' => 'danger','icon' => 'fas fa-calendar-times','vCentered' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>


            <div class="text-center">
                <small>This action is irreversable</small>
                <p>Are you sure you want to delete?</p>

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
<?php $component->withAttributes(['onclick' => 'event.preventDefault();document.getElementById(\'form-delete-'.e($leave->id).'\').submit()']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                <form action="<?php echo e(route('leave.destroy',$leave->id)); ?>" id="<?php echo e('form-delete-'.$leave->id); ?>" method="POST" style="display: none;">
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



<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/leave/index.blade.php ENDPATH**/ ?>