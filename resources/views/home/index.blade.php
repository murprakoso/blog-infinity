@extends('layouts.blog')

@section('title', trans('blog.menu.posts'))

@push('hero')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Let's Learn Together</h1>
                <p class="lead fw-normal text-white-50 mb-0">Creating content about tech and programming
                </p>
            </div>
        </div>
    </header>
@endpush

@section('content')
    <!-- page title -->
    <h2 class="my-3">
        {{ trans('blog.menu.posts') }}
    </h2>
    <!-- Breadcrumbs:start -->
    {{ Breadcrumbs::render('blog') }}
    <!-- Breadcrumbs:end -->

    <!-- List posts -->
    <div class="row">
        @forelse ($posts as $post)
            <!-- true -->
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card shadow-sm h-100">
                    <!-- thumbnail:start -->
                    @if (file_exists(public_path($post->thumbnail)))
                        <img class="card-img-top img-posts" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
                    @else
                        <img class="card-img-top img-posts" src="{{ asset('vendor/my-blog/img/no_img.png') }}"
                            alt="{{ $post->title }}">
                    @endif
                    <!-- thumbnail:end -->
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}" class="text-gray-900">
                                {{ $post->title }}
                            </a>
                        </h5>
                        <p class="card-text">
                            @foreach ($post->categories as $categories)
                                <a href="" class="btn btn-sm btn-light">
                                    {{ $categories->title }}
                                </a>
                            @endforeach
                        </p>
                        <p class="card-text">
                            {{ $post->description }}
                        </p>
                        <div class="card-text">
                            <small class="mr-1">
                                <i class="fas fa-user"></i> {{ $post->user->name }}
                            </small>
                            <small>
                                <i class="fas fa-clock"></i> {{ Helper::date_since($post->created_at) }}
                            </small>
                        </div>
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
    <!-- List posts -->

    <!-- pagination:start -->
    @if ($posts->hasPages())
        <div class="row mb-5">
            <div class="col">
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif
    <!-- pagination:end -->
@endsection
