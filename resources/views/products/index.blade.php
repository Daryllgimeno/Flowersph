<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DaisyUI CDN -->
    <script>
        tailwind.config = {
            plugins: [daisyui],
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Product List</h1>

            <div class="flex gap-4">
                <a href="{{ route('orders.index') }}" class="btn btn-outline btn-primary">View Orders</a>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success shadow-lg mb-4">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="table w-full">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-sm">
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="hover">
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_description }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>₱{{ number_format($product->price, 2) }}</td>
                            <td class="text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
