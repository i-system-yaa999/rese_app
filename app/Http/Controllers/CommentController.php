<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request,$shop_id){
        Comment::Create([
            'user_id' => Auth::user()->id,
            'shop_id' => $shop_id,
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
        ]);
        return back();
    }
}
