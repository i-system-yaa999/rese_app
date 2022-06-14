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

use App\Http\Requests\AreaRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\GenreRequest;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\OwnerRequest;
use App\Http\Requests\ReserveRequest;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\UserRequest;

class AdminController extends Controller
{
    // 管理画面表示
    public function index(Request $request){
        $displays = 10;
        return view('admin/admin')->with([
            'tab_item' => $request->input('tab_item'),
            'owners' => Owner::orderBy('id', 'desc')->Paginate($displays, ['*'], 'ownerspage'),
            'users' => User::where('role', 10)->orderBy('id', 'desc')->Paginate($displays, ['*'], 'userspage'),
            'shops' => Shop::orderBy('id', 'desc')->Paginate($displays, ['*'], 'shopspage'),
            'areas' => Area::orderBy('id', 'desc')->Paginate($displays, ['*'], 'areaspage'),
            'genres' => Genre::orderBy('id', 'desc')->Paginate($displays, ['*'], 'genrespage'),
            'reserves' => Reserve::orderBy('id', 'desc')->Paginate($displays, ['*'], 'reservespage'),
            'likes' => Like::orderBy('id', 'desc')->Paginate($displays, ['*'], 'likespage'),
            'comments' => Comment::orderBy('id', 'desc')->Paginate($displays, ['*'], 'commentspage'),
            'allusers' => User::all(),
            'allshops' => Shop::all(),
            'allareas' => Area::all(),
            'allgenres' => Genre::all(),
            'create_item_id' =>  $request->input('create_item_id') ?? '9999',
        ]);
    }
    // 管理画面 新規作成
    public function create(Request $request)
    {
        switch ($request->input('tab_item')) {
            case 0:
                $create_item_id = 0;
                break;
            case 1:
                // 店舗代表者 情報 新規作成
                $data1 = User::create([
                    'name' => '',
                    'email' => '',
                    'password' => '',
                ]);
                $data2 = Owner::create([
                    'user_id' => $data1->id,
                    'shop_id' => '9999',
                ]);
                $create_item_id = $data2->id;
                break;
            case 2:
                // ユーザー 情報 新規作成
                $data = User::create([
                    'name' => '',
                    'email' => '',
                    'password' => '',
                ]);
                $create_item_id = $data->id;
                break;
            case 3:
                // 店舗 情報 新規作成
                $data = Shop::create([
                    'name' => '',
                    'area_id' => 9999,
                    'genre_id' => 9999,
                    'summary' => '',
                    'image_url' => '',
                    'likes_count' => 0,
                ]);
                $create_item_id = $data->id;
                break;
            case 4:
                // エリア 情報 新規作成
                $data = Area::create([
                    'name' => '',
                ]);
                $create_item_id = $data->id;
                break;
            case 5:
                // ジャンル 情報 新規作成
                $data = Genre::create([
                    'name' => '',
                ]);
                $create_item_id = $data->id;
                break;
            case 6:
                // 予約 情報 新規作成
                $data = Reserve::Create([
                    'user_id' => 9999,
                    'shop_id' => 9999,
                    'reserved_at' => '',
                    'number' => 0,
                ]);
                $create_item_id = $data->id;
                break;
            case 7:
                // お気に入り 情報 新規作成
                $data = Like::create([
                    'user_id' => 9999,
                    'shop_id' => 9999,
                ]);
                $create_item_id = $data->id;
                break;
            case 8:
                // 評価 情報 新規作成
                $data = Comment::Create([
                    'user_id' => 9999,
                    'shop_id' => 9999,
                    'evaluation' => 0,
                    'comment' => '',
                ]);
                $create_item_id = $data->id;
                break;
        };
        return back()->with([
            'create_item_id'=> $create_item_id ?? '9999',
        ]);
    }

