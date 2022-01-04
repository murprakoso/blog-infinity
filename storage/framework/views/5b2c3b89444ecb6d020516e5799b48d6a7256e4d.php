<?php $__env->startSection('title', trans('categories.title.index')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(Breadcrumbs::render('categories')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo e(route('categories.index')); ?>" method="GET">
                                <div class="input-group">
                                    <input name="keyword" type="search" class="form-control"
                                        value="<?php echo e(request()->get('keyword')); ?>"
                                        placeholder="<?php echo e(trans('categories.form_control.input.search.placeholder')); ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-light border border-left-0" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_create')): ?>
                                <a href="<?php echo e(route('categories.create')); ?>"
                                    class="btn btn-light btn-icon-split shadow border float-right" role="button">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-fw fa-plus-square"></i>
                                    </span>
                                    <span class="text">
                                        <?php echo e(trans('categories.button.create.value')); ?>

                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php if(count($categories)): ?>
                            <!-- list category -->
                            <?php echo $__env->make('categories._category-list',[
                            'categories' => $categories,
                            'count' => 0
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <p><strong>
                                    <?php if(request()->get('keyword')): ?>
                                        <?php echo e(trans('categories.label.no_data.search', ['keyword' => request()->get('keyword')])); ?>

                                    <?php else: ?>
                                        <?php echo e(trans('categories.label.no_data.fetch')); ?>

                                    <?php endif; ?>
                                </strong></p>
                        <?php endif; ?>
                    </ul>
                </div>
                <?php if(!empty($categories)): ?>
                    <div class="card-footer">
                        <?php echo e($categories->links('vendor.pagination.bootstrap-4')); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-internal'); ?>
    <script>
        $(document).ready(function() {
            $("form[role='alert']").submit(function(e) {
                e.preventDefault();
                swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                }).then((result) => {
                    if (result.isConfirmed) {
                        // todo: process of deleting categories
                        e.target.submit();
                    }
                });
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/categories/index.blade.php ENDPATH**/ ?>