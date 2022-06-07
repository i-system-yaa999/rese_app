<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/manage-common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owner/main.css') }}">
  <title>店舗代表者メイン</title>
</head>

<body>
  <div class="main_frame">
    {{-- nav --}}
    <nav class="nav">
      {{-- site title --}}
      <a href="/" class="site_title">
        <h1 class="title">Rese</h1>
      </a>
      {{-- nav title --}}
      <h2 class="nav_title">管理Menu</h2>


      {{-- nav content 3 --}}
      <div class="nav_content" id="content3">
        <p class="nav_content_item">新規追加</p>
        <p class="nav_content_item">選択削除</p>
      </div>

    </nav>
    {{-- nav end --}}

    <form action="/owner" id="owner"></form>

    {{-- content --}}
    <section class="content_frame">

      {{-- tab contents --}}
      <div class="tab_contents">

        {{-- tab content 3 --}}
        <div class="tab_content" id="content3">
          <div class="tab_content_gide">
            <h2>店舗一覧</h2>
            <div class="msg-error">
              名前が
            </div>
          </div>
          <div class="table-shop_frame">
            <div class="tbl-shop tbl-head">
              <div></div>
              <div>ID</div>
              <div>店舗名</div>
              <div>エリアID</div>
              <div>エリア</div>
              <div>ジャンルID</div>
              <div>ジャンル</div>
              <div>コメント</div>
              <div>イメージ</div>
              <div>お気に入り数</div>
              <div>作成日</div>
            </div>
            <div class="tbl-shop tbl-odd tbl-newitem">
              <div><input type="checkbox"></div>
              <div>9999</div>
              <div><input type="text" class="inputbox" placeholder="店舗の名前"><p>エラーメッセージ</p></div>
              <div>9999</div>
              <div>
                <select name="area_name" id="area_name" class="selectbox" onchange="" form="">
                  <option value="9999">--未登録--</option>
                </select>
              </div>
              <div>9999</div>
              <div>
                <select name="genre_name" id="genre_name" class="selectbox" onchange="" form="">
                  <option value="9999">--未登録--</option>
                </select>
              </div>
              <div><input type="text" class="inputbox" placeholder="ここに店舗の紹介分を記入してください"></div>
              <div><input type="text" class="inputbox" value="イメージ"></div>
              <div>123</div>
              <div>2022-05-31 15:15:15</div>
              <div><button class="btn btn-modify">登録</button></div>
              <div><button class="btn btn-delete">削除</button></div>
              <div><button class="btn btn-detail">店舗詳細</button></div>
            </div>
            <div class="tbl-shop tbl-even">
              <div><input type="checkbox"></div>
              <div>2</div>
              <div><input type="text" class="inputbox" value="ジャンヌダルク"></div>
              <div>9999</div>
              <div>
                <select name="area_name" id="area_name" class="selectbox" onchange="" form="">
                  <option value="9999">--未登録--</option>
                </select>
              </div>
              <div>9999</div>
              <div>
                <select name="genre_name" id="genre_name" class="selectbox" onchange="" form="">
                  <option value="9999">--未登録--</option>
                </select>
              </div>
              <div><input type="text" class="inputbox" value="コメントコメントコメント"></div>
              <div><input type="text" class="inputbox" value="イメージ"></div>
              <div>123</div>
              <div>2022-05-31 15:15:15</div>
              <div><button class="btn btn-modify">登録</button></div>
              <div><button class="btn btn-delete">削除</button></div>
              <div><button class="btn btn-detail">店舗詳細</button></div>
            </div>
            <div class="tbl-shop tbl-odd">
              <div><input type="checkbox"></div>
              <div>3</div>
              <div><input type="text" class="inputbox" value="ジャンヌダルク"></div>
              <div>9999</div>
              <div>
                <select name="area_name" id="area_name" class="selectbox" onchange="" form="">
                  <option value="9999">--未登録--</option>
                </select>
              </div>
              <div>9999</div>
              <div>
                <select name="genre_name" id="genre_name" class="selectbox" onchange="" form="">
                  <option value="9999">--未登録--</option>
                </select>
              </div>
              <div><input type="text" class="inputbox" value="コメントコメントコメント"></div>
              <div><input type="text" class="inputbox" value="イメージ"></div>
              <div>123</div>
              <div>2022-05-31 15:15:15</div>
              <div><button class="btn btn-modify">登録</button></div>
              <div><button class="btn btn-delete">削除</button></div>
              <div><button class="btn btn-detail">店舗詳細</button></div>
            </div>
            <div class="tbl-shop tbl-even">
              <div><input type="checkbox"></div>
              <div>4</div>
              <div><input type="text" class="inputbox" value="ジャンヌダルク"></div>
              <div>9999</div>
              <div>
                <select name="area_name" id="area_name" class="selectbox" onchange="" form="">
                  <option value="9999">--未登録--</option>
                </select>
              </div>
              <div>9999</div>
              <div>
                <select name="genre_name" id="genre_name" class="selectbox" onchange="" form="">
                  <option value="9999">--未登録--</option>
                </select>
              </div>
              <div><input type="text" class="inputbox" value="コメントコメントコメント"></div>
              <div><input type="text" class="inputbox" value="イメージ"></div>
              <div>123</div>
              <div>2022-05-31 15:15:15</div>
              <div><button class="btn btn-modify">登録</button></div>
              <div><button class="btn btn-delete">削除</button></div>
              <div><button class="btn btn-detail">店舗詳細</button></div>
            </div>
          </div>
        </div>

      </div>
      {{-- tab contents end --}}

    </section>
    {{-- content end --}}
  </div>
</body>

</html>