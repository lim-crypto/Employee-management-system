 
<?php if( auth()->user()->role_id==1 && ( $item['text'] !='Attendance'  ) ): ?>
<li <?php if(isset($item['id'])): ?> id="<?php echo e($item['id']); ?>" <?php endif; ?> class="nav-item">

    <a class="nav-link <?php echo e($item['class']); ?> <?php if(isset($item['shift'])): ?> <?php echo e($item['shift']); ?> <?php endif; ?>"
       href="<?php echo e($item['href']); ?>" <?php if(isset($item['target'])): ?> target="<?php echo e($item['target']); ?>" <?php endif; ?>
       <?php echo $item['data-compiled'] ?? ''; ?>>

        <i class="<?php echo e($item['icon'] ?? 'far fa-fw fa-circle'); ?> <?php echo e(isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''); ?>"></i>
        <p>
            <?php echo e($item['text']); ?>


            <?php if(isset($item['label'])): ?>
                <span class="badge badge-<?php echo e($item['label_color'] ?? 'primary'); ?> right">
                    <?php echo e($item['label']); ?>

                </span>
            <?php endif; ?>
        </p> 
    </a>
</li>
<?php endif; ?>


<?php if( auth()->user()->role_id==2): ?>
<?php if($item['text'] != 'Dashboard' ): ?>
<?php if( $item['text'] != 'Employee'): ?>  
<?php if( $item['text'] != 'Add Employee'): ?>  
<?php if( $item['text'] != 'Employees leave request'): ?>  

<li <?php if(isset($item['id'])): ?> id="<?php echo e($item['id']); ?>" <?php endif; ?> class="nav-item">

    <a class="nav-link <?php echo e($item['class']); ?> <?php if(isset($item['shift'])): ?> <?php echo e($item['shift']); ?> <?php endif; ?>"
       href="<?php echo e($item['href']); ?>" <?php if(isset($item['target'])): ?> target="<?php echo e($item['target']); ?>" <?php endif; ?>
       <?php echo $item['data-compiled'] ?? ''; ?>>

        <i class="<?php echo e($item['icon'] ?? 'far fa-fw fa-circle'); ?> <?php echo e(isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''); ?>"></i>
        <p>
            <?php echo e($item['text']); ?>


            <?php if(isset($item['label'])): ?>
                <span class="badge badge-<?php echo e($item['label_color'] ?? 'primary'); ?> right">
                    <?php echo e($item['label']); ?>

                </span>
            <?php endif; ?>
        </p> 
    </a>
</li>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?> <?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_mangement_system\resources\views/vendor/adminlte/partials/sidebar/menu-item-link.blade.php ENDPATH**/ ?>