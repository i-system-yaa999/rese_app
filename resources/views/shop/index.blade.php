<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/shop/index.css')}}">
  <title>RESE</title>
</head>

<body>
  <script src="{{asset('js/main.js')}}"></script>
  @include('layouts.header')
  @include('layouts.forms')
  {{--$ret--}}
  <section class="content_main">
    <div class=tabs>

      <!-- tab menu -------------------------------------------------------------------------------- -->

      <!-- tab menu 全て -->
      <input type="radio" name="tab_item" id="all" value=0 @if($tab_item==0) checked @endif onChange="tabChange()" form="search">
      <label class=" tab_item" for="all">全て</label>

      <!-- tab menu エリア -->
      <input type="radio" name="tab_item" id="area" value=1 @if($tab_item==1) checked @endif onChange="tabChange()" form="search">
      <label class="tab_item" for="area">エリア</label>

      <!-- tab menu ジャンル -->
      <input type="radio" name="tab_item" id="genre" value=2 @if($tab_item==2) checked @endif onChange="tabChange()" form="search">
      <label class="tab_item" for="genre">ジャンル</label>

      <!-- tab menu 店名 -->
      <input type="radio" name="tab_item" id="name" value=3 @if($tab_item==3) checked @endif onChange="tabChange()" form="search">
      <label class="tab_item" for="name">店名</label>

      <!-- tab contents -------------------------------------------------------------------------------- -->

      <!-- tab contents 全て -------------------------------------------------------------------------------- -->
      @if( isset($shops) && empty($areas) && empty($genres) && empty($names) )
      {{--@if($tab_item==='0')--}}
      <div class="tab_content" id="all_content">
        <div class="content_nav">
          <p>{{$shops->total()}}件のお店が見つかりました。</p>
          <!-- ページネーション -->
          <div class="page_info">
            <div class="page_counts">
              全{{$shops->total()}}件中
              @if($shops->total() > 0)
              {{$shops->firstItem()}}～{{$shops->lastItem()}}件
              @endif
            </div>
            @if($shops->total() > 0)
            {{$shops->appends(request()->input())->links('pagination::bootstrap-4')}}
            @endif
          </div>
        </div>
        <!--  -->
        <div class="content_data">
          <!-- 店舗情報 -->
          @if(isset($shops))
          {{--dd($shops)--}}
          <?php //$shops=$shops_all 
          ?>
          @foreach($shops as $shop)
          @include('layouts.content')
          @endforeach
          @endif
        </div>
        <!-- ページネーション -->
        <div class="page_info">
          <div class="page_counts">
          </div>
          @if($shops->total() > 0)
          {{$shops->appends(request()->input())->links('pagination::bootstrap-4')}}
          @endif
        </div>
      </div>
      @else
      <div class="tab_content" id="all_content">
        <div class="content_nav">
          <p>読み出し中</p>
        </div>
      </div>
      @endif
      <!-- ----- tab end ----- -->

      <!-- tab contents エリア -------------------------------------------------------------------------------- -->
      @if(isset($areas))
      {{--@if($tab_item==='1')--}}
      <div class="tab_content" id="area_content">
        <div class="content_nav">
          @if(isset($shops))
          <p>{{$shops->total()}}件のお店が見つかりました。</p>
          {{-- <p>{{$shops->count()}}件のお店が見つかりました。</p> --}}
          <!-- ページネーション -->
          <div class="page_info">
            <div class="page_counts">
              全{{$shops->total()}}件中
              @if($shops->total() > 0)
              {{$shops->firstItem()}}～{{$shops->lastItem()}}件
              @endif
            </div>
            @if($shops->total() > 0)
            {{$shops->appends(request()->input())->links('pagination::bootstrap-4')}}
            @endif
          </div>
          @endif
          {{--$areas->count()--}}
          <select name="selected_area" onchange=selectboxChange() form="search">
            <option value="0">エリアを選択してください</option>
            @if(isset($areas))
            @foreach($areas as $area)
            <option value="{{$area->id}}" @if($selected_area==$area->id) selected @endif>{{$area->name}}({{$area->getAreaCount()}}件)</option>
            @endforeach
            @endif
          </select>
        </div>
        <!--  -->
        <div class="content_data">
          <!-- 店舗情報 -->
          @if(isset($shops))
          {{--dd($shops)--}}
          <?php //$shops=$shops_area 
          ?>
          @foreach($shops as $shop)
          @include('layouts.content')
          @endforeach
          @endif
        </div>
      </div>
      @else
      <div class="tab_content" id="area_content">
        <div class="content_nav">
          <p>読み出し中</p>
        </div>
      </div>
      @endif
      <!-- ----- tab end ----- -->

      <!-- tab contents ジャンル -------------------------------------------------------------------------------- -->
      @if(isset($genres))
      {{--@if($tab_item==='2')--}}
      <div class="tab_content" id="genre_content">
        <div class="content_nav">
          @if(isset($shops))
          <p>{{$shops->total()}}件のお店が見つかりました。</p>
          {{-- <p>{{$shops->count()}}件のお店が見つかりました。</p> --}}
          <!-- ページネーション -->
          <div class="page_info">
            <div class="page_counts">
              全{{$shops_genre->total()}}件中
              @if($shops_genre->total() > 0)
              {{$shops_genre->firstItem()}}～{{$shops_genre->lastItem()}}件
              @endif
            </div>
            @if($shops_genre->total() > 0)
            {{$shops_genre->appends(request()->input())->links('pagination::bootstrap-4')}}
            @endif
          </div>
          @endif
          {{--$genres->count()--}}
          <select name="selected_genre" onchange=selectboxChange() form="search">
            <option value="0">ジャンルを選択してください</option>
            @if(isset($genres))
            @foreach($genres as $genre)
            <option value="{{$genre->id}}" @if($selected_genre==$genre->id) selected @endif>{{$genre->name}}({{$genre->getGenreCount()}}件)</option>
            @endforeach
            @endif
          </select>
        </div>
        <!--  -->
        <div class="content_data">
          <!-- 店舗情報 -->
          @if(isset($shops))
          {{--dd($shops)--}}
          <?php //$shops = $shops_genre 
          ?>
          @foreach($shops as $shop)
          @include('layouts.content')
          @endforeach
          @endif
        </div>
      </div>
      @else
      <div class="tab_content" id="genre_content">
        <div class="content_nav">
          <p>読み出し中</p>
        </div>
      </div>
      @endif
      <!-- ----- tab end ----- -->

      <!-- tab contents 店名 -------------------------------------------------------------------------------- -->
      @if(isset($names))
      {{--@if($tab_item==='3')--}}
      <div class="tab_content" id="name_content">
        <div class="content_nav">
          @if(isset($shops))
          <p>{{$shops->total()}}件のお店が見つかりました。</p>
          {{-- <p>{{$shops->count()}}件のお店が見つかりました。</p> --}}
          <!-- ページネーション -->
          <div class="page_info">
            <div class="page_counts">
              全{{$shops->total()}}件中
              @if($shops->total() > 0)
              {{$shops->firstItem()}}～{{$shops->lastItem()}}件
              @endif
            </div>
            @if($shops->total() > 0)
            {{$shops->appends(request()->query())->links('pagination::bootstrap-4')}}
            @endif
          </div>
          @endif
          <p>検索したいお店の名前を入力してください</p>
          <label for="search_name"></label><input type="text" name="search_name" value="{{$search_name}}" form="search" required>
          <button class="content_search" type="submit" formaction="/shop/search" formmethod="get" form="search">検索</button>
        </div>
        <!--  -->
        <div class="content_data">
          <!-- 店舗情報 -->
          @if(isset($shops))
          {{--dd($shops)--}}
          <?php //$shops=$shops_name 
          ?>
          @foreach($shops as $shop)
          @include('layouts.content')
          @endforeach
          @endif
        </div>
      </div>
      @else
      <div class="tab_content" id="name_content">
        <div class="content_nav">
          <p>読み出し中</p>
        </div>
      </div>
      @endif
      <!-- ----- tab end ----- -->
    </div>
  </section>
  @include('layouts.footer')
</body>

</html>