<!-- 店舗情報 -->
<div class="content_item">
  <!-- 店舗イメージ -->
  <img class="content_item_image" src="{{asset($shop->image_url)}}" alt="">
  <div class="content_inner_frame">
    <!-- 店舗名 -->
    <h3 class="shop_name">{{$shop->id}}：{{$shop->name}}</h3>
    <!-- 店舗詳細 -->
    <p class="content_summary">{{$shop->summary}}</p>
    <p class="content_hashtag">
      <!-- エリア -->
      <input type="radio" name="tab_item" id="area" value=1 onChange="tabChange()">
      <label class="shop_address" for="area">#{{--$shop->getAreaName()--}}{{$shop->area->name}}</label>
      <!-- ジャンル -->
      <input type="radio" name="tab_item" id="genre" value=2 onChange="tabChange()">
      <label class="shop_genre" for="genre">#{{--$shop->getGenreName()--}}{{$shop->genre->name}}</label>
    </p>
    <div class="content_action">
      <!-- 詳細ページリンク -->
      <button class="content_submit" type="submit" formaction="/shop/detail/{{$shop->id}}" formmethod="get" form="detail">詳しく見る</button>
      <!-- お気に入り -->
      <div class="like_disp">
        @auth
        @if(!($shop->getLike()==null))
        <button type="submit" class="like_on" title="お気に入り" formaction="/like/{{$shop->id}}" form="likedel"></button>
        @else
        <button type="submit" class="like_off" title="お気に入り" formaction="/like/{{$shop->id}}" form="like"></button>
        @endif
        @endauth
        <!-- 登録者数 -->
        <div class="like_count">
          <p>登録者数</p>
          <p>{{$shop->likes_count}}人</p>
        </div>
      </div>
    </div>
  </div>
</div>