<div class="tab_content" id="content2">
  <div class="tab_content_gide">
    <label for="search_user" class="searchlabel">ユーザー名で検索</label>
    <input type="search" name="search_user" id="search_user" placeholder="ユーザー名を入力" class="serchinput"><button class="btn btn-search">検索</button>
    <label for="shop_name" class="searchlabel">店舗名で検索</label>
    <select name="shop_name" id="shop_name" class="serchinput" onchange="" form="">
      <option value="">選択してください</option>
    </select>
    <div>{{$likes->total()}}件の「お気に入り登録」が見つかりました。</div>
    {{-- ページネーション --}}
    <div class="page_info">
      <div class="page_counts">
        全{{$likes->total()}}件中
        @if($likes->total() > 0)
        {{$likes->firstItem()}}～{{$likes->lastItem()}}件
        @endif
      </div>
      @if($likes->total() > 0)
      {{$likes->appends(request()->input())->links('pagination::bootstrap-4')}}
      @endif
    </div>
  </div>
  <div class="table-like_frame">
    <div class="tbl-like tbl-head">
      <div></div>
      <div class="item-center item-id">ID</div>
      {{-- <div class="item-id">ユーザーID</div> --}}
      <div>ユーザー名</div>
      {{-- <div class="item-id">店舗ID</div> --}}
      <div>店舗名</div>
      <div></div>
      {{-- <div></div> --}}
      <div>作成日<br>------<br>更新日</div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    @foreach($likes as $like)
    @if($loop->iteration % 2)
      @if($create_item_id==$like->id)
    <div class="tbl-like tbl-odd tbl-newitem" id="tbl-item{{$like->id}}">
      @else
    <div class="tbl-like tbl-odd" id="tbl-item{{$like->id}}">
      @endif
    @else
    <div class="tbl-like tbl-even" id="tbl-item{{$like->id}}">
    @endif
        {{-- チェックボックス --}}
        <div class="item-center item-checkbox">
          <input type="checkbox" name="" id="">
        </div>
        {{-- id --}}
        <div class="item-center item-id" name="like_id{{$like->id}}" id="like_id{{$like->id}}">{{$like->id}}</div>
        {{-- ユーザー名 --}}
        <div class="item-user-name">
          {{-- <input type="hidden" name="" class="inputbox" value="{{$like->user->id}}"> --}}
          <select name="like_user_id{{$like->id}}" id="like_user_id{{$like->id}}" class="selectbox" form="admincng" onchange="unregisteredLike({{$like->id}})">
            <option value="{{($like->user->id ?? '9999')}}">{{($like->user->id ?? '9999').'：'.($like->user->name ?? '未登録')}}</option>
            @foreach($allusers as $user)
            <option value="{{$user->id}}" @if(($like->user->id ?? '9999') == $user->id) selected @endif>{{$user->id.'：'.$user->name}}</option>
            @endforeach
          </select>
          @if(($like->id==old('like_id')) && ($errors->has('like_user_id')))
          <div class="error_disp">{{$errors->first('like_user_id')}}</div>
          @endif
        </div>
        {{-- 店舗名 --}}
        <div class="item-shopname">
          {{-- <input type="hidden" name="" class="inputbox" value="{{$like->shop->id}}"> --}}
          <select name="like_shop_id{{$like->id}}" id="like_shop_id{{$like->id}}" class="selectbox" form="admincng" onchange="unregisteredLike({{$like->id}})">
            <option value="{{($like->shop->id ?? '9999')}}">{{($like->shop->id ?? '9999').'：'.($like->shop->name ?? '未登録')}}
            </option>
            @foreach($allshops as $shop)
            <option value="{{$shop->id}}" @if(($like->shop->id ?? '9999') == $shop->id) selected @endif>{{$shop->id.'：'.$shop->name}}</option>
            @endforeach
          </select>
          @if(($like->id==old('like_id')) && ($errors->has('like_shop_id')))
          <div class="error_disp">{{$errors->first('like_shop_id')}}</div>
          @endif
        </div>
        {{-- ダミー --}}
        <div class="item-dummy"></div>
        {{-- 作成日/更新日 --}}
        <div class="item-created">{{$like->created_at}}<span class="hr"></span>{{$like->updated_at}}</div>
        {{-- 登録ボタン --}}
        <div class="item-center item-modify">
          {{-- <button class="btn btn-modify" type="submit" formaction="/admin?like_id={{$like->id}}" form="admincng">登録</button> --}}
          <button class="btn btn-modify" type="submit" onclick="unregisteredLikeSend({{$like->id}})">登録</button>
        </div>
        {{-- 削除ボタン --}}
        <div class="item-center item-delete">
          <button class="btn btn-delete" type="submit" formaction="/admin?like_id={{$like->id}}" form="admindel">削除</button>
        </div>
        {{-- 終端 --}}
        <div class="item-terminal"></div>
      </div>
      @endforeach
  </div>
</div>