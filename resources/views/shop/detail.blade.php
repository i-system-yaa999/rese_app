<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/shop/detail.css')}}">
  <title>RESE ショップ詳細</title>
</head>

<body>
  <script src="{{asset('js/main.js')}}"></script>
  <script>window.onload = cngReserve;</script>
  @include('layouts.header')
  @include('layouts.forms')
  <section class="content_main">
    <div class="detail_frame" name="detail" id="detail">
      <!-- 店舗詳細 -------------------------------------------------------------------------------- -->
      <div class="detail_data">
        <!-- 店舗情報 -->
        <div class="content_item">
          <!-- 店舗名 -->
          <h3 class="shop_name">{{$shop->id}}：{{$shop->name}}</h3>
          <!-- 店舗イメージ -->
          <img class="content_item_image" src="{{asset($shop->image_url)}}" alt="">
          <div class="content_inner_frame">
            <p class="content_hashtag">
              <!-- エリア -->
              <input type="radio" name="tab_item" id="area" value=1 onChange="tabChange()">
              <label class="shop_address" for="area">#{{$shop->area->name}}</label>
              <!-- ジャンル -->
              <input type="radio" name="tab_item" id="genre" value=2 onChange="tabChange()">
              <label class="shop_genre" for="genre">#{{$shop->genre->name}}</label>
            </p>
            <!-- 店舗詳細 -->
            <p class="content_summary">{{$shop->summary}}</p>
            <div class="content_action">
              <!-- お気に入り -->
              <div class="like_frame">
                @auth
                @if(!($shop->getLike()==null))
                <button type="submit" class="like_on" title="お気に入り" formaction="/like/{{$shop->id}}" form="likedel"></button>
                @else
                <button type="submit" class="like_off" title="お気に入り" formaction="/like/{{$shop->id}}" form="like"></button>
                @endif
                @endauth
                @guest
                <span>登録者数:</span>
                @endguest
                <!-- 登録者数 -->
                <span>{{$shop->likes_count}}人</span>
              </div>
            </div>
            {{-- <button>画像の保存</button> --}}
          </div>
        </div>
        <!--  -->
      </div>
      <!-- ----- end ----- -->
    </div>
    <div class="reserve_frame" name="reserve" id="reserve">
      <!-- 予約確認 -------------------------------------------------------------------------------- -->
      <h3 class="reserve_head">予約</h3>
      <!--  -->
      <div class="reserve_inner">
        <!--  -->
        <div class="reserve_value">
          <!-- 予約日付入力 -->
          @error('date_time')
          <div class="">{{$message}}</div>
          @enderror
          @error('reserve_date')
          <div class="">{{$message}}</div>
          @enderror
          <input class="@if($errors->has('reserve_date')||$errors->has('date_time')) has-error @endif" id="inputDate" name="reserve_date" type="date" onchange="cngReserve()" form="reserve" value="{{old('reserve_date')}}">
          <!-- 予約時間入力 -->
          @error('reserve_time')
          <span class="">{{$message}}</span>
          @enderror
          <input class="@if($errors->has('reserve_time')||$errors->has('date_time')) has-error @endif" id="inputTime" name="reserve_time" type="time" onchange="cngReserve()" list="timelist" form="reserve" value="{{old('reserve_time')}}">
          <!-- 営業時間を入れる -->
          <!-- 最終的にshops_tableから営業時間を取得する -->
          <datalist id=" timelist">
            @for ($h = 9; $h < 22; $h++) <!-- -->
              @for ($m=0; $m < 59; $m=$m+15) <!-- -->
                <option value="{{$h}}:{{$m}}"></option>
                @endfor
                @endfor
          </datalist>
          <!-- 予約人数入力 -->
          @error('reserve_number')
          <span class="">{{$message}}</span>
          @enderror
          <select class="@error('reserve_number') has-error @enderror" id="inputNumber" name="reserve_number" size="1" onchange="cngReserve()" form="reserve">
            <option disabled value="0" @if(old('reserve_number')==0) selected @endif>人数を選んでください</option>
            @for($i = 1; $i <= 50; $i++) <!-- -->
              <option value="{{$i}}" @if(old('reserve_number')==$i) selected @endif>{{$i}}人</option>
              @endfor
          </select>
        </div>
        <!--  -->
        <div class="reserve_confirm">
          <table class="reserve_item">
            <!-- 予約確認：店名 -->
            <tr>
              <th>Shop</th>
              <td id="confirmName">{{$shop->name}}</td>
            </tr>
            <!-- 予約確認：日付 -->
            <tr>
              <th>Date</th>
              <td id="confirmDate"></td>
            </tr>
            <!-- 予約確認：時間 -->
            <tr>
              <th>Time</th>
              <td id="confirmTime"></td>
            </tr>
            <!-- 予約確認：人数 -->
            <tr>
              <th>Number</th>
              <td id="confirmNumber"></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="reserve_send">
        <!-- 予約ボタン -->
        <button type="submit" formaction="/reserve/{{$shop->id}}" form="reserve">予約する</button>
      </div>
      <!-- ----- end ----- -->

    </div>
  </section>
  <section class="auxiliary">
    @if($after_reservation)
    <div class="my_evaluation">
      <h3>前回、{{$reserved_at}}に予約しました。</h3>
      @if(empty($iscomment))
      <input type="hidden" id="my_star" name="evaluation" form="comment" value="0">
      <button id="my_star1" class="my_star" onclick="star_change(1)"></button>
      <button id="my_star2" class="my_star" onclick="star_change(2)"></button>
      <button id="my_star3" class="my_star" onclick="star_change(3)"></button>
      <button id="my_star4" class="my_star" onclick="star_change(4)"></button>
      <button id="my_star5" class="my_star" onclick="star_change(5)"></button>
      <textarea name="comment" id="" class="my_comment" cols="100" rows="10" form="comment"></textarea>
      <button type="submit" class="my_evaluation_send" form="comment" formaction="/comment/{{$shop->id}}">評価を投稿する</button>
      @else
      <p>評価コメント投稿済みです。</p>
      @endif
    </div>
    @endif
    <div class="evaluation">
      <h3>評価（{{count($comments)}}件）</h3>
      @if(count($comments)==0)
      <p>評価はまだありません。</p>
      @endif
      {{--  --}}
      <div class="evaluation_contents">
        @foreach($comments as $comment)
        <div class="evaluation_name">{{$comment->user->name}}</div>
        <div class="evaluation_inner">
          <img src="{{asset('image/star'.$comment->evaluation.'.png')}}" alt="" class="star">
          <div class="evaluation_date">投稿日：{{$comment->created_at}}</div>
        </div>
        <div class="evaluation_comment">{{$comment->comment}}</div>
        @endforeach
      </div>
    </div>
  </section>
  @include('layouts.footer')
</body>

</html>