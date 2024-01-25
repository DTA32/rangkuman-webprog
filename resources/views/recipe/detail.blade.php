@extends('layout.master')

@section('title', $recipe->title)

@section('content')
    <main class="container my-5">
        <div class="d-flex flex-column gap-3">
            <h4>{{ $recipe->title }}</h4>
            <h6>{{ $recipe->category->name }}</h6>
            <img src="../storage/images/{{ $recipe->image }}" class="rounded" alt="..." style="width:100%">
            <div class="d-flex gap-1">
                <p>{{ $recipe->author->name }}</p>
                <p>|</p>
                <p>{{ $recipe->published_date }}</p>
            </div>
            <p>{{ $recipe->description }}</p>
        </div>
    </main>
@endsection
