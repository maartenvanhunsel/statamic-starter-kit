@extends('statamic::layout')
@section('title', 'Netlify')

@section('content')
    <header>
        @include('statamic::partials.breadcrumb', [
            'url' => cp_route('index'),
            'title' => __('Dashboard')
        ])

        {{-- @can('show settings')
            hallo
        @endcan --}}

        <div class="flex items-center justify-between">
            <h1 class="flex-1">Netlify</h1>
            <trigger-deploy ref="trigger" :settings='@json($settings)'></trigger-deploy>

        </div>
    </header>
    @can('show settings')
        <main class="mt-3">
            <deployment-log
                ref="deployment_log"
                :settings='@json($settings)'
            >
            </deployment-log>
        </main>
    @endcan
@endsection
