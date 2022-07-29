@extends('statamic::layout')
@section('title', 'Netlify')

@section('content')
    <publish-form
        title="Settings"
        action="{{ cp_route('settings.update') }}"
        :blueprint='@json($blueprint)'
        :meta='@json($meta)'
        :values='@json($values)'
    >
    </publish-form>
@endsection
