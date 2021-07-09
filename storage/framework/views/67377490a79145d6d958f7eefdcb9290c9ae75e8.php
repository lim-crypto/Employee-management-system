<?php $__env->startSection('input_group_item'); ?>

    
    <input id="<?php echo e($id); ?>" name="<?php echo e($name); ?>"
        <?php echo e($attributes->merge(['class' => $makeItemClass()])); ?>>

<?php $__env->stopSection(true); ?>



<?php $__env->startPush('js'); ?>
<script>

    $(() => {
        let usrCfg = _AdminLTE_DateRange.parseCfg( <?php echo json_encode($config, 15, 512) ?> );

        // Check if default set of ranges should be enabled.

        <?php if(isset($enableDefaultRanges)): ?>
            usrCfg.ranges = usrCfg.ranges || _AdminLTE_DateRange.defaultRanges;
            let range = usrCfg.ranges['<?php echo e($enableDefaultRanges); ?>'];

            if (Array.isArray(range)) {
                usrCfg.startDate = range[0];
                usrCfg.endDate = range[1];
            }
        <?php endif; ?>

        $('#<?php echo e($id); ?>').daterangepicker(usrCfg);
    })

</script>
<?php $__env->stopPush(); ?>



<?php if (! $__env->hasRenderedOnce('f1194e8d-f72f-41e7-a2fb-ebf36a29e229')): $__env->markAsRenderedOnce('f1194e8d-f72f-41e7-a2fb-ebf36a29e229'); ?>
<?php $__env->startPush('js'); ?>
<script>

    class _AdminLTE_DateRange {

        /**
         * A default set of ranges options.
         */
        static defaultRanges = {
            'Today': [
                moment(),
                moment()
            ],
            'Yesterday': [
                moment().subtract(1, 'days'),
                moment().subtract(1, 'days')
            ],
            'Last 7 Days': [
                moment().subtract(6, 'days'),
                moment()
            ],
            'Last 30 Days': [
                moment().subtract(29, 'days'),
                moment()
            ],
            'This Month': [
                moment().startOf('month'),
                moment().endOf('month')
            ],
            'Last Month': [
                moment().subtract(1, 'month').startOf('month'),
                moment().subtract(1, 'month').endOf('month')
            ]
        }

        /**
         * Parse the php plugin configuration and eval the javascript code.
         *
         * cfg: A json with the php side configuration.
         */
        static parseCfg(cfg)
        {
            for (const prop in cfg) {
                let v = cfg[prop];

                if (typeof v === 'string' && v.startsWith('js:')) {
                    cfg[prop] = eval(v.slice(3));
                } else if (typeof v === 'object') {
                    cfg[prop] = _AdminLTE_DateRange.parseCfg(v);
                }
            }

            return cfg;
        }
    }

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('adminlte::components.form.input-group-component', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_mangement_system\resources\views/vendor/adminlte/components/form/date-range.blade.php ENDPATH**/ ?>