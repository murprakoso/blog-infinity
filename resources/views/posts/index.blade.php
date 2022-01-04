@extends('layouts.dashboard')

@section('title', trans('posts.title.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('posts') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="GET" class="form-inline form-row">
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <label
                                            class="font-weight-bold mr-2">{{ trans('posts.form_control.select.status.label') }}</label>
                                        <select name="status" class="custom-select">
                                            @foreach ($statuses as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ $statusSelected == $value ? 'selected' : null }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-light border"
                                                type="submit">{{ trans('posts.button.apply.value') }}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mx-1">
                                        <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                            class="form-control"
                                            placeholder="{{ trans('posts.form_control.input.search.placeholder') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-light border" type="submit">
                                                <i class="fas fa-sm fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            {{-- add post --}}
                            @can('post_create')
                                <a href="{{ route('posts.create') }}"
                                    class="btn btn-light btn-icon-split shadow border float-right" role="button">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-fw fa-plus-square"></i>
                                    </span>
                                    <span class="text">
                                        {{ trans('posts.button.create.value') }}
                                    </span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list post -->
                        @forelse ($posts as $post)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}" target="_blank">
                                        <h5 class="text-gray-800">
                                            {{ $post->title }}
                                        </h5>
                                    </a>
                                    <p>
                                        {{ $post->description }}
                                    </p>
                                    <p>
                                        <small>
                                            <i class="fas fa-user"></i>
                                            {{ $post->user->name }}
                                        </small>
                                    </p>
                                    <div class="float-right">
                                        <!-- detail -->
                                        @can('post_detail')
                                            <a href="{{ route('posts.show', ['post' => $post]) }}"
                                                class="btn btn-sm btn-light border" role="button">
                                                <i class="fas fa-sm fa-fw fa-eye text-gray-600"></i>
                                            </a>
                                        @endcan
                                        <!-- edit -->
                                        @can('post_update')
                                            <a href="{{ route('posts.edit', ['post' => $post]) }}"
                                                class="btn btn-sm btn-light border" role="button">
                                                <i class="fas fa-sm fa-fw fa-edit text-gray-600"></i>
                                            </a>
                                        @endcan
                                        <!-- delete -->
                                        @can('post_delete')
                                            <form class="d-inline" role="alert"
                                                action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST"
                                                alert-title="{{ trans('posts.alert.delete.title') }}"
                                                alert-text="{{ trans('posts.alert.delete.message.confirm', ['title' => $post->title]) }}"
                                                alert-btn-cancel="{{ trans('posts.button.cancel.value') }}"
                                                alert-btn-yes="{{ trans('posts.button.delete.value') }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-sm fa-fw fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>
                                <strong>
                                    @if (request()->get('keyword'))
                                        {{ trans('posts.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                    @else
                                        {{ trans('posts.label.no_data.fetch') }}
                                    @endif
                                </strong>
                            </p>
                        @endforelse
                    </ul>
                </div>
                {{-- @if ($posts->hasPages()) --}}
                @if (!empty($posts))
                    <div class="card-footer">
                        {{ $posts->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
                {{-- @endif --}}
            </div>
        </div>
    </div>
@endsection

@push('js-internal')
    <script>
        $(function() {
            // Event:delete tag
            $("form[role='alert']").submit(function(e) {
                e.preventDefault();
                swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                }).then((result) => {
                    if (result.isConfirmed) {
                        // todo: process of deleting categories
                        e.target.submit();
                    }
                });
            })
        })
    </script>
@endpush
