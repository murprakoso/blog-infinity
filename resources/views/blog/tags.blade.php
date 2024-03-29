@extends('layouts.blog')

@section('title', trans('blog.title.tags'))

@section('content')
    <h2 class="my-3">
        {{ trans('blog.title.tags') }}
    </h2>
    <!-- Breadcrumb:start -->
    {{ Breadcrumbs::render('blog_tags') }}
    <!-- Breadcrumb:end -->

    <!-- List tag -->
    <div class="row">
        <div class="col">
            @forelse ($tags as $tag)
                <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}"
                    class="btn btn-light btn-sm mr-2 shadow-sm text-gray-800">#{{ $tag->title }}</a>
            @empty
                <h3 class="text-center">
                    {{ trans('blog.no_data.tags') }}
                </h3>
            @endforelse
        </div>
    </div>
    <!-- List tag -->

    <!-- pagination:start -->
    @if ($tags->hasPages())
        <div class="row mb-5">
            <div class="col">
                {{ $tags->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    @endif
    <!-- pagination:end -->
@endsection
