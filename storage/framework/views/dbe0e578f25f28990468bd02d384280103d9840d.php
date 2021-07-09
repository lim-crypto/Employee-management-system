<div>
     <?php if (isset($component)) { $__componentOriginal533dae895851e7fa774245f7511cc5528244f395 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\DateRange::class, ['name' => 'date_range','label' => 'Date Range']); ?>
<?php $component->withName('adminlte-date-range'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['wire:model' => 'search','placeholder' => 'Select a date range...']); ?>
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
    <?php
    $heads = [ 'Date','Status','Entry Time','Entry Location','Exit Time','Exit Location', ];
    ?>

     <?php if (isset($component)) { $__componentOriginal5c3a95af394031b1bfa79f2f00cd6019494000a3 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Datatable::class, ['id' => 'table1','heads' => $heads,'theme' => 'ligth','striped' => true,'hoverable' => true,'beautify' => true,'compressed' => true]); ?>
<?php $component->withName('adminlte-datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

        <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php if($attendance->registered == 2): ?>
            <td><?php echo e($attendance->created_at->format('m-d-Y')); ?></td>
            <td>
                <h5 class="text-center"><span class="badge badge-pill badge-success">Present</span> </h5>
            </td>
            <td><?php echo e($attendance->created_at->format('H:i:s')); ?></td>
            <td><?php echo e($attendance->entry_location); ?></td>
            <td><?php echo e($attendance->updated_at->format('H:i:s')); ?></td>
            <td><?php echo e($attendance->exit_location); ?></td>
            <?php elseif($attendance->registered == 'no'): ?>
            <td><?php echo e($attendance->created_at->format('m-d-Y')); ?></td>
            <td>
                <h5 class="text-center"><span class="badge badge-pill badge-danger">Absent</span> </h5>
            </td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <?php elseif($attendance->registered == 'sun'): ?>
            <td><?php echo e($attendance->created_at->format('m-d-Y')); ?></td>
            <td>
                <h5 class="text-center"><span class="badge badge-pill badge-info">Sunday</span> </h5>
            </td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <?php elseif($attendance->registered == 'leave'): ?>
            <td><?php echo e($attendance->created_at->format('m-d-Y')); ?></td>
            <td>
                <h5 class="text-center"><span class="badge badge-pill badge-info">Leave</span> </h5>
            </td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <?php elseif($attendance->registered == 'holiday'): ?>
            <td><?php echo e($attendance->created_at->format('m-d-Y')); ?></td>
            <td>
                <h5 class="text-center"><span class="badge badge-pill badge-secondary">Holiday</span> </h5>
            </td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <td class="text-center">No records</td>
            <?php else: ?>
            <td><?php echo e($attendance->created_at->format('m-d-Y')); ?></td>
            <td>
                <h5 class="text-center"><span class="badge badge-pill badge-warning">Half Day</span> </h5>
            </td>
            <td><?php echo e($attendance->created_at->format('H:i:s')); ?></td>
            <td><?php echo e($attendance->entry_location); ?></td>
            <td>No entry</td>
            <td>No entry</td>
            <?php endif; ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php if (isset($__componentOriginal5c3a95af394031b1bfa79f2f00cd6019494000a3)): ?>
<?php $component = $__componentOriginal5c3a95af394031b1bfa79f2f00cd6019494000a3; ?>
<?php unset($__componentOriginal5c3a95af394031b1bfa79f2f00cd6019494000a3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

</div><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/livewire/search-date.blade.php ENDPATH**/ ?>