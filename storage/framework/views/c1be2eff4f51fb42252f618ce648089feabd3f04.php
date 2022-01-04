<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
    <meta name="author" content="<?php echo e(config('app.name')); ?>">
    <link rel="icon" href="<?php echo e(asset('vendor/fontawesome-free/svgs/solid/laptop.svg')); ?>">

    <title><?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?></title>

    
    <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    
    <link href="<?php echo e(asset('vendor/my-blog/css/blog.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('vendor/dashboard/css/scrollbar.css')); ?>" rel="stylesheet">
    
    <script src="<?php echo e(asset('vendor/fontawesome-free/js/all.min.js')); ?>"></script>
    
    <link rel="stylesheet" href="<?php echo e(asset('vendor/flag-icon-css/css/flag-icon.min.css')); ?>">
    
    <?php echo $__env->yieldPushContent('css-external'); ?>
    
    <?php echo $__env->yieldPushContent('css-internal'); ?>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation:start -->
    <?php echo $__env->make('layouts._blog._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Navigation:end -->

    <!-- Page Content -->
    <div class="container">
        <!-- content:start -->
        <?php echo $__env->yieldContent('content'); ?>
        <!-- content:end -->
    </div>
    <!-- /.container -->

    <!-- Footer:start -->
    <?php echo $__env->make('layouts._blog._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Footer:end -->

    
    <script src="<?php echo e(asset('vendor/jquery/jquery-3.6.0.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    
    <?php echo $__env->yieldPushContent('js-external'); ?>
    
    <?php echo $__env->yieldPushContent('js-internal'); ?>
</body>

</html>
<?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/layouts/blog.blade.php ENDPATH**/ ?>