<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Area;

class AdminController extends Controller
{
    public function adminView(Request $request)
    {
        $owners = Owner::Paginate(5);
        return view('admin', ['owners' => $owners]);
    }

    public function areaView()
    {
        return view('area_register');
    }

    public function areaRegister(Request $request)
    {
        $area = Area::create([
            'name' => $request->name,
        ]);
        unset($area['_token']);
        return redirect('/admin');
    }
}
