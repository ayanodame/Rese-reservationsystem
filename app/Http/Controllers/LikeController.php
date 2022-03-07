<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $user = Auth::user();
        $like = Like::create([
            'shop_id' => $request->shop_id,
            'user_id' => Auth::id(),
        ]);
        unset($like['_token']);
        return redirect()->back();
    }
    public function unlike(Request $request)
    {
        $like=Like::where('shop_id',$request->shop_id)->where('user_id',Auth::id())->first();
        $like->delete();
        return redirect()->back();
    }
}
