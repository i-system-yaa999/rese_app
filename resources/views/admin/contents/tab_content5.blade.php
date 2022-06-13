<div class="tab_content" id="content5">
  <div class="tab_content_gide">
    <label for="search_genre" class="searchlabel">ジャンル名で検索</label>
    <input type="search" name="search_genre" id="search_genre" placeholder="ジャンル名を入力" class="serchinput"><button class="btn btn-search">検索</button>
    <div>{{$genres->total()}}件の「ジャンル」が見つかりました。</div>
    {{-- ページネーション --}}
    <div class="page_info">
      <div class="page_counts">
        全{{$genres->total()}}件中
        @if($genres->total() > 0)
        {{$genres->firstItem()}}～{{$genres->lastItem()}}件
        @endif
      </div>
      @if($genres->total() > 0)
      {{$genres->appends(request()->input())->links('pagination::bootstrap-4')}}
      @endif
    </div>
  </div>
  <div class="table-genre_frame">
    <div class="tbl-genre tbl-head">
      <div></div>
      <div class="item-center item-id">ID</div>
      <div>ジャンル名</div>
      <div></div>
      <div>作成日<br>------<br>更新日</div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    @foreach($genres as $genre)
    @if($loop->iteration % 2)
      @if($create_item_id==$genre->id)
    <div class="tbl-genre tbl-odd tbl-newitem" id="tbl-item{{$genre->id}}">
      @else
    <div class="tbl-genre tbl-odd" id="tbl-item{{$genre->id}}">
      @endif
    @else
    <div class="tbl-genre tbl-even" id="tbl-item{{$genre->id}}">
    @endif
      {{-- チェックボックス --}}
      <div class="item-center item-checkbox">
        <input type="checkbox" name="" id="">
      </div>
      {{-- id --}}
      <div class="item-center item-id" name="genre_id{{$genre->id}}" id="genre_id{{$genre->id}}">{{$genre->id}}</div>
      {{-- ジャンル名 --}}
      <div class="item-name">
        <input type="text" name="genre_name{{$genre->id}}" id="genre_name{{$genre->id}}" class="inputbox" value="{{$genre->name}}" form="admincng" onchange="unregisteredGenre({{$genre->id}})">
        @if(($genre->id==old('genre_id')) && ($errors->has('genre_name')))
        <div class="error_disp">{{$errors->first('genre_name')}}</div>
        @endif
      </div>
      {{-- ダミー --}}
      <div class="item-dummy"></div>
      {{-- 作成日/更新日 --}}
      <div class="item-created">{{$genre->created_at}}<span class="hr"></span>{{$genre->updated_at}}</div>
      {{-- 登録ボタン --}}
      <div class="item-center item-modify">
        {{-- <button class="btn btn-modify" type="submit" formaction="/admin?genre_id={{$genre->id}}" form="admincng">登録</button> --}}
        <button class="btn btn-modify" type="submit" onclick="unregisteredGenreSend({{$genre->id}})">登録</button>
      </div>
      {{-- 削除ボタン --}}
      <div class="item-center item-delete">
        <button class="btn btn-delete" type="submit" formaction="/admin?genre_id={{$genre->id}}" form="admindel">削除</button>
      </div>
      {{-- 終端 --}}
      <div class="item-terminal"></div>
    </div>
    @endforeach
  </div>
</div>