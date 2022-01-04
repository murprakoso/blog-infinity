@extends('layouts.dashboard')

@section('title', trans('tags.title.create'))

@section('breadcrumbs', Breadcrumbs::render('add_tag'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <!-- title -->
                        <div class="form-group">
                            <label for="input_tag_title" class="font-weight-bold">
                                {{ trans('tags.form_control.input.title.label') }}
                            </label>
                            <input id="input_tag_title" value="{{ old('title') }}" name="title" type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="{{ trans('tags.form_control.input.title.placeholder') }}" />
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- slug -->
                        <div class="form-group">
                            <label for="input_tag_slug" class="font-weight-bold">
                                {{ trans('tags.form_control.input.slug.label') }}
                            </label>
                            <input id="input_tag_slug" value="{{ old('slug') }}" name="slug" type="text"
                                class="form-control @error('slug') is-invalid @enderror"
                                placeholder="{{ trans('tags.form_control.input.slug.placeholder') }}" readonly />
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="float-right">
                            <a href="{{ route('tags.index') }}" class="btn btn-light btn-icon-split shadow border"
                                role="button">
                                <span class="icon text-gray-600">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    {{ trans('tags.button.back.value') }}
                                </span>
                            </a>
                            <button type="submit" class="btn btn-primary btn-icon-split shadow border">
                                <span class="icon">
                                    <i class="fas fa-fw fa-save"></i>
                                </span>
                                <span class="text">
                                    {{ trans('tags.button.save.value') }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js-internal')
    <script>
        $(function() {
            const generateSlug = (value) => {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "");
            }

            // Event:slug
            $('#input_tag_title').change(function(e) {
                $('#input_tag_slug').val(generateSlug(e.target.value))
            })
        })
    </script>
@endpush
