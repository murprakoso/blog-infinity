<ul class="pl-1 my-1" style="list-style: none;">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="form-group form-check my-1">
            <?php if($categoryChecked && in_array($category->id, $categoryChecked)): ?>
                <input class="form-check-input" value="<?php echo e($category->id); ?>" type="checkbox" name="category[]"
                    id="category-check-<?php echo e($category->id); ?>" checked>
            <?php else: ?>
                <input class="form-check-input" value="<?php echo e($category->id); ?>" type="checkbox" name="category[]"
                    id="category-check-<?php echo e($category->id); ?>">
            <?php endif; ?>
            <label class="form-check-label" for="category-check-<?php echo e($category->id); ?>"><?php echo e($category->title); ?></label>
            <?php if($category->descendants): ?>
                <?php echo $__env->make('posts._category-list',[
                'categories' => $category->descendants,
                'categoryChecked' => $categoryChecked
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/posts/_category-list.blade.php ENDPATH**/ ?>