 


<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Employee Management System</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <p>Welcome to this beautiful admin panel.</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_mangement_system\resources\views/home.blade.php ENDPATH**/ ?>