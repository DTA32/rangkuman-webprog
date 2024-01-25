@extends('layout.master')

@section('title', $category)

@section('content')
    <main class="container my-5">
        <div class="d-flex flex-column justify-content-center align-items-center gap-5">
            @foreach ($recipes as $recipe)
                <a href="{{ route('recipeDetail', $recipe->id) }}"
                    class="d-flex gap-3 align-items-center text-decoration-none text-dark">
                    <img src="http://localhost:8000/{{ $recipe->image }}" class="rounded" alt="..."
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
