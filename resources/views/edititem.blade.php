@extends('layouts.master')

@section('title', 'Edit Item')

@section('content')
    <h1 class="fw-bold text-center">Edit Item</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="/edit/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="category_name" class="form-label">Item Category:</label>
            <input type="text" name="category_name" id="category_name" class="form-control" value="{{ old('category_name', $product->category->name) }}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Item Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Item Price:</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Item Stock:</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Item Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Item</button>
        <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
    </form>
@endsection