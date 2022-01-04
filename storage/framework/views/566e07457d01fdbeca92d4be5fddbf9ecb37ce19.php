<?php $__env->startSection('title', trans('blog.menu.categories')); ?>

<?php $__env->startSection('content'); ?>
    <!-- page title -->
    <h2 class="my-3">
        <?php echo e(trans('blog.menu.categories')); ?>

    </h2>

    <!-- Breadcrumbs:start -->
    <?php echo e(Breadcrumbs::render('blog_categories')); ?>

    <!-- Breadcrumbs:end -->

    <!-- List category -->
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <!-- true -->
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <!-- thumbnail:start -->
                    <?php if(file_exists(public_path($category->thumbnail))): ?>
                        <img class="card-img-top img-categories" src="<?php echo e(asset($category->thumbnail)); ?>"
                            alt="<?php echo e($category->title); ?>">
                    <?php else: ?>
                        <img class="card-img-top img-categories" src="<?php echo e(asset('vendor/my-blog/img/no_img.png')); ?>"
                            alt="<?php echo e($category->title); ?>">
                    <?php endif; ?>
                    <!-- thumbnail:end -->
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?php echo e(route('blog.posts.category', ['slug' => $category->slug])); ?>">
                                <?php echo e($category->title); ?>

                            </a>
                        </h5>
                        <p class="card-text">
                            <?php echo e($category->description); ?>

                        </p>
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
    <!-- List category -->

    <!-- pagination:start -->
    <?php if($categories->hasPages()): ?>
        <div class="row">
            <div class="col">
                <?php echo e($categories->links('vendor.pagination.bootstrap-4')); ?>

            </div>
        </div>
    <?php endif; ?>
    <!-- pagination:end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/categories.blade.php ENDPATH**/ ?>