    // 管理画面 変更登録
    public function update(Request $request)
    {
        // 店舗代表者 情報 登録
        if (isset($request->owner_id)) {
            $owner = new OwnerRequest;
            $validator = Validator::make($request->all(), $owner->rules(), $owner->messages());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user = User::where('id', $request->input('owner_user_id'))->first();
            if (Hash::check($request->input('owner_user_password'), $user->password)) {
                User::where('id', $request->input('owner_user_id'))->update([
                    'name' => $request->input('owner_user_name'),
                    'email' => $request->input('owner_user_email'),
                    'role' => 5,
                ]);
            } else {
                // dd($request->input('owner_user_password'), $user->password);
                User::where('id', $request->input('owner_user_id'))->update([
                    'name' => $request->input('owner_user_name'),
                    'email' => $request->input('owner_user_email'),
                    'password' => Hash::make($request->input('owner_user_password')),
                    'role' => 5,
                ]);
            }
            Owner::where('id', $request->owner_id)->update([
                'user_id'=> $request->input('owner_user_id'),
                'shop_id'=> $request->input('owner_shop_id'),
            ]);
        }
        // ユーザー 情報 登録
        if (isset($request->user_id)) {
            $user = new UserRequest;
            $validator = Validator::make($request->all(), $user->rules(), $user->messages());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user = User::where('id', $request->user_id)->first();
            if(Hash::check($request->input('user_password'),$user->password)){
                User::where('id', $request->user_id)->update([
                    'name' => $request->input('user_name'),
                    'email' => $request->input('user_email'),
                ]);
            }else{
                User::where('id', $request->user_id)->update([
                    'name' => $request->input('user_name'),
                    'email' => $request->input('user_email'),
                    'password' => Hash::make($request->input('user_password')),
                ]);
            }
        }
        // 店舗 情報 登録
        if (isset($request->shop_id)) {
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
                'image_url'=>$request->input('shop_image_url'),
                // 'likes_count'=>$request->input('shop_likes_count'),
            ]);
        }
        // エリア 情報 登録
        if (isset($request->area_id)) {
            $area = new AreaRequest;
            $validator = Validator::make($request->all(), $area->rules(), $area->messages());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            Area::where('id', $request->area_id)->update([
                'name' => $request->input('area_name'),
            ]);
        }
        // ジャンル 情報 登録
        if (isset($request->genre_id)) {
            $genre = new GenreRequest;
            $validator = Validator::make($request->all(), $genre->rules(), $genre->messages());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            Genre::where('id', $request->genre_id)->update([
                'name' => $request->input('genre_name'),
            ]);
        }
        // 予約 情報 登録
        if (isset($request->reserve_id)) {
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
        }
        // お気に入り 情報 登録
        if (isset($request->like_id)) {
            $like = new LikeRequest;
            $validator = Validator::make($request->all(), $like->rules(), $like->messages());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            Like::where('id', $request->like_id)->update([
                'user_id' => $request->input('like_user_id'),
                'shop_id' => $request->input('like_shop_id'),
            ]);
            Shop::find($request->like_shop_id)->increment('likes_count');
        }
        // 評価 情報 登録
        if (isset($request->comment_id)) {
            $comment = new CommentRequest;
            $validator = Validator::make($request->all(), $comment->rules(), $comment->messages());
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            Comment::where('id', $request->comment_id)->update([
                'user_id' => $request->input('comment_user_id'),
                'shop_id' => $request->input('comment_shop_id'),
                'evaluation'=>$request->input('comment_evaluation'),
                'comment' => $request->input('comment_comment'),
            ]);
        }
        return back();

    }
    // 管理画面 削除
    public function delete(Request $request)
    {
        // 店舗代表者 情報 削除
        if (isset($request->owner_id)) {
            $owner = Owner::find($request->owner_id);
            Comment::where('user_id',$owner->user->id)->delete();
            Like::where('user_id', $owner->user->id)->delete();
            Reserve::where('user_id', $owner->user->id)->delete();
            Owner::find($request->owner_id)->delete();
            User::find($owner->user->id)->delete();
        }
        // ユーザー 情報 削除
        if (isset($request->user_id)) {
            Comment::where('user_id', $request->user_id)->delete();
            Like::where('user_id', $request->user_id)->delete();
            Reserve::where('user_id', $request->user_id)->delete();
            Owner::where('user_id', $request->user_id)->delete();
            User::find($request->user_id)->delete();
        }
        // 店舗 情報 削除
        if (isset($request->shop_id)) {
            Comment::where('shop_id', $request->shop_id)->delete();
            Like::where('shop_id', $request->shop_id)->delete();
            Reserve::where('shop_id', $request->shop_id)->delete();
            Owner::where('shop_id', $request->shop_id)->delete();
            Shop::find($request->shop_id)->delete();
        }
        // エリア 情報 削除
        if (isset($request->area_id)) {
            Shop::where('area_id', $request->area_id)->delete();
            Area::find($request->area_id)->delete();
        }
        // ジャンル 情報 削除
        if (isset($request->genre_id)) {
            Shop::where('genre_id', $request->genre_id)->delete();
            Genre::find($request->genre_id)->delete();
        }
        // 予約 情報 削除
        if (isset($request->reserve_id)) {
            Reserve::find($request->reserve_id)->delete();
        }
        // お気に入り 情報 削除
        if (isset($request->like_id)) {
            $like=like::find($request->like_id);
            Shop::find($like->shop->id)->decrement('likes_count');
            Like::find($request->like_id)->delete();
        }
        // 評価 情報 削除
        if (isset($request->comment_id)) {
            Comment::find($request->comment_id)->delete();
        }
        return back();
    }
}
