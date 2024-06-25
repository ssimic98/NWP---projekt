@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Add New Movie</h1>
        <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="poster">Poster</label>
                <input type="file" name="poster" id="poster" class="form-control" required>
                @error('poster')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="director_id">Director</label>
                <select name="director_id" id="director_id" class="form-control" required>
                    @foreach ($directors as $director)
                        <option value="{{ $director->id }}">{{ $director->name }} {{ $director->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="genre_id">Genre</label>
                <select name="genre_id" id="genre_id" class="form-control" required>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="actors">Actors</label>
                <select name="actors[]" id="actors" class="form-control" multiple required>
                    @foreach ($actors as $actor)
                        <option value="{{ $actor->id }}">{{ $actor->name }} {{ $actor->last_name }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Movie</button>
        </form>
    </div>
@endsection