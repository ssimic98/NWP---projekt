<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Actor;

class MovieController extends Controller
{
    public function index(Request $request)
    {

        $query=Movie::query();

        if($request->filled('director_id'))
        {
            $query->where('director_id',$request->director_id);
        }

        if($request->filled('genre_id'))
        {
            $query->where('genre_id',$request->genre_id);
        }

        if($request->filled('actor_id'))
        {
            $query->whereHas('actor',function($q)use ($request)
            {
                $q->where('actor_id',$request->actor_id);
            });
        }

        $movies=$query->get();
        $directors=Director::all();
        $genres=Genre::all();
        $actors=Actor::all();

        return view('users.index',compact('movies','directors','genres','actors'));
    }
    public function adminIndex()
    {
        $movies = Movie::with(['director', 'genre', 'actor'])->get();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        $directors = Director::all();
        $actors = Actor::all();

        return view('admin.movies.create', compact('genres', 'directors', 'actors'));
    }

    public function store(Request $request)
    {

    //dd($request->all());
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'director_id' => 'required|exists:directors,id',
        'genre_id' => 'required|exists:genres,id',
        'actors' => 'required|array',
        'actors.*' => 'exists:actors,id',
        'poster' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);

    // Handle file upload
    if ($request->hasFile('poster')) {
        if($request->file('poster')->isValid())
        {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }
        else
        {
            return back()->withErrors(['error'=>'Invalid file uploaded. Please try again.']);
        }
        
    } else {
        return back()->withErrors(['error' => 'No file uploaded.']);
    }

    // Create the movie with all necessary fields
    $movie = Movie::create([
        'name' => $request->name,
        'description' => $request->description,
        'director_id' => $request->director_id,
        'genre_id' => $request->genre_id,
        'poster' => $posterPath,
    ]);

    $movie->actor()->sync($request->actors);

    return redirect()->route('admin.movies.index')->with('success', 'Movie added successfully');
}
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('success', 'Movie successfully deleted');
    }
}
