
<?php $__env->startSection('title', 'Attendance'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('plugins.Datatables', true); ?>
<?php $__env->startSection('plugins.TempusDominusBs4', true); ?>
<?php $__env->startSection('plugins.DateRangePicker', true); ?>

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
            Employee attendance
            <?php endif; ?>
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-lg fa-search"></i> Search date <i class="fas fa-lg fa-calendar-alt"></i></button>
        </div>
    </div>
    <div class="card-body" style="display: none;">
        <!-- <form action="{//{ route('attendances.index') }//}" method="POST"  > -->
        <!-- @ csrf -->
        <form id="getDate">

            <div class="card card-purple col-12 col-md-6 mx-auto">
                <div class="row card-body">
                    <div class="col-12">
                        <?php
                        $config = ['format' => 'L'];
                        ?>

                         <?php if (isset($component)) { $__componentOriginalbfddb4fbd5cc3c689684d0828fb5b74a303abcc4 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\InputDate::class, ['name' => 'date','id' => 'date','config' => $config,'label' => 'Date']); ?>
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
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Tool\Datatable::class, ['id' => 'table1','heads' => $heads,'theme' => 'ligth','striped' => true,'hoverable' => true,'compressed' => true]); ?>
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
<?php $__env->startSection('js'); ?>

<script> 
    document.getElementById('getDate').addEventListener('submit', getDate);

    function getDate(e) {
        e.preventDefault();
        var date = document.getElementById('date').value;
        var xhr = new XMLHttpRequest();
        xhr.open('get', 'getDate?date=' + date, true);
        xhr.onload = function() {
            var users = JSON.parse(this.responseText);
            var tbody = '<table id="table2" style="width:100%" class="table table-hover table-striped table-sm table-ligth dataTable no-footer" role="grid" aria-describedby="table1_info">';
            tbody += '<thead>' +
                '<tr role="row">' +
                '<th >ID</th>' +
                '<th >Name</th>' +
                '<th >Entry</th>' +
                '<th >Time</th>' +
                '<th >Location</th>' +
                '<th >Exit</th>' +
                '<th >Time</th>' +
                '<th >Location</th>' +
                '</tr>' +
                ' </thead>';
            for (var i in users) {
                if (users[i].attendanceToday) {
                    var entry = '<h6 class="text-center"><span class="badge badge-pill badge-success">Recorded</span></h6>';
                    var date = new Date(users[i].attendanceToday.created_at);
                    var created_at = date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds();
                    var entry_location = users[i].attendanceToday.entry_location;
                    if (users[i].attendanceToday.exit_location) {
                        var exit = '<h6 class="text-center"><span class="badge badge-pill badge-success">Recorded</span></h6>';
                        var date2 = new Date(users[i].attendanceToday.created_at);
                        var updated_at = date2.getHours() + ':' + date2.getMinutes() + ':' + date2.getSeconds();
                        var exit_location = users[i].attendanceToday.exit_location;
                    }
                } else {
                    var entry = '<h6 class="text-center"><span class="badge badge-pill badge-danger">No Record</span></h6>';
                    var created_at = '';
                    var entry_location = '';
                    var exit = ' <h6 class="text-center"><span class="badge badge-pill badge-danger">No Record</span></h6>';
                    var updated_at = '';
                    var exit_location = '';
                }
                tbody += '<tr>' +
                    '<td>' + users[i].id + '</td>' +
                    '<td>' + users[i].firstName + ' ' + users[i].lastName + '</td>' +
                    '<td>' + entry + '</td>' +
                    '<td>' + created_at + '</td>' +
                    '<td>' + entry_location + '</td>' +
                    '<td>' + exit + '</td>' +
                    '<td>' + updated_at + '</td>' +
                    '<td>' + exit_location + '</td>' +
                    ' </tr>';
            }
            tbody += '</table>';
            document.getElementById('table1_wrapper').innerHTML = tbody;
        }
        xhr.send();
    }
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true,
            autoWidth: false,
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/attendance/index.blade.php ENDPATH**/ ?>