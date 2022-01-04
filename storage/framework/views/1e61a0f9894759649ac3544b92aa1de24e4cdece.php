<?php $__env->startSection('title', trans('blog.menu.home')); ?>

<?php $__env->startSection('content'); ?>
    <!-- page title -->
    <h2 class="my-3">
        <?php echo e(trans('blog.menu.home')); ?>

    </h2>
    <!-- Breadcrumbs:start -->
    <?php echo e(Breadcrumbs::render('blog_home')); ?>

    <!-- Breadcrumbs:end -->

    <!-- List posts -->
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <!-- true -->
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card shadow-sm h-100">
                    <!-- thumbnail:start -->
                    <?php if(file_exists(public_path($post->thumbnail))): ?>
                        <img class="card-img-top img-posts" src="<?php echo e(asset($post->thumbnail)); ?>" alt="<?php echo e($post->title); ?>">
                    <?php else: ?>
                        <img class="card-img-top img-posts" src="<?php echo e(asset('vendor/my-blog/img/no_img.png')); ?>"
                            alt="<?php echo e($post->title); ?>">
                    <?php endif; ?>
                    <!-- thumbnail:end -->
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?php echo e(route('blog.posts.detail', ['slug' => $post->slug])); ?>" class="text-gray-900">
                                <?php echo e($post->title); ?>

                            </a>
                        </h5>
                        <p class="card-text">
                            <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="" class="btn btn-sm btn-light">
                                    <?php echo e($categories->title); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                        <p class="card-text">
                            <?php echo e($post->description); ?>

                        </p>
                        <div class="card-text">
                            <small class="mr-1">
                                <i class="fas fa-user"></i> <?php echo e($post->user->name); ?>

                            </small>
                            <small>
                                <i class="fas fa-clock"></i> <?php echo e(Helper::date_since($post->created_at)); ?>

                            </small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- false -->
            <h3 class="text-center">
                <?php echo e(trans('blog.no_data.categories')); ?>

            </h3>
        <?php endif; ?>
    </div>
    <!-- List posts -->

    <!-- pagination:start -->
    <?php if($posts->hasPages()): ?>
        <div class="row mb-5">
            <div class="col">
                <?php echo e($posts->links('vendor.pagination.bootstrap-4')); ?>

            </div>
        </div>
    <?php endif; ?>
    <!-- pagination:end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/home.blade.php ENDPATH**/ ?>