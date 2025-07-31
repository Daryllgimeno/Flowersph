<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}"><br><br>

        <label>Description:</label>
        <textarea name="product_description">{{ old('product_description', $product->product_description) }}</textarea><br><br>

        <label>Quantity:</label>
        <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}"><br><br>

        <label>Price:</label>
        <input type="text" name="price" value="{{ old('price', $product->price) }}"><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>
