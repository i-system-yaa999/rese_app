<header class="header">
  <div class="site_catch">
    <a href="/">飲食店予約サービス</a>
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
      <li><a href="/user/mypage">マイページ</a></li>
      <li><a href="/user/logout">ログアウト</a></li>
      @else
      <li><a href="{{route('register')}}">新規登録</a></li>
      <li><a href="{{route('login')}}">ログイン</a></li>
      @endif
      <!-- <li></li> -->
      <!-- <li><a href="/user/thanks">登録完了</a></li> -->
      <!-- <li><a href="/user/register">新規登録</a></li> -->
      <!-- <li><a href="/user/login">ログイン</a></li> -->
      <!-- <li><a href="/user/logout">ログアウト</a></li> -->
    </ul>
  </nav>
  <button class="nav-button" type="button" onclick="navFunc()"></button>
</header>

<script>
  function navFunc() {
    document.querySelector('html').classList.toggle('open');
  }
</script>