<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Models\Area;


class AreaController extends Controller
{
    public function registerView()
    {
        return view('area_register');
    }
    public function register(AreaRequest $request)
    {
        $area = Area::create([
            'name' => $request->name,
        ]);
        unset($area['_token']);
        return redirect('/admin');
    }
}
