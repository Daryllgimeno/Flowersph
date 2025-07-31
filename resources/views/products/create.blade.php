<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>

    @if ($errors->any())
        <ul style="color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="product_name" value="{{ old('product_name') }}"><br><br>

        <label>Description:</label>
        <textarea name="product_description">{{ old('product_description') }}</textarea><br><br>

        <label>Quantity:</label>
        <input type="number" name="quantity" value="{{ old('quantity') }}"><br><br>

        <label>Price:</label>
        <input type="text" name="price" value="{{ old('price') }}"><br><br>

        <button type="submit">Save</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>
