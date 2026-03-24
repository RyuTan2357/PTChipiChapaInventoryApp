@extends ('layouts.master')

@section('title', 'Welcome')

@section('content')
    @include('layouts.navbar')

    <div class="text-center">
        <h1 class="fw-bold">Welcome to ChipiChapa!</h1>
        <p class="fs-4">Your one-stop shop for all your needs.</p>
    </div>

    @forelse($products as $product)
        <div class="card" style="width: 18rem; display: inline-block; margin: 10px;">
            <img src="{{ asset('storage/images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
                <h4 class="card-title">{{ $product->category->name }}</h4>
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">Price: Rp{{ number_format($product->price, 2) }}</p>
                <p class="card-text">Stock: {{ $product->stock }}</p>
                <a href="/edit/{{ $product->id }}" class="btn btn-primary">Edit</a>
                <form action="/delete/{{ $product->id }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @empty
        <h1>No Products</h1>
    @endforelse
@endsection