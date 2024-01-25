@extends('layout.master')

@section('title', 'Register')

@section('content')
    <main class="container my-5 d-flex justify-content-center">
        <div class="border shadow p-5">
            <div class="d-flex flex-column gap-3">
                <h4 class="text-center">Register</h4>
                <form action="{{ route('register') }}" method="POST" class="d-flex flex-column gap-3 p-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label†>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                            type="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" type="password">
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="{{ route('loginPage') }}" class="text-center">Login</a>
                </form>
            </div>
        </div>
    </main>
@endsection
