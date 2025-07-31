<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flower Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Flower Shop</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-light p-3" style="min-height: 100vh;">
                <!-- Navigation Buttons -->
                <div class="d-grid gap-2 mb-4">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Product List</a>
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-success">Order List</a>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Users List</a>
                </div>

                <h5>Users List</h5>
                <ul class="list-group">
                    @foreach($users ?? [] as $user)
                        <li class="list-group-item">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="text-center mt-4 text-muted">
        &copy; {{ date('Y') }} Flower Shop System
    </footer>

</body>
</html>
