@extends('layouts.blog')

@section('title', trans('blog.title.category', ['title' => 'category title']))

@section('content')
    <!-- Title -->
    <h2 class="mt-4 mb-3">
        {{ trans('blog.title.category', ['title' => 'category title']) }}
    </h2>

    <!-- Breadcrumb:start -->
    {{ Breadcrumbs::render('blog_posts_category', $category->title) }}
    <!-- Breadcrumb:end -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Post list:start -->
            @forelse ($posts as $post)
                <div class="card shadow-sm mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            @if (file_exists(public_path($post->thumbnail)))
                                <img class="card-img-top h-100" src="{{ asset($post->thumbnail) }}"
                                    alt="{{ $post->title }}">
                            @else
                                <img class="card-img-top h-100" src="{{ asset('vendor/my-blog/img/no_img.png') }}"
                                    alt="{{ $post->title }}">
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h5>
                                <p class="card-text text-gray-900">{{ $post->description }}</p>
                                <p class="card-text text-gray-700">
                                    <small class="mr-1">
                                        <i class="fas fa-user"></i> {{ $post->user->name }}
                                    </small>
                                    <small>
                                        <i class="fas fa-clock"></i> {{ Helper::date_since($post->created_at) }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- empty -->
                <h3 class="text-center">
                    {{ trans('blog.no_data.posts') }}
                </h3>
            @endforelse
            <!-- Post list:end -->
        </div>
        <div class="col-md-4">
            <!-- Categories list:start -->
            <div class="card mb-1">
                <h5 class="card-header">
                    {{ trans('blog.widget.categories') }}
                </h5>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>
                            @if ($category->slug == $categoryRoot->slug)
                                {{ $categoryRoot->title }}
                            @else
                                <a href="{{ route('blog.posts.category', ['slug' => $categoryRoot->slug]) }}">
                                    {{ $categoryRoot->title }}
                                </a>
                            @endif
                            <!-- category descendants:start -->
                            @if ($categoryRoot->descendants)
                                @include('blog.sub-categories',[
                                'categoryRoot' => $categoryRoot->descendants,
                                'category' => $category
                                ])
                            @endif
                            <!-- category descendants:end -->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Categories list:end -->
        </div>
    </div>

    @if ($posts->hasPages())
        <div class="row">
            <div class="col">
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif
@endsection

@push('css-internal')
    <style>
        .card-img-top {
            /* height: 400px; */
            width: 100%;
            object-fit: cover;
            object-position: center;
        }

    </style>
@endpush
