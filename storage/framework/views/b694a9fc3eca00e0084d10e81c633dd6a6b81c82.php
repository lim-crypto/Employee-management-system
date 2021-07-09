 

 <?php $__env->startSection('title', 'Dashboard'); ?>

 <?php $__env->startSection('content_header'); ?>
 <h1>Dashboard</h1>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('content'); ?>
 <div class="row">
     <div class="col-md-3 col-sm-6 col-12">
         <div class="info-box">
             <span class="info-box-icon bg-purple"><i class="fas fa-calendar"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Attendance today</span>
                 <span class="info-box-number"><?php echo e($attendance); ?></span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-md-3 col-sm-6 col-12">
         <div class="info-box">
             <span class="info-box-icon bg-indigo"><i class="far fa-calendar-minus"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Absent today</span>
                 <span class="info-box-number"><?php echo e($employee-$attendance-$leave); ?></span>
             </div>

             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-md-3 col-sm-6 col-12">
         <div class="info-box">
             <span class="info-box-icon bg-blue"><i class="fas fa-calendar-times"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">On leave today</span>
                 <span class="info-box-number"><?php echo e($leave); ?></span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <div class="col-md-3 col-sm-6 col-12">
         <div class="info-box">
             <span class="info-box-icon bg-lightblue"><i class="fas fa-users"></i></span>

             <div class="info-box-content">
                 <span class="info-box-text">Employees</span>
                 <span class="info-box-number"><?php echo e($employee); ?></span>
             </div>
             <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
     </div>
     <!-- /.col -->
 </div>



 <div class="col-md-6 col-sm-12 col-12 card">
     <canvas id="myChart"></canvas>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
     // === include 'setup' then 'config' above ===
     const labels = [

         'Present',
         'Absent',
         'On leave',
         'Employees',
     ];

     const data = {
         labels: labels,
         datasets: [{
             label: ' Attendace Today',
             data: [
                 '<?php echo e($attendance); ?>',
                 '<?php echo e($employee-$attendance-$leave); ?>',
                 '<?php echo e($leave); ?>',
                 '<?php echo e($employee); ?>'
             ],
             backgroundColor: [
                 'rgb(102, 16, 242, 0.5)',
                 'rgb(111, 66, 193, 0.2)',
                 'rgb(0, 123, 255,0.2)',
                 ' rgb(60, 141, 188,0.2)',

             ],
             borderColor: [
                 'rgb(102, 16, 242)',
                 'rgb(111, 66, 193)',
                 'rgb(0, 123, 255)',
                 ' rgb(60, 141, 188)',

             ],
             borderWidth: 2
         }]
     };
     const config = {
         type: 'bar',
         data: data,
         options: {
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         },
     };
     var myChart = new Chart(
         document.getElementById('myChart'),
         config
     );
 </script>


 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('css'); ?>
 <link rel="stylesheet" href="/css/admin_custom.css">
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('js'); ?>
 <script>
     console.log('Hi!');
 </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/dashboard/index.blade.php ENDPATH**/ ?>