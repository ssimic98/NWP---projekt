@extends('layouts.admin')

@section('content')
    <style>
        .card-img-container {
            height: 200px; 
            overflow: hidden; 
        }
        .card-img-container img {
            height: 100%; 
            width: auto; 
        }
    </style>

    <div class="container">
        <h1>Manage Movies</h1>

        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-img-container">
                        <a href="{{ route('admin.genres.index') }}">
                            <img src="{{ asset('images/genreMovies.jpg') }}" class="card-img-top" alt="Genres">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Genres</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-img-container">
                        <a href="{{ route('admin.actors.index') }}">
                            <img src="{{ asset('images/actorMovies.jpg') }}" class="card-img-top" alt="Actors">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Actors</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-img-container">
                        <a href="{{ route('admin.directors.index') }}">
                            <img src="{{ asset('images/directorMovies.jpg') }}" class="card-img-top" alt="Directors">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Directors</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-img-container">
                        <a href="{{route('admin.movies.index')}}">
                            <img src="{{ asset('images/movie.jpg') }}" class="card-img-top" alt="Movies">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Movies</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
