@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Add New Genre</h1>
    <form action="{{ route('admin.genres.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Genre</button>
    </form>
</div>
@endsection