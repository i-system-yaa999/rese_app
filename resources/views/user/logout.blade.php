<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/logout.css')}}">
  <title>RESE ログアウト</title>
</head>

<body>
  @include('layouts.header')
  <section class="content_main">
    <div class="message_box" name="" id="">
      <div class="message_title">
        <p>ログアウトしますか？</p>
      </div>
      <form class="message_form" method="POST" action="{{route('logout')}}">
        @csrf
        <button type="submit">ログアウト</button>
      </form>
    </div>
  </section>
  @include('layouts.footer')
</body>

</html>