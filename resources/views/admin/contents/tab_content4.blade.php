<div class="tab_content" id="content4">
  <div class="tab_content_gide">
    {{-- エリア名で検索 --}}
    <label for="search_area_name" class="searchlabel">エリア名で検索</label>
    <input type="search" name="search_area_name" id="search_area_name"placeholder="エリア名を入力" class="serchinput" value="{{old('search_area_name',$search_area_name ?? '')}}" form="admin">
    <button class="btn btn-search" type="submit" form="admin" onclick="adminSearch()">検索</button>
    {{--  --}}
    <div>{{$areas->total()}}件の「エリア」が見つかりました。</div>
    {{-- ページネーション --}}
    <div class="page_info">
      <div class="page_counts">
        全{{$areas->total()}}件中
        @if($areas->total() > 0)
        {{$areas->firstItem()}}～{{$areas->lastItem()}}件
        @endif
      </div>
      @if($areas->total() > 0)
      {{$areas->appends(request()->input())->links('pagination::bootstrap-4')}}
      @endif
    </div>
  </div>
  <div class="table-area_frame">
    <div class="tbl-area tbl-head">
      <div></div>
      <div class="item-center item-id">ID</div>
      <div>エリア名</div>
      <div></div>
      <div>作成日<br>------<br>更新日</div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    @foreach($areas as $area)
    @if($loop->iteration % 2)
      @if($create_item_id==$area->id)
    <div class="tbl-area tbl-odd tbl-newitem" id="tbl-item{{$area->id}}">
      @else
    <div class="tbl-area tbl-odd" id="tbl-item{{$area->id}}">
      @endif
    @else
    <div class="tbl-area tbl-even" id="tbl-item{{$area->id}}">
    @endif
      {{-- チェックボックス --}}
      <div class="item-center item-checkbox">
        <input type="checkbox" name="" id="">
      </div>
      {{-- id --}}
      <div class="item-center item-id" name="area_id{{$area->id}}" id="area_id{{$area->id}}">{{$area->id}}</div>
      {{-- エリア名 --}}
      <div class="item-name">
        <input type="text" name="area_name{{$area->id}}" id="area_name{{$area->id}}" class="inputbox" value="{{$area->name}}" form="admincng" onchange="unregisteredArea({{$area->id}})">
        @if(($area->id==old('area_id')) && ($errors->has('area_name')))
        <div class="error_disp">{{$errors->first('area_name')}}</div>
        @endif
      </div>
      {{-- ダミー --}}
      <div class="item-dummy"></div>
      {{-- 作成日/更新日 --}}
      <div class="item-created">{{$area->created_at}}<span class="hr"></span>{{$area->updated_at}}</div>
      {{-- 登録ボタン --}}
      <div class="item-center item-modify">
        {{-- <button class="btn btn-modify" type="submit" formaction="/admin?area_id={{$area->id}}" form="admincng">登録</button> --}}
        <button class="btn btn-modify" type="submit" onclick="unregisteredAreaSend({{$area->id}})">登録</button>
      </div>
      {{-- 削除ボタン --}}
      <div class="item-center item-delete">
        <button class="btn btn-delete" type="submit" formaction="/admin?area_id={{$area->id}}" form="admindel">削除</button>
      </div>
      {{-- 終端 --}}
      <div class="item-terminal"></div>
    </div>
    @endforeach
  </div>
</div>