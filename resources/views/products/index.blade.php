<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
</head>
<body>
    <h1>Product List</h1>

    <a href="{{ route('products.create') }}">Add New Product</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>₱{{ number_format($product->price, 2) }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}">Edit</a> |
                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this product?')">Delete</button>
                    </form>

                </td>
            </tr>
        @empty
            <tr><td colspan="5">No products found.</td></tr>
        @endforelse
        </tbody>
    </table>

    <br>
    <a href="{{ route('orders.index') }}">View Orders</a>
</body>
</html>
