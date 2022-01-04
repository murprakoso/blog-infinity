@extends('layouts.blog')

@section('title', trans('blog.title.search', ['keyword' => request()->get('keyword')]))

@section('content')
    <!-- page title -->
    <h2 class="my-3">
        {{ trans('blog.title.search', ['keyword' => request()->get('keyword')]) }}
    </h2>
    <!-- Breadcrumbs:start -->
    {{ Breadcrumbs::render('blog_search', request()->get('keyword')) }}
    <!-- Breadcrumbs:end -->

    <div class="row">
        <div class="col">
            <!-- Post list:start -->
            @forelse ($posts as $post)
                <div class="card shadow-sm mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            @if (file_exists(public_path($post->thumbnail)))
                                <img class="card-img-top card-img-bottom h-100" src="{{ asset($post->thumbnail) }}"
                                    alt="{{ $post->title }}">
                            @else
                                <img class="card-img-top card-img-bottom h-100"
                                    src="{{ asset('vendor/my-blog/img/no_img.png') }}" alt="{{ $post->title }}">
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}"
                                        class="text-gray-900">
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
                    {{ trans('blog.no_data.search_posts') }}
                </h3>
                <!-- Post list:end -->
            @endforelse
        </div>
    </div>

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
