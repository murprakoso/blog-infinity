@extends('layouts.blog')

@section('title', $post->title)

@section('desctiption', $post->description)

@section('content')
    <!-- Title:start -->
    <h2 class="mt-4 mb-3">
        {{ $post->title }}
    </h2>
    <!-- Title:end -->

    <!-- Breadcrumb:Start -->
    {{ Breadcrumbs::render('blog_post', $post->title) }}
    <!-- Breadcrumb:end -->
    <div class="row mb-3">
        <!-- Post Content Column:start -->
        <div class="col-lg-8">
            <!-- thumbnail:start -->
            @if (file_exists(public_path($post->thumbnail)))
                <img class="card-img-top card-img-bottom" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
            @else
                <img class="img-fluid rounded" src="{{ asset('vendor/my-blog/img/no_img.png') }}"
                    alt="{{ $post->title }}">
            @endif
            <!-- thumbnail:end -->
            <hr>
            <div class="text-gray-800">
                <small class="mr-2"><i class="fas fa-calendar"></i>
                    {{ Helper::date_post($post->created_at) }}
                </small>
                <small><i class="fas fa-user"></i>
                    {{ $post->user->name }}
                </small>
            </div>
            <hr>
            <div class="mb-2">
                @foreach ($post->categories as $category)
                    <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                        class="btn btn-sm btn-outline-primary">
                        {{ $category->title }}
                    </a>
                @endforeach
            </div>
            <!-- Post Content:start -->
            <div class="text-gray-800">
                {!! $post->content !!}
            </div>
            <!-- Post Content:end -->
            <div class="mt-1">
                <span class="text-gray-800">Tags:</span>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}" class="btn btn-sm btn-secondary">
                        #{{ $tag->title }}
                    </a>
                @endforeach
            </div>
            <hr class="mt-5">
            <div id="disqus_thread"></div>
        </div>

        <!-- Sidebar Widgets Column:start -->
        <div class="col-md-4">
            <!-- Categories Widget -->
            <div class="card bg-white shadow-sm mb-3">
                <h5 class="card-header bg-white text-gray-800">
                    {{ trans('blog.widget.categories') }}
                </h5>
                <div class="card-body">
                    <!-- category list:start -->
                    @foreach ($post->categories as $category)
                        <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                            class="btn btn-sm btn-outline-primary">
                            {{ $category->title }}
                        </a>
                    @endforeach
                    <!-- category list:end -->
                </div>
            </div>

            <!-- Side Widget tags:start -->
            <div class="card bg-white shadow-sm mb-3">
                <h5 class="card-header bg-white text-gray-800">
                    {{ trans('blog.widget.tags') }}
                </h5>
                <div class="card-body">
                    <!-- tag list:start -->
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}" class="btn btn-sm btn-secondary">
                            #{{ $tag->title }}
                        </a>
                    @endforeach
                    <!-- tag list:end -->
                </div>
            </div>
            <!-- Side Widget tags:start -->

            <!-- Side Widget latest-post:start -->
            <div class="card bg-white shadow-sm mb-3">
                <h5 class="card-header bg-white text-gray-800">
                    {{ trans('blog.widget.latest_posts') }}
                </h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($latestPosts as $lPost)
                            <li class="list-group-item px-0">
                                <a href="{{ route('blog.posts.detail', ['slug' => $lPost->slug]) }}"
                                    class="text-gray-900">
                                    {{ $lPost->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- Sidebar Widgets Column:end -->
    </div>
@endsection

@include('vendor.prism.prism')
