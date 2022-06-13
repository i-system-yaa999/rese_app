<div class="tab_content" id="content2">
  <div class="tab_content_gide">
    <label for="search_user" class="searchlabel">ユーザー名で検索</label>
    <input type="search" name="search_user" id="search_user" placeholder="ユーザー名を入力" class="serchinput"><button class="btn btn-search">検索</button>
    <label for="shop_name" class="searchlabel">店舗名で検索</label>
    <select name="shop_name" id="shop_name" class="serchinput" onchange="" form="">
      <option value="">選択してください</option>
    </select>
    <div>{{$comments->total()}}件の「評価登録」が見つかりました。</div>
    {{-- ページネーション --}}
    <div class="page_info">
      <div class="page_counts">
        全{{$comments->total()}}件中
        @if($comments->total() > 0)
        {{$comments->firstItem()}}～{{$comments->lastItem()}}件
        @endif
      </div>
      @if($comments->total() > 0)
      {{$comments->appends(request()->input())->links('pagination::bootstrap-4')}}
      @endif
    </div>
  </div>
  <div class="table-comment_frame">
    <div class="tbl-comment tbl-head">
      <div></div>
      <div class="item-center item-id">ID</div>
      {{-- <div class="item-id">ユーザーID</div> --}}
      <div>ユーザー名</div>
      {{-- <div class="item-id">店舗ID</div> --}}
      <div>店舗名</div>
      <div>評価(0～5)</div>
      <div>評価コメント</div>
      <div>作成日<br>------<br>更新日</div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    @foreach($comments as $comment)
    @if($loop->iteration % 2)
      @if($create_item_id==$comment->id)
    <div class="tbl-comment tbl-odd tbl-newitem" id="tbl-item{{$comment->id}}">
      @else
    <div class="tbl-comment tbl-odd" id="tbl-item{{$comment->id}}">
      @endif
    @else
    <div class="tbl-comment tbl-even" id="tbl-item{{$comment->id}}">
    @endif
        {{-- チェックボックス --}}
        <div class="item-center item-checkbox">
          <input type="checkbox" name="" id="">
        </div>
        {{-- id --}}
        <div class="item-center item-id" name="comment_id{{$comment->id}}" id="comment_id{{$comment->id}}">{{$comment->id}}</div>
        {{-- ユーザー名 --}}
        <div class="item-user-name">
          {{-- <input type="hidden" name="" class="inputbox" value="{{$comment->user->id}}"> --}}
          <select name="comment_user_id{{$comment->id}}" id="comment_user_id{{$comment->id}}" class="selectbox" form="admincng" onchange="unregisteredComment({{$comment->id}})">
            <option value="{{($comment->user->id ?? '9999')}}">{{($comment->user->id ?? '9999').'：'.($comment->user->name ?? '未登録')}}</option>
            @foreach($allusers as $user)
            <option value="{{$user->id}}" @if(($comment->user->id ?? '9999') == $user->id) selected @endif>{{$user->id.'：'.$user->name}}</option>
            @endforeach
          </select>
          @if(($comment->id==old('comment_id')) && ($errors->has('comment_user_id')))
          <div class="error_disp">{{$errors->first('comment_user_id')}}</div>
          @endif
        </div>
        {{-- 店舗名 --}}
        <div class="item-shop-name">
          {{-- <input type="hidden" name="" class="inputbox" value="{{$comment->shop->id}}"> --}}
          <select name="comment_shop_id{{$comment->id}}" id="comment_shop_id{{$comment->id}}" class="selectbox" form="admincng" onchange="unregisteredComment({{$comment->id}})">
            <option value="{{($comment->shop->id ?? '9999')}}">{{($comment->shop->id ?? '9999').'：'.($comment->shop->name ?? '未登録')}}
            </option>
            @foreach($allshops as $shop)
            <option value="{{$shop->id}}" @if(($comment->shop->id ?? '9999') == $shop->id) selected @endif>{{$shop->id.'：'.$shop->name}}</option>
            @endforeach
          </select>
          @if(($comment->id==old('comment_id')) && ($errors->has('comment_shop_id')))
          <div class="error_disp">{{$errors->first('comment_shop_id')}}</div>
          @endif
        </div>
        {{-- 評価数 --}}
        <div class="item-center item-evaluation">
          <input type="hidden" name="comment_evaluation{{$comment->id}}" id="my_star{{$comment->id}}" value="{{$comment->evaluation}}" form="admincng" oninput="unregisteredComment({{$comment->id}})">
          <button id="my_star1{{$comment->id}}" class="my_star @if($comment->evaluation>=1) star_on @endif" onclick="star_change(1,{{$comment->id}}); unregisteredComment({{$comment->id}});"></button>
          <button id="my_star2{{$comment->id}}" class="my_star @if($comment->evaluation>=2) star_on @endif" onclick="star_change(2,{{$comment->id}}); unregisteredComment({{$comment->id}});"></button>
          <button id="my_star3{{$comment->id}}" class="my_star @if($comment->evaluation>=3) star_on @endif" onclick="star_change(3,{{$comment->id}}); unregisteredComment({{$comment->id}});"></button>
          <button id="my_star4{{$comment->id}}" class="my_star @if($comment->evaluation>=4) star_on @endif" onclick="star_change(4,{{$comment->id}}); unregisteredComment({{$comment->id}});"></button>
          <button id="my_star5{{$comment->id}}" class="my_star @if($comment->evaluation==5) star_on @endif" onclick="star_change(5,{{$comment->id}}); unregisteredComment({{$comment->id}});"></button>
          @if(($comment->id==old('comment_id')) && ($errors->has('comment_evaluation')))
          <div class="error_disp">{{$errors->first('comment_evaluation')}}</div>
          @endif
        </div>
        {{-- 評価コメント --}}
        <div class="item-comment">
          <input type="text" name="comment_comment{{$comment->id}}" id="comment_comment{{$comment->id}}" class="inputbox" value="{{$comment->comment}}" form="admincng" onchange="unregisteredComment({{$comment->id}})">
          @if(($comment->id==old('comment_id')) && ($errors->has('comment_comment')))
          <div class="error_disp">{{$errors->first('comment_comment')}}</div>
          @endif
        </div>
        {{-- 作成日/更新日 --}}
        <div class="item-created">{{$comment->created_at}}<span class="hr"></span>{{$comment->updated_at}}</div>
        {{-- 登録ボタン --}}
        <div class="item-center item-modify">
          {{-- <button class="btn btn-modify" type="submit" formaction="/admin?comment_id={{$comment->id}}" form="admincng">登録</button> --}}
          <button class="btn btn-modify" type="submit" onclick="unregisteredCommentSend({{$comment->id}})">登録</button>
        </div>
        {{-- 削除ボタン --}}
        <div class="item-center item-delete">
          <button class="btn btn-delete" type="submit" formaction="/admin?comment_id={{$comment->id}}" form="admindel">削除</button>
        </div>
        {{-- 終端 --}}
        <div class="item-terminal"></div>
      </div>
      @endforeach
  </div>
</div>