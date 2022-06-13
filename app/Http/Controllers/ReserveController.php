<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\Shop;
// use Milon\Barcode\Facades\DNS1DFacade;
use Milon\Barcode\Facades\DNS2DFacade;

class ReserveController extends Controller
{
    // 予約登録
    public function create(ReserveRequest $request,$shop_id)
    {
        $shop_name = Shop::find($shop_id)->name;
        $shop_area = Shop::find($shop_id)->area->name;
        $reserved_at = $request->input('reserve_date') . ' ' . $request->input('reserve_time');
        $reserve_number = $request->input('reserve_number');
        $user = Auth::user();

        // 予約情報作成
        Reserve::Create([
            'user_id' => Auth::user()->id,
            'shop_id' => $shop_id,
            'reserved_at' => $reserved_at,
            'number' => $reserve_number,
        ]);

        // QRデータ
        $value =
            '予約者名：' . $user->name . "\r\n" .
            '予約店舗名：' . $shop_name . "\r\n" .
            '店舗エリア：' . $shop_area . "\r\n" .
            '日時：' . $reserved_at . "\r\n" .
            '人数：' . $reserve_number . "\r\n";
        $type = 'QRCODE';
        $width = 5;
        $height = 5;
        $color = 'black';
        $qrcode = DNS2DFacade::getBarcodeHTML($value, $type, $width, $height, $color);

        return view('shop.done')->with([
            'title' => '予約完了!',
            'shop_name' => $shop_name,
            'shop_area' => $shop_area,
            'reserved_at' => $reserved_at,
            'reserve_number' => $reserve_number,
            'user'=>Auth::user(),
            'qrcode' => $qrcode,
        ]);
    }
    // 予約削除
    public function delete($shop_id){
        Reserve::find($shop_id)->delete();
        return back();
    }
    // 予約変更
    public function update(ReserveRequest $request,$id)
    {
        $shop_name = Reserve::find($id)->shop->name;
        $shop_area = Reserve::find($id)->shop->area->name;
        $reserved_at = $request->input('reserve_date') . ' ' . $request->input('reserve_time');
        $reserve_number = $request->input('reserve_number');
        $user = Auth::user();

        // 予約情報更新
        Reserve::where('id', $id)->update([
            'reserved_at' => $reserved_at,
            'number' => $reserve_number,
        ]);

        // QRデータ
        $value =
            '予約者名：' . $user->name . "\r\n" .
            '予約店舗名：' . $shop_name . "\r\n" .
            '店舗エリア：' . $shop_area . "\r\n" .
            '日時：' . $reserved_at . "\r\n" .
            '人数：' . $reserve_number . "\r\n";
        $type = 'QRCODE';
        $width = 5;
        $height = 5;
        $color = 'black';
        $qrcode = DNS2DFacade::getBarcodeHTML($value, $type, $width, $height, $color);

        return view('shop.done')->with([
            'title'=>'予約変更完了!',
            'shop_name' => $shop_name,
            'shop_area' => $shop_area,
            'reserved_at' => $reserved_at,
            'reserve_number' => $reserve_number,
            'user' => Auth::user(),
            'qrcode' => $qrcode,
        ]);
    }
    // 予約QR表示
    public function qr(Request $request, $id)
    {
        $shop_name = Reserve::find($id)->shop->name;
        $shop_area = Reserve::find($id)->shop->area->name;
        $reserved_at = Reserve::find($id)->reserved_at;
        $reserve_number = Reserve::find($id)->number;
        $user = Auth::user();

        // QRデータ
        $value =
            '予約者名：' . $user->name . "\r\n" .
            '予約店舗名：' . $shop_name . "\r\n" .
            '店舗エリア：' . $shop_area . "\r\n" .
            '日時：' . $reserved_at . "\r\n" .
            '人数：' . $reserve_number . "\r\n";
        $type = 'QRCODE';
        $width = 5;
        $height = 5;
        $color = 'black';
        $qrcode = DNS2DFacade::getBarcodeHTML($value, $type, $width, $height, $color);

        return view('shop.done')->with([
            'title' => '予約情報',
            'shop_name' => $shop_name,
            'shop_area' => $shop_area,
            'reserved_at' => $reserved_at,
            'reserve_number' => $reserve_number,
            'user' => $user,
            'qrcode' => $qrcode,
        ]);
    }
}
