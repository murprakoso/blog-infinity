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
                <img class="card-img-top" src="{{ asset($post->thumbnail) }}" alt="{{ $post->title }}">
            @else
                <img class="img-fluid rounded" src="{{ asset('vendor/my-blog/img/no_img.png') }}"
                    alt="{{ $post->title }}">
            @endif
            <!-- thumbnail:end -->
            <hr>
            <!-- Post Content:start -->
            <div class="text-gray-800">
                {!! $post->content !!}
            </div>
            <!-- Post Content:end -->
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
                            class="badge badge-primary py-2 px-4 my-1">
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
                        <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}"
                            class="badge badge-info py-2 px-4 my-1">
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
