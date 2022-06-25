<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/thanks.css')}}">
  <title>RESE 登録完了</title>
</head>

<body>
  @include('layouts.header')
  <section class="content_main">
    <div class="message_box" name="" id="">
      <div class="message_title">
        <p>登録完了!<br>ご登録ありがとうございました</p>
        <a href="/user/login">ログイン</a>
      </div>
    </div>
  </section>
  @include('layouts.footer')
</body>

</html>