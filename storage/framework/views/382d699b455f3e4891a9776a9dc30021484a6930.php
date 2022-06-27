<?php $__env->startSection('title', trans('dashboard.title.index')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(Breadcrumbs::render('dashboard_home')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            

            <div class="jumbotron">
                
                <h2><?php echo e(trans('dashboard.greeting.welcome', ['name' => auth()->user()->name])); ?></h2>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                    to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERKODINGAN\FunCode\infinity15\resources\views/dashboard/index.blade.php ENDPATH**/ ?>