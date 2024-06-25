@extends('layouts.admin')

@section('content')
<style>
    body {
        background: url('{{ asset('images/AdmindashboardImage.jpg') }}') no-repeat center center fixed;
        background-size: cover;
    }
    .centered-content {
        min-height: 83vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .admin-card {
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
    }
</style>

<div class="container centered-content">
    <div class="admin-card">
        <h1>Admin Dashboard</h1>
        <p>Welcome to the admin dashboard!</p>
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Manage users</a>
        <a href="{{ route('admin.movies.manageMovies') }}" class="btn btn-primary">Manage movies</a>
    </div>
</div>
@endsection
