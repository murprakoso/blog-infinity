<ul>
    <?php $__currentLoopData = $categoryRoot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <?php if($category->slug == $item->slug): ?>
                <?php echo e($item->title); ?>

            <?php else: ?>
                <a href="<?php echo e(route('blog.posts.category', ['slug' => $item->slug])); ?>">
                    <?php echo e($item->title); ?>

                </a>
            <?php endif; ?>
            
            <?php if($item->descendants): ?>
                <?php echo $__env->make('blog.sub-categories',[
                'categoryRoot' => $item->descendants,
                'category' => $category
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/blog/sub-categories.blade.php ENDPATH**/ ?>