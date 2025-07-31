@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center text-success">🌼 Edit Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>There were some problems with your input:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST" class="card p-4 shadow-sm border-0 bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="product_description" class="form-control" rows="3">{{ old('product_description', $product->product_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">← Back</a>
            <button type="submit" class="btn btn-success">💾 Update Product</button>
        </div>
    </form>
</div>
@endsection
