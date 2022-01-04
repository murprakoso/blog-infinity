<?php $__env->startSection('title', trans('categories.title.detail')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(Breadcrumbs::render('detail_category_title', $category)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <?php if(file_exists(public_path($category->thumbnail))): ?>
                        <!-- thumbnail:true -->
                        <div class="category-thumbnail"
                            style="background-image: url('<?php echo e(asset($category->thumbnail)); ?>');">
                        </div>
                    <?php else: ?>
                        <!-- thumbnail:false -->
                        <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#dee2e6" dy=".3em"
                                font-size="24">
                                <?php echo e($category->title); ?>

                            </text>
                        </svg>
                    <?php endif; ?>
                    <!-- title -->
                    <h2 class="my-1">
                        <?php echo e($category->title); ?>

                    </h2>
                    <!-- description -->
                    <p class="text-justify">
                        <?php echo e($category->description); ?>

                    </p>
                    <div class="d-flex justify-content-end">
                        <a href="<?php echo e(route('categories.index')); ?>"
                            class="btn btn-light btn-icon-split shadow border float-right" role="button">
                            <span class="icon text-gray-600">
                                <i class="fas fa-fw fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                <?php echo e(trans('categories.button.back.value')); ?>

                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-internal'); ?>
    <style>
        .category-thumbnail {
            width: 100% !important;
            height: 400px !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: cover !important;
            object-fit: cover !important;
            object-position: center !important;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/categories/show.blade.php ENDPATH**/ ?>