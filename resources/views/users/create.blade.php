@extends('layouts.dashboard')

@section('title', trans('users.title.create'))

@section('breadcrumbs', Breadcrumbs::render('add_user'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <!-- name -->
                        <div class="form-group">
                            <label for="input_user_name" class="font-weight-bold">
                                {{ trans('users.form_control.input.name.label') }}
                            </label>
                            <input id="input_user_name" value="{{ old('name') }}" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="{{ trans('users.form_control.input.name.placeholder') }}" />
                            <!-- error message -->
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- role -->
                        <div class="form-group">
                            <label for="select_user_role" class="font-weight-bold">
                                {{ trans('users.form_control.select.role.label') }}
                            </label>
                            <select id="select_user_role" name="role"
                                data-placeholder="{{ trans('users.form_control.select.role.placeholder') }}"
                                class="custom-select w-100 @error('role') is-invalid @enderror">
                                @if (old('role'))
                                    <option value="{{ old('role')->id }}" selected>
                                        {{ old('role')->name }}
                                    </option>
                                @endif
                            </select>
                            <!-- error message -->
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- email -->
                        <div class="form-group">
                            <label for="input_user_email" class="font-weight-bold">
                                {{ trans('users.form_control.input.email.label') }}
                            </label>
                            <input id="input_user_email" value="{{ old('email') }}" name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="{{ trans('users.form_control.input.name.placeholder') }}"
                                autocomplete="email" />
                            <!-- error message -->
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- password -->
                        <div class="form-group">
                            <label for="input_user_password" class="font-weight-bold">
                                {{ trans('users.form_control.input.password.label') }}
                            </label>
                            <input id="input_user_password" name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="{{ trans('users.form_control.input.password.placeholder') }}"
                                autocomplete="new-password" />
                            <!-- error message -->
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- password_confirmation -->
                        <div class="form-group">
                            <label for="input_user_password_confirmation" class="font-weight-bold">
                                {{ trans('users.form_control.input.password_confirmation.label') }}
                            </label>
                            <input id="input_user_password_confirmation" name="password_confirmation" type="password"
                                class="form-control"
                                placeholder="{{ trans('users.form_control.input.password_confirmation.placeholder') }}"
                                autocomplete="new-password" />
                            <!-- error message -->
                        </div>
                        <div class="float-right">
                            <a href="{{ route('users.index') }}" class="btn btn-light btn-icon-split shadow border"
                                role="button">
                                <span class="icon text-gray-600">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    {{ trans('users.button.back.value') }}
                                </span>
                            </a>
                            <button type="submit" class="btn btn-primary btn-icon-split shadow border">
                                <span class="icon">
                                    <i class="fas fa-fw fa-save"></i>
                                </span>
                                <span class="text">
                                    {{ trans('users.button.save.value') }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('js-external')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
@endpush

@push('js-internal')
    <script>
        $(function() {
            // parent category
            $('#select_user_role').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('roles.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        })
    </script>
@endpush
