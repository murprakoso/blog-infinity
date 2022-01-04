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
    <div class="row">
        <!-- Post Content Column:start -->
        <div class="col-lg-8">
            <!-- thumbnail:start -->
            <?php if(file_exists(public_path($post->thumbnail))): ?>
                <img class="card-img-top" src="<?php echo e(asset($post->thumbnail)); ?>" alt="<?php echo e($post->title); ?>">
            <?php else: ?>
                <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="<?php echo e($post->title); ?>">
            <?php endif; ?>
            <!-- thumbnail:end -->
            <hr>
            <!-- Post Content:start -->
            <div>
                <?php echo $post->content; ?>

            </div>
            <!-- Post Content:end -->
            <hr class="mt-5">
            <div id="disqus_thread"></div>
        </div>

        <!-- Sidebar Widgets Column:start -->
        <div class="col-md-4">
            <!-- Categories Widget -->
            <div class="card mb-3">
                <h5 class="card-header">
                    <?php echo e(trans('blog.widget.categories')); ?>

                </h5>
                <div class="card-body">
                    <!-- category list:start -->
                    <?php $__currentLoopData = $post->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('blog.posts.category', ['slug' => $category->slug])); ?>"
                            class="badge badge-primary py-2 px-4 my-1">
                            <?php echo e($category->title); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- category list:end -->
                </div>
            </div>

            <!-- Side Widget tags:start -->
            <div class="card mb-3">
                <h5 class="card-header">
                    <?php echo e(trans('blog.widget.tags')); ?>

                </h5>
                <div class="card-body">
                    <!-- tag list:start -->
                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('blog.posts.tag', ['slug' => $tag->slug])); ?>"
                            class="badge badge-info py-2 px-4 my-1">
                            #<?php echo e($tag->title); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- tag list:end -->
                </div>
            </div>
            <!-- Side Widget tags:start -->
        </div>
        <!-- Sidebar Widgets Column:end -->
    </div>
<?php $__env->stopSection(); ?>

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

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/post-detail.blade.php ENDPATH**/ ?>