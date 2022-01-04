@extends('layouts.dashboard')

@section('title', trans('categories.title.detail'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('detail_category_title', $category) }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if (file_exists(public_path($category->thumbnail)))
                        <!-- thumbnail:true -->
                        <div class="category-thumbnail"
                            style="background-image: url('{{ asset($category->thumbnail) }}');">
                        </div>
                    @else
                        <!-- thumbnail:false -->
                        <svg class="img-fluid" width="100%" height="400" xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                            <rect width="100%" height="100%" fill="#868e96"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#dee2e6" dy=".3em"
                                font-size="24">
                                {{ $category->title }}
                            </text>
                        </svg>
                    @endif
                    <!-- title -->
                    <h2 class="my-1">
                        {{ $category->title }}
                    </h2>
                    <!-- description -->
                    <p class="text-justify">
                        {{ $category->description }}
                    </p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('categories.index') }}"
                            class="btn btn-light btn-icon-split shadow border float-right" role="button">
                            <span class="icon text-gray-600">
                                <i class="fas fa-fw fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                {{ trans('categories.button.back.value') }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css-internal')
    <style>
        .category-thumbnail {
            width: 100% !important;
            height: 400px !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: cover !important;
            object-fit: cover !important;
            object-position: center !important;
        }

    </style>
@endpush
