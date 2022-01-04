<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('desctiption', $post->description); ?>

<?php $__env->startSection('content'); ?>
    <!-- Title:start -->
    <h2 class="mt-4 mb-3">
        <?php echo e($post->title); ?>

    </h2>
    <!-- Title:end -->

    <!-- Breadcrumb:Start -->
    <?php echo e(Breadcrumbs::render('blog_post', $post->title)); ?>

    <!-- Breadcrumb:end -->
    <div class="row mb-3">
        <!-- Post Content Column:start -->
        <div class="col-lg-8">
            <!-- thumbnail:start -->
            <?php if(file_exists(public_path($post->thumbnail))): ?>
                <img class="card-img-top card-img-bottom" src="<?php echo e(asset($post->thumbnail)); ?>" alt="<?php echo e($post->title); ?>">
            <?php else: ?>
                <img class="img-fluid rounded" src="<?php echo e(asset('vendor/my-blog/img/no_img.png')); ?>"
                    alt="<?php echo e($post->title); ?>">
            <?php endif; ?>
            <!-- thumbnail:end -->
            <hr>
            <div class="text-gray-800">
                <small class="mr-2"><i class="fas fa-calendar"></i>
                    <?php echo e(Helper::date_post($post->created_at)); ?>

                </small>
                <small><i class="fas fa-user"></i>
                    <?php echo e($post->user->name); ?>

                </small>
            </div>
            <hr>
            <div class="mb-2">
                <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('blog.posts.category', ['slug' => $category->slug])); ?>"
                        class="btn btn-sm btn-outline-primary">
                        <?php echo e($category->title); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Post Content:start -->
            <div class="text-gray-800">
                <?php echo $post->content; ?>

            </div>
            <!-- Post Content:end -->
            <hr class="mt-5">
            <div id="disqus_thread"></div>
        </div>

        <!-- Sidebar Widgets Column:start -->
        <div class="col-md-4">
            <!-- Categories Widget -->
            <div class="card bg-white shadow-sm mb-3">
                <h5 class="card-header bg-white text-gray-800">
                    <?php echo e(trans('blog.widget.categories')); ?>

                </h5>
                <div class="card-body">
                    <!-- category list:start -->
                    <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('blog.posts.category', ['slug' => $category->slug])); ?>"
                            class="btn btn-sm btn-outline-primary">
                            <?php echo e($category->title); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- category list:end -->
                </div>
            </div>

            <!-- Side Widget tags:start -->
            <div class="card bg-white shadow-sm mb-3">
                <h5 class="card-header bg-white text-gray-800">
                    <?php echo e(trans('blog.widget.tags')); ?>

                </h5>
                <div class="card-body">
                    <!-- tag list:start -->
                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('blog.posts.tag', ['slug' => $tag->slug])); ?>" class="btn btn-sm btn-secondary">
                            #<?php echo e($tag->title); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- tag list:end -->
                </div>
            </div>
            <!-- Side Widget tags:start -->

            <!-- Side Widget latest-post:start -->
            <div class="card bg-white shadow-sm mb-3">
                <h5 class="card-header bg-white text-gray-800">
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
        <!-- Sidebar Widgets Column:end -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.prism.prism', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/post-detail.blade.php ENDPATH**/ ?>