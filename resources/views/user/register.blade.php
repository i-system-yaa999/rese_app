<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/user/register.css')}}">
  <title>RESE 新規登録</title>
</head>

<body>
  @include('layouts.header')
  <section class="content_main">
    <div class="message_box" name="" id="">
      <div class="message_title">
        <p>新規登録</p>
      </div>
      {{-- <form class="message_form" method="POST" action="{{route('register')}}"> --}}
      <form class="message_form" method="POST" action="/register">
        @csrf
        <div>
          <!-- <label for="name">ユーザ名</label> -->
          <input type="text" class="input_disp" name="name" value="{{ old('name') }}" placeholder="ユーザー名">
          <input type="text" class="error_disp" name="error_disp" value="{{$errors->first('name')}}" disabled="disabled">
        </div>
        <div>
          <!-- <label for="email">メールアドレス</label> -->
          <input type="email" class="input_disp" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
          <input type="text" class="error_disp" name="error_disp" value="{{$errors->first('email')}}" disabled="disabled">
        </div>
        <div>
          <!-- <label for="email">パスワード</label> -->
          <input type="password" class="input_disp" name="password" placeholder="password">
          <input type="text" class="error_disp" name="error_disp" value="{{$errors->first('password')}}" disabled="disabled">
        </div>
        <div>
          <!-- <label for="email">パスワード確認</label> -->
          <input type="password" class="input_disp" name="password_confirmation" placeholder="password確認">
        </div>
        <div>
          <button type="submit">登録</button>
        </div>
      </form>
    </div>

  </section>
  @include('layouts.footer')
</body>
<style>
  .footer {
    position: fixed;
    bottom: 0;
    width: 100%;
  }
</style>

</html>