@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage Actors</h1>
    <a href="{{ route('admin.actors.create') }}" class="btn btn-primary mb-3">Add New Actor</a>
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
            @foreach ($actors as $actor)
                <tr>
                    <td>{{ $actor->id }}</td>
                    <td>{{ $actor->name }}</td>
                    <td>{{ $actor->last_name }}</td>
                    <td>
                        <form action="{{ route('admin.actors.destroy', $actor) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this actor?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection