<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Movie;
class FavoriteController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'movie_id'=>'required|exists:movies,id',
        ]);

        $movie=Movie::findOrFail($request->movie_id);

        if(Auth::user()->hasFavorited($movie))
        {
            return back()->with('error','You added this movie to favorite');
        }
        Auth::user()->favourites()->attach($request->movie_id);

        return back()->with('success','Movie added to favorites');
    }
    public function remove(Request $request)
    {
        $request->validate([
            'movie_id'=>'required|exists:movies,id',
        ]);

        $movie=Movie::findOrFail($request->movie_id);

        if(!Auth::user()->hasFavorited($movie))
        {
            return back()->with('error','You added this movie to favorite');
        }
        Auth::user()->favourites()->detach($request->movie_id);

        return redirect()->back()->with('success', 'Movie removed from favorites');
        
    }
    public function favoriteMovies()
    {
        $favoriteMovies = auth()->user()->favourites()->with(['director', 'genre', 'actor'])->get();
        return view('users.favorite',compact('favoriteMovies'));
    }
    
}
