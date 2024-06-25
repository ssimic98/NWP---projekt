@extends('layouts.user')

@section('content')

<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f5f5f5;
}

</style>
<div class="container mt-5">
@if (session('error'))
            <div class="alert alert-danger"role="alert">
                {{session('error')}}
            </div>
        @endif
        <h1 class="text-center mb-5">Filter Movies</h1>
        <form method="GET" action="{{ route('users.index') }}">
            <div class="row mb-3">
                <div class="col-md-4">
                    <select name="director_id" class="form-control">
                        <option value="">Select Director</option>
                        @foreach($directors as $director)
                            <option value="{{ $director->id }}">{{ $director->name }} {{$director->last_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="genre_id" class="form-control">
                        <option value="">Select Genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="actor_id" class="form-control">
                        <option value="">Select Actor</option>
                        @foreach($actors as $actor)
                            <option value="{{ $actor->id }}">{{ $actor->name }} {{ $actor->last_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <h2 class="text-center mb-5">Movies</h2>
        <div class="row">
            @foreach($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top" alt="{{ $movie->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->name }}</h5>
                            <p class="card-text">Description: {{ $movie->description }}</p>
                            <strong>Actors</strong>
                            @foreach ($movie->actor as $actor )
                                {{$actor->name}} {{$actor->last_name}},
                            @endforeach
                            <strong class="card-text">Directed by: </strong>{{ $movie->director->name }} {{ $movie->director->last_name }}
                            <strong>Genre:</strong>{{$movie->genre->name}}
                        </div>
                        <form method="POST", action="{{route('favorites.add')}}">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{$movie->id}}" >
                            <button type="submit" class="btn btn-secondary">Add to favorites</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
