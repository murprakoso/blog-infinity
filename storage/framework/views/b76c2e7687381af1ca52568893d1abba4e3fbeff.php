<?php $__env->startSection('title', trans('blog.title.category', ['title' => 'category title'])); ?>

<?php $__env->startSection('content'); ?>
    <!-- Title -->
    <h2 class="mt-4 mb-3">
        <?php echo e(trans('blog.title.category', ['title' => 'category title'])); ?>

    </h2>

    <!-- Breadcrumb:start -->
    <?php echo e(Breadcrumbs::render('blog_posts_category', $category->title)); ?>

    <!-- Breadcrumb:end -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Post list:start -->
            <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- tumbnail -->
                                <?php if(file_exists(public_path($post->thumbnail))): ?>
                                    <img class="card-img-top" src="<?php echo e(asset($post->thumbnail)); ?>"
                                        alt="<?php echo e($post->title); ?>">
                                <?php else: ?>
                                    <img class="img-fluid rounded" src="http://placehold.it/750x300"
                                        alt="<?php echo e($post->title); ?>">
                                <?php endif; ?>
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
                    <?php echo e(trans('blog.no_data.posts')); ?>

                </h3>
            <?php endif; ?>
            <!-- Post list:end -->
        </div>
        <div class="col-md-4">
            <!-- Categories list:start -->
            <div class="card mb-1">
                <h5 class="card-header">
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
        </div>
    </div>

    <?php if($posts->hasPages()): ?>
        <div class="row">
            <div class="col">
                <?php echo e($posts->links('vendor.pagination.bootstrap-4')); ?>

            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/posts-category.blade.php ENDPATH**/ ?>