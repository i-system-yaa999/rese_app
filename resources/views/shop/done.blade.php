<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/shop/done.css')}}">
  <title>RESE 予約完了</title>
</head>

<body>
  @include('layouts.header')
  <section class="content_main">
    <div class="message_box" name="" id="">
      <div class="message_title">
        <p>{{$title}}</p>
      </div>
      <div class="message">
        <p>以下の内容にて、ご予約を受け付け致しました。</p>
        <p>店舗名：{{$shop_name}}</p>
        <p>エリア：{{$shop_area}}</p>
        <p>ご予約日時：{{$reserved_at}}</p>
        <!-- <p>ご予約日 : {{--$reserve_date--}}</p> -->
        <!-- <p>ご予約時間 : {{--$reserve_time--}}</p> -->
        <p>人数 : {{$reserve_number}}名様</p>
        <div class="qr">{!!$qrcode!!}</div>
        <p>予約者情報</p>
        <p>お名前 : {{$user->name}}様</p>
        <p>連絡先Email : {{$user->email}}</p>
      </div>
    </div>
  </section>
  @include('layouts.footer')
</body>
<style>
  .qr{
    display: flex;
    justify-content: center;
  }
</style>

</html>