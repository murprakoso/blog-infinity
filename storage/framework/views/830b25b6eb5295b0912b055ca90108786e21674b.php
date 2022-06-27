<?php $__env->startSection('title', trans('posts.title.index')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(Breadcrumbs::render('posts')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="GET" class="form-inline form-row">
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <label
                                            class="font-weight-bold mr-2"><?php echo e(trans('posts.form_control.select.status.label')); ?></label>
                                        <select name="status" class="custom-select">
                                            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value); ?>"
                                                    <?php echo e($statusSelected == $value ? 'selected' : null); ?>>
                                                    <?php echo e($label); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-light border border-left-0"
                                                type="submit"><?php echo e(trans('posts.button.apply.value')); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <input name="keyword" value="<?php echo e(request()->get('keyword')); ?>" type="search"
                                            class="form-control"
                                            placeholder="<?php echo e(trans('posts.form_control.input.search.placeholder')); ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-light border" type="submit">
                                                <i class="fas fa-sm fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('post_create')): ?>
                                <a href="<?php echo e(route('posts.create')); ?>"
                                    class="btn btn-light btn-icon-split shadow border float-right" role="button">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-fw fa-plus-square"></i>
                                    </span>
                                    <span class="text">
                                        <?php echo e(trans('posts.button.create.value')); ?>

                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list post -->
                        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <a href="<?php echo e(route('blog.posts.detail', ['slug' => $post->slug])); ?>" target="_blank">
                                        <h5 class="text-gray-800">
                                            <?php echo e($post->title); ?>

                                        </h5>
                                    </a>
                                    <p>
                                        <?php echo e($post->description); ?>

                                    </p>
                                    <p>
                                        <small class="mr-2">
                                            <i class="fas fa-user"></i>
                                            <?php echo e($post->user->name); ?>

                                        </small>
                                        <small>
                                            <i class="fas fa-calendar-alt"></i>
                                            <?php echo e(Helper::date_post($post->created_at)); ?>

                                        </small>
                                    </p>
                                    <div class="float-right">
                                        <!-- detail -->
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('post_detail')): ?>
                                            <a href="<?php echo e(route('posts.show', ['post' => $post])); ?>"
                                                class="btn btn-sm btn-light border" role="button">
                                                <i class="fas fa-sm fa-fw fa-eye text-gray-600"></i>
                                            </a>
                                        <?php endif; ?>
                                        <!-- edit -->
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('post_update')): ?>
                                            <a href="<?php echo e(route('posts.edit', ['post' => $post])); ?>"
                                                class="btn btn-sm btn-light border" role="button">
                                                <i class="fas fa-sm fa-fw fa-edit text-gray-600"></i>
                                            </a>
                                        <?php endif; ?>
                                        <!-- delete -->
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('post_delete')): ?>
                                            <form class="d-inline" role="alert"
                                                action="<?php echo e(route('posts.destroy', ['post' => $post])); ?>" method="POST"
                                                alert-title="<?php echo e(trans('posts.alert.delete.title')); ?>"
                                                alert-text="<?php echo e(trans('posts.alert.delete.message.confirm', ['title' => $post->title])); ?>"
                                                alert-btn-cancel="<?php echo e(trans('posts.button.cancel.value')); ?>"
                                                alert-btn-yes="<?php echo e(trans('posts.button.delete.value')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-sm fa-fw fa-trash"></i>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>
                                <strong>
                                    <?php if(request()->get('keyword')): ?>
                                        <?php echo e(trans('posts.label.no_data.search', ['keyword' => request()->get('keyword')])); ?>

                                    <?php else: ?>
                                        <?php echo e(trans('posts.label.no_data.fetch')); ?>

                                    <?php endif; ?>
                                </strong>
                            </p>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <?php if(!empty($posts)): ?>
                    <div class="card-footer">
                        <?php echo e($posts->links('vendor.pagination.bootstrap-4')); ?>

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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERKODINGAN\FunCode\infinity15\resources\views/posts/index.blade.php ENDPATH**/ ?>