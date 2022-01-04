<!-- category list -->
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
        <label class="mt-auto mb-auto">
            <!-- todo: show category title -->
            <?php echo e(str_repeat('-', $count) . ' ' . $category->title); ?>

        </label>
        <div class="mr-1">
            <!-- detail -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_detail')): ?>
                <a href="<?php echo e(route('categories.show', ['category' => $category])); ?>" class="btn btn-sm btn-light border"
                    role="button">
                    <i class="fas fa-sm fa-eye text-gray-600"></i>
                </a>
            <?php endif; ?>
            <!-- edit -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_update')): ?>
                <a href="<?php echo e(route('categories.edit', ['category' => $category])); ?>" class="btn btn-sm btn-light border"
                    role="button">
                    <i class="fas fa-sm fa-edit text-gray-600"></i>
                </a>
            <?php endif; ?>
            <!-- delete -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_delete')): ?>
                <form class="d-inline" action="<?php echo e(route('categories.destroy', ['category' => $category])); ?>"
                    role="alert" method="POST" alert-title="<?php echo e(trans('categories.alert.delete.title')); ?>"
                    alert-text="<?php echo e(trans('categories.alert.delete.message.confirm', ['title' => $category->title])); ?>"
                    alert-btn-cancel="<?php echo e(trans('categories.button.cancel.value')); ?>"
                    alert-btn-yes="<?php echo e(trans('categories.button.delete.value')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-sm fa-trash"></i>
                    </button>
                </form>
            <?php endif; ?>
        </div>
        <!-- todo:show subcategory -->
        <?php if($category->descendants() && !trim(request()->get('keyword'))): ?>
            <?php echo $__env->make('categories._category-list', [
            'categories' => $category->descendants,
            'count' => $count + 2
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- end  category list -->
<?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/categories/_category-list.blade.php ENDPATH**/ ?>