<div <?php echo e($attributes->merge(['class' => $makeModalClass(), 'id' => $id])); ?>

     <?php if(isset($staticBackdrop)): ?> data-backdrop="static" data-keyboard="false" <?php endif; ?>>

    <div class="<?php echo e($makeModalDialogClass()); ?>">
    <div class="modal-content">

        
        <div class="<?php echo e($makeModalHeaderClass()); ?>">
            <h4 class="modal-title">
                <?php if(isset($icon)): ?><i class="<?php echo e($icon); ?> mr-2"></i><?php endif; ?>
                <?php if(isset($title)): ?><?php echo e($title); ?><?php endif; ?>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        
        <?php if(! $slot->isEmpty()): ?>
            <div class="modal-body"><?php echo e($slot); ?></div>
        <?php endif; ?>

        
        <div class="modal-footer">
            <?php if(isset($footerSlot)): ?>
                <?php echo e($footerSlot); ?>

            <?php else: ?>
                 <?php if (isset($component)) { $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3 = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\Components\Form\Button::class, ['label' => 'Close']); ?>
<?php $component->withName('adminlte-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => ''.e($makeCloseButtonClass).'','data-dismiss' => 'modal']); ?>
<?php if (isset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3)): ?>
<?php $component = $__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3; ?>
<?php unset($__componentOriginalc48319333d07a1f51a4b3e3733b4d97fe3fcdda3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php endif; ?>
        </div>

    </div>
    </div>

</div>
<?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/vendor/adminlte/components/tool/modal.blade.php ENDPATH**/ ?>