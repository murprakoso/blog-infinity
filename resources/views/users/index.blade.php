@extends('layouts.dashboard')

@section('title', trans('users.title.index'))

@section('breadcrumbs', Breadcrumbs::render('users'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Form:search --}}
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                        class="form-control"
                                        placeholder="{{ trans('users.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-light border border-left-0" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @can('user_create')
                                <a href="{{ route('users.create') }}"
                                    class="btn btn-light btn-icon-split shadow border float-right" role="button">
                                    <span class="icon text-gray-600">
                                        <i class="fas fa-fw fa-plus-square"></i>
                                    </span>
                                    <span class="text">
                                        {{ trans('users.button.create.value') }}
                                    </span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- list users -->
                        @forelse ($users as $user)
                            <div class="col-lg-4 col-md-6">
                                <div class="card my-1">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2 mr-1">
                                                <i class="fas fa-id-badge fa-5x"></i>
                                            </div>
                                            <div class="col-md-10">
                                                <table>
                                                    <tr>
                                                        <th>
                                                            {{ trans('users.label.name') }}
                                                        </th>
                                                        <td>:</td>
                                                        <td>
                                                            {{-- show user name --}}
                                                            {{ $user->name }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('users.label.email') }}
                                                        </th>
                                                        <td>:</td>
                                                        <td>
                                                            {{-- show user email --}}
                                                            {{ $user->email }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ trans('users.label.role') }}
                                                        </th>
                                                        <td>:</td>
                                                        <td>
                                                            {{-- Show user roles --}}
                                                            {{ $user->roles->first()->name }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="float-right">
                                            <!-- edit -->
                                            @can('user_update')
                                                <a href="{{ route('users.edit', ['user' => $user]) }}"
                                                    class="btn btn-sm btn-light border shadow-sm" role="button">
                                                    <i class="fas fa-sm fa-fw fa-edit"></i>
                                                </a>
                                            @endcan
                                            <!-- delete -->
                                            @can('user_delete')
                                                <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST"
                                                    role="alert" class="d-inline"
                                                    alert-title="{{ trans('users.alert.delete.title') }}"
                                                    alert-text="{{ trans('users.alert.delete.message.confirm', ['name' => $user->name]) }}"
                                                    alert-btn-cancel="{{ trans('users.button.cancel.value') }}"
                                                    alert-btn-yes="{{ trans('users.button.delete.value') }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm">
                                                        <i class="fas fa-trash fa-sm fa-fw"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p><strong>
                                    @if (request()->get('keyword'))
                                        {{ trans('users.label.no_data.search', ['keyword' => request()->get('keyword')]) }}
                                    @else
                                        {{ trans('users.label.no_data.fetch') }}
                                    @endif
                                </strong></p>
                        @endforelse
                        <!-- list users -->
                    </div>
                </div>
                <!-- Todo:paginate -->
                @if ($users->hasPages())
                    <div class="card-footer">
                        {{ $users->links('vendor.pagination.bootstrap-4') }}
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
