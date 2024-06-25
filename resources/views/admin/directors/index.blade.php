@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage Directors</h1>
    <a href="{{ route('admin.directors.create') }}" class="btn btn-primary mb-3">Add New Director</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped table-hover">
    <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($directors as $director)
                <tr>
                    <td>{{ $director->id }}</td>
                    <td>{{ $director->name }}</td>
                    <td>{{ $director->last_name }}</td>
                    <td>
                        <form action="{{ route('admin.directors.destroy', $director) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this director?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection