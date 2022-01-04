@extends('layouts.dashboard')

@section('title', trans('posts.title.edit'))

@section('breadcrumbs', Breadcrumbs::render('edit_post', $post))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row d-flex align-items-stretch">
                            <div class="col-md-8">
                                <!-- title -->
                                <div class="form-group">
                                    <label for="input_post_title" class="font-weight-bold">
                                        {{ trans('posts.form_control.input.title.label') }}
                                    </label>
                                    <input id="input_post_title" value="{{ old('title', $post->title) }}" name="title"
                                        type="text" class="form-control @error('title') is-invalid @enderror"
                                        placeholder="{{ trans('posts.form_control.input.title.placeholder') }}" />
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- slug -->
                                <div class="form-group">
                                    <label for="input_post_slug" class="font-weight-bold">
                                        {{ trans('posts.form_control.input.slug.label') }}
                                    </label>
                                    <input id="input_post_slug" value="{{ old('slug', $post->slug) }}" name="slug"
                                        type="text" class="form-control @error('slug') is-invalid @enderror"
                                        placeholder="{{ trans('posts.form_control.input.slug.placeholder') }}" readonly />
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- thumbnail -->
                                <div class="form-group">
                                    <label for="input_post_thumbnail" class="font-weight-bold">
                                        {{ trans('posts.form_control.input.thumbnail.label') }}
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button id="button_post_thumbnail" data-input="input_post_thumbnail"
                                                class="btn btn-primary" type="button">
                                                {{ trans('posts.button.browse.value') }}
                                            </button>
                                        </div>
                                        <input id="input_post_thumbnail" name="thumbnail"
                                            value="{{ old('thumbnail', asset($post->thumbnail)) }}" type="text"
                                            class="form-control @error('thumbnail') is-invalid @enderror"
                                            placeholder="{{ trans('posts.form_control.input.thumbnail.placeholder') }}"
                                            readonly />
                                    </div>
                                    @error('thumbnail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- description -->
                                <div class="form-group">
                                    <label for="input_post_description" class="font-weight-bold">
                                        {{ trans('posts.form_control.textarea.description.label') }}
                                    </label>
                                    <textarea id="input_post_description" name="description"
                                        placeholder="{{ trans('posts.form_control.textarea.description.placeholder') }}"
                                        class="form-control @error('description') is-invalid @enderror"
                                        rows="3">{{ old('description', $post->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- content -->
                                <div class="form-group">
                                    <label for="input_post_content" class="font-weight-bold">
                                        {{ trans('posts.form_control.textarea.content.label') }}
                                    </label>
                                    <textarea id="input_post_content" name="content"
                                        placeholder="{{ trans('posts.form_control.textarea.content.placeholder') }}"
                                        class="form-control @error('content') is-invalid @enderror"
                                        rows="20">{{ old('content', $post->content) }}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- catgeory -->
                                <div class="form-group">
                                    <label for="input_post_description" class="font-weight-bold">
                                        {{ trans('posts.form_control.input.category.label') }}
                                    </label>
                                    <div class="form-control overflow-auto @error('category') is-invalid @enderror"
                                        style="height: 886px">
                                        <!-- List category -->
                                        @include('posts._category-list',[
                                        'categories' => $categories,
                                        'categoryChecked' => old('category', $post->categories->pluck('id')->toArray())
                                        ])
                                        <!-- List category -->
                                    </div>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- tag -->
                                <div class="form-group">
                                    <label for="select_post_tag" class="font-weight-bold">
                                        {{ trans('posts.form_control.select.tag.label') }}
                                    </label>
                                    <select id="select_post_tag" name="tag[]"
                                        data-placeholder="{{ trans('posts.form_control.select.tag.placeholder') }}"
                                        class="custom-select w-100 @error('tag') is-invalid @enderror" multiple>
                                        {{-- select2 --}}
                                        @if (old('tag', $post->tags))
                                            @foreach (old('tag', $post->tags) as $tag)
                                                <option value="{{ $tag->id }}" selected>{{ $tag->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('tag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- status -->
                                <div class="form-group">
                                    <label for="select_post_status" class="font-weight-bold">
                                        {{ trans('posts.form_control.select.status.label') }}
                                    </label>
                                    <select id="select_post_status" name="status"
                                        class="custom-select @error('status') is-invalid @enderror">
                                        @foreach ($statuses as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('status', $post->status) == $key ? 'selected' : null }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <a href="{{ route('posts.index') }}"
                                        class="btn btn-light btn-icon-split shadow border" role="button">
                                        <span class="icon text-gray-600">
                                            <i class="fas fa-fw fa-arrow-left"></i>
                                        </span>
                                        <span class="text">
                                            {{ trans('posts.button.back.value') }}
                                        </span>
                                    </a>

                                    <button type="submit" class="btn btn-primary btn-icon-split shadow border">
                                        <span class="icon">
                                            <i class="fas fa-fw fa-save"></i>
                                        </span>
                                        <span class="text">
                                            {{ trans('posts.button.edit.value') }}
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css-external')
    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
    {{-- Prism --}}
    <link rel="stylesheet" href="{{ asset('vendor/prism/css/prism.css') }}">
@endpush

@push('js-external')
    {{-- filemanager --}}
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    {{-- TinyMCE5 --}}
    <script src="{{ asset('vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/tinymce5/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/tinymce5/codesample_languages.js') }}"></script>
    {{-- Select2 --}}
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
    {{-- Prism --}}
    <script src="{{ asset('vendor/prism/js/prism.js') }}"></script>
@endpush

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
            $('#input_post_title').change(function(e) {
                $('#input_post_slug').val(generateSlug(e.target.value))
            })

            // Event:thumbnail
            $('#button_post_thumbnail').filemanager('image');

            // Texteditor content
            $("#input_post_content").tinymce({
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern codesample",
                ],
                codesample_languages: codesampleLanguagesMin,
                // toolbar1: "fullscreen preview",
                toolbar2: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen preview",
                file_picker_callback: function(callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;

                    let cmsURL = "{{ route('unisharp.lfm.show') }}" + '?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.openUrl({
                        url: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            });

            // Select2: tag post
            $('#select_post_tag').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('tags.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.title,
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
