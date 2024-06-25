<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
class GenreController extends Controller
{
    public function index()
    {
        $genres=Genre::all();
        return view('admin.genres.index',compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Request $request)
    {
        $request->validate=[
            'name'=>"required|string|max:255",
        ];  

        Genre::create($request->all());

        return redirect()->route('admin.genres.index')->with('success','New genre created');
    }

    public function destroy(Genre $genre)
    {   
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('success','Genre deleted succesfully');
    }
}
