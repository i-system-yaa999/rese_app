<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/manage-common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
  <title>管理メイン</title>
</head>

<body>
  <script src="{{asset('js/main.js')}}"></script>
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
      <h2 class="nav_title">管理者Menu</h2>

      {{-- nav content 0 --}}
      @if($tab_item==='0'|empty($tab_item))
      <div class="nav_content" id="content0">
        <p></p>
      </div>
      @endif
      
      {{-- nav content 1 --}}
      @if($tab_item==='1')
      <div class="nav_content" id="content1">
        <p class="nav_content_title">店舗代表者</p>
        <button type="submit" class="nav_content_item" form="admin">新規作成</button>
        <p class="nav_content_item">選択削除</p>
        <p class="nav_content_item">メール送信</p>
        <a class="nav_content_item" href="/user/logout">ログアウト</a>
      </div>
      @endif
      
      {{-- nav content 2 --}}
      @if($tab_item==='2')
      <div class="nav_content" id="content2">
        <p class="nav_content_title">ユーザー</p>
        <button type="submit" class="nav_content_item" form="admin">新規作成</button>
        <p class="nav_content_item">選択削除</p>
        <p class="nav_content_item">メール送信</p>
        <a class="nav_content_item" href="/user/logout">ログアウト</a>
      </div>
      @endif
      
      {{-- nav content 3 --}}
      @if($tab_item==='3')
      <div class="nav_content" id="content3">
        <p class="nav_content_title">店舗</p>
        <button type="submit" class="nav_content_item" form="admin">新規作成</button>
        <p class="nav_content_item">選択削除</p>
        <a class="nav_content_item" href="/user/logout">ログアウト</a>
      </div>
      @endif
      
      {{-- nav content 4 --}}
      @if($tab_item==='4')
      <div class="nav_content" id="content4">
        <p class="nav_content_title">エリア</p>
        <button type="submit" class="nav_content_item" form="admin">新規作成</button>
        <p class="nav_content_item">選択削除</p>
        <a class="nav_content_item" href="/user/logout">ログアウト</a>
      </div>
      @endif
      
      {{-- nav content 5 --}}
      @if($tab_item==='5')
      <div class="nav_content" id="content5">
        <p class="nav_content_title">ジャンル</p>
        <button type="submit" class="nav_content_item" form="admin">新規作成</button>
        <p class="nav_content_item">選択削除</p>
        <a class="nav_content_item" href="/user/logout">ログアウト</a>
      </div>
      @endif
      
      {{-- nav content 6 --}}
      @if($tab_item==='6')
      <div class="nav_content" id="content6">
        <p class="nav_content_title">予約</p>
        <button type="submit" class="nav_content_item" form="admin">新規作成</button>
        <p class="nav_content_item">選択削除</p>
        <p class="nav_content_item">メール送信</p>
        <a class="nav_content_item" href="/user/logout">ログアウト</a>
      </div>
      @endif
      
      {{-- nav content 7 --}}
      @if($tab_item==='7')
      <div class="nav_content" id="content7">
        <p class="nav_content_title">お気に入り</p>
        <button type="submit" class="nav_content_item" form="admin">新規作成</button>
        <p class="nav_content_item">選択削除</p>
        <a class="nav_content_item" href="/user/logout">ログアウト</a>
      </div>
      @endif
      
      {{-- nav content 8 --}}
      @if($tab_item==='8')
      <div class="nav_content" id="content8">
        <p class="nav_content_title">評価</p>
        <button type="submit" class="nav_content_item" form="admin">新規作成</button>
        <p class="nav_content_item">選択削除</p>
        <a class="nav_content_item" href="/user/logout">ログアウト</a>
      </div>
      @endif

    </nav>
    {{-- nav end --}}

    {{-- content --}}
    <section class="content_frame">

      {{-- tab menu --}}
      <div class="tabs">        

        {{-- tab menu 1 --}}
        <input type="radio" name="tab_item" id="menu1" value=1 @if($tab_item==1) checked @endif onChange="tabChange()" form="admin">
        <label class=" tab_item" for="menu1">店舗代表者</label>

        {{-- tab menu 2 --}}
        <input type="radio" name="tab_item" id="menu2" value=2 @if($tab_item==2) checked @endif onChange="tabChange()" form="admin">
        <label class="tab_item" for="menu2">ユーザー</label>

        {{-- tab menu 3 --}}
        <input type="radio" name="tab_item" id="menu3" value=3 @if($tab_item==3) checked @endif onChange="tabChange()" form="admin">
        <label class="tab_item" for="menu3">店舗</label>

        {{-- tab menu 4 --}}
        <input type="radio" name="tab_item" id="menu4" value=4 @if($tab_item==4) checked @endif onChange="tabChange()" form="admin">
        <label class="tab_item" for="menu4">エリア</label>

        {{-- tab menu 5 --}}
        <input type="radio" name="tab_item" id="menu5" value=5 @if($tab_item==5) checked @endif onChange="tabChange()" form="admin">
        <label class="tab_item" for="menu5">ジャンル</label>
        
        {{-- tab menu 6 --}}
        <input type="radio" name="tab_item" id="menu6" value=6 @if($tab_item==6) checked @endif onChange="tabChange()" form="admin">
        <label class="tab_item" for="menu6">予約</label>
        
        {{-- tab menu 7 --}}
        <input type="radio" name="tab_item" id="menu7" value=7 @if($tab_item==7) checked @endif onChange="tabChange()" form="admin">
        <label class="tab_item" for="menu7">お気に入り</label>

        {{-- tab menu 8 --}}
        <input type="radio" name="tab_item" id="menu8" value=8 @if($tab_item==8) checked @endif onChange="tabChange()" form="admin">
        <label class="tab_item" for="menu8">評価</label>

      </div>
      {{-- tab menu end--}}

      {{-- tab contents --}}
      <div class="tab_contents">  
        
        {{-- tab content 0 --}}
        @if($tab_item==='0'|empty($tab_item))
        @include('admin.contents.tab_content0')
        @endif

        {{-- tab content 1 --}}
        @if($tab_item==='1')
        @include('admin.contents.tab_content1')
        @endif
        
        {{-- tab content 2 --}}
        @if($tab_item==='2')
        @include('admin.contents.tab_content2')
        @endif
        
        {{-- tab content 3 --}}
        @if($tab_item==='3')
        @include('admin.contents.tab_content3')
        @endif
        
        {{-- tab content 4 --}}
        @if($tab_item==='4')
        @include('admin.contents.tab_content4')
        @endif
        
        {{-- tab content 5 --}}
        @if($tab_item==='5')
        @include('admin.contents.tab_content5')
        @endif
        
        {{-- tab content 6 --}}
        @if($tab_item==='6')
        @include('admin.contents.tab_content6')
        @endif
        
        {{-- tab content 7 --}}
        @if($tab_item==='7')
        @include('admin.contents.tab_content7')
        @endif
        
        {{-- tab content 8 --}}
        @if($tab_item==='8')
        @include('admin.contents.tab_content8')
        @endif
        
      </div>
      {{-- tab contents end --}}
      
      <div class="message_box">
        <div class="message_title">
          <p>データ削除</p>
        </div>
        <div class="message_body">
          <p class="msg_window_message">関連するデータが全て消去されます。</p>
          <p class="msg_window_message">削除を実行しますか？</p>
          <div class="msg_window_button">
            <button class="btn btn-delete">削除</button>
            <button class="btn btn-cancel">キャンセル</button>
          </div>
        </div>
      </div>


      {{-- debug mode onry--}}
      <section class="debug">
        {{-- 店舗代表者 --}}
        @if($tab_item==='1')
        <input type="text" id="owner_id" name="owner_id" form="admincng" placeholder="id" value="{{old('owner_id')}}">
        <input type="text" id="owner_user_id" name="owner_user_id" form="admincng" placeholder="user_id" value="{{old('owner_user_id')}}">
        <input type="text" id="owner_user_name" name="owner_user_name" form="admincng" placeholder="name" value="{{old('owner_user_name')}}">
        <input type="text" id="owner_user_email" name="owner_user_email" form="admincng" placeholder="email" value="{{old('owner_user_email')}}">
        <input type="text" id="owner_user_password" name="owner_user_password" form="admincng" placeholder="password" value="{{old('owner_user_password')}}">
        <input type="text" id="owner_shop_id" name="owner_shop_id" form="admincng" placeholder="shop_id" value="{{old('owner_shop_id')}}">
        <input type="text" id="owner_shop_name" name="owner_shop_name" form="admincng" placeholder="shop_name" value="{{old('owner_shop_name')}}">
        <input type="text" id="owner_user_role" name="owner_user_role" form="admincng" placeholder="role" value="{{old('owner_user_role')}}">
        @endif
        {{-- ユーザー --}}
        @if($tab_item==='2')
        <input type="text" id="user_id" name="user_id" form="admincng" placeholder="id" value="{{old('user_id')}}">
        <input type="text" id="user_name" name="user_name" form="admincng" placeholder="name" value="{{old('user_name')}}">
        <input type="text" id="user_email" name="user_email" form="admincng" placeholder="email" value="{{old('user_email')}}">
        <input type="text" id="user_password" name="user_password" form="admincng" placeholder="password" value="{{old('user_password')}}">
        <input type="text" id="user_role" name="user_role" form="admincng" placeholder="role" value="{{old('user_role')}}">
        @endif
        {{-- 店舗 --}}
        @if($tab_item==='3')
        <input type="text" id="shop_id" name="shop_id" form="admincng" placeholder="id" value="{{old('shop_id')}}">
        <input type="text" id="shop_name" name="shop_name" form="admincng" placeholder="name" value="{{old('shop_name')}}">
        <input type="text" id="shop_area_id" name="shop_area_id" form="admincng" placeholder="area_id" value="{{old('shop_area_id')}}">
        <input type="text" id="shop_area_name" name="shop_area_name" form="admincng" placeholder="area" value="{{old('shop_area_name')}}">
        <input type="text" id="shop_genre_id" name="shop_genre_id" form="admincng" placeholder="genre_id" value="{{old('shop_genre_id')}}">
        <input type="text" id="shop_genre_name" name="shop_genre_name" form="admincng" placeholder="genre" value="{{old('shop_genre_name')}}">
        <input type="text" id="shop_summary" name="shop_summary" form="admincng" placeholder="summary" value="{{old('shop_summary')}}">
        <input type="text" id="shop_image_url" name="shop_image_url" form="admincng" placeholder="image_url" value="{{old('shop_image_url')}}">
        @endif
        {{-- エリア --}}
        @if($tab_item==='4')
        <input type="text" id="area_id" name="area_id" form="admincng" placeholder="id" value="{{old('area_id')}}">
        <input type="text" id="area_name" name="area_name" form="admincng" placeholder="name" value="{{old('area_name')}}">
        @endif
        {{-- ジャンル --}}
        @if($tab_item==='5')
        <input type="text" id="genre_id" name="genre_id" form="admincng" placeholder="id" value="{{old('genre_id')}}">
        <input type="text" id="genre_name" name="genre_name" form="admincng" placeholder="name" value="{{old('genre_name')}}">
        @endif
        {{-- 予約 --}}
        @if($tab_item==='6')
        <input type="text" id="reserve_id" name="reserve_id" form="admincng" placeholder="id" value="{{old('reserve_id')}}">
        <input type="text" id="reserve_user_id" name="reserve_user_id" form="admincng" placeholder="user_id" value="{{old('reserve_user_id')}}">
        <input type="text" id="reserve_user_name" name="reserve_user_name" form="admincng" placeholder="name" value="{{old('reserve_user_name')}}">
        <input type="text" id="reserve_shop_id" name="reserve_shop_id" form="admincng" placeholder="shop_id" value="{{old('reserve_shop_id')}}">
        <input type="text" id="reserve_shop_name" name="reserve_shop_name" form="admincng" placeholder="shop_name" value="{{old('reserve_shop_name')}}">
        <input type="text" id="reserve_date" name="reserve_date" form="admincng" placeholder="date" value="{{old('reserve_date')}}">
        <input type="text" id="reserve_time" name="reserve_time" form="admincng" placeholder="time" value="{{old('reserve_time')}}">
        <input type="text" id="reserve_number" name="reserve_number" form="admincng" placeholder="number" value="{{old('reserve_number')}}">
        @endif
        {{-- お気に入り --}}
        @if($tab_item==='7')
        <input type="text" id="like_id" name="like_id" form="admincng" placeholder="id" value="{{old('like_id')}}">
        <input type="text" id="like_user_id" name="like_user_id" form="admincng" placeholder="user_id" value="{{old('like_user_id')}}">
        <input type="text" id="like_user_name" name="like_user_name" form="admincng" placeholder="user_name" value="{{old('like_user_name')}}">
        <input type="text" id="like_shop_id" name="like_shop_id" form="admincng" placeholder="shop_id" value="{{old('like_shop_id')}}">
        <input type="text" id="like_shop_name" name="like_shop_name" form="admincng" placeholder="shop_name" value="{{old('like_shop_name')}}">
        @endif
        {{-- 評価 --}}
        @if($tab_item==='8')
        <input type="text" id="comment_id" name="comment_id" form="admincng" placeholder="id" value="{{old('comment_id')}}">
        <input type="text" id="comment_user_id" name="comment_user_id" form="admincng" placeholder="user_id" value="{{old('comment_user_id')}}">
        <input type="text" id="comment_user_name" name="comment_user_name" form="admincng" placeholder="user_name" value="{{old('comment_user_name')}}">
        <input type="text" id="comment_shop_id" name="comment_shop_id" form="admincng" placeholder="shop_id" value="{{old('comment_shop_id')}}">
        <input type="text" id="comment_shop_name" name="comment_shop_name" form="admincng" placeholder="shop_name" value="{{old('comment_shop_name')}}">
        <input type="text" id="comment_evaluation" name="comment_evaluation" form="admincng" placeholder="evaluation" value="{{old('comment_evaluation')}}">
        <input type="text" id="comment_comment" name="comment_comment" form="admincng" placeholder="comment" value="{{old('comment_comment')}}">
        @endif
      
      </section>



    </section>
    {{-- content end --}}

  </div>
</body>

</html>