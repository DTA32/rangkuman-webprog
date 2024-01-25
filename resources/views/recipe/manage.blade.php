@extends('layout.master')

@section('title', 'Manage Recipe')

@section('content')
    <main class="container my-5">
        <div class="d-flex flex-column gap-3">
            <h1>Manage Recipes</h1>
            <div class="d-flex">
                <a href="{{ route('recipeCreate') }}" class="btn btn-primary">Create</a>
            </div>
            <p>Total: {{ $recipes->count() }} resep</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Author</th>
                        <th scope="col">Published Date</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recipes as $recipe)
                        <tr>
                            <td><img src="../storage/images/{{ $recipe->image }}" class="rounded" alt="..."
                                    style="max-width: 200px; height: 200px"></td>
                            <td>{{ $recipe->title }}</td>
                            <td>{{ $recipe->category->name }}</td>
                            <td>{{ $recipe->author->name }}</td>
                            <td>{{ $recipe->published_date }}</td>
                            <td>{{ $recipe->description }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('recipeDetail', $recipe->id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('recipeEdit', $recipe->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('recipeDelete', $recipe->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </div>
    </main>
@endsection
