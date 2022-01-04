@extends('layouts.dashboard')

@section('title', trans('roles.title.index'))

@section('breadcrumbs', Breadcrumbs::render('roles'))

@section('content')
    <!-- section:content -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- form:pencarian --}}
                            <form action="{{ route('roles.index') }}" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                        class="form-control"
                                        placeholder="{{ trans('roles.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-light border border-left-0" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @can('role_create')
                                <a href="{{ route('roles.create') }}"
                                    class="btn btn-light btn-icon-split shadow border float-right" role="button">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-fw fa-plus-square"></i>
                                    </span>
                                    <span class="text">
                                        {{ trans('roles.button.create.value') }}
                                    </span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- list role -->
                        @forelse ($roles as $role)
                            <li
                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                                <label class="mt-auto mb-auto">
                                    {{ $role->name }}
                                </label>
                                <div>
                                    <!-- detail -->
                                    @can('role_detail')
                                        <a href="{{ route('roles.show', ['role' => $role]) }}"
                                            class="btn btn-sm btn-light border" role="button">
                                            <i class="fas fa-eye fa-sm fa-fw"></i>
                                        </a>
                                    @endcan
                                    <!-- edit -->
                                    @can('role_update')
                                        <a href="{{ route('roles.edit', ['role' => $role]) }}"
                                            class="btn btn-sm btn-light border" role="button">
                                            <i class="fas fa-edit fa-sm fa-fw"></i>
                                        </a>
                                    @endcan
                                    <!-- delete -->
                                    @can('role_delete')
                                        <form class="d-inline" role="alert"
                                            action="{{ route('roles.destroy', ['role' => $role]) }}" method="POST"
                                            alert-title="{{ trans('roles.alert.delete.title') }}"
                                            alert-text="{{ trans('roles.alert.delete.message.confirm', ['name' => $role->name]) }}"
                                            alert-btn-cancel="{{ trans('roles.button.cancel.value') }}"
                                            alert-btn-yes="{{ trans('roles.button.delete.value') }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash fa-sm fa-fw"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </li>
                        @empty
                            <p>
                                <strong>
                                    @if (request()->get('keyword'))
                                        {{ trans('roles.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                    @else
                                        {{ trans('roles.label.no_data.fetch') }}
                                    @endif
                                </strong>
                            </p>
                        @endforelse
                        <!-- list role -->
                    </ul>
                </div>
                @if ($roles->hasPages())
                    <div class="card-footer">
                        {{ $roles->links('vendor.pagination.bootstrap-4') }}
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
