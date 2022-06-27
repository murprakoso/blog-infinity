<?php $__env->startPush('css-external'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/prism/css/' . config('prism.theme') . '.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js-external'); ?>
    <script src="<?php echo e(asset('vendor/prism/js/prism.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js-internal'); ?>
    <script>
        $(function() {
            $("button[class='copy-to-clipboard-button']").addClass("<?php echo e(config('prism.copy_button.class')); ?>");
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\PERKODINGAN\FunCode\infinity15\resources\views/vendor/prism/prism.blade.php ENDPATH**/ ?>