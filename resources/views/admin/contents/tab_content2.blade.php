<div class="tab_content" id="content2">
  <div class="tab_content_gide">
    {{-- ユーザー名で検索 --}}
    <label for="search_user_name" class="searchlabel">ユーザー名で検索</label>
    <input type="search" name="search_user_name" id="search_user_name" placeholder="ユーザー名を入力" class="serchinput" value="{{old('search_user_name',$search_user_name ?? '')}}" form="admin">
    <button class="btn btn-search" type="submit" form="admin" onclick="adminSearch()">検索</button>
    {{--  --}}
    <div>{{$users->total()}}件の「ユーザー」が見つかりました。</div>
    {{-- ページネーション --}}
    <div class="page_info">
      <div class="page_counts">
        全{{$users->total()}}件中
        @if($users->total() > 0)
        {{$users->firstItem()}}～{{$users->lastItem()}}件
        @endif
      </div>
      @if($users->total() > 0)
      {{$users->appends(request()->input())->links('pagination::bootstrap-4')}}
      @endif
    </div>
  </div>
  <div class="table-user_frame">
    <div class="tbl-user tbl-head">
      <div></div>
      <div class="item-center item-id">ID</div>
      <div>ユーザー名</div>
      <div>E-Mail</div>
      <div></div>
      <div>PassWord</div>
      <div>作成日<br>------<br>更新日</div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    @foreach($users as $user)
    @if($loop->iteration % 2)
      @if($create_item_id==$user->id)
    <div class="tbl-user tbl-odd tbl-newitem" id="tbl-item{{$user->id}}">
      @else
    <div class="tbl-user tbl-odd" id="tbl-item{{$user->id}}">
      @endif
    @else
    <div class="tbl-user tbl-even" id="tbl-item{{$user->id}}">
    @endif
      {{-- チェックボックス --}}
      <div class="item-center item-checkbox">
        <input type="checkbox" name="" id="">
      </div>
      {{-- id --}}
      <div class="item-center item-id" name="user_id{{$user->id}}" id="user_id{{$user->id}}">{{$user->id}}</div>
      {{-- ユーザー名 --}}
      <div class="item-name">
        <input type="text" name="user_name{{$user->id}}" id="user_name{{$user->id}}" class="inputbox" value="{{$user->name}}" form="admincng" onchange="unregisteredUser({{$user->id}})">
        @if(($user->id==old('user_id')) && ($errors->has('user_name')))
        <div class="error_disp">{{$errors->first('user_name')}}</div>
        @endif
      </div>
      {{-- ロール --}}
      <div class="item-role" style="display:none;">
        <input type="hedden" name="user_role{{$user->id}}" id="user_role{{$user->id}}" class="inputbox" value="10">{{$user->role}}
      </div>
      {{-- メール --}}
      <div class="item-email">
        <input type="text" name="user_email{{$user->id}}" id="user_email{{$user->id}}" class="inputbox" value="{{$user->email}}" form="admincng" onchange="unregisteredUser({{$user->id}})">
        @if(($user->id==old('user_id')) && ($errors->has('user_email')))
        <div class="error_disp">{{$errors->first('user_email')}}</div>
        @endif
      </div>
      {{-- メール送信ボタン --}}
      <div class="item-center item-mailsend">
        <button class="btn btn-mailsend">メール送信</button>
      </div>
      {{-- パスワード --}}
      <div class="item-password">
        <input type="text" name="user_password{{$user->id}}" id="user_password{{$user->id}}" class="inputbox" value="{{$user->password}}" onchange="unregisteredUser({{$user->id}})">
        @if(($user->id==old('user_id')) && ($errors->has('user_password')))
        <div class="error_disp">{{$errors->first('user_password')}}</div>
        @endif
      </div>
      {{-- 作成日/更新日 --}}
      <div class="item-created">{{$user->created_at}}<span class="hr"></span>{{$user->updated_at}}</div>
      {{-- 登録ボタン --}}
      <div class="item-center item-modify">
        {{-- <button class="btn btn-modify" type="submit" formaction="/admin?user_id={{$user->id}}" form="admincng">登録</button> --}}
        <button class="btn btn-modify" type="submit" onclick="unregisteredUserSend({{$user->id}})">登録</button>
      </div>
      {{-- 削除ボタン --}}
      <div class="item-center item-delete">
        <button class="btn btn-delete" type="submit" formaction="/admin?user_id={{$user->id}}" form="admindel">削除</button>
      </div>
      {{-- 終端 --}}
      <div class="item-terminal"></div>
    </div>
    @endforeach
  </div>
</div>