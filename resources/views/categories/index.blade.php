@extends('layouts.dashboard')

@section('title', trans('categories.title.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('categories') }}
@endsection

@section('content')
    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('categories.index') }}" method="GET">
                                <div class="input-group">
                                    <input name="keyword" type="search" class="form-control"
                                        value="{{ request()->get('keyword') }}"
                                        placeholder="{{ trans('categories.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-light border border-left-0" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @can('category_create')
                                <a href="{{ route('categories.create') }}"
                                    class="btn btn-light btn-icon-split shadow border float-right" role="button">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-fw fa-plus-square"></i>
                                    </span>
                                    <span class="text">
                                        {{ trans('categories.button.create.value') }}
                                    </span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @if (count($categories))
                            <!-- list category -->
                            @include('categories._category-list',[
                            'categories' => $categories,
                            'count' => 0
                            ])
                        @else
                            <p><strong>
                                    @if (request()->get('keyword'))
                                        {{ trans('categories.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                    @else
                                        {{ trans('categories.label.no_data.fetch') }}
                                    @endif
                                </strong></p>
                        @endif
                    </ul>
                </div>
                @if (!empty($categories))
                    <div class="card-footer">
                        {{ $categories->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('js-internal')
    <script>
        $(document).ready(function() {
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
