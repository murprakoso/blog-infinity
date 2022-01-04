<?php $__env->startSection('title', trans('roles.title.edit')); ?>

<?php $__env->startSection('breadcrumbs', Breadcrumbs::render('edit_role', $role)); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="<?php echo e(route('roles.update', ['role' => $role])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input_role_name" class="font-weight-bold">
                                <?php echo e(trans('roles.form_control.input.name.label')); ?>

                            </label>
                            <input id="input_role_name" value="<?php echo e(old('name', $role->name)); ?>" name="name" type="text"
                                class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <!-- permission -->
                        <div class="form-group">
                            <label for="input_role_permission" class="font-weight-bold">
                                <?php echo e(trans('roles.form_control.input.permission.label')); ?>

                            </label>
                            <div class="form-control overflow-auto h-100 <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="input_role_permission">
                                <div class="row">
                                    <!-- list manage name:start -->
                                    <?php $__currentLoopData = $authorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manageName => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <ul class="list-group mx-1 mb-3">
                                            <li class="list-group-item bg-dark text-white">
                                                <?php echo e(trans("permissions.{$manageName}")); ?>

                                            </li>
                                            <!-- list permission:start -->
                                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        
                                                        <?php if(old('permissions', $permissionChecked)): ?>
                                                            <input id="<?php echo e($permission); ?>" name="permissions[]"
                                                                class="form-check-input" type="checkbox"
                                                                value="<?php echo e($permission); ?>"
                                                                <?php echo e(in_array($permission, old('permissions', $permissionChecked)) ? 'checked' : null); ?>>
                                                        <?php else: ?>
                                                            <input id="<?php echo e($permission); ?>" name="permissions[]"
                                                                class="form-check-input" type="checkbox"
                                                                value="<?php echo e($permission); ?>">
                                                        <?php endif; ?>
                                                        <label for="<?php echo e($permission); ?>" class="form-check-label">
                                                            <?php echo e(trans("permissions.{$permission}")); ?>

                                                        </label>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <!-- list permission:end -->
                                        </ul>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- list manage name:end  -->
                                </div>
                            </div>
                            <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="float-right mb-4">
                            <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-light btn-icon-split shadow border"
                                role="button">
                                <span class="icon text-gray-600">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    <?php echo e(trans('roles.button.back.value')); ?>

                                </span>
                            </a>
                            <button type="submit" class="btn btn-primary btn-icon-split shadow border">
                                <span class="icon">
                                    <i class="fas fa-fw fa-save"></i>
                                </span>
                                <span class="text">
                                    <?php echo e(trans('roles.button.edit.value')); ?>

                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/roles/edit.blade.php ENDPATH**/ ?>