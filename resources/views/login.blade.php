@extends('layout.master')

@section('title', 'Login')

@section('content')
    <main class="container my-5 d-flex justify-content-center">
        <div class="border shadow p-5" style="padding-left: 60px; padding-right: 60px">
            <div class="d-flex flex-column gap-3">
                <h4 class="text-center">Login</h4>
                @if (session('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST" class="d-flex flex-column gap-3 p-3">
                    @csrf
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
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{ route('registerPage') }}" class="text-center">Register</a>
                </form>
            </div>
        </div>
    </main>
@endsection
