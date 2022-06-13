<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;
use App\Models\Like;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create(Request $request, $shop_id)
    {
        Like::create([
            'user_id'=>Auth::user()->id,
            'shop_id'=>$shop_id,
        ]);
        Shop::find($shop_id)->increment('likes_count');
        return back();
    }
    public function delete($shop_id)
    {
        Like::where('user_id', Auth::user()->id)->where('shop_id', $shop_id)->delete();
        Shop::find($shop_id)->decrement('likes_count');
        return back();
    }
}
