<div>
<?php if($errors->any()): ?>
    <div class="alert alert-danger  py-4 px-2 bg-red-400 ">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
</div><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/components/alerts.blade.php ENDPATH**/ ?>