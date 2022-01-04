<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('blog.home')); ?>"><?php echo e(config('app.name')); ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <!-- Search for post:start -->
            <form class="input-group my-1" action="<?php echo e(route('blog.search')); ?>" method="GET">
                <input name="keyword" value="<?php echo e(request()->get('keyword')); ?>" type="search" class="form-control"
                    placeholder="<?php echo e(trans('blog.form_control.input.search.placeholder')); ?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <!-- Search for post:end -->
            <ul class="navbar-nav ml-auto">
                <!-- nav-home:start -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('blog.home')); ?>">
                        <?php echo e(trans('blog.menu.home')); ?>

                    </a>
                </li>
                <!-- nav-home:end -->
                <!-- nav-categories:start -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('blog.categories')); ?>">
                        <?php echo e(trans('blog.menu.categories')); ?>

                    </a>
                </li>
                <!-- nav-categories:tags -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('blog.tags')); ?>">
                        <?php echo e(trans('blog.menu.tags')); ?>

                    </a>
                </li>
                <!-- nav-tags:end -->
                <!-- Auth:start -->
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <?php echo e(auth()->user()->name); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="">
                                <?php echo e(trans('blog.menu.dashboard')); ?>

                            </a>
                            <a class="dropdown-item" href=""
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <?php echo e(trans('blog.menu.logout')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <!-- csrf -->
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                    <!-- Auth:else -->
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">
                            <?php echo e(trans('blog.menu.login')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <!-- Auth:end -->
                <!-- lang:start -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <?php switch(app()->getLocale()):
                            case ('id'): ?>
                                <i class="flag-icon flag-icon-id"></i>
                            <?php break; ?>
                            <?php case ('en'): ?>
                                <i class="flag-icon flag-icon-gb"></i>
                            <?php break; ?>
                        <?php endswitch; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="<?php echo e(route('localization.switch', ['language' => 'id'])); ?>">
                            <?php echo e(trans('localization.id')); ?>

                        </a>
                        <a class="dropdown-item" href="<?php echo e(route('localization.switch', ['language' => 'en'])); ?>">
                            <?php echo e(trans('localization.en')); ?>

                        </a>
                    </div>
                </li>
                <!-- lang:end -->
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/layouts/_blog/_navbar.blade.php ENDPATH**/ ?>