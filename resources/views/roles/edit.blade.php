@extends('layouts.dashboard')

@section('title', trans('roles.title.edit'))

@section('breadcrumbs', Breadcrumbs::render('edit_role', $role))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="input_role_name" class="font-weight-bold">
                                {{ trans('roles.form_control.input.name.label') }}
                            </label>
                            <input id="input_role_name" value="{{ old('name', $role->name) }}" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- permission -->
                        <div class="form-group">
                            <label for="input_role_permission" class="font-weight-bold">
                                {{ trans('roles.form_control.input.permission.label') }}
                            </label>
                            <div class="form-control overflow-auto h-100 @error('permissions') is-invalid @enderror"
                                id="input_role_permission">
                                <div class="row">
                                    <!-- list manage name:start -->
                                    @foreach ($authorities as $manageName => $permissions)
                                        <ul class="list-group mx-1 mb-3">
                                            <li class="list-group-item bg-dark text-white">
                                                {{ trans("permissions.{$manageName}") }}
                                            </li>
                                            <!-- list permission:start -->
                                            @foreach ($permissions as $permission)
                                                <li class="list-group-item">
                                                    <div class="form-check">
                                                        {{-- check old input --}}
                                                        @if (old('permissions', $permissionChecked))
                                                            <input id="{{ $permission }}" name="permissions[]"
                                                                class="form-check-input" type="checkbox"
                                                                value="{{ $permission }}"
                                                                {{ in_array($permission, old('permissions', $permissionChecked)) ? 'checked' : null }}>
                                                        @else
                                                            <input id="{{ $permission }}" name="permissions[]"
                                                                class="form-check-input" type="checkbox"
                                                                value="{{ $permission }}">
                                                        @endif
                                                        <label for="{{ $permission }}" class="form-check-label">
                                                            {{ trans("permissions.{$permission}") }}
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <!-- list permission:end -->
                                        </ul>
                                    @endforeach
                                    <!-- list manage name:end  -->
                                </div>
                            </div>
                            @error('permissions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="float-right mb-4">
                            <a href="{{ route('roles.index') }}" class="btn btn-light btn-icon-split shadow border"
                                role="button">
                                <span class="icon text-gray-600">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    {{ trans('roles.button.back.value') }}
                                </span>
                            </a>
                            <button type="submit" class="btn btn-primary btn-icon-split shadow border">
                                <span class="icon">
                                    <i class="fas fa-fw fa-save"></i>
                                </span>
                                <span class="text">
                                    {{ trans('roles.button.edit.value') }}
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
