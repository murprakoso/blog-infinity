<?php $__env->startSection('title', trans('filemanager.title.index')); ?>

<?php $__env->startSection('breadcrumbs', Breadcrumbs::render('file_manager')); ?>

<?php $__env->startSection('content'); ?>
    <!-- content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-end">
                    <form action="" method="GET" style="width: 210px">
                        <div class="input-group shadow">
                            <select name="type" class="custom-select">
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value); ?>" <?php echo e($typeSelected == $value ? 'selected' : null); ?>>
                                        <?php echo e($label); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-light border" type="submit">
                                    <?php echo e(trans('filemanager.button.apply.value')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <iframe src="<?php echo e(route('unisharp.lfm.show')); ?>?type=<?php echo e($typeSelected); ?>"
                        style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/filemanager/index.blade.php ENDPATH**/ ?>