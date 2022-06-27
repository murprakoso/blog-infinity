<?php $__env->startSection('title', trans('posts.title.detail')); ?>

<?php $__env->startSection('breadcrumbs', Breadcrumbs::render('detail_post', $post)); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <?php if(file_exists(public_path($post->thumbnail))): ?>
                        <!-- thumbnail:true -->
                        <div class="post-tumbnail" style="background-image: url('<?php echo e($post->thumbnail); ?>');">
                        </div>
                    <?php else: ?>
                        <!-- thumbnail:false -->
                        <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#dee2e6" dy=".3em"
                                font-size="24">
                                <?php echo e($post->title); ?>

                            </text>
                        </svg>
                    <?php endif; ?>
                    <!-- title -->
                    <h2 class="my-1">
                        <?php echo e($post->title); ?>

                    </h2>
                    <!-- description -->
                    <p class="text-justify">
                        <?php echo e($post->description); ?>

                    </p>
                    <!-- categories -->
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge badge-primary"><?php echo e($category->title); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- content -->
                    <div class="py-1">
                        <?php echo $post->content; ?>

                    </div>
                    <!-- tags  -->
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge badge-info">#<?php echo e($tag->title); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="d-flex justify-content-end">
                        <a href="<?php echo e(route('posts.index')); ?>" class="btn btn-light btn-icon-split shadow border"
                            role="button">
                            <span class="icon text-gray-600">
                                <i class="fas fa-fw fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                <?php echo e(trans('posts.button.back.value')); ?>

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
        .post-tumbnail {
            width: 100%;
            height: 400px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('vendor.prism.prism', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERKODINGAN\FunCode\infinity15\resources\views/posts/detail.blade.php ENDPATH**/ ?>