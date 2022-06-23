<div class="tab_content" id="content1">
  <div class="tab_content_gide">
    {{-- 店舗代表者名で検索 --}}
    <label for="search_user_name" class="searchlabel">店舗代表者名で検索</label>
    <select name="search_user_id" id="search_user_id" class="serchinput" form="admin" onchange="adminSearch()">
      <option value="">すべて</option>
      @foreach($allusers as $user)
      <option value="{{$user->id}}" @if($user->id == old('search_user_id',$search_user_id ?? '')) selected @endif>{{$user->id.'：'.$user->name}}</option>
      @endforeach
    </select>
    {{-- 店舗名で検索 --}}
    <label for="search_shop_id" class="searchlabel">店舗名で検索</label>
    <select name="search_shop_id" id="search_shop_id" class="serchinput" form="admin" onchange="adminSearch()">
      <option value="">すべて</option>
      @foreach($allshops as $shop)
      <option value="{{$shop->id}}" @if($shop->id == old('search_shop_id',$search_shop_id ?? '')) selected @endif>{{$shop->id.'：'.$shop->name}}</option>
      @endforeach
    </select>
    {{--  --}}
    <div>{{$owners->total()}}件の「店舗代表者」が見つかりました。</div>
    {{-- ページネーション --}}
    <div class="page_info">
      <div class="page_counts">ー
        全{{$owners->total()}}件中
        @if($owners->total() > 0)
        {{$owners->firstItem()}}～{{$owners->lastItem()}}件
        @endif
      </div>
      @if($owners->total() > 0)
      {{$owners->appends(request()->input())->links('pagination::bootstrap-4')}}
      @endif
    </div>
  </div>
  <div class="table-owner_frame">
    <div class="tbl-owner tbl-head">
      <div></div>
      <div class="item-center item-id">ID</div>
      <div>店舗代表者名</div>
      <div>E-Mail</div>
      <div></div>
      <div>Pass Word</div>
      <div>店舗名</div>
      <div></div>
      <div>作成日<br>------<br>更新日</div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    @foreach($owners as $owner)
    @if($loop->iteration % 2)
      @if($create_item_id==$owner->id)
    <div class="tbl-owner tbl-odd tbl-newitem" id="tbl-item{{$owner->id}}">
      @else
    <div class="tbl-owner tbl-odd" id="tbl-item{{$owner->id}}">
      @endif
    @else
    <div class="tbl-owner tbl-even" id="tbl-item{{$owner->id}}">
    @endif
      {{-- チェックボックス --}}
      <div class="item-center item-checkbox">
        <input type="checkbox" name="" id="" form="">
      </div>
      {{-- id --}}
      <div class="item-center item-id" name="owner_id{{$owner->id}}" id="owner_id{{$owner->id}}">{{$owner->id}}</div>
      {{-- 店舗代表者名 --}}
      <div class="item-name">
        <input type="hidden" name="owner_user_id{{$owner->id}}" id="owner_user_id{{$owner->id}}" class="inputbox" value="{{$owner->user->id}}" form="admincng">
        <input type="text" name="owner_user_name{{$owner->id}}" id="owner_user_name{{$owner->id}}" class="inputbox" value="{{$owner->user->name}}" form="admincng" onchange="unregisteredOwner({{$owner->id}})">
        @if(($owner->id==old('owner_id')) && ($errors->has('owner_user_name')))
        <div class="error_disp">{{$errors->first('owner_user_name')}}</div>
        @endif
      </div>
      {{-- メール --}}
      <div class="item-email">
        <input type="text" name="owner_user_email{{$owner->id}}" id="owner_user_email{{$owner->id}}" class="inputbox" value="{{$owner->user->email}}" form="admincng" onchange="unregisteredOwner({{$owner->id}})">
        @if(($owner->id==old('owner_id')) && ($errors->has('owner_user_email')))
        <div class="error_disp">{{$errors->first('owner_user_email')}}</div>
        @endif
      </div>
      {{-- メール送信ボタン --}}
      <div class="item-center item-mailsend">
        <button class="btn btn-mailsend">メール送信</button>
      </div>
      {{-- パスワード --}}
      <div class="item-password">
        <input type="text" name="owner_user_password{{$owner->id}}" id="owner_user_password{{$owner->id}}" class="inputbox" value="{{$owner->user->password}}" form="admincng" onchange="unregisteredOwner({{$owner->id}})">
        @if(($owner->id==old('owner_id')) && ($errors->has('owner_user_password')))
        <div class="error_disp">{{$errors->first('owner_user_password')}}</div>
        @endif
      </div>
      {{-- 店舗名 --}}
      <div class="item-shop_name">
        <select name="owner_shop_id{{$owner->id}}" id="owner_shop_id{{$owner->id}}" class="selectbox" form="admincng" onchange="unregisteredOwner({{$owner->id}})">
          <option value="{{($owner->shop->id ?? '9999')}}">{{($owner->shop->id ?? '9999').'：'.($owner->shop->name ?? '未登録')}}
          </option>
          @foreach($allshops as $shop)
          <option value="{{$shop->id}}" @if(($owner->shop->id ?? '9999') == $shop->id) selected @endif>{{$shop->id.'：'.$shop->name}}</option>
          @endforeach
        </select>
        @if(($owner->id==old('owner_id')) && ($errors->has('owner_shop_id')))
        <div class="error_disp">{{$errors->first('owner_shop_id')}}</div>
        @endif
      </div>
      {{-- 店舗詳細ボタン --}}
      <div class="item-center item-detail">
        <button class="btn btn-detail" type="submit" formaction="/shop/detail/{{($owner->shop->id ?? '9999')}}" formmethod="get"
          form="admin">店舗詳細</button>
      </div>
      {{-- 作成日/更新日 --}}
      <div class="item-created">{{$owner->created_at}}<span class="hr"></span>{{$owner->updated_at}}</div>
      {{-- 登録ボタン --}}
      <div class="item-center item-modify">
        <button class="btn btn-modify" type="submit" onclick="unregisteredOwnerSend({{$owner->id}})">登録</button>
      </div>
      {{-- 削除ボタン --}}
      <div class="item-center item-delete">
        <button class="btn btn-delete" type="submit" formaction="/admin?owner_id={{$owner->id}}" form="admindel">削除</button>        
      </div>
      {{-- 終端 --}}
      <div class="item-terminal"></div>
    </div>
    @endforeach
  </div>
</div>