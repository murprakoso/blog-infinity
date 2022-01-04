@extends('layouts.dashboard')

@section('title', trans('users.title.edit'))

@section('breadcrumbs', Breadcrumbs::render('edit_user', $user))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- name -->
                        <div class="form-group">
                            <label for="input_user_name" class="font-weight-bold">
                                {{ trans('users.form_control.input.name.label') }}
                            </label>
                            <input id="input_user_name" value="{{ $user->name }}" name="name" type="text"
                                class="form-control" readonly />
                            <!-- error message -->
                        </div>
                        <!-- email -->
                        <div class="form-group">
                            <label for="input_user_email" class="font-weight-bold">
                                {{ trans('users.form_control.input.email.label') }}
                            </label>
                            <input id="input_user_email" value="{{ $user->email }}" name="email" type="email"
                                class="form-control" autocomplete="email" readonly />
                            <!-- error message -->
                        </div>
                        <!-- role -->
                        <div class="form-group">
                            <label for="select_user_role" class="font-weight-bold">
                                {{ trans('users.form_control.select.role.label') }}
                            </label>
                            <select id="select_user_role" name="role"
                                data-placeholder="{{ trans('users.form_control.select.role.placeholder') }}"
                                class="custom-select w-100 @error('role') is-invalid @enderror">
                                @if (old('role', $roleSelected))
                                    <option value="{{ old('role', $roleSelected)->id }}" selected>
                                        {{ old('role', $roleSelected)->name }}
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
                                    {{ trans('users.button.edit.value') }}
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
