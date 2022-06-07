<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <title>403 Forbidden</title>

</head>

<body>
  <div class="error-wrap">
    <section>
      <h1>403 Forbidden</h1>
      <p>You do not have access.</p>
    </section>
  </div>
</body>
<style>
  .error-wrap {
    padding: 5px 20px;
    border: 1px solid #dcdcdc;
    box-shadow: 0px 0px 8px var(--lightblue);
    display: inline-block;
    position:absolute;
    top:20vh;
    left:50vw;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
  }
  h1 {
    font-size: 18px;
  }
  p {
    margin-left: 10px;
  }
</style>
</html>