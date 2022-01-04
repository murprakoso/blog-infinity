<?php $__env->startSection('title', trans('users.title.edit')); ?>

<?php $__env->startSection('breadcrumbs', Breadcrumbs::render('edit_user', $user)); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('users.update', ['user' => $user])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <!-- name -->
                        <div class="form-group">
                            <label for="input_user_name" class="font-weight-bold">
                                <?php echo e(trans('users.form_control.input.name.label')); ?>

                            </label>
                            <input id="input_user_name" value="<?php echo e($user->name); ?>" name="name" type="text"
                                class="form-control" readonly />
                            <!-- error message -->
                        </div>
                        <!-- email -->
                        <div class="form-group">
                            <label for="input_user_email" class="font-weight-bold">
                                <?php echo e(trans('users.form_control.input.email.label')); ?>

                            </label>
                            <input id="input_user_email" value="<?php echo e($user->email); ?>" name="email" type="email"
                                class="form-control" autocomplete="email" readonly />
                            <!-- error message -->
                        </div>
                        <!-- role -->
                        <div class="form-group">
                            <label for="select_user_role" class="font-weight-bold">
                                <?php echo e(trans('users.form_control.select.role.label')); ?>

                            </label>
                            <select id="select_user_role" name="role"
                                data-placeholder="<?php echo e(trans('users.form_control.select.role.placeholder')); ?>"
                                class="custom-select w-100 <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php if(old('role', $roleSelected)): ?>
                                    <option value="<?php echo e(old('role', $roleSelected)->id); ?>" selected>
                                        <?php echo e(old('role', $roleSelected)->name); ?>

                                    </option>
                                <?php endif; ?>
                            </select>
                            <!-- error message -->
                            <?php $__errorArgs = ['role'];
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
                        <div class="float-right">
                            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-light btn-icon-split shadow border"
                                role="button">
                                <span class="icon text-gray-600">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    <?php echo e(trans('users.button.back.value')); ?>

                                </span>
                            </a>
                            <button type="submit" class="btn btn-primary btn-icon-split shadow border">
                                <span class="icon">
                                    <i class="fas fa-fw fa-save"></i>
                                </span>
                                <span class="text">
                                    <?php echo e(trans('users.button.edit.value')); ?>

                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-external'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/select2/css/select2-bootstrap4.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js-external'); ?>
    <script src="<?php echo e(asset('vendor/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js-internal'); ?>
    <script>
        $(function() {
            // parent category
            $('#select_user_role').select2({
                theme: 'bootstrap4',
                language: "<?php echo e(app()->getLocale()); ?>",
                allowClear: true,
                ajax: {
                    url: "<?php echo e(route('roles.select')); ?>",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/users/edit.blade.php ENDPATH**/ ?>