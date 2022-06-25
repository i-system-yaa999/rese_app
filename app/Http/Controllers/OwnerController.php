<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reserve;
use App\Models\Comment;
use App\Models\Owner;
use App\Http\Requests\ReserveRequest;
use App\Http\Requests\ShopRequest;

class OwnerController extends Controller
{
    // 店舗 情報 新規作成
    public function create(Request $request)
    {
        $data1 = Shop::create([
            'name' => '',
            'area_id' => 9999,
            'genre_id' => 9999,
            'summary' => '',
            'image_url' => '',
            'likes_count' => 0,
        ]);
        $create_item_id = $data1->id;
        $data2 = Owner::create([
            'user_id' => Auth::user()->id,
            'shop_id' => $data1->id,
        ]);

        return back()->with([
            'create_item_id' => $create_item_id ?? '9999',
        ]);   
    }

    // 店舗 情報 登録
    public function update(Request $request)
    {
        $shop = new ShopRequest;
        $validator = Validator::make($request->all(), $shop->rules(), $shop->messages());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Shop::where('id', $request->shop_id)->update([
            'name' => $request->input('shop_name'),
            'area_id' => $request->input('shop_area_id'),
            'genre_id' => $request->input('shop_genre_id'),
            'summary' => $request->input('shop_summary'),
            'image_url' => $request->input('shop_image_url'),
        ]);

        return back();
    }
    
    // 店舗 情報 削除
    public function delete(Request $request)
    {
        Comment::where('shop_id', $request->shop_id)->delete();
        Like::where('shop_id', $request->shop_id)->delete();
        Reserve::where('shop_id', $request->shop_id)->delete();
        Owner::where('shop_id', $request->shop_id)->delete();
        Shop::find($request->shop_id)->delete();

        return back();
    }

    // 管理画面表示
    public function index(Request $request)
    {
        return view('owner/owner')->with([
            'owners' => Owner::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->Paginate(1, ['*'], 'shopspage'),
            'allareas' => Area::all(),
            'allgenres' => Genre::all(),
            'create_item_id' =>  $request->input('create_item_id') ?? '9999',
        ]);
    }

    // 予約情報確認
    public function reserve(Request $request,$shop_id)
    {
        $displays = 10;
        $reserves = Reserve::where('shop_id', $shop_id)->get();
        // dd($reserves);
        return view('owner/reserve')->with([
            'reserves' => $reserves,
            'create_item_id' =>  $request->input('create_item_id') ?? '9999',
        ]);
    }

    // 予約情報変更
    public function update_reserve(Request $request)
    {
        $reserve = new ReserveRequest;
        $validator = Validator::make($request->all(), $reserve->rules(), $reserve->messages());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Reserve::where('id', $request->reserve_id)->update([
            'user_id' => $request->input('reserve_user_id'),
            'shop_id' => $request->input('reserve_shop_id'),
            'reserved_at' => $request->input('reserve_date') . ' ' . $request->input('reserve_time'),
            'number' => $request->input('reserve_number'),
        ]);

        return back();
    }

    // 予約情報削除
    public function delete_reserve(Request $request)
    {
        Reserve::find($request->reserve_id)->delete();
        return back();       
    }
}
