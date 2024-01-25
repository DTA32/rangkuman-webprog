@extends('layout.master')

@section('title', 'Edit Recipe')

@section('content')
    <main class="container my-5">
        <div class="d-flex flex-column gap-3">
            <h4>Edit Recipe</h4>
            <form action="{{ route('recipeEdit', $recipe->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $recipe->title }}">
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <select class="form-select" id="author" name="author">
                        @foreach ($authors as $author)
                            <option @if ($recipe->author->id == $author->id) selected @endif value="{{ $author->id }}">
                                {{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="category">
                        @foreach ($categories as $category)
                            <option @if ($recipe->category->id == $category->id) selected @endif value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image (optional)</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="mb-3">
                    <label for="published_date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="published_date" name="published_date"
                        value="{{ $recipe->published_date }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $recipe->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </main>
@endsection
