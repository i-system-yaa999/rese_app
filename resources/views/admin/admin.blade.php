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
        <p class="">店舗代表者</p>
        <p class="nav_content_item">新規追加</p>
        <p class="nav_content_item">選択削除</p>
        <p class="nav_content_item">メール送信</p>
      </div>
      @endif
      
      {{-- nav content 2 --}}
      @if($tab_item==='2')
      <div class="nav_content" id="content2">
        <p class="">ユーザー</p>
        <p class="nav_content_item">新規追加</p>
        <p class="nav_content_item">選択削除</p>
        <p class="nav_content_item">メール送信</p>
      </div>
      @endif
      
      {{-- nav content 3 --}}
      @if($tab_item==='3')
      <div class="nav_content" id="content3">
        <p class="">店舗</p>
        <p class="nav_content_item">新規追加</p>
        <p class="nav_content_item">選択削除</p>
      </div>
      @endif
      
      {{-- nav content 4 --}}
      @if($tab_item==='4')
      <div class="nav_content" id="content4">
        <p class="">エリア</p>
        <p class="nav_content_item">新規追加</p>
        <p class="nav_content_item">選択削除</p>
      </div>
      @endif
      
      {{-- nav content 5 --}}
      @if($tab_item==='5')
      <div class="nav_content" id="content5">
        <p class="">ジャンル</p>
        <p class="nav_content_item">新規追加</p>
        <p class="nav_content_item">選択削除</p>
      </div>
      @endif
      
      {{-- nav content 6 --}}
      @if($tab_item==='6')
      <div class="nav_content" id="content6">
        <p class="">予約</p>
        <p class="nav_content_item">新規追加</p>
        <p class="nav_content_item">選択削除</p>
        <p class="nav_content_item">メール送信</p>
      </div>
      @endif
      
      {{-- nav content 7 --}}
      @if($tab_item==='7')
      <div class="nav_content" id="content7">
        <p class="">お気に入り</p>
        <p class="nav_content_item">新規追加</p>
        <p class="nav_content_item">選択削除</p>
      </div>
      @endif
      
      {{-- nav content 8 --}}
      @if($tab_item==='8')
      <div class="nav_content" id="content8">
        <p class="">評価</p>
        <p class="nav_content_item">新規追加</p>
        <p class="nav_content_item">選択削除</p>
      </div>
      @endif

    </nav>
    {{-- nav end --}}

    <form action="/admin" id="admin"></form>

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

    </section>
    {{-- content end --}}
  </div>
</body>

<script>
  
  /* -------------------------------------------------- */
  function tabChange() {
  let form = document.getElementById('admin');
  // form.action = '/shop';
  // form.method = 'get';
  form.submit();
  }
</script>

</html>