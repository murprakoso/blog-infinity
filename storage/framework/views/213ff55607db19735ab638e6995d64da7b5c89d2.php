<?php $__env->startSection('title', trans('categories.title.edit')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(Breadcrumbs::render('edit_category_title', $category)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    <form action="<?php echo e(route('categories.update', ['category' => $category])); ?>" method="POST">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <!-- title -->
                        <div class="form-group">
                            <label for="input_category_title" class="font-weight-bold">
                                <?php echo e(trans('categories.form_control.input.title.label')); ?>

                            </label>
                            <input id="input_category_title" value="<?php echo e(old('title', $category->title)); ?>" name="title"
                                type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                placeholder="<?php echo e(trans('categories.form_control.input.title.placeholder')); ?>" />
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
                            <label for="input_category_slug" class="font-weight-bold">
                                <?php echo e(trans('categories.form_control.input.slug.label')); ?>

                            </label>
                            <input id="input_category_slug" value="<?php echo e(old('slug', $category->slug)); ?>" name="slug"
                                type="text" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly
                                placeholder="<?php echo e(trans('categories.form_control.input.slug.placeholder')); ?>" />
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
                        <!-- thumbnail -->
                        <div class="form-group">
                            <label for="input_category_thumbnail" class="font-weight-bold">
                                <?php echo e(trans('categories.form_control.input.thumbnail.label')); ?>

                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button id="button_category_thumbnail" data-input="input_category_thumbnail"
                                        data-preview="holder" class="btn btn-primary" type="button">
                                        <?php echo e(trans('categories.button.browse.value')); ?>

                                    </button>
                                </div>
                                <input id="input_category_thumbnail" name="thumbnail"
                                    value="<?php echo e(old('thumbnail', asset($category->thumbnail))); ?>" type="text"
                                    class="form-control <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly
                                    placeholder="<?php echo e(trans('categories.form_control.input.thumbnail.placeholder')); ?>" />
                                <?php $__errorArgs = ['thumbnail'];
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
                        </div>
                        
                        <div id="holder"></div>
                        <!-- parent_category -->
                        <div class="form-group">
                            <label for="select_category_parent" class="font-weight-bold">
                                <?php echo e(trans('categories.form_control.select.parent_category.label')); ?>

                            </label>
                            <select id="select_category_parent" name="parent_category"
                                data-placeholder="<?php echo e(trans('categories.form_control.select.parent_category.placeholder')); ?>"
                                class="custom-select w-100">
                                <?php if(old('parent_category', $category->parent)): ?>
                                    <option value="<?php echo e(old('parent_category', $category->parent)->id); ?>" selected>
                                        <?php echo e(old('parent_category', $category->parent)->title); ?>

                                    </option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <!-- description -->
                        <div class="form-group">
                            <label for="input_category_description" class="font-weight-bold">
                                <?php echo e(trans('categories.form_control.textarea.description.label')); ?>

                            </label>
                            <textarea id="input_category_description" name="description"
                                class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" rows="3"
                                placeholder="<?php echo e(trans('categories.form_control.textarea.description.placeholder')); ?>"><?php echo e(old('description', $category->description)); ?></textarea>
                            <?php $__errorArgs = ['description'];
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
                            <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-light btn-icon-split shadow border"
                                role="button">
                                <span class="icon text-gray-600">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    <?php echo e(trans('categories.button.back.value')); ?>

                                </span>
                            </a>

                            <button type="submit" class="btn btn-primary btn-icon-split shadow border">
                                <span class="icon">
                                    <i class="fas fa-fw fa-save"></i>
                                </span>
                                <span class="text">
                                    <?php echo e(trans('categories.button.save.value')); ?>

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
    <script src="<?php echo e(asset('vendor/laravel-filemanager/js/stand-alone-button.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js-internal'); ?>
    <script>
        $(function() {
            // gnerate slug
            function generateSlug(value) {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "");
            }

            // parent category
            $('#select_category_parent').select2({
                theme: 'bootstrap4',
                language: "<?php echo e(app()->getLocale()); ?>",
                allowClear: true,
                ajax: {
                    url: "<?php echo e(route('categories.select')); ?>",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

            // event:input title
            $('#input_category_title').change(function() {
                let title = $(this).val();
                let parent_category = $('#select_category_parent').val() ?? "";
                $('#input_category_slug').val(generateSlug(title + '-' + parent_category))
            })

            // event:select parent category
            $('#select_category_parent').change(function() {
                let title = $('#input_category_title').val();
                let parent_category = $(this).val() ?? "";
                $('#input_category_slug').val(generateSlug(title + '-' + parent_category))
            })

            // event:thumbnail
            $('#button_category_thumbnail').filemanager('image');
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERKODINGAN\FunCode\infinity15\resources\views/categories/edit.blade.php ENDPATH**/ ?>