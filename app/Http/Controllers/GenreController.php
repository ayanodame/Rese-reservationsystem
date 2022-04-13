<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    public function registerView()
    {
        return view('genre_register');
    }

    public function register(GenreRequest $request)
    {
        $genre = Genre::create([
            'name' => $request->name,
        ]);
        unset($genre['_token']);
        return redirect('/admin');
    }
}
