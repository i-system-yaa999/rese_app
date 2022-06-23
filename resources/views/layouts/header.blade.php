<header class="header">
  <div class="site_catch">
    {{-- <a href="/">飲食店予約サービス</a> --}}
    @if (Auth::check())
    <p>ようこそ {{Auth::user()->name}} さん</p>
    @endif
  </div>
  <a href="/" class="site_title">
    <img src="{{asset('image/rese.png')}}" alt="RESE">
    <h1 class="title">Rese</h1>
  </a>
  <nav class="nav">
    <ul>
      <li class="media_onry"><a href="/">トップページ</a></li>
      @if (Auth::check())
      {{-- システム管理者権限のみに表示される --}}
      @can('admin-onry')
      <li><a href="/admin">システム管理</a></li>
      <li><a href="/owner">店舗管理</a></li>
      <li><a href="/user/mypage">マイページ</a></li>
      {{-- 店舗代表者以上に表示される --}}
      @elsecan('owner-higher')
      <li><a href="/owner">店舗管理</a></li>
      <li><a href="/user/mypage">マイページ</a></li>
      {{-- 一般権限以上に表示される --}}
      @elsecan('user-higher')
      <li><a href="/user/mypage">マイページ</a></li>
      @endcan
      <li><a href="/user/logout">ログアウト</a></li>
      @else
      <li><a href="{{route('register')}}">新規登録</a></li>
      <li><a href="{{route('login')}}">ログイン</a></li>
      @endif
    </ul>
  </nav>
  <button class="nav-button" type="button" onclick="navFunc()"></button>
</header>

<script>
  function navFunc() {
    document.querySelector('html').classList.toggle('open');
  }
</script>