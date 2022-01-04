<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(route('dashboard.index')); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laptop"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo e(config('app.name')); ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo e(Helper::set_active('dashboard.index')); ?>">
        <a class="nav-link" href="<?php echo e(route('dashboard.index')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>
                <?php echo e(trans('dashboard.link.dashboard')); ?>

            </span>
        </a>
    </li>

    <!-- Heading -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_posts', 'manage_categories', 'manage_tags'])): ?>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            <?php echo e(trans('dashboard.menu.master')); ?>

        </div>
    <?php endif; ?>

    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_posts')): ?>
        <li class="nav-item <?php echo e(Helper::set_active(['posts.index', 'posts.create', 'posts.show', 'posts.edit'])); ?>">
            <a class="nav-link" href="<?php echo e(url('dashboard/posts')); ?>">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>
                    <?php echo e(trans('dashboard.link.posts')); ?>

                </span>
            </a>
        </li>
    <?php endif; ?>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_categories')): ?>
        <li
            class="nav-item <?php echo e(Helper::set_active(['categories.index', 'categories.create', 'categories.edit', 'categories.show'])); ?>">
            <a class="nav-link" href="<?php echo e(url('dashboard/categories')); ?>">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>
                    <?php echo e(trans('dashboard.link.categories')); ?>

                </span>
            </a>
        </li>
    <?php endif; ?>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_tags')): ?>
        <li class="nav-item <?php echo e(Helper::set_active(['tags.index', 'tags.create', 'tags.edit'])); ?>">
            <a class="nav-link" href="<?php echo e(url('dashboard/tags')); ?>">
                <i class="fas fa-fw fa-tags"></i>
                <span>
                    <?php echo e(trans('dashboard.link.tags')); ?>

                </span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Heading -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_users', 'manage_roles'])): ?>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            <?php echo e(trans('dashboard.menu.user_permission')); ?>

        </div>
    <?php endif; ?>

    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_users')): ?>
        <li class="nav-item <?php echo e(Helper::set_active(['users.index', 'users.create', 'users.edit'])); ?>">
            <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>
                    <?php echo e(trans('dashboard.link.users')); ?>

                </span>
            </a>
        </li>
    <?php endif; ?>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_roles')): ?>
        <li class="nav-item <?php echo e(Helper::set_active(['roles.index', 'roles.show', 'roles.create', 'roles.edit'])); ?>">
            <a class="nav-link" href="<?php echo e(route('roles.index')); ?>">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>
                    <?php echo e(trans('dashboard.link.roles')); ?>

                </span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['manage_files'])): ?>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            <?php echo e(trans('dashboard.menu.setting')); ?>

        </div>
    <?php endif; ?>

    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_files')): ?>
        <li class="nav-item <?php echo e(Helper::set_active(['filemanager.index'])); ?>">
            <a class="nav-link" href="<?php echo e(route('filemanager.index')); ?>">
                <i class="fas fa-fw fa-folder"></i>
                <span>
                    <?php echo e(trans('dashboard.link.file_manager')); ?>

                </span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/layouts/_dashboard/_sidebar.blade.php ENDPATH**/ ?>