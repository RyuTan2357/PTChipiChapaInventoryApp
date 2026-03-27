@extends('layouts.master')

@section('title', 'Register')

@section('content')
    @include('layouts.navbar')

    <h1 class="fw-bold text-center">Register</h1>

    <form action="/register" method="POST" class="mx-auto" style="max-width: 400px;">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Username:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="youremail@gmail.com" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" value="08" required>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="/login" class="btn btn-primary">Login</a>
        </div>
    </form>
@endsection