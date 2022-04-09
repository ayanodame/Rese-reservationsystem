<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function genreView()
    {
        return view('genre_register');
    }

    public function genreRegister(Request $request)
    {
        $genre = Genre::create([
            'name' => $request->name,
        ]);
        unset($genre['_token']);
        return redirect('/admin');
    }
}
