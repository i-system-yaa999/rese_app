<div class="tab_content" id="content6">
  <div class="tab_content_gide">
    {{-- ユーザー名で検索 --}}
    <label for="search_user_id" class="searchlabel">ユーザー名で検索</label>
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
    {{-- 予約年月で検索 --}}
    <label for="search_reserve_date" class="searchlabel">予約年月で検索</label>
    <input type="date" name="search_reserve_date" id="search_reserve_date" class="serchinput" value="{{old('search_reserve_date',$search_reserve_date ?? '')}}" form="admin" onchange="adminSearch()">
    {{--  --}}
    <div>{{$reserves->total()}}件の「予約」が見つかりました。</div>
    {{-- ページネーション --}}
    <div class="page_info">
      <div class="page_counts">
        全{{$reserves->total()}}件中
        @if($reserves->total() > 0)
        {{$reserves->firstItem()}}～{{$reserves->lastItem()}}件
        @endif
      </div>
      @if($reserves->total() > 0)
      {{$reserves->appends(request()->input())->links('pagination::bootstrap-4')}}
      @endif
    </div>
  </div>
  <div class="table-reserve_frame">
    <div class="tbl-reserve tbl-head">
      <div></div>
      <div class="item-center item-id">ID</div>
      <div>予約者名</div>
      <div>E-Mail</div>
      <div></div>
      <div>店舗名</div>
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
      {{-- id --}}
      <div class="item-center item-id" name="reserve_id{{$reserve->id}}" id="reserve_id{{$reserve->id}}">{{$reserve->id}}</div>
      {{-- ユーザー名 --}}
      <div class="item-center item-user-name">
        <select name="reserve_user_id{{$reserve->id}}" id="reserve_user_id{{$reserve->id}}" class="selectbox" form="admincng" onchange="unregisteredReserve({{$reserve->id}})">
          <option value="{{$reserve->user->id}}">{{$reserve->user->id.'：'.$reserve->user->name}}</option>
          @foreach($allusers as $user)
          <option value="{{$user->id}}" @if($reserve->user->id == $user->id) selected @endif>{{$user->id.'：'.$user->name}}</option>
          @endforeach
        </select>
        @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_user_id')))
        <div class="error_disp">{{$errors->first('reserve_user_id')}}</div>
        @endif
      </div>
      {{-- メール --}}
      <div class="item-email">{{$reserve->user->email}}</div>
      {{-- メール送信ボタン --}}
      <div class="item-center item-mailsend"><button class="btn btn-mailsend">メール送信</button></div>
      {{-- 店舗名 --}}
      <div class="item-shop-name">
        <select name="reserve_shop_id{{$reserve->id}}" id="reserve_shop_id{{$reserve->id}}" class="selectbox" form="admincng" onchange="unregisteredReserve({{$reserve->id}})">
          <option value="{{$reserve->shop->id}}">{{$reserve->shop->id.'：'.$reserve->shop->name}}</option>
          @foreach($allshops as $shop)
          <option value="{{$shop->id}}" @if($reserve->shop->id == $shop->id) selected @endif>{{$shop->id.'：'.$shop->name}}</option>
          @endforeach
        </select>
        @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_shop_id')))
        <div class="error_disp">{{$errors->first('reserve_shop_id')}}</div>
        @endif
      </div>
      {{-- 予約日時 --}}
      <div class="item-reserved">
        <div>
          <input type="date" name="reserve_date{{$reserve->id}}" id="reserve_date{{$reserve->id}}" class="inputbox inputdate" value="{{date('Y-m-d', strtotime($reserve->reserved_at))}}" form="admincng" onchange="unregisteredReserve({{$reserve->id}})">
          @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_date')))
          <div class="error_disp">{{$errors->first('reserve_date')}}</div>
          @endif
        </div>
        <div>&nbsp;</div>
        <div>
          <input type="time" name="reserve_time{{$reserve->id}}" id="reserve_time{{$reserve->id}}" class="inputbox inputdate" value="{{date('H:i', strtotime($reserve->reserved_at))}}" form="admincng" onchange="unregisteredReserve({{$reserve->id}})">
          @if(($reserve->id==old('reserve_id')) && ($errors->has('reserve_time')))
          <div class="error_disp">{{$errors->first('reserve_time')}}</div>
          @endif
        </div>      
      </div>
      {{-- 予約人数 --}}
      <div class="item-center item-number">
        <select name="reserve_number{{$reserve->id}}" id="reserve_number{{$reserve->id}}" class="selectbox" form="admincng" onchange="unregisteredReserve({{$reserve->id}})">
          <option value="{{$reserve->number}}">{{$reserve->number}}人</option>
          @for($i=1;$i<100;$i++)
          <option value="{{$i}}" @if($reserve->number == $i) selected @endif>{{$i}}人</option>
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
        <button class="btn btn-modify" type="submit" onclick="unregisteredReserveSend({{$reserve->id}})">登録</button>
      </div>
      {{-- 削除ボタン --}}
      <div class="item-center item-delete">
        <button class="btn btn-delete" type="submit" formaction="/admin?reserve_id={{$reserve->id}}" form="admindel">削除</button>
      </div>
      {{-- 終端 --}}
      <div class="item-terminal"></div>
    </div>
    @endforeach
  </div>
</div>