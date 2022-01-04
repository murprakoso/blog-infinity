<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white fixed-top shadow-nav">
    <div class="container">
        <a class="navbar-brand font-weight-bold text-gray-900" href="<?php echo e(route('blog.home')); ?>">
            <i class="fas fa-laptop"></i>
            <?php echo e(config('app.name')); ?>

        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse font-weight-bold" id="navbarResponsive">
            <!-- Search for post:end -->
            <ul class="navbar-nav ml-auto text-gray-900">
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

                <!-- nav-categories:tags -->
                <li class="nav-item">
                    <a class="nav-link" type="button" data-toggle="modal" data-target="#search-modal">
                        <i class="fas fa-search"></i>
                    </a>
                </li>
                <!-- nav-tags:end -->

                <!-- lang:start -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
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
                    <div class="dropdown-menu dropdown-menu-right shadow-nav border-0"
                        aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="<?php echo e(route('localization.switch', ['language' => 'id'])); ?>">
                            <i class="flag-icon flag-icon-id"></i> <?php echo e(trans('localization.id')); ?>

                        </a>
                        <a class="dropdown-item" href="<?php echo e(route('localization.switch', ['language' => 'en'])); ?>">
                            <i class="flag-icon flag-icon-gb"></i> <?php echo e(trans('localization.en')); ?>

                        </a>
                    </div>
                </li>
                <!-- lang:end -->

                <!-- Auth:start -->
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <?php echo e(auth()->user()->name); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow-nav border-0"
                            aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="<?php echo e(route('dashboard.index')); ?>">
                                <?php echo e(trans('blog.menu.dashboard')); ?>

                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <?php echo e(trans('blog.menu.logout')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <!-- csrf -->
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>
                <!-- Auth:end -->
            </ul>
        </div>
    </div>
</nav>



<div class="modal fade bd-example-modal-lg" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="searcModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 pb-0">
                <small><?php echo e(trans('blog.form_control.input.search.label')); ?></small>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body pt-0">
                <form class="input-group my-2" action="<?php echo e(route('blog.search')); ?>" method="GET">
                    <input name="keyword" value="<?php echo e(request()->get('keyword')); ?>" type="search"
                        class="form-control border-0 bg-light"
                        placeholder="<?php echo e(trans('blog.form_control.input.search.placeholder')); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="submit">
                            <i class="fas fa-search fa-fw text-gray-600"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/layouts/_blog/_navbar.blade.php ENDPATH**/ ?>