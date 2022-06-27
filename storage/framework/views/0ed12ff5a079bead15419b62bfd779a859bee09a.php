<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top border-bottom">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET"
        action="">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" name="keyword" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-light" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Language -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-globe fa-fw"></i>
                <!-- Counter - Language -->
                <?php switch(app()->getLocale()):
                    case ('id'): ?>
                        <span class="badge badge-info badge-counter"> <?php echo e(strtoupper(app()->getLocale())); ?></span>
                    <?php break; ?>

                    <?php case ('en'): ?>
                        <span class="badge badge-info badge-counter"> <?php echo e(strtoupper(app()->getLocale())); ?></span>
                    <?php break; ?>
                <?php endswitch; ?>
            </a>
            <!-- Dropdown - Language -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="<?php echo e(route('localization.switch', ['language' => 'id'])); ?>">
                    <i class="flag-icon flag-icon-id mr-2"></i>
                    <?php echo e(trans('localization.id')); ?>

                </a>
                <a class="dropdown-item" href="<?php echo e(route('localization.switch', ['language' => 'en'])); ?>">
                    <i class="flag-icon flag-icon-gb mr-2"></i>
                    <?php echo e(trans('localization.en')); ?>

                </a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(auth()->user()->name); ?></span>
                <img class="img-profile rounded-circle" src="<?php echo e(asset('vendor/dashboard/img/users.png')); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo e(route('profile.index')); ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<?php /**PATH D:\PERKODINGAN\FunCode\infinity15\resources\views/layouts/_dashboard/_navbar.blade.php ENDPATH**/ ?>