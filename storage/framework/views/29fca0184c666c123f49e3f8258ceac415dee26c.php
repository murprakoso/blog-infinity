<?php $__env->startSection('title', trans('roles.title.index')); ?>

<?php $__env->startSection('breadcrumbs', Breadcrumbs::render('roles')); ?>

<?php $__env->startSection('content'); ?>
    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <form action="<?php echo e(route('roles.index')); ?>" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="<?php echo e(request()->get('keyword')); ?>" type="search"
                                        class="form-control"
                                        placeholder="<?php echo e(trans('roles.form_control.input.search.placeholder')); ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-light border border-left-0" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                                <a href="<?php echo e(route('roles.create')); ?>"
                                    class="btn btn-light btn-icon-split shadow border float-right" role="button">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-fw fa-plus-square"></i>
                                    </span>
                                    <span class="text">
                                        <?php echo e(trans('roles.button.create.value')); ?>

                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list role -->
                        <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                                <label class="mt-auto mb-auto">
                                    <?php echo e($role->name); ?>

                                </label>
                                <div>
                                    <!-- detail -->
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_detail')): ?>
                                        <a href="<?php echo e(route('roles.show', ['role' => $role])); ?>"
                                            class="btn btn-sm btn-light border" role="button">
                                            <i class="fas fa-eye fa-sm fa-fw"></i>
                                        </a>
                                    <?php endif; ?>
                                    <!-- edit -->
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_update')): ?>
                                        <a href="<?php echo e(route('roles.edit', ['role' => $role])); ?>"
                                            class="btn btn-sm btn-light border" role="button">
                                            <i class="fas fa-edit fa-sm fa-fw"></i>
                                        </a>
                                    <?php endif; ?>
                                    <!-- delete -->
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete')): ?>
                                        <form class="d-inline" role="alert"
                                            action="<?php echo e(route('roles.destroy', ['role' => $role])); ?>" method="POST"
                                            alert-title="<?php echo e(trans('roles.alert.delete.title')); ?>"
                                            alert-text="<?php echo e(trans('roles.alert.delete.message.confirm', ['name' => $role->name])); ?>"
                                            alert-btn-cancel="<?php echo e(trans('roles.button.cancel.value')); ?>"
                                            alert-btn-yes="<?php echo e(trans('roles.button.delete.value')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash fa-sm fa-fw"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>
                                <strong>
                                    <?php if(request()->get('keyword')): ?>
                                        <?php echo e(trans('roles.label.no_data.search', ['keyword' => request()->get('keyword')])); ?>

                                    <?php else: ?>
                                        <?php echo e(trans('roles.label.no_data.fetch')); ?>

                                    <?php endif; ?>
                                </strong>
                            </p>
                        <?php endif; ?>
                        <!-- list role -->
                    </ul>
                </div>
                <?php if($roles->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($roles->links('vendor.pagination.bootstrap-4')); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-internal'); ?>
    <script>
        $(function() {
            // Event:delete tag
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/roles/index.blade.php ENDPATH**/ ?>