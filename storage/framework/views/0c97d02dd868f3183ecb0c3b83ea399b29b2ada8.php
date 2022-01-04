<?php $__env->startSection('title', trans('roles.title.index')); ?>

<?php $__env->startSection('breadcrumbs', Breadcrumbs::render('detail_role', $role)); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="input_role_name" class="font-weight-bold">
                            <?php echo e(trans('roles.form_control.input.name.label')); ?>

                        </label>
                        <input id="input_role_name" value="<?php echo e($role->name); ?>" name="name" type="text"
                            class="form-control" readonly />
                    </div>
                    <!-- permission -->
                    <div class="form-group">
                        <label for="input_role_permission" class="font-weight-bold">
                            <?php echo e(trans('roles.form_control.input.permission.label')); ?>

                        </label>
                        <div class="form-control overflow-auto h-100">
                            <div class="row">
                                <!-- list manage name:start -->
                                <?php $__empty_1 = true; $__currentLoopData = $authorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manageName => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <ul class="list-group mx-1 mb-3">
                                        <li class="list-group-item bg-dark text-white">
                                            <?php echo e(trans("permissions.{$manageName}")); ?>

                                        </li>
                                        <!-- list permission:start -->
                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        onclick="return false;"
                                                        <?php echo e(in_array($permission, $rolePermissions) ? 'checked' : null); ?>>
                                                    <label class="form-check-label">
                                                        <?php echo e(trans("permissions.{$permission}")); ?>

                                                    </label>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!-- list permission:end -->
                                    </ul>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p><strong><?php echo e(trans('roles.label.no_data.fetch')); ?></strong></p>
                                <?php endif; ?>
                                <!-- list manage name:end  -->
                            </div>
                        </div>
                    </div>
                    <!-- button  -->
                    <div class="d-flex justify-content-end">
                        <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-light btn-icon-split shadow border"
                            role="button">
                            <span class="icon text-gray-600">
                                <i class="fas fa-fw fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                <?php echo e(trans('roles.button.back.value')); ?>

                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/roles/detail.blade.php ENDPATH**/ ?>