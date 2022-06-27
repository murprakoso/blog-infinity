<?php if (! ($breadcrumbs->isEmpty())): ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if(!is_null($breadcrumb->url) && !$loop->last): ?>
                    <li><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a><i
                            class="fas fa-caret-right mx-2"></i></li>
                <?php else: ?>
                    <li class="active" aria-current="page"><?php echo e($breadcrumb->title); ?></li>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </nav>
<?php endif; ?>
<?php /**PATH D:\PERKODINGAN\FunCode\infinity15\resources\views/vendor/breadcrumb/breadcrumb.blade.php ENDPATH**/ ?>