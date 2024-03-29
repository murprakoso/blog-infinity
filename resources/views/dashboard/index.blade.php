@extends('layouts.dashboard')

@section('title', trans('dashboard.title.index'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard_home') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{-- <div class="card">
                <div class="card-body">
                    <h2>{{ trans('dashboard.greeting.welcome', ['name' => auth()->user()->name]) }}</h2>
                </div>
            </div> --}}

            <div class="jumbotron">
                {{-- <h1 class="display-4">Hello, world!</h1> --}}
                <h2>{{ trans('dashboard.greeting.welcome', ['name' => auth()->user()->name]) }}</h2>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                    to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>

        </div>
    </div>
@endsection
