<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-laptop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Helper::set_active('dashboard.index') }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>
                {{ trans('dashboard.link.dashboard') }}
            </span>
        </a>
    </li>

    <!-- Heading -->
    @canany(['manage_posts', 'manage_categories', 'manage_tags'])
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            {{ trans('dashboard.menu.master') }}
        </div>
    @endcanany

    {{-- Menu:post --}}
    @can('manage_posts')
        <li class="nav-item {{ Helper::set_active(['posts.index', 'posts.create', 'posts.show', 'posts.edit']) }}">
            <a class="nav-link" href="{{ url('dashboard/posts') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>
                    {{ trans('dashboard.link.posts') }}
                </span>
            </a>
        </li>
    @endcan
    {{-- Menu:categories --}}
    @can('manage_categories')
        <li
            class="nav-item {{ Helper::set_active(['categories.index', 'categories.create', 'categories.edit', 'categories.show']) }}">
            <a class="nav-link" href="{{ url('dashboard/categories') }}">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>
                    {{ trans('dashboard.link.categories') }}
                </span>
            </a>
        </li>
    @endcan
    {{-- Menu:tags --}}
    @can('manage_tags')
        <li class="nav-item {{ Helper::set_active(['tags.index', 'tags.create', 'tags.edit']) }}">
            <a class="nav-link" href="{{ url('dashboard/tags') }}">
                <i class="fas fa-fw fa-tags"></i>
                <span>
                    {{ trans('dashboard.link.tags') }}
                </span>
            </a>
        </li>
    @endcan

    <!-- Heading -->
    @canany(['manage_users', 'manage_roles'])
        <!-- Divider -->
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            {{ trans('dashboard.menu.user_permission') }}
        </div>
    @endcanany

    {{-- Menu:users --}}
    @can('manage_users')
        <li class="nav-item {{ Helper::set_active(['users.index', 'users.create', 'users.edit']) }}">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>
                    {{ trans('dashboard.link.users') }}
                </span>
            </a>
        </li>
    @endcan
    {{-- Menu:roles --}}
    @can('manage_roles')
        <li class="nav-item {{ Helper::set_active(['roles.index', 'roles.show', 'roles.create', 'roles.edit']) }}">
            <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>
                    {{ trans('dashboard.link.roles') }}
                </span>
            </a>
        </li>
    @endcan

    @canany(['manage_files'])
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            {{ trans('dashboard.menu.setting') }}
        </div>
    @endcanany

    {{-- Menu:file manager --}}
    @can('manage_files')
        <li class="nav-item {{ Helper::set_active(['filemanager.index']) }}">
            <a class="nav-link" href="{{ route('filemanager.index') }}">
                <i class="fas fa-fw fa-folder"></i>
                <span>
                    {{ trans('dashboard.link.file_manager') }}
                </span>
            </a>
        </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
