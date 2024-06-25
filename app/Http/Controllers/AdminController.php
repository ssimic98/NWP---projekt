<?php

namespace App\Http\Controllers;
use app\Models\User;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function changeStatus(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();

        return redirect()->back()->with('success', 'User admin status updated');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function manageMovies()
    {
        return view('admin.movies.manageMovies');
    }
}
