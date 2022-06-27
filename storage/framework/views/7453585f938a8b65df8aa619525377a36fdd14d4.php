<?php $__env->startSection('title', trans('users.title.index')); ?>

<?php $__env->startSection('breadcrumbs', Breadcrumbs::render('users')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="<?php echo e(request()->get('keyword')); ?>" type="search"
                                        class="form-control"
                                        placeholder="<?php echo e(trans('users.form_control.input.search.placeholder')); ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-light border border-left-0" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_create')): ?>
                                <a href="<?php echo e(route('users.create')); ?>"
                                    class="btn btn-light btn-icon-split shadow border float-right" role="button">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-fw fa-plus-square"></i>
                                    </span>
                                    <span class="text">
                                        <?php echo e(trans('users.button.create.value')); ?>

                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- list users -->
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="card my-1">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2 mr-1">
                                                <i class="fas fa-id-badge fa-5x"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('users.label.name')); ?>

                                                        </th>
                                                        <td>:</td>
                                                        <td>
                                                            
                                                            <?php echo e($user->name); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('users.label.email')); ?>

                                                        </th>
                                                        <td>:</td>
                                                        <td>
                                                            
                                                            <?php echo e($user->email); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('users.label.role')); ?>

                                                        </th>
                                                        <td>:</td>
                                                        <td>
                                                            
                                                            <?php echo e($user->roles->first()->name); ?>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <!-- edit -->
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_update')): ?>
                                                <a href="<?php echo e(route('users.edit', ['user' => $user])); ?>"
                                                    class="btn btn-sm btn-light border shadow-sm" role="button">
                                                    <i class="fas fa-sm fa-fw fa-edit"></i>
                                                </a>
                                            <?php endif; ?>
                                            <!-- delete -->
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_delete')): ?>
                                                <form action="<?php echo e(route('users.destroy', ['user' => $user])); ?>" method="POST"
                                                    role="alert" class="d-inline"
                                                    alert-title="<?php echo e(trans('users.alert.delete.title')); ?>"
                                                    alert-text="<?php echo e(trans('users.alert.delete.message.confirm', ['name' => $user->name])); ?>"
                                                    alert-btn-cancel="<?php echo e(trans('users.button.cancel.value')); ?>"
                                                    alert-btn-yes="<?php echo e(trans('users.button.delete.value')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm">
                                                        <i class="fas fa-trash fa-sm fa-fw"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p><strong>
                                    <?php if(request()->get('keyword')): ?>
                                        <?php echo e(trans('users.label.no_data.search', ['keyword' => request()->get('keyword')])); ?>

                                    <?php else: ?>
                                        <?php echo e(trans('users.label.no_data.fetch')); ?>

                                    <?php endif; ?>
                                </strong></p>
                        <?php endif; ?>
                        <!-- list users -->
                    </div>
                </div>
                <!-- Todo:paginate -->
                <?php if($users->hasPages()): ?>
                    <div class="card-footer">
                        <?php echo e($users->links('vendor.pagination.bootstrap-4')); ?>

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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERKODINGAN\FunCode\infinity15\resources\views/users/index.blade.php ENDPATH**/ ?>