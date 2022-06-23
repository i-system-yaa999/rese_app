<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/mypage.css')}}">
  <title>RESE マイページ</title>
</head>

<body>
  <script src="{{asset('js/main.js')}}"></script>
  @include('layouts.header')
  @include('layouts.forms')
  <section class="content_main">
    <!-- 予約確認  -->
    <div class="reserve_frame" name="reserve" id="reserve">
      <h3 class="reserve_head">予約状況(登録順)</h3>

      <!--  -->
      @if((isset($reserves))&&($reserves->total() > 0))

      <!-- ページネーション -->
      <div class="page_info">
        <div class="page_counts">
          全{{$reserves->total()}}件中
          @if($reserves->total() > 0)
          {{$reserves->firstItem()}}～{{$reserves->lastItem()}}件
          @endif
        </div>
        @if($reserves->total() > 0)
        {{$reserves->appends(request()->query())->links('pagination::bootstrap-4')}}
        @endif
      </div>

      <!-- 送信用 -->
      <input type="text" class="debug" id=inputId name="reserve_id" form="reservecng" placeholder="ID"
        value="{{old('reserve_id')}}">
      <input type="text" class="debug" id="inputDate" name="reserve_date" form="reservecng" placeholder="日付"
        value="{{old('reserve_date')}}">
      <input type="text" class="debug" id="inputTime" name="reserve_time" form="reservecng" placeholder="時間"
        value="{{old('reserve_time')}}">
      <input type="text" class="debug" id="inputNumber" name="reserve_number" form="reservecng" placeholder="人数"
        value="{{old('reserve_number')}}">

      @foreach($reserves as $reserve)
      <!-- data start -->
      <div class="reserve_inner">
        <div class="reserve_itemhead">
          <h4>予約{{$loop->iteration+($reserves->currentPage()-1)*2}}</h4>
          <a href="/reserve/qr/{{$reserve->id}}" class="reserve_qr">予約QRを表示する</a>
          <button id="reserve_cancel" class="reserve_del" onclick="myReserveCancel('{{$reserve->id}}')">予約をキャンセルする</button>
        </div>
        <!--  -->
        <div class="reserve_confirm">
          <table class="reserve_item">
            <!-- 予約確認：店名 -->
            <tr>
              <th>Shop</th>
              <td id="confirmName{{$reserve->id}}">{{$reserve->shop->name}}</td>
            </tr>
            <!-- 予約確認：日付 -->
            <tr>
              <th>Date</th>
              <td id="confirmDate{{$reserve->id}}">{{date('Y-m-d', strtotime($reserve->reserved_at))}}</td>
            </tr>
            <!-- 予約確認：時間 -->
            <tr>
              <th>Time</th>
              <td id="confirmTime{{$reserve->id}}">{{date('H:i', strtotime($reserve->reserved_at))}}～</td>
            </tr>
            <!-- 予約確認：人数 -->
            <tr>
              <th>Number</th>
              <td id="confirmNumber{{$reserve->id}}">{{$reserve->number}}人</td>
            </tr>
          </table>
        </div>
        <!--  -->
        <button class="reserve_change toggle_open" id="reserve_change{{$reserve->id}}"
          onclick="cngMyReserveToggle('{{$reserve->id}}')">予約の変更</button>
        <!--  -->
        <div class="reserve_value" id="reserve_value{{$reserve->id}}">

          <!-- 予約日付入力 -->
          @if(($reserve->id==old('reserve_id')) && ($errors->has('date_time')))
          <div class="">{{$errors->first('date_time')}}</div>
          @endif
          {{--  --}}
          @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_date')))
          <div class="">{{$errors->first('reserve_date')}}</div>
          @endif
          {{--  --}}
          <input class="@if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_date')||$errors->has('date_time'))) has-error @endif"
            id="inputDate{{$reserve->id}}" name="reserve_date{{$reserve->id}}" type="date"
            onchange="cngMyReserve('{{$reserve->id}}')" value="{{old('reserve_date')}}">
            
          <!-- 予約時間入力 -->
          @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_time')))
          <div class="">{{$errors->first('reserve_time')}}</div>
          @endif
          {{--  --}}
          <input class="@if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_time')||$errors->has('date_time'))) has-error @endif"
            id="inputTime{{$reserve->id}}" name="reserve_time{{$reserve->id}}" type="time"
            onchange="cngMyReserve('{{$reserve->id}}')" list="timelist{{$reserve->id}}" value="{{old('reserve_time')}}">
          <!-- 営業時間 -->
          <!-- 最終的にshops_tableから営業時間を取得する -->
          <datalist id="timelist{{$reserve->id}}">
            @for ($h = 9; $h < 22; $h++) <!-- -->
              @for ($m=0; $m < 59; $m=$m+15) <!-- -->
                <option value="{{$h}}:{{$m}}"></option>
                @endfor
                @endfor
          </datalist>

          <!-- 予約人数入力 -->
          @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_number')))
          <div class="">{{$errors->first('reserve_number')}}</div>
          @endif
          {{--  --}}
          <select class="@if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_number'))) has-error @endif" id="inputNumber{{$reserve->id}}"
            name="reserve_number{{$reserve->id}}" size="1" onchange="cngMyReserve('{{$reserve->id}}')">
            <option disabled value="0" @if(old('reserve_number')==0) selected @endif>人数を選んでください</option>
            @for($i = 1; $i <= 50; $i++) <!-- -->
              <option value="{{$i}}" @if(old('reserve_number')==$i) selected @endif>{{$i}}人</option>
              @endfor
          </select>
          <!-- 予約ボタン -->
          <button class="reserve_send" formaction="/reserve/{{$reserve->id}}" form="reservecng"
            onclick="myReserveSend('{{$reserve->id}}')">変更する</button>

        </div>
      </div>
      <!-- data end -->
      @endforeach

      <!-- ページネーション -->
      <div class="page_info">
        <div class="page_counts">
        </div>
        @if($reserves->total() > 0)
        {{$reserves->appends(request()->query())->links('pagination::bootstrap-4')}}
        @endif
      </div>
      @else
      <div class="reserve_inner">
        <p>現在、予約された店舗はありません。</p>
      </div>
      @endif

    </div>
    <!-- お気に入り確認  -->
    <div class="likes_confirm_frame" name="likes_confirm" id="likes_confirm">
      <h3 class="likes_confirm_head">お気に入り店舗(登録順)</h3>
      <div class="likes_confirm_inner">

        @if(isset($likes)&&($likes->count()>0))
        <!-- ページネーション -->
        <div class="page_info">
          <div class="page_counts">
            全{{$likes->total()}}件中
            @if($likes->total() > 0)
              {{$likes->firstItem()}}～{{$likes->lastItem()}}件
            @endif
          </div>
          @if($likes->total() > 0)
            {{$likes->appends(request()->query())->links('pagination::bootstrap-4')}}
          @endif
        </div>
        @endif
        
        <div class="likes_confirm_data">
          <!-- 店舗情報 -->
          @if(isset($likes)&&($likes->count()>0))
            @foreach($likes as $like)
            @include('layouts.content',['shop'=>$like->shop])
            @endforeach
          @else
            <p>お気に入りの登録はありません。</p>
          @endif
        </div>
        <!-- ページネーション -->
        <div class="page_info">
          <div class="page_counts">
          </div>
          @if($likes->total() > 0)
          {{$likes->appends(request()->query())->links('pagination::bootstrap-4')}}
          @endif
        </div>
      </div>
    </div>
  </section>
  @include('layouts.footer')
</body>


</html>