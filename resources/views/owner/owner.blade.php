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
          <p class="nav_content_title">店舗</p>
          <button type="submit" class="nav_content_item" form="owner">新規作成</button>
          <p class="nav_content_item">　</p>
          <a class="nav_content_item" href="/user/logout">ログアウト</a>
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
        <p>　</p>
        @if($owners->total() > 0)
        <div>登録店舗数は、「{{$owners->total()}}店舗」です。</div>
        {{-- ページネーション --}}
        <div class="page_info">
          <div class="page_counts">
            全{{$owners->total()}}件中 　{{$owners->lastItem()}} 件目
          </div>
          @if($owners->total() > 0)
          {{$owners->appends(request()->input())->links('pagination::bootstrap-4')}}
          @endif
        </div>
        @else
        <p>店舗が登録されていません。</p>
        @endif
      </div>
      
      @if(isset($owners))
      {{-- tab contents --}}
      @foreach($owners as $owner)
      <div class="content_main">


        <div class="modify_frame" name="modify{{$owner->shop->id}}" id="modify{{$owner->shop->id}}">
          <h3 class="modify_title">店舗編集</h3>
          <ul>
            <li>
              {{-- id --}}
              <label for="shop_id">ID</label>
              <input type="text" name="shop_id{{$owner->shop->id}}" id="shop_id{{$owner->shop->id}}" class="item-id" value="{{$owner->shop->id}}" readonly>
            </li>
            <li>
              {{-- 店舗名 --}}
              <div class="item-name">
                <label for="shop_name{{$owner->shop->id}}">店舗名称</label>
                <input type="text" name="shop_name{{$owner->shop->id}}" id="shop_name{{$owner->shop->id}}" class="inputbox" value="{{$owner->shop->name}}" form="ownercng" onchange="unregisteredShop2({{$owner->shop->id}});cngValue({{$owner->shop->id}});">
                @if(($owner->shop->id==old('shop_id')) && $errors->has('shop_name'))
                <div class="error_disp">{{$errors->first('shop_name')}}</div>
                @endif
              </div>
            </li>
            <li>
              {{-- 店舗画像URL --}}
              <label for="shop_image_url{{$owner->shop->id}}">店舗イメージ画像</label>
              <select name="shop_image_url{{$owner->shop->id}}" id="shop_image_url{{$owner->shop->id}}" class="selectbox" form="ownercng" onchange="unregisteredShop2({{$owner->shop->id}});cngValue({{$owner->shop->id}});">
                <option value="image/italian.jpg" @if($owner->shop->image_url == "image/italian.jpg") selected @endif>1 :
                  image/italian.jpg</option>
                <option value="image/izakaya.jpg" @if($owner->shop->image_url == "image/izakaya.jpg") selected @endif>2 :
                  image/izakaya.jpg</option>
                <option value="image/ramen.jpg" @if($owner->shop->image_url == "image/ramen.jpg") selected @endif>3 : image/ramen.jpg
                </option>
                <option value="image/sushi.jpg" @if($owner->shop->image_url == "image/sushi.jpg") selected @endif>4 : image/sushi.jpg
                </option>
                <option value="image/yakiniku.jpg" @if($owner->shop->image_url == "image/yakiniku.jpg") selected @endif>5 :
                  image/yakiniku.jpg</option>
                <option value="image/cyuuka.jpg" @if($owner->shop->image_url == "image/cyuuka.jpg") selected @endif>6 : image/cyuuka.jpg
                </option>
                <option value="image/kissaten.jpg" @if($owner->shop->image_url == "image/kissaten.jpg") selected @endif>7 :
                  image/kissaten.jpg</option>
                <option value="image/familyrestaurant.png" @if($owner->shop->image_url == "image/familyrestaurant.png") selected
                  @endif>8 : image/familyrestaurant.png</option>
                <option value="image/coffee.jpg" @if($owner->shop->image_url == "image/coffee.jpg") selected @endif>9 : image/coffee.jpg
                </option>
                <option value="image/curry.jpg" @if($owner->shop->image_url == "image/curry.jpg") selected @endif>10 : image/curry.jpg
                </option>
                <option value="image/teisyoku.jpeg" @if($owner->shop->image_url == "image/teisyoku.jpeg") selected @endif>11 :
                  image/teisyoku.jpeg</option>
                <option value="image/soba.jpg" @if($owner->shop->image_url == "image/soba.jpg") selected @endif>12 : image/soba.jpg
                </option>
              </select>
              @if(($owner->shop->id==old('shop_id')) && $errors->has('shop_image_url'))
              <div class="error_disp">{{$errors->first('shop_image_url')}}</div>
              @endif
            </li>
            <li>
              {{-- エリア名 --}}
              <div class="item-area-name">
                <label for="shop_area_id{{$owner->shop->id}}">エリア</label>
                <select name="shop_area_id{{$owner->shop->id}}" id="shop_area_id{{$owner->shop->id}}" class="selectbox" form="ownercng" onchange="unregisteredShop2({{$owner->shop->id}});cngValue({{$owner->shop->id}});">
                  <option value="{{($owner->shop->area->id ?? '9999')}}">{{($owner->shop->area->id ?? '9999').'：'.($owner->shop->area->name ?? '未登録')}}
                  </option>
                  @foreach($allareas as $area)
                  <option value="{{$area->id}}" @if(($owner->shop->area->id ?? '9999') == $area->id) selected
                    @endif>{{$area->id.'：'.$area->name}}</option>
                  @endforeach
                </select>
                @if(($owner->shop->id==old('shop_id')) && ($errors->has('shop_area_id')))
                <div class="error_disp">{{$errors->first('shop_area_id')}}</div>
                @endif
              </div>
            </li>
            <li>
              {{-- ジャンル名 --}}
              <div class="item-genre-name">
                <label for="shop_genre_id{{$owner->shop->id}}">ジャンル</label>
                <select name="shop_genre_id{{$owner->shop->id}}" id="shop_genre_id{{$owner->shop->id}}" class="selectbox" form="ownercng" onchange="unregisteredShop2({{$owner->shop->id}});cngValue({{$owner->shop->id}});">
                  <option value="{{($owner->shop->genre->id ?? '9999')}}">{{($owner->shop->genre->id ?? '9999').'：'.($owner->shop->genre->name ?? '未登録')}}
                  </option>
                  @foreach($allgenres as $genre)
                  <option value="{{$genre->id}}" @if(($owner->shop->genre->id ?? '9999') == $genre->id) selected
                    @endif>{{$genre->id.'：'.$genre->name}}</option>
                  @endforeach
                </select>
                @if(($owner->shop->id==old('shop_id')) && ($errors->has('shop_genre_id')))
                <div class="error_disp">{{$errors->first('shop_genre_id')}}</div>
                @endif
              </div>
            </li>

            <li>
              {{-- 店舗説明 --}}
              <label for="shop_summary{{$owner->shop->id}}">説明文</label>
              <textarea name="shop_summary{{$owner->shop->id}}" id="shop_summary{{$owner->shop->id}}" class="inputbox item-summary" form="ownercng" onchange="unregisteredShop2({{$owner->shop->id}});cngValue({{$owner->shop->id}});">{{$owner->shop->summary}}</textarea>            
              @if(($owner->shop->id==old('shop_id')) && ($errors->has('shop_summary')))
              <div class="error_disp">{{$errors->first('shop_summary')}}</div>
              @endif
            </li>
            <li class="modify_action">
              {{-- 登録ボタン --}}
              <button class="btn btn-modify" type="submit" onclick="unregisteredShopSend2({{$owner->shop->id}})">登録</button>
              {{-- 削除ボタン --}}
              <button class="btn btn-delete" type="submit" formaction="/owner?shop_id={{$owner->shop->id}}" form="ownerdel">削除</button>
              <p id="modify-message{{$owner->shop->id}}" class="modify_message">未保存です。登録ボタンを押して保存してください。</p>
            </li>
          </ul>  
          
          <div class="debug">
            <input type="text" id="shop_id" name="shop_id" form="ownercng" placeholder="id" value="{{old('shop_id')}}">
            <input type="text" id="shop_name" name="shop_name" form="ownercng" placeholder="name" value="{{old('shop_name')}}">
            <input type="text" id="shop_area_id" name="shop_area_id" form="ownercng" placeholder="area_id" value="{{old('shop_area_id')}}">
            <input type="text" id="shop_area_name" name="shop_area_name" form="ownercng" placeholder="area" value="{{old('shop_area_name')}}">
            <input type="text" id="shop_genre_id" name="shop_genre_id" form="ownercng" placeholder="genre_id" value="{{old('shop_genre_id')}}">
            <input type="text" id="shop_genre_name" name="shop_genre_name" form="ownercng" placeholder="genre" value="{{old('shop_genre_name')}}">
            <input type="text" id="shop_summary" name="shop_summary" form="ownercng" placeholder="summary" value="{{old('shop_summary')}}">
            <input type="text" id="shop_image_url" name="shop_image_url" form="ownercng" placeholder="image_url" value="{{old('shop_image_url')}}">
          </div>
        </div>


        <div class="confirm_frame" name="confirm" id="confirm">
          <div class="confirm_data">
          <h3 class="confirm_title">詳細ページでのレイアウトイメージ</h3>
          <p>　</p>
          {{-- 登録者数 --}}
          <p>この店舗のお気に入り登録者数は「{{$owner->shop->likes_count}}人」です。</p>
          <hr>
          {{-- 店舗詳細 --}}
          <div class="detail_data">
            {{-- 店舗情報 --}}
            <div class="content_item">
              {{-- 店舗名 --}}
              <h3 id="confirm_shop_name" class="shop_name">{{$owner->shop->id}}：{{$owner->shop->name}}</h3>
              {{-- 店舗イメージ --}}
              <img id="confirm_shop_image" class="content_item_image" src="{{asset($owner->shop->image_url)}}" alt="ここにイメージが表示されます。">
              <div class="content_inner_frame">
                <p class="content_hashtag">
                  {{-- エリア --}}
                  <label id="confirm_shop_area" class="shop_address" for="area">#{{$owner->shop->area->name ?? '未登録'}}</label>
                  {{-- ジャンル --}}
                  <label id="confirm_shop_genre" class="shop_genre" for="genre">#{{$owner->shop->genre->name ?? '未登録'}}</label>
                </p>
                {{-- 店舗詳細 --}}
                <p id="confirm_shop_summary" class="content_summary">{{$owner->shop->summary}}</p>
              </div>
            </div>
          </div>
          {{-- end --}}
          </div>
        </div>
      </div>
      @endforeach
      {{-- tab contents end --}}
      @endif
    </section>
    {{-- content end --}}
  </div>
</body>

</html>