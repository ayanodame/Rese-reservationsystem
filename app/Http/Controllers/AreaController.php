<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;


class AreaController extends Controller
{
    public function registerView()
    {
        return view('area_register');
    }
    public function register(Request $request)
    {
        $area = Area::create([
            'name' => $request->name,
        ]);
        unset($area['_token']);
        return redirect('/admin');
    }
}
