<?php $__env->startSection('title', trans('blog.title.tag', ['title' => $tag->title])); ?>

<?php $__env->startSection('content'); ?>
    <!-- Title -->
    <h2 class="mt-4 mb-3">
        <?php echo e(trans('blog.title.tag', ['title' => $tag->title])); ?>

    </h2>

    <!-- Breadcrumb:start -->
    <?php echo e(Breadcrumbs::render('blog_posts_tag', $tag->title)); ?>

    <!-- Breadcrumb:end -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <!-- Post list:start -->
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card shadow-sm mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <?php if(file_exists(public_path($post->thumbnail))): ?>
                                <img class="card-img-top h-100" src="<?php echo e(asset($post->thumbnail)); ?>"
                                    alt="<?php echo e($post->title); ?>">
                            <?php else: ?>
                                <img class="card-img-top h-100" src="<?php echo e(asset('vendor/my-blog/img/no_img.png')); ?>"
                                    alt="<?php echo e($post->title); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?php echo e(route('blog.posts.detail', ['slug' => $post->slug])); ?>"
                                        class="text-gray-900">
                                        <?php echo e($post->title); ?>

                                    </a>
                                </h5>
                                <p class="card-text text-gray-900"><?php echo e($post->description); ?></p>
                                <p class="card-text text-gray-700">
                                    <small class="mr-1">
                                        <i class="fas fa-user"></i> <?php echo e($post->user->name); ?>

                                    </small>
                                    <small>
                                        <i class="fas fa-clock"></i> <?php echo e(Helper::date_since($post->created_at)); ?>

                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <!-- empty -->
                <h3 class="text-center">
                    <?php echo e(trans('blog.no_data.posts')); ?>

                </h3>
            <?php endif; ?>
            <!-- Post list:end -->

            <?php if($posts->hasPages()): ?>
                <div class="row mb-5">
                    <div class="col">
                        <?php echo e($posts->links('vendor.pagination.bootstrap-4')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <!-- Tags list:start -->
            <div class="card shadow-sm mb-1">
                <h5 class="card-header bg-white text-gray-800">
                    <?php echo e(trans('blog.widget.tags')); ?>

                </h5>
                <div class="card-body">
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('blog.posts.tag', ['slug' => $tag->slug])); ?>" class="btn btn-light btn-sm">
                            #<?php echo e($tag->title); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!-- Categories list:end -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-internal'); ?>
    <style>
        .card-img-top {
            /* height: 400px; */
            width: 100%;
            object-fit: cover;
            object-position: center;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/posts-tag.blade.php ENDPATH**/ ?>