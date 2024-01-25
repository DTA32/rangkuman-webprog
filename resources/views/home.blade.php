@extends('layout.master')

@section('title', 'Home')

@section('content')
    <main class="container my-5">
        @if (session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <div class="d-flex flex-column justify-content-center gap-5">
            @foreach ($recipes as $recipe)
                <a href="{{ route('recipeDetail', $recipe->id) }}"
                    class="d-flex gap-3 align-items-center text-decoration-none text-dark">
                    <img src="storage/images/{{ $recipe->image }}" class="rounded" alt="..."
                        style="max-width: 200px; height: 200px">
                    <div class="d-flex flex-column gap-3">
                        <h6>{{ $recipe->title }}</h6>
                        <p>{{ $recipe->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
@endsection
