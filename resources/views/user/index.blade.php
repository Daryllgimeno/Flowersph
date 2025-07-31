{{-- resources/views/user/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>User List</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email_address }}</td>
                <td>{{ $user->mobile_number }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
