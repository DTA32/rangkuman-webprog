@extends('layout.master')

@section('title', 'Create Recipe')

@section('content')
    <main class="container my-5">
        <div class="d-flex flex-column gap-3">
            <h4>Create Recipe</h4>
            <form action="{{ route('recipeCreate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text"
                        class="form-control
                    @error('title') is-invalid @enderror
                    "
                        id="title" name="title">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <select
                        class="form-select
                    @error('author') is-invalid @enderror
                    "
                        id="author" name="author">
                        <option selected disabled value="">Choose...</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select
                        class="form-select
                    @error('category') is-invalid @enderror
                    "
                        id="category" name="category">
                        <option selected disabled value="">Choose...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file"
                        class="form-control
                    @error('image') is-invalid @enderror
                    "
                        id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="published_date" class="form-label">Date</label>
                    <input type="date"
                        class="form-control
                    @error('published_date') is-invalid @enderror
                    "
                        id="published_date" name="published_date">
                    @error('published_date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control
                    @error('description') is-invalid @enderror
                    "
                        id="description" name="description" rows="3"></textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>
@endsection
