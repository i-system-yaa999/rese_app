<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Http\Requests\ReserveRequest;
use App\Models\Shop;

class ReserveController extends Controller
{
    // 予約登録
    public function reserve(ReserveRequest $request,$shop_id)
    {
        $date_time = $request->input('reserve_date') . ' ' . $request->input('reserve_time');
        $shop_name=Shop::find($shop_id)->name;
        Reserve::Create([
            'user_id' => Auth::user()->id,
            'shop_id' => $shop_id,
            'reserved_at' => $date_time,
            'number' => $request->input('reserve_number'),
        ]);
        return view('shop.done')->with([
            'title' => '予約完了!',
            'shop_name' => $shop_name,
            'reserved_at' => $date_time,
            'reserve_number' => $request->input('reserve_number'),
            'user'=>Auth::user(),
        ]);
    }
    // 予約削除
    public function delete($shop_id){
        Reserve::find($shop_id)->delete();
        return back();
    }
    // 予約変更
    public function change(ReserveRequest $request,$id)
    {
        $date_time = $request->input('reserve_date') . ' ' . $request->input('reserve_time');
        $shop_name = Reserve::find($id)->shop->name;
        Reserve::where('id',$id)->update([
            'reserved_at' => $date_time,
            'number' => $request->input('reserve_number'),
        ]);
        return view('shop.done')->with([
            'title'=>'予約変更完了!',
            'shop_name' => $shop_name,
            'reserved_at' => $date_time,
            'reserve_number' => $request->input('reserve_number'),
            'user' => Auth::user(),
        ]);
    }
}
