 

 <?php $__env->startSection('title', 'Axis'); ?>

 <?php $__env->startSection('content_header'); ?>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('content'); ?>
 <br>
 <div class="card card-default">
     <div class="card-body">
         <div class="callout callout-info">
             <h3 >Mission</h3>
             <p>


                 Throughout innovation and modernization, the company focuses to provide organized, accessible, and intricate products softwares that ensures quality of many and with Axis we believe that technological expertise is the central component on succesful organization handling.
             </p>


         </div>
         <div class="callout callout-info">

             <h3>Vision</h3>
             <p>
                 To be a succesful global technology company that ensures service excellence, better managerial experience, and collabration within the community of firms. Delivering innovative and value driven products for its end-users for years to come.
             </p>

         </div>
     </div>
 </div>



 <h3>Organization Chart</h3>
 <div class="orgchart">
     <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <?php if($user->department_id==1): ?>
     <?php if($user->position_id==1): ?>
     <div class="row">
         <div class="col-12">
             <div class="details level-1 rectangle">
                 <div class="design-container">
                     <div class="image">
                         <img src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" alt="" />
                     </div>
                 </div>
                 <div class="semi-container">
                     <a class="name"> <?php echo e($user->firstName.' '.$user->lastName); ?></a>
                     <p class="text-white"><?php echo e($user->position->name); ?></p>
                 </div>
                 <div class="additional">
                     <a href="#"><i class="fas fa-envelope"></i> <?php echo e($user->email); ?></a>
                     <?php if($user->phoneNumber): ?>
                     <p class="text-muted"><i class="fas fa-comment-dots text-purple"></i> <?php echo e($user->phoneNumber); ?></p>
                     <?php endif; ?>
                 </div>
             </div>
         </div>
     </div>
     <?php endif; ?>
     <?php endif; ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


     <div class="row">

         <div class="col-8">
             <div class="col-12">
                 <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if($user->department->name=='Technology'): ?>
                 <?php if($user->position->name=='Project Manager'): ?>

                 <div class="details level-2 rectangle">
                     <div class="design-container">
                         <div class="image">
                             <img src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" alt="" />
                         </div>
                     </div>
                     <div class="semi-container">
                         <a class="name"> <?php echo e($user->firstName.' '.$user->lastName); ?> </a>
                         <p class="text-white"><?php echo e($user->position->name); ?> </p>
                     </div>
                     <div class="additional">
                         <a href="#"><i class="fas fa-envelope"></i> <?php echo e($user->email); ?> </a>
                         <?php if($user->phoneNumber): ?>
                         <p class="text-muted"><i class="fas fa-comment-dots text-purple"></i> <?php echo e($user->phoneNumber); ?> </p>
                         <?php endif; ?>
                     </div>
                 </div>
                 <?php endif; ?>
                 <?php endif; ?>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <div class="row">
                     <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($user->department->name=='Technology'): ?>
                     <?php if($user->position->name!='Project Manager'): ?>
                     <div class="col-12 col-md-6">
                         <div class="details level-3 rectangle">
                             <div class="design-container">
                                 <div class="image">
                                     <img src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" alt="" />
                                 </div>
                             </div>
                             <div class="semi-container">

                                 <a class="name"><?php echo e($user->firstName.' '.$user->lastName); ?></a>
                                 <p class="text-white"><?php echo e($user->position->name); ?></p>

                             </div>
                             <div class="additional">
                                 <a href="#"><i class="fas fa-envelope"></i> <?php echo e($user->email); ?> </a>
                                 <?php if($user->phoneNumber): ?>
                                 <p class="text-muted"><i class="fas fa-comment-dots text-purple"></i><?php echo e($user->phoneNumber); ?></p>
                                 <?php endif; ?>
                             </div>
                         </div>
                     </div>
                     <?php endif; ?>
                     <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </div>
             </div>
         </div>

         <div class="col-4">
             <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if($user->department->name=='Marketing'): ?>

             <!-- marting team -->
             <div class="details level-2 rectangle">
                 <div class="design-container">
                     <div class="image">
                         <img src="/storage/images/<?php echo e(($user->avatar) ? $user->avatar:'user.png'); ?>" alt="" />
                     </div>
                 </div>
                 <div class="semi-container">

                     <a class="name"><?php echo e($user->firstName.' '.$user->lastName); ?></a>

                     <p class="text-white"><?php echo e($user->position->name); ?></p>

                 </div>
                 <div class="additional">

                     <a href=""><i class="fas fa-envelope"></i> <?php echo e($user->email); ?> </a>
                     <?php if($user->phoneNumber): ?>
                     <p class="text-muted"><i class="fas fa-comment-dots text-purple"></i> <?php echo e($user->phoneNumber); ?> </p>
                     <?php endif; ?>
                 </div>
             </div>
             <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
     </div>
 </div>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('css'); ?>
 <style>
     .details {
         border: 5px solid #6f42c1;
         border-radius: 2rem;
         height: 8rem;
         width: 270px;
         text-align: center;
         margin: 15px 0 15px 0;
         /* background-color: #d7c0ff; */
         display: block;
         margin-left: auto;
         margin-right: auto;
     }

     .design-container {
         border: 5px solid #6f42c1;
         border-radius: 50%;
         height: 110px;
         width: 110px;
         margin-top: 5px;
         margin-left: -50px;
         align-items: center;
         display: flex;
         position: absolute;
         background-color: white;
     }

     .image {

         align-items: center;
         border: 3px solid #c497c5;
         /* border: 3px solid #6f42c1; */
         width: 90px;
         height: 90px;
         margin-left: 5px;
         border-radius: 50%;
     }

     .semi-container {

         border-radius: 30px;
         height: 3rem;
         text-align: center;
         background-color: #6f42c1;

     }

     .additional {
         margin-top: 5px;
     }

     .ul .li {
         list-style: none;
     }

     img {
         width: 5.3rem;
         height: 5.3rem;
         border-radius: 50%;
     }

     /* fonts-stuff */
     .name {
         font-weight: 1000;
         color: white;
     }
 </style>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('js'); ?>
 <script>
     console.log('Hi!');
 </script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/home.blade.php ENDPATH**/ ?>