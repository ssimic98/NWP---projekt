@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Movies</h1>
        <a href="{{ route('admin.movies.create') }}" class="btn btn-primary mb-3">Add New Movie</a>
        <table class="table table-striped table-hover">
        <thead class="thead-dark">
                <tr>
                    <th>Poster</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Director</th>
                    <th>Genre</th>
                    <th>Actors</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>
                            @if ($movie->poster)
                                <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->name }}" width="100">
                            @endif
                        </td>
                        <td>{{ $movie->name }}</td>
                        <td>{{ $movie->description }}</td>
                        <td>{{ $movie->director->name }} {{ $movie->director->last_name }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>
                            @foreach ($movie->actor as $actor)
                                {{ $actor->name }} {{ $actor->last_name }}<br>
                            @endforeach
                        </td>
                        <td>
                            
                            <form action="{{ route('admin.movies.destroy', $movie) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this movie?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection