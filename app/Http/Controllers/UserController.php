<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\Like;

class UserController extends Controller
{
    // 新規登録パージ
    // public function register(Request $request)
    // {
    //     return view('user.register');
    // }
    // 新規登録処理
    // public function user_add(Request $request)
    // {
    // }
    // 登録完了ページ
    // public function thanks(Request $request)
    // {
    //     return view('user.thanks');
    // }
    // ログイン処理
    // public function login(Request $request)
    // {
    //     return view(route('login'));
    // }
    // ログアウト処理
    public function logout(Request $request)
    {
        return view('user.logout');
    }
    // マイページ処理
    public function mypage(Request $request)
    {
        $reserves = Reserve::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->Paginate(2, ['*'], 'reservespage');
        $likes = Like::where('user_id', Auth::user()->id)->orderBy('id','desc')->Paginate(4, ['*'], 'likespage');
        return view('user.mypage', [
            'reserves' => $reserves,
            'likes' => $likes,
        ]);
    }
}
