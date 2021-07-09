<div>
<?php if(session()->has('message')): ?>
<div class="alert alert-success py-4 px-2 bg-green-400 "><?php echo e(session()->get('message')); ?></div>
<?php elseif(session()->has('error')): ?>
<div class="alert alert-danger  py-4 px-2 bg-red-400 "><?php echo e(session()->get('error')); ?></div>
<?php endif; ?>


</div>
 <?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/components/alert.blade.php ENDPATH**/ ?>