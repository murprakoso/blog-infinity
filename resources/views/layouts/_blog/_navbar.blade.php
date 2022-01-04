<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white fixed-top shadow-nav">
    <div class="container">
        <a class="navbar-brand font-weight-bold text-gray-900" href="{{ route('home') }}">
            <i class="fas fa-laptop"></i>
            {{ config('app.name') }}
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
                    <a class="nav-link" href="{{ route('blog.home') }}">
                        {{ trans('blog.menu.posts') }}
                    </a>
                </li>
                <!-- nav-home:end -->
                <!-- nav-categories:start -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.categories') }}">
                        {{ trans('blog.menu.categories') }}
                    </a>
                </li>
                <!-- nav-categories:tags -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.tags') }}">
                        {{ trans('blog.menu.tags') }}
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
                        @switch(app()->getLocale())
                            @case('id')
                                <i class="flag-icon flag-icon-id"></i>
                            @break
                            @case('en')
                                <i class="flag-icon flag-icon-gb"></i>
                            @break
                        @endswitch
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow-nav border-0"
                        aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="{{ route('localization.switch', ['language' => 'id']) }}">
                            <i class="flag-icon flag-icon-id"></i> {{ trans('localization.id') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('localization.switch', ['language' => 'en']) }}">
                            <i class="flag-icon flag-icon-gb"></i> {{ trans('localization.en') }}
                        </a>
                    </div>
                </li>
                <!-- lang:end -->

                <!-- Auth:start -->
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow-nav border-0"
                            aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="{{ route('dashboard.index') }}">
                                {{ trans('blog.menu.dashboard') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ trans('blog.menu.logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                <!-- csrf -->
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
                <!-- Auth:end -->
            </ul>
        </div>
    </div>
</nav>


{{-- Modal:search --}}
<div class="modal fade bd-example-modal-lg" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="searcModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 pb-0">
                <small>{{ trans('blog.form_control.input.search.label') }}</small>
                <a type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body pt-0">
                <form class="input-group my-2" action="{{ route('blog.search') }}" method="GET">
                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                        class="form-control border-0 bg-light"
                        placeholder="{{ trans('blog.form_control.input.search.placeholder') }}">
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
