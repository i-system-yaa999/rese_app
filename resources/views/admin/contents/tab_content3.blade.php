<div class="tab_content" id="content3">
  <div class="tab_content_gide">
    <label for="search_shop" class="searchlabel">店舗名で検索</label>
    <input type="search" name="search_shop" id="search_shop" placeholder="店舗名を入力" class="serchinput"><button class="btn btn-search">検索</button>
    <label for="area_name" class="searchlabel">エリアで検索</label>
    <select name="area_name" id="area_name" class="serchinput" onchange="" form="">
      <option value="0">エリアを選択してください</option>
    </select>
    <label for="genre_name" class="searchlabel">ジャンルで検索</label>
    <select name="genre_name" id="genre_name" class="serchinput" onchange="" form="">
      <option value="0">ジャンルを選択してください</option>
    </select>
    <div>{{$shops->total()}}件の「店舗」が見つかりました。</div>
    {{-- ページネーション --}}
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
  <div class="table-shop_frame">
    <div class="tbl-shop tbl-head">
      <div></div>
      <div class="item-center item-id">ID</div>
      <div>店舗名</div>
      {{-- <div class="item-center item-id">エリアID</div> --}}
      <div>エリア</div>
      {{-- <div class="item-center item-id">ジャンルID</div> --}}
      <div>ジャンル</div>
      <div>コメント</div>
      <div>イメージ</div>
      <div>お気に入り数</div>
      <div></div>
      <div>作成日<br>------<br>更新日</div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    @foreach($shops as $shop)
    @if($loop->iteration % 2)
      @if($create_item_id==$shop->id)
    <div class="tbl-shop tbl-odd tbl-newitem" id="tbl-item{{$shop->id}}">
      @else
    <div class="tbl-shop tbl-odd" id="tbl-item{{$shop->id}}">
      @endif
    @else
    <div class="tbl-shop tbl-even" id="tbl-item{{$shop->id}}">
    @endif
      {{-- チェックボックス --}}
      <div class="item-center item-checkbox">
        <input type="checkbox" name="" id="">
      </div>
      {{-- id --}}
      <div class="item-center item-id" name="shop_id{{$shop->id}}" id="shop_id{{$shop->id}}">{{$shop->id}}</div>
      {{-- 店舗名 --}}
      <div class="item-name">
        <input type="text" name="shop_name{{$shop->id}}" id="shop_name{{$shop->id}}" class="inputbox" value="{{$shop->name}}" form="admincng" onchange="unregisteredShop({{$shop->id}})">
        @if(($shop->id==old('shop_id')) && ($errors->has('shop_name')))
        <div class="error_disp">{{$errors->first('shop_name')}}</div>
        @endif
      </div>
      {{-- エリア名 --}}
      <div class="item-area-name">
        {{-- <input type="hidden" name="" class="inputbox" value="{{$shop->area->id}}"> --}}
        <select name="shop_area_id{{$shop->id}}" id="shop_area_id{{$shop->id}}" class="selectbox" form="admincng" onchange="unregisteredShop({{$shop->id}})">
          <option value="{{($shop->area->id ?? '9999')}}">{{($shop->area->id ?? '9999').'：'.($shop->area->name ?? '未登録')}}</option>
          @foreach($allareas as $area)
          <option value="{{$area->id}}" @if(($shop->area->id ?? '9999') == $area->id) selected @endif>{{$area->id.'：'.$area->name}}</option>
          @endforeach
        </select>
        @if(($shop->id==old('shop_id')) && ($errors->has('shop_area_id')))
        <div class="error_disp">{{$errors->first('shop_area_id')}}</div>
        @endif
      </div>
      {{-- ジャンル名 --}}
      <div class="item-genre-name">
        {{-- <input type="hidden" name="" class="inputbox" value="{{$shop->genre->id}}"> --}}
        <select name="shop_genre_id{{$shop->id}}" id="shop_genre_id{{$shop->id}}" class="selectbox" form="admincng" onchange="unregisteredShop({{$shop->id}})">
          <option value="{{($shop->genre->id ?? '9999')}}">{{($shop->genre->id ?? '9999').'：'.($shop->genre->name ?? '未登録')}}
          </option>
          @foreach($allgenres as $genre)
          <option value="{{$genre->id}}" @if(($shop->genre->id ?? '9999') == $genre->id) selected @endif>{{$genre->id.'：'.$genre->name}}</option>
          @endforeach
        </select>
        @if(($shop->id==old('shop_id')) && ($errors->has('shop_genre_id')))
        <div class="error_disp">{{$errors->first('shop_genre_id')}}</div>
        @endif
      </div>
      {{-- 店舗詳細 --}}
      <div class="item-summary">
        <input type="text" name="shop_summary{{$shop->id}}" id="shop_summary{{$shop->id}}" class="inputbox" value="{{$shop->summary}}" form="admincng" onchange="unregisteredShop({{$shop->id}})">
        @if(($shop->id==old('shop_id')) && ($errors->has('shop_summary')))
        <div class="error_disp">{{$errors->first('shop_summary')}}</div>
        @endif   
      </div>
      {{-- 店舗イメージurl --}}
      <div class="item-url">
        <input type="text" name="shop_image_url{{$shop->id}}" id="shop_image_url{{$shop->id}}" class="inputbox" value="{{$shop->image_url}}" form="admincng" onchange="unregisteredShop({{$shop->id}})">
        @if(($shop->id==old('shop_id')) && ($errors->has('shop_image_url')))
        <div class="error_disp">{{$errors->first('shop_image_url')}}</div>
        @endif
      </div>
      {{-- お気に入りカウント --}}
      <div class="item-center item-likes-count">{{$shop->likes_count}}</div>
      {{-- 店舗詳細ボタン --}}
      <div class="item-center item-detail">
        <button class="btn btn-detail" type="submit" formaction="/shop/detail/{{$shop->id}}" formmethod="get"
          form="detail">店舗詳細</button>
      </div>
      {{-- 作成日/更新日 --}}
      <div class="item-created">{{$shop->created_at}}<span class="hr"></span>{{$shop->updated_at}}</div>
      {{-- 登録ボタン --}}
      <div class="item-center item-modify">
        {{-- <button class="btn btn-modify" type="submit" formaction="/admin?shop_id={{$shop->id}}" form="admincng">登録</button> --}}
        <button class="btn btn-modify" type="submit" onclick="unregisteredShopSend({{$shop->id}})">登録</button>
      </div>
      {{-- 削除ボタン --}}
      <div class="item-center item-delete">
        <button class="btn btn-delete" type="submit" formaction="/admin?shop_id={{$shop->id}}" form="admindel">削除</button>
      </div>
      {{-- 終端 --}}
      <div class="item-terminal"></div>
    </div>
    @endforeach
  </div>
</div>