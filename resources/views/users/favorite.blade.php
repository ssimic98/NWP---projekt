<!-- resources/views/users/favorite.blade.php -->

@extends('layouts.user')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">Favorite Movies</h1>
        @if (session('error'))
            <div class="alert alert-danger"role="alert">
                {{session('error')}}
            </div>
        @endif
        <div class="row">
            @foreach ($favoriteMovies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top" alt="{{ $movie->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->name }}</h5>
                            <p class="card-text">Description: {{ $movie->description }}</p>
                            <p class="card-text"><strong>Actors:</strong> 
                                @foreach ($movie->actor as $actor)
                                    {{ $actor->name }} {{ $actor->last_name }},
                                @endforeach
                            </p>
                            <p class="card-text"><strong>Directed by:</strong> {{ $movie->director->name }} {{ $movie->director->last_name }}</p>
                            <p class="card-text"><strong>Genre:</strong> {{ $movie->genre->name }}</p>
                        </div>
                        <form method="post" action="{{route('favorite.remove')}}">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{$movie->id}}">
                            <button type="submit" class="btn btn-danger mt-2">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
