<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/manage-common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owner/main.css') }}">
  <title>店舗代表者メイン</title>
</head>

<body>
  <script src="{{asset('js/admin.js')}}"></script>
  @include('layouts.forms')
  <div class="main_frame">
    {{-- nav --}}
    <nav class="nav">
      {{-- site title --}}
      <a href="/" class="site_title">
        <h1 class="title">Rese</h1>
      </a>
      {{-- nav title --}}
      <h2 class="nav_title">店舗Menu</h2>


      {{-- nav content 3 --}}
      <div class="nav_content" id="content3">
        <div class="nav_content" id="content3">
          <p><a class="nav_content_item" href="/owner">店舗編集</a></p>
          <p><a class="nav_content_item" href="/user/logout">ログアウト</a></p>
        </div>
      </div>

    </nav>
    {{-- nav end --}}

    {{-- content --}}
    <section class="content_frame">
      {{-- tab head --}}
      <div class="header">
        @if (Auth::check())
        <p>店舗代表者「{{Auth::user()->name}}」さんとしてログインしています。</p>
        @endif
      </div>

      @if(isset($reserves) && count($reserves)>0)
      {{-- tab contents --}}
      <div class="table-reserve_frame">
        <div class="tbl-reserve tbl-head">
          <div></div>
          <div class="item-center item-id">店舗ID</div>
          <div>店舗名</div>
          <div>予約者名</div>
          <div>E-Mail</div>
          <div></div>
          <div>予約日時</div>
          <div>人数</div>
          <div>作成日<br>------<br>更新日</div>
          <div></div>
          <div></div>
          <div></div>
        </div>
        @foreach($reserves as $reserve)
        @if($loop->iteration % 2)
          @if($create_item_id==$reserve->id)
          <div class="tbl-reserve tbl-odd tbl-newitem" id="tbl-item{{$reserve->id}}">
          @else
          <div class="tbl-reserve tbl-odd" id="tbl-item{{$reserve->id}}">
          @endif
        @else
          <div class="tbl-reserve tbl-even" id="tbl-item{{$reserve->id}}">
        @endif
            {{-- チェックボックス --}}
            <div class="item-center item-checkbox">
              <input type="checkbox" name="" id="">
            </div>
            {{-- ID --}}
            <input type="hidden" name="reserve_id{{$reserve->id}}" id="reserve_id{{$reserve->id}}" class="inputbox" value="{{$reserve->id}}">
            {{-- 店舗ID --}}
            <div class="item-center item-id">
              {{$reserve->shop->id}}
            </div>
            {{-- 店舗名 --}}
            <div class="item-shop-name">
              {{-- 店舗ID --}}
              <input type="hidden" name="reserve_shop_id{{$reserve->id}}" id="reserve_shop_id{{$reserve->id}}" class="inputbox" value="{{$reserve->shop->id}}" disabled>
              <input type="text" name="reserve_shop_name{{$reserve->id}}" id="reserve_shop_name{{$reserve->id}}" class="inputbox" value="{{$reserve->shop->name}}" disabled>
            </div>
            {{-- ユーザー名 --}}
            <div class="item-center item-user-name">
              {{-- ユーザーID --}}
              <input type="hidden" name="reserve_user_id{{$reserve->id}}" id="reserve_user_id{{$reserve->id}}" class="inputbox" value="{{$reserve->user->id}}" disabled>
              <input type="text" name="reserve_user_name{{$reserve->id}}" id="reserve_user_name{{$reserve->id}}" class="inputbox" value="{{$reserve->user->name}}" disabled>
            </div>
            {{-- メール --}}
            <div class="item-email">{{$reserve->user->email}}</div>
            {{-- メール送信ボタン --}}
            <div class="item-center item-mailsend"><button class="btn btn-mailsend">メール送信</button></div>
            {{-- 予約日時 --}}
            <div class="item-reserved">
              <div>
                <input type="date" name="reserve_date{{$reserve->id}}" id="reserve_date{{$reserve->id}}" class="inputbox inputdate" value="{{date('Y-m-d', strtotime($reserve->reserved_at))}}" form="ownercng" onchange="unregisteredReserveByOwner({{$reserve->id}})">
                @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_date')))
                <div class="error_disp">{{$errors->first('reserve_date')}}</div>
                @endif
              </div>
              <div>&nbsp;</div>
              <div>
                <input type="time" name="reserve_time{{$reserve->id}}" id="reserve_time{{$reserve->id}}" class="inputbox inputdate" value="{{date('H:i', strtotime($reserve->reserved_at))}}" form="ownercng" onchange="unregisteredReserveByOwner({{$reserve->id}})">
                @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_time')))
                <div class="error_disp">{{$errors->first('reserve_time')}}</div>
                @endif
              </div>
            </div>
            {{-- 予約人数 --}}
            <div class="item-center item-number">
              <select name="reserve_number{{$reserve->id}}" id="reserve_number{{$reserve->id}}" class="selectbox" form="ownercng" onchange="unregisteredReserveByOwner({{$reserve->id}})">
                <option value="{{$reserve->number}}">{{$reserve->number}}人</option>
                @for($i=1;$i<100;$i++) <option value="{{$i}}" @if($reserve->number == $i) selected @endif>{{$i}}人</option>
                  @endfor
              </select>
              @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_number')))
              <div class="error_disp">{{$errors->first('reserve_number')}}</div>
              @endif
            </div>
            {{-- 作成日/更新日 --}}
            <div class="item-created">{{$reserve->created_at}}<span class="hr"></span>{{$reserve->updated_at}}</div>
            {{-- 登録ボタン --}}
            <div class="item-center item-modify">
              <button class="btn btn-modify" type="submit" onclick="unregisteredReserveSendByOwner({{$reserve->id}})">登録</button>
            </div>
            {{-- 削除ボタン --}}
            <div class="item-center item-delete">
              <button class="btn btn-delete" type="submit" formaction="/owner/reserve?reserve_id={{$reserve->id}}" form="ownerdel">削除</button>
            </div>
            {{-- 終端 --}}
            <div class="item-terminal"></div>
          </div>
        @endforeach
      </div>
      {{-- tab contents end --}}
      @else
      <p>　この店舗への予約はありません。</p>
      @endif

      {{-- debug mode onry--}}
      <div class="debug">
        {{-- 予約 --}}
        <input type="text" id="reserve_id" name="reserve_id" form="ownercng" placeholder="id" value="{{old('reserve_id')}}">
        <input type="text" id="reserve_user_id" name="reserve_user_id" form="ownercng" placeholder="user_id" value="{{old('reserve_user_id')}}">
        <input type="text" id="reserve_user_name" name="reserve_user_name" form="ownercng" placeholder="name" value="{{old('reserve_user_name')}}">
        <input type="text" id="reserve_shop_id" name="reserve_shop_id" form="ownercng" placeholder="shop_id" value="{{old('reserve_shop_id')}}">
        <input type="text" id="reserve_shop_name" name="reserve_shop_name" form="ownercng" placeholder="shop_name" value="{{old('reserve_shop_name')}}">
        <input type="text" id="reserve_date" name="reserve_date" form="ownercng" placeholder="date" value="{{old('reserve_date')}}">
        <input type="text" id="reserve_time" name="reserve_time" form="ownercng" placeholder="time" value="{{old('reserve_time')}}">
        <input type="text" id="reserve_number" name="reserve_number" form="ownercng" placeholder="number" value="{{old('reserve_number')}}">
      
      </div>
    </section>
    {{-- content end --}}
    
  </div>
</body>

</html>