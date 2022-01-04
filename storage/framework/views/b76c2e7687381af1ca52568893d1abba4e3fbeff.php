<?php $__env->startSection('title', trans('blog.title.category', ['title' => 'category title'])); ?>

<?php $__env->startSection('content'); ?>
    <!-- Title -->
    <h2 class="mt-4 mb-3">
        <?php echo e(trans('blog.title.category', ['title' => 'category title'])); ?>

    </h2>

    <!-- Breadcrumb:start -->
    <?php echo e(Breadcrumbs::render('blog_posts_category', $category->title)); ?>

    <!-- Breadcrumb:end -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <!-- Post list:start -->
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card shadow-sm mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <?php if(file_exists(public_path($post->thumbnail))): ?>
                                <img class="card-img-top card-img-bottom h-100" src="<?php echo e(asset($post->thumbnail)); ?>"
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
                <div class="row mb-4">
                    <div class="col">
                        <?php echo e($posts->links('vendor.pagination.bootstrap-4')); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <!-- Categories list:start -->
            <div class="card shadow-sm mb-3">
                <h5 class="card-header bg-white text-gray-900">
                    <?php echo e(trans('blog.widget.categories')); ?>

                </h5>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>
                            <?php if($category->slug == $categoryRoot->slug): ?>
                                <?php echo e($categoryRoot->title); ?>

                            <?php else: ?>
                                <a href="<?php echo e(route('blog.posts.category', ['slug' => $categoryRoot->slug])); ?>">
                                    <?php echo e($categoryRoot->title); ?>

                                </a>
                            <?php endif; ?>
                            <!-- category descendants:start -->
                            <?php if($categoryRoot->descendants): ?>
                                <?php echo $__env->make('blog.sub-categories',[
                                'categoryRoot' => $categoryRoot->descendants,
                                'category' => $category
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <!-- category descendants:end -->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Categories list:end -->

            
            <div class="card bg-white shadow-sm mb-3">
                <h5 class="card-header bg-white text-gray-900">
                    <?php echo e(trans('blog.widget.latest_posts')); ?>

                </h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $latestPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item px-0">
                                <a href="<?php echo e(route('blog.posts.detail', ['slug' => $lPost->slug])); ?>"
                                    class="text-gray-900">
                                    <?php echo e($lPost->title); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            

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

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/posts-category.blade.php ENDPATH**/ ?>