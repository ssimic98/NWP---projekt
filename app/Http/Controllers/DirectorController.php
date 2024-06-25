<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
class DirectorController extends Controller
{
    public function index()
    {
        $directors=Director::all();
        return view('admin.directors.index',compact('directors'));
    }

    public function store(Request $request)
    {
        $request->validate=[
            'name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
        ];

        Director::create($request->all());

        return redirect()->route('admin.directors.index')->with('success','New Director added');
    }
    public function create()
    {
        return view('admin.directors.create');
    }
    public function destroy(Director $director)
    {
        $director->delete();
        return redirect()->route('admin.directors.index')->with('sucess','Director deleted successfully');
    }
}
