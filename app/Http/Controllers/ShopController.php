<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reserve;
use App\Models\Comment;

class ShopController extends Controller
{
    // 初期表示
    // タブ表示
    public function index(Request $request)
    {
        $tab = $request->input('tab_item');
        $shops = null;
        $areas = null;
        $genres = null;
        $likes = null;
        $names = null;
        $selected_area = null;
        $selected_genre = null;
        $search_name = null;
        switch($tab) {
            // 全て
            case 0:
                $tab = 0;
                $ret = 'search_all';
                $shops = Shop::where('name','!=','')->orderBy('id', 'desc')->Paginate(8, ['*'], 'shopspage');
                $likes = Like::all();
                break;
            // エリア検索
            case 1:
                $ret = 'search_area';
                $areas = Area::all();
                break;
            // ジャンル検索
            case 2:
                $ret = 'search_genre';
                $genres = Genre::all();
                break;
            // 店名検索
            case 3:
                $ret = 'search_name';
                $names = true;
                break;
        }

        return view('shop.index')->with([
            'ret'=>$ret,
            'tab_item' => $tab,
            'shops' => $shops,
            'areas' => $areas,
            'genres' => $genres,
            'likes' => $likes,
            'names' => $names,
            'selected_area' => $selected_area,
            'selected_genre' => $selected_genre,
            'search_name' => $search_name,
        ]);
    }

    // 検索表示
    public function search(Request $request)
    {
        $tab= $request->input('tab_item');
        $shops = null;
        $areas = null;
        $genres = null;
        $likes = Like::all();
        $names = null;
        switch ($tab) {
            // 全て
            case 0:
                $ret = 'search_all';
                $shops = Shop::where('name', '!=', '')->orderBy('id', 'desc')->get();
                break;
            // エリア検索
            case 1:
                $ret = 'search_area';
                $areas = Area::all();
                $shops = Shop::where('area_id', $request->input('selected_area'))->Paginate(8, ['*'], 'areaspage');
                break;
            // ジャンル検索
            case 2:
                $ret = 'search_genre';
                $genres = Genre::all();
                $shops = Shop::where('genre_id', $request->input('selected_genre'))->Paginate(8, ['*'], 'genrespage');
                break;
            // 店名検索
            case 3:
                $ret = 'search_name';
                $names = true;
                if (!($request->input('search_name') == '')) {
                    $shops = Shop::where('name', 'LIKE', '%' . $request->input('search_name') . '%')->Paginate(8, ['*'], 'namespage');
                } else {
                    $shops = Shop::where('name', '=', $request->input('search_name'))->get();
                }
                break;
        }
        
        return view('shop.index')->with([
            'ret' => $ret,
            'tab_item' => $tab,
            'shops' => $shops,
            'shops_genre' => $shops,
            'areas' => $areas,
            'genres' => $genres,
            'likes' => $likes,
            'names' => $names,
            'selected_area' => $request->input('selected_area'),
            'selected_genre' => $request->input('selected_genre'),
            'search_name'=> $request->input('search_name'),
        ]);
    }
    // 詳細表示
    public function detail($id)
    {
        // 詳細表示用データ
        $item=Shop::find($id);

        if(Auth::user()){
        // 予約済みか
        $reserveDate = Reserve::where('user_id', Auth::user()->id)->where('shop_id', $id)->where('reserved_at','<=',date('Y-m-d H:i:s'))->first();
        // 評価済みか
        $iscomment = Comment:: where('user_id', Auth::user()->id)->where('shop_id', $id)->first();
        };
        // 評価コメント読み出し
        $comments = Comment::where('shop_id', $id)->get();

        return view('shop.detail',[
            'shop'=>$item,
            'after_reservation'=> isset($reserveDate),
            'reserved_at'=> $reserveDate->reserved_at ?? '',
            'comments'=> $comments,
            'iscomment'=> $iscomment ?? '',
        ]);
    }
}
