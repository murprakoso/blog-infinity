@extends('layouts.blog')

@section('title', trans('blog.menu.categories'))

@section('content')
    <!-- page title -->
    <h2 class="my-3">
        {{ trans('blog.menu.categories') }}
    </h2>

    <!-- Breadcrumbs:start -->
    {{ Breadcrumbs::render('blog_categories') }}
    <!-- Breadcrumbs:end -->

    <!-- List category -->
    <div class="row">
        @forelse ($categories as $category)
            <!-- true -->
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100 shadow-sm">
                    <!-- thumbnail:start -->
                    @if (file_exists(public_path($category->thumbnail)))
                        <img class="card-img-top img-categories" src="{{ asset($category->thumbnail) }}"
                            alt="{{ $category->title }}">
                    @else
                        <img class="card-img-top img-categories" src="{{ asset('vendor/my-blog/img/no_img.png') }}"
                            alt="{{ $category->title }}">
                    @endif
                    <!-- thumbnail:end -->
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}">
                                {{ $category->title }}
                            </a>
                        </h5>
                        <p class="card-text">
                            {{ $category->description }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <!-- false -->
            <h3 class="text-center">
                {{ trans('blog.no_data.categories') }}
            </h3>
        @endforelse
    </div>
    <!-- List category -->

    <!-- pagination:start -->
    @if ($categories->hasPages())
        <div class="row mb-5">
            <div class="col">
                {{ $categories->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif
    <!-- pagination:end -->
@endsection
