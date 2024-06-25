@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Add New Director</h1>
    <form action="{{ route('admin.directors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <label for="name">Last Name</label>
            <input type="text" class="form-control" id="name" name="last_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Director</button>
    </form>
</div>
@endsection