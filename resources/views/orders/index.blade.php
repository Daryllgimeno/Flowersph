@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Orders</h2>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">← Back to user</a>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Order Summary</h5>

            <table class="table table-bordered table-hover mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Price (₱)</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order['id'] }}</td>
                        <td>{{ $order['product_name'] }}</td>
                        <td>₱{{ number_format($order['price'], 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No orders available.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                <p><strong>Total Number of Orders:</strong> {{ count($orders) }}</p>
                <p><strong>Total Amount:</strong> ₱{{ number_format($total, 2) }}</p>
            </div>
        </div>
    </div>
@endsection
