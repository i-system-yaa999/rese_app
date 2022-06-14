<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reserve;
use App\Models\Comment;
use App\Models\Owner;

use App\Http\Requests\ShopRequest;

class OwnerController extends Controller
{
    
    public function create(Request $request)
    {
        // 店舗 情報 新規作成
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
    public function update(ShopRequest $request)
    {
        // 店舗 情報 登録
        // $shop = new ShopRequest;
        // $validator = Validator::make($request->all(), $shop->rules(), $shop->messages());
        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }
        Shop::where('id', $request->shop_id)->update([
            'name' => $request->input('shop_name'),
            'area_id' => $request->input('shop_area_id'),
            'genre_id' => $request->input('shop_genre_id'),
            'summary' => $request->input('shop_summary'),
            'image_url' => $request->input('shop_image_url'),
        ]);
        
        return back();
    }
    public function delete(Request $request)
    {
        // 店舗 情報 削除
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
        $displays = 1;

        // $owners = Owner::where('user_id',Auth::user()->id)->get();
        // foreach($owners as $owner){
        //     // dd($owner->shop);
        //     array_push($shops,$owner->shop);
        // }
        // dd($shops);
        // if(count($owners) > 0) {
            return view('owner/owner')->with([
                'owners' => Owner::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->Paginate($displays, ['*'], 'shopspage'),
                'allareas' => Area::all(),
                'allgenres' => Genre::all(),
                'create_item_id' =>  $request->input('create_item_id') ?? '9999',
            ]);
        // }else{
// dd($owners);
//             return view('owner/owner')->with([
//                 'allareas' => Area::all(),
//                 'allgenres' => Genre::all(),
//                 'create_item_id' =>  $request->input('create_item_id') ?? '9999',
//             ]);
//         }
    }
}
