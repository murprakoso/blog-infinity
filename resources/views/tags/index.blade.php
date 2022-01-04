@extends('layouts.dashboard')

@section('title', trans('tags.title.index'))

@section('breadcrumbs', Breadcrumbs::render('tags'))

@section('content')
    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Form: search --}}
                            <form action="{{ route('tags.index') }}" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                        class="form-control"
                                        placeholder="{{ trans('tags.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-light border" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @can('tag_create')
                                <a href="{{ route('tags.create') }}"
                                    class="btn btn-light btn-icon-split shadow border float-right" role="button">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-fw fa-plus-square"></i>
                                    </span>
                                    <span class="text">
                                        {{ trans('tags.button.create.value') }}
                                    </span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list tag -->
                        @if (count($tags))
                            @foreach ($tags as $tag)
                                <li
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                                    <label class="mt-auto mb-auto">
                                        <!-- todo: show tag title -->
                                        {{ $tag->title }}
                                    </label>
                                    <div>
                                        <!-- edit -->
                                        @can('tag_update')
                                            <a href="{{ route('tags.edit', ['tag' => $tag]) }}"
                                                class="btn btn-sm btn-light border" role="button">
                                                <i class="fas fa-sm fa-edit text-gray-600"></i>
                                            </a>
                                        @endcan
                                        <!-- delete -->
                                        @can('tag_delete')
                                            <form class="d-inline" role="alert"
                                                action="{{ route('tags.destroy', ['tag' => $tag]) }}" method="POST"
                                                alert-title="{{ trans('tags.alert.delete.title') }}"
                                                alert-text="{{ trans('tags.alert.delete.message.confirm', ['title' => $tag->title]) }}"
                                                alert-btn-cancel="{{ trans('tags.button.cancel.value') }}"
                                                alert-btn-yes="{{ trans('tags.button.delete.value') }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-sm fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p><strong>
                                    @if (request()->get('keyword'))
                                        {{ trans('tags.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                    @else
                                        {{ trans('tags.label.no_data.fetch') }}
                                    @endif
                                </strong></p>
                        @endif
                    </ul>
                </div>
                @if (!empty($tags))
                    <div class="card-footer">
                        {{ $tags->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
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
