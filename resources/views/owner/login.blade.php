<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <title>店舗代表者ログイン</title>
</head>

<body>
  <section class="content_main">
    <div class="message_box" name="" id="">
      <div class="message_title">
        <p>店舗代表者ログイン</p>
      </div>
  
      <form class="message_form" method="POST" action="/owner/login">
        @csrf
        <div>
          {{-- <label for="email">メールアドレス</label> --}}
          <input type="email" class="input_disp" name="email" value="{{old('email')}}" placeholder="メールアドレス">
          <input type="text" class="error_disp" name="error_disp" value="{{$errors->first('email')}}" disabled="disabled">
        </div>
        <div>
          {{-- <label for="password">パスワード</label> --}}
          <input type="password" class="input_disp" name="password" placeholder="password">
          <input type="text" class="error_disp" name="error_disp" value="{{$errors->first('password')}}"
            disabled="disabled">
        </div>
        <div>
          <button type="submit">ログイン</button>
        </div>
      </form>
    </div>
  
  </section>
</body>

</html>