@extends('layouts.dashboard')

@section('title', trans('dashboard.title.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard_home') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>{{ trans('dashboard.greeting.welcome', ['name' => auth()->user()->name]) }}</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
