<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
</head>
<body>
    <h1>Orders (Dummy Data)</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Price (₱)</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order['id'] }}</td>
                <td>{{ $order['product_name'] }}</td>
                <td>₱{{ number_format($order['price'], 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <br>
    <h3>Total Number of Orders: {{ count($orders) }}</h3>
    <h3>Total Amount: ₱{{ number_format($total, 2) }}</h3>

    <br>
    <a href="{{ route('products.index') }}">Back to Products</a>
</body>
</html>
