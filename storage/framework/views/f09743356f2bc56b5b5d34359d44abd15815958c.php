
<?php $__env->startSection('title', 'Attendance'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('plugins.Datatables', true); ?>


<?php
$heads = [ 'ID','Name','Entry','Time','Location','Exit','Time','Location',
];
?>


<br><br>
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
<div class="card card-purple collapsed-card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-lg fa-fw fa-briefcase  mr-2"></i>
            <?php if($date): ?>
            Employee attendance on <?php echo e($date); ?>

            <?php else: ?>
            Employee attendance Today
            <?php endif; ?>
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-lg fa-search"></i> Search date <i class="fas fa-lg fa-calendar-alt"></i></button>
        </div>
    </div>
    <div class="card-body" style="display: none;">
        <form action="<?php echo e(route('attendances.index')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="card card-purple col-12 col-md-6 mx-auto">
                <div class="row card-body">
                    <div class="col-12">
                        <div class="form-group ">
                            <input type="date" name="date" id="date" class="form-control text-center">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" class="form-control bg-purple" value="Search   ">
                        </div>
                    </div>
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
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($user->id); ?></td>
            <td><?php echo e($user->firstName.' '.$user->lastName); ?></td>
            <?php if($user->attendanceToday): ?>
            <td>
                <h6 class="text-center"><span class="badge badge-pill badge-success">Recorded</span></h6>
            </td>
            <?php else: ?>
            <td>
                <h6 class="text-center"><span class="badge badge-pill badge-danger">No Record</span></h6>
            </td>
            <?php endif; ?>

            <td> <?php echo e($user->attendanceToday ?  $user->attendanceToday->created_at->format('H:i:s') :''); ?>

            </td>
            <td>
                <?php echo e($user->attendanceToday ? $user->attendanceToday->entry_location :''); ?>

            </td>
            <?php if($user->attendanceToday ? $user->attendanceToday->exit_location : 0 ): ?>
            <td>
                <h6 class="text-center"><span class="badge badge-pill badge-success">Recorded</span></h6>
            </td>
            <?php else: ?>
            <td>
                <h6 class="text-center"><span class="badge badge-pill badge-danger">No Record</span></h6>
            </td> 
            <?php endif; ?>
            <td>
                <?php echo e($user->attendanceToday ? $user->attendanceToday->updated_at->format('H:i:s'):''); ?>

            </td>
            <td>
                <?php echo e($user->attendanceToday ? $user->attendanceToday->exit_location :''); ?>

            </td> 
 

            <!-- <td>
                <?php if($user->attendanceToday): ?>
                <button class="btn btn-flat btn-danger" data-toggle="modal" data-target="#deleteModalCenter<?php echo e($user->attendanceToday->id); ?>">Delete Record</button>
                <?php else: ?>
                No actions available
                <?php endif; ?>
            </td> -->
        </tr>
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
</script>
<?php $__env->stopSection(); ?>





<?php $__env->startSection('extra-js'); ?>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true,
            autoWidth: false,
        });
        $('#date').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "locale": {
                "format": "DD-MM-YYYY"
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_mangement_system\resources\views/attendance/index.blade.php ENDPATH**/ ?>