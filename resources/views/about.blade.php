@extends('layout.master')

@section('title', __('about.title'))

@section('content')
    <main class="container my-5">
        <div class="d-flex flex-column justify-content-center gap-5">
            <h1>{{ __('about.title') }}</h1>
            <p>{{ __('about.description') }}</p>
            <div class="d-flex gap-2 align-items-center">
                <p class="mb-0">{{ __('about.other') }}</p>
                <a href="{{ route('about', 'en') }}" class="btn btn-light border">EN</a>
                <a href="{{ route('about', 'id') }}" class="btn btn-light border">ID</a>
            </div>
        </div>
    </main>
@endsection
