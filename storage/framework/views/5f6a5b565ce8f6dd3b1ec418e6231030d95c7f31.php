

<?php $__env->startSection('title', 'Leave'); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('plugins.Datatables', true); ?>
<?php $__env->startSection('plugins.TempusDominusBs4', true); ?>
<?php $__env->startSection('plugins.DateRangePicker', true); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



<?php
$heads = [
'Applied on',
'Reason',
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

<div class="card card-purple  ">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-lg fa-fw fa-calendar-times  mr-2"></i> Request Leave
        </h3>
    </div>

    <div class="card-body">
        <form action="<?php echo e(route('leave.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Reason</label>
                    <input type="text" name="reason" value="<?php echo e(old('reason')); ?>" class="form-control">
                    <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"><?php echo e(old('description')); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="">Multiple Days</label>
                    <select name="multiple-days" class="form-control" onchange="showInput()">
                        <option value="no" selected>No</option>
                        <option value="yes" >Yes</option>
                    </select>
                </div>
                <div class="form-group hide-input" id="half-day">
                    <label>Half Day</label>
                    <select class="form-control" name="half-day">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                <?php
                $config = ['format' => 'L'];
                ?>
                <div id="single-date" class="">
                     <?php if (isset($component)) { $__componentOriginalbfddb4fbd5cc3c689684d0828fb5b74a303abcc4 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\InputDate::class, ['name' => 'date','config' => $config,'label' => 'Date']); ?>
<?php $component->withName('adminlte-input-date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Choose a date...']); ?>
                         <?php $__env->slot('prependSlot'); ?> 
                            <div class="input-group-text bg-white">
                                <i class="far fa-lg fa-calendar-alt text-purple"></i>
                            </div>
                         <?php $__env->endSlot(); ?>
                     <?php if (isset($__componentOriginalbfddb4fbd5cc3c689684d0828fb5b74a303abcc4)): ?>
<?php $component = $__componentOriginalbfddb4fbd5cc3c689684d0828fb5b74a303abcc4; ?>
<?php unset($__componentOriginalbfddb4fbd5cc3c689684d0828fb5b74a303abcc4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                </div>

                <div id="multiple-date" class="d-none">
                     <?php if (isset($component)) { $__componentOriginal533dae895851e7fa774245f7511cc5528244f395 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\DateRange::class, ['name' => 'date_range','label' => 'Date Range']); ?>
<?php $component->withName('adminlte-date-range'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => 'Select a date range...']); ?>
                         <?php $__env->slot('prependSlot'); ?> 
                            <div class="input-group-text bg-gradient-purple">
                                <i class="far fa-lg fa-calendar-alt"></i>
                            </div>
                         <?php $__env->endSlot(); ?>
                     <?php if (isset($__componentOriginal533dae895851e7fa774245f7511cc5528244f395)): ?>
<?php $component = $__componentOriginal533dae895851e7fa774245f7511cc5528244f395; ?>
<?php unset($__componentOriginal533dae895851e7fa774245f7511cc5528244f395); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    <?php $__env->startPush('js'); ?><script>
                        $(() => $("#drPlaceholder").val(''))
                    </script><?php $__env->stopPush(); ?>
                </div> 
                    <div class="form-group">
                        <input type="submit" class="form-control bg-purple" value="Send Request">
                    </div> 
            </div>

        </form>

    </div>

</div>


 <?php if (isset($component)) { $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Widget\Card::class, []); ?>
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
            <td><?php echo e($leave->created_at->format('d-m-Y')); ?></td>
            <td><?php echo e($leave->reason); ?></td>
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
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'view'.e($leave->id).'','title' => 'Request Leave Details','theme' => 'purple','icon' => 'fas fa-info-circle','size' => 'lg','vCentered' => true,'disableAnimations' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

            <?php echo e($leave->created_at->format('d-m-Y')); ?>

            <?php echo e($leave->user->firstName.' '.$leave->user->lastName); ?>

            <?php echo e($leave->user->position); ?>

            <?php echo e($leave->reason); ?>

            <?php echo e($leave->description); ?>


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


            <?php echo e($leave->start_date->format('d-m-Y')); ?>

            <?php if($leave->end_date): ?>
            <?php echo e($leave->end_date->format('d-m-Y')); ?>

            <?php else: ?>
            Single Day
            <?php endif; ?>


         <?php if (isset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0)): ?>
<?php $component = $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0; ?>
<?php unset($__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

        <!-- edit-->
         <?php if (isset($component)) { $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'edit'.e($leave->id).'','title' => 'Edit Leave','theme' => 'purple','icon' => 'fas fa-user-cog','size' => 'md','vCentered' => true,'disableAnimations' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <form action="<?php echo e(route('leave.update', $leave->id)); ?>" method="POST" id="<?php echo e('form-edit-'.$leave->id); ?>">
                <?php echo method_field('patch'); ?>
                <?php echo csrf_field(); ?>

                <div class="col-12">
                    <div class="form-group ">
                        <label for=""> </label>

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
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'delete'.e($leave->id).'','title' => 'Delete leave?','size' => 'sm','theme' => 'danger','icon' => 'fas fa-user-cog','vCentered' => true,'scrollable' => true]); ?>
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

    function showInput() {
        document.getElementById("single-date").classList.toggle("d-none");
        document.getElementById("multiple-date").classList.toggle("d-none");
        document.getElementById("half-day").classList.toggle("d-none");

    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_mangement_system\resources\views/leave/create.blade.php ENDPATH**/ ?>