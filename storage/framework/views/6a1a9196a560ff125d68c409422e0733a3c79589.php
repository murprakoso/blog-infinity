<?php $__env->startSection('title', trans('blog.title.tags')); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="my-3">
        <?php echo e(trans('blog.title.tags')); ?>

    </h2>
    <!-- Breadcrumb:start -->
    <?php echo e(Breadcrumbs::render('blog_tags')); ?>

    <!-- Breadcrumb:end -->

    <!-- List tag -->
    <div class="row">
        <div class="col">
            <?php $__empty_1 = true; $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('blog.posts.tag', ['slug' => $tag->slug])); ?>"
                    class="btn btn-light btn-sm mr-2 shadow-sm text-gray-800">#<?php echo e($tag->title); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <h3 class="text-center">
                    <?php echo e(trans('blog.no_data.tags')); ?>

                </h3>
            <?php endif; ?>
        </div>
    </div>
    <!-- List tag -->

    <!-- pagination:start -->
    <?php if($tags->hasPages()): ?>
        <div class="row mb-5">
            <div class="col">
                <?php echo e($tags->links('vendor.pagination.bootstrap-4')); ?>

            </div>
        </div>
    <?php endif; ?>
    <!-- pagination:end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/tags.blade.php ENDPATH**/ ?>