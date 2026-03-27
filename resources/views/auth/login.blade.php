@extends('layouts.master')

@section('title', 'Login')

@section('content')
    @include('layouts.navbar')
    <h1 class="fw-bold text-center">Login</h1>

    <form action="/login" method="POST" class="mx-auto" style="max-width: 400px;">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="/register" class="btn btn-primary">Register</a>
        </div>
    </form>
@endsection