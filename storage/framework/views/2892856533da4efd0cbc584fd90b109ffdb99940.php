<?php $__env->startSection('title', trans('tags.title.edit')); ?>

<?php $__env->startSection('breadcrumbs', Breadcrumbs::render('edit_tag', $tag)); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('tags.update', ['tag' => $tag])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <!-- title -->
                        <div class="form-group">
                            <label for="input_tag_title" class="font-weight-bold">
                                <?php echo e(trans('tags.form_control.input.title.label')); ?>

                            </label>
                            <input id="input_tag_title" value="<?php echo e(old('title', $tag->title)); ?>" name="title" type="text"
                                class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="<?php echo e(trans('tags.form_control.input.title.placeholder')); ?>" />
                            <?php $__errorArgs = ['title'];
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
                        <!-- slug -->
                        <div class="form-group">
                            <label for="input_tag_slug" class="font-weight-bold">
                                <?php echo e(trans('tags.form_control.input.slug.label')); ?>

                            </label>
                            <input id="input_tag_slug" value="<?php echo e(old('slug', $tag->slug)); ?>" name="slug" type="text"
                                class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="<?php echo e(trans('tags.form_control.input.slug.placeholder')); ?>" readonly />
                            <?php $__errorArgs = ['slug'];
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
                            <a href="<?php echo e(route('tags.index')); ?>" class="btn btn-light btn-icon-split shadow border"
                                role="button">
                                <span class="icon text-gray-600">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    <?php echo e(trans('tags.button.back.value')); ?>

                                </span>
                            </a>
                            <button type="submit" class="btn btn-primary btn-icon-split shadow border">
                                <span class="icon">
                                    <i class="fas fa-fw fa-save"></i>
                                </span>
                                <span class="text">
                                    <?php echo e(trans('tags.button.edit.value')); ?>

                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js-internal'); ?>
    <script>
        $(function() {
            const generateSlug = (value) => {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "");
            }

            // Event:slug
            $('#input_tag_title').change(function(e) {
                $('#input_tag_slug').val(generateSlug(e.target.value))
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/tags/edit.blade.php ENDPATH**/ ?>