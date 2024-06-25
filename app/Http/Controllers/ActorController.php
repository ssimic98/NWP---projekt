<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;class ActorController extends Controller
{
    public function index()
    {
        $actors=Actor::all();
        return view('admin.actors.index',compact('actors'));
    }

    public function create()
    {
        return view('admin.actors.create');
    }

    public function store(Request $request)
    {
        $request->validate=[
            'name'=>"required|string|max:255",
            'last_name'=>'required|string|max:255',
        ];  

        Actor::create($request->all());

        return redirect()->route('admin.actors.index')->with('success','New actor created');
    }

    public function destroy(Actor $actor)
    {   
        $actor->delete();
        return redirect()->route('admin.actors.index')->with('success','Actor deleted succesfully');
    }
}
