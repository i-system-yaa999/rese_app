<section name="forms">
  <!-- 検索フォーム -->
  <form name="search" id="search" action="/shop" method="get">
    @csrf
    <input type="text" id="" name="" placeholder="タブ番号" value="@if(isset($tab_item)){{$tab_item}}@endif" class="debug">
  </form>
  <!-- 詳細フォーム -->
  <form name="detail" id="detail" action="/shop/detail/" method="get">@csrf</form>
  <!-- お気に入り登録フォーム -->
  <x-form name="like" id="like" action="/like" method="post"></x-form>
  <!-- お気に入り削除フォーム -->
  <x-form name="likedel" id="likedel" action="/like" method="delete"></x-form>
  <!-- 予約登録フォーム -->
  <x-form name="reserve" id="reserve" action="/reserve" method="post"></x-form>
  <!-- 予約変更フォーム -->
  <x-form name="reservecng" id="reservecng" action="/reserve" method="put"></x-form>
  <!-- 予約削除フォーム -->
  <x-form name="reservedel" id="reservedel" action="/reserve" method="delete"></x-form>
  {{-- 評価投稿フォーム --}}
  <x-form name="comment" id="comment" action="/comment" method="post"></x-form>

</section>