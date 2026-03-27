@extends('layouts.master')

@section('title', 'Create New Item')

@section('content')
    @include('layouts.navbar')
    @include('layouts.usercredentials')

    <h1 class="fw-bold text-center">Create New Item</h1>

    <form action="/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="category_name" class="form-label">Item Category:</label>
            <input type="text" name="category_name" id="category_name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Item Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Item Price:</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Item Stock:</label>
            <input type="number" name="stock" id="stock" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Item Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
    </form>
@endsection