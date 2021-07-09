

<?php $__env->startSection('title', 'Holiday'); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('plugins.Datatables', true); ?>
<?php $__env->startSection('plugins.TempusDominusBs4', true); ?>
<?php $__env->startSection('plugins.DateRangePicker', true); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<?php

if(auth()->user()->role_id!=1){
$title='Holiday';
$theme='purple';
$icon='fas fa-lg fa-fw fa-calendar-minus';
$heads = [
'Name',
'Date',
];
}
if(auth()->user()->role_id==1){
$title='';
$theme='';
$icon='';
$heads = [
'Name',
'Date',
['label' => 'Actions', 'no-export' => true, 'width' => 5],
];
}

?>



<!-- "collapsed" -->
<br><br><br>



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

<?php if($errors->any()): ?>
    <div class="alert alert-danger  py-4 px-2 bg-red-400 ">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(auth()->user()->role_id==1): ?>
<div class="card card-purple collapsed-card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-lg fa-fw fa-calendar-minus  mr-2"></i> Holidays
        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i> Add Holiday</button>
        </div>

    </div>
    <div class="card-body" style="display: none;">
        <form action="<?php echo e(route('holidays.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card card-purple col-12 col-md-6 mx-auto">
                <div class="row card-body">
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="">Add Holiday </label>
                            <input type="text" class="form-control" name="name" required value="<?php echo e(old('name')); ?>" id="" placeholder="Enter Holiday Name">
                        </div>
                        <div class="form-group">
                            <label for="">Multiple Days</label>
                            <select name="multiple-days" class="form-control" onchange="showInput()">
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
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" class="form-control bg-purple" value="Add">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

</div>
<?php endif; ?>

 <?php if (isset($component)) { $__componentOriginalaed86eb40978352b5500452c639db72fd44b2ec6 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Widget\Card::class, ['title' => $title,'theme' => $theme,'icon' => $icon]); ?>
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
        <?php $__currentLoopData = $holiday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e($h->name); ?></td>
            <td><?php echo e($h->start_date->format('F d, Y')); ?>

                <?php if($h->end_date): ?>
                - <?php echo e($h->end_date->format('F d, Y')); ?>

                <?php endif; ?>
            </td>

            <?php if(auth()->user()->role_id==1): ?>
            <td>
                <nobr>

                    <button class="btn btn-xs btn-default text-purple mx-1 shadow" title="Edit" data-toggle="modal" data-target="#edit<?php echo e($h->id); ?>">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                    </button>
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#delete<?php echo e($h->id); ?>">
                        <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </nobr>
            </td>
            <?php endif; ?>

        </tr>

        <!-- edit-->
         <?php if (isset($component)) { $__componentOriginal3170ce38bba9a254ea7cdfc3b7aa9def8f17c1f0 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'edit'.e($h->id).'','title' => 'Edit Holiday','theme' => 'purple','icon' => 'fas fa-calendar-minus','size' => 'md','disableAnimations' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <form action="<?php echo e(route('holidays.update', $h->id)); ?>" method="POST" id="<?php echo e('form-edit-'.$h->id); ?>">
                <?php echo method_field('patch'); ?>
                <?php echo csrf_field(); ?>

                <div class="col-12">
                    <div class="form-group ">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e(old('name')?old('name'):$h->name); ?>" placeholder="Enter Holiday Name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Multiple Days</label>
                        <select name="multiple-days" class="form-control" onchange="document.getElementById('single-date<?php echo e($h->id); ?>').classList.toggle('d-none');   document.getElementById('multiple-date<?php echo e($h->id); ?>').classList.toggle('d-none');">
                            <option value="no" <?php echo e(!($h->end_date) ? 'selected' : ''); ?>>No</option>
                            <option value="yes" <?php echo e(($h->end_date) ? 'selected' : ''); ?>>Yes</option>
                        </select>
                    </div>
                    <?php
                    $config = ['format' => 'L'];
                    ?>
                    <div id="single-date<?php echo e($h->id); ?>" class="<?php echo e(($h->end_date) ? 'd-none' : ''); ?>">
                         <?php if (isset($component)) { $__componentOriginalbfddb4fbd5cc3c689684d0828fb5b74a303abcc4 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\InputDate::class, ['name' => 'date','id' => 's-date'.e($h->id).'','config' => $config,'label' => 'Date']); ?>
<?php $component->withName('adminlte-input-date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['value' => ''.e($h->start_date->format('m/d/Y')).'','placeholder' => 'Choose a date...']); ?>
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

                    <div id="multiple-date<?php echo e($h->id); ?>" class=" <?php echo e(!($h->end_date) ? 'd-none' : ''); ?>">
                         <?php if (isset($component)) { $__componentOriginal533dae895851e7fa774245f7511cc5528244f395 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\DateRange::class, ['name' => 'date_range','id' => 'm-date'.e($h->id).'','label' => 'Date Range']); ?>
<?php $component->withName('adminlte-date-range'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['value' => ''.e($h->start_date->format('m/d/Y')).'\' - \''.e(( $h->end_date) ?  $h->end_date->format('m/d/Y') : $h->start_date->format('m/d/Y')).'','placeholder' => 'Select a date range...']); ?>
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
<?php $component->withAttributes(['class' => 'bg-purple','onclick' => 'event.preventDefault();document.getElementById(\'form-edit-'.e($h->id).'\').submit()']); ?>
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
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Modal::class, ['id' => 'delete'.e($h->id).'','title' => 'Delete Holiday?','size' => 'md','theme' => 'danger','icon' => 'fas fa-calendar-minus','vCentered' => true,'scrollable' => true]); ?>
<?php $component->withName('adminlte-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <p>Are you sure you want to delete <b> <?php echo e($h->name); ?> </b> </p>
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
<?php $component->withAttributes(['onclick' => 'event.preventDefault();document.getElementById(\'form-delete-'.e($h->id).'\').submit()']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                <form action="<?php echo e(route('holidays.destroy',$h->id)); ?>" id="<?php echo e('form-delete-'.$h->id); ?>" method="POST" style="display: none;">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>
    function showInput() {
        document.getElementById("single-date").classList.toggle("d-none");
        document.getElementById("multiple-date").classList.toggle("d-none");
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/holiday/index.blade.php ENDPATH**/ ?>