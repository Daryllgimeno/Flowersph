<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flower Shop - Product List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-pink {
            background-color: #f9c5d1;
            border: none;
            color: #6d214f;
        }

        .btn-pink:hover {
            background-color: #f8a5c2;
            color: #fff;
        }

        .btn-lavender {
            background-color: #e0bbf3;
            border: none;
            color: #5f27cd;
        }

        .btn-lavender:hover {
            background-color: #d3a3f5;
            color: #fff;
        }

        .sortable {
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 fw-bold text-primary">🌸 Product List</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('orders.index') }}" class="btn btn-lavender">View Orders</a>
            <a href="{{ route('products.create') }}" class="btn btn-pink">Add New Product</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>
                            <a href="{{ route('products.index', ['sort' => $sortOrder === 'asc' ? 'desc' : 'asc']) }}" class="text-decoration-none text-dark sortable">
                                Price
                                @if ($sortOrder === 'asc')
                                    🔼
                                @else
                                    🔽
                                @endif
                            </a>
                        </th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_description }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>₱{{ number_format($product->price, 2) }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
