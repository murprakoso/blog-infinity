<?php $__env->startSection('title', trans('blog.title.search', ['keyword' => request()->get('keyword')])); ?>

<?php $__env->startSection('content'); ?>
    <!-- page title -->
    <h2 class="my-3">
        <?php echo e(trans('blog.title.search', ['keyword' => request()->get('keyword')])); ?>

    </h2>
    <!-- Breadcrumbs:start -->
    <?php echo e(Breadcrumbs::render('blog_search', request()->get('keyword'))); ?>

    <!-- Breadcrumbs:end -->

    <div class="row">
        <div class="col">
            <!-- Post list:start -->
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- thumbnail:start -->
                                <?php if(file_exists(public_path($post->thumbnail))): ?>
                                    <img class="card-img-top" src="<?php echo e(asset($post->thumbnail)); ?>"
                                        alt="<?php echo e($post->title); ?>">
                                <?php else: ?>
                                    <img class="img-fluid rounded" src="http://placehold.it/750x300"
                                        alt="<?php echo e($post->title); ?>">
                                <?php endif; ?>
                                <!-- thumbnail:end -->
                            </div>
                            <div class="col-lg-6">
                                <h2 class="card-title"><?php echo e($post->title); ?></h2>
                                <p class="card-text"><?php echo e($post->description); ?></p>
                                <a href="<?php echo e(route('blog.posts.detail', ['slug' => $post->slug])); ?>"
                                    class="btn btn-primary">
                                    <?php echo e(trans('blog.button.read_more.value')); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <!-- empty -->
                <h3 class="text-center">
                    <?php echo e(trans('blog.no_data.search_posts')); ?>

                </h3>
                <!-- Post list:end -->
            <?php endif; ?>
        </div>
    </div>

    <!-- pagination:start -->
    <?php if($posts->hasPages()): ?>
        <div class="row">
            <div class="col">
                <?php echo e($posts->links('vendor.pagination.bootstrap-4')); ?>

            </div>
        </div>
    <?php endif; ?>
    <!-- pagination:end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/search-post.blade.php ENDPATH**/ ?>