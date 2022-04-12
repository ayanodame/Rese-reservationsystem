<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function registerView()
    {
        return view('genre_register');
    }

    public function register(Request $request)
    {
        $genre = Genre::create([
            'name' => $request->name,
        ]);
        unset($genre['_token']);
        return redirect('/admin');
    }
}
