<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>店舗詳細</title>
    <link rel="stylesheet" href="/css/store_view.css" >
    </head>
    <body>
    <div class = "wrapper">
        <div class="title-bar">
                <h1>フレッツアメリカ  渋川店</h1>
                <p id="update-at">2020年4月15日更新</p>
        </div>
        <div class="contents1">
            <p id="closing-datetime">22日14:30閉店予定</p>
            <div id="current-location">
                <img src="/images/map.png" alt="location">
            </div>
        </div>
            <h2 class="content-bar">フレッツアメリカ  渋川店  詳細</h2>
        <div class="detail-content">
            <img alt="store-pic" src="/images/trucks/truck1.jpg">
            <p id="store-comment">フレッツアメリカはアメリカ発のクレープ店です。二本のの各農家から産地直送で果物を購入しているので果物の鮮度には自身があります。</p>
        </div>
        <h2 class="content-bar">メニュー</h2>
        <div class="menu-content">
            <div class="menu">
                <div class="menu-img">
                    <img src="/images/foods/Crepe1.jpg" alt="menu-img">
                </div>
                <p id="menu">600円</p>
                <p id="price"></p>
                <p id="menu-comment">クレープの王道チョコバナナ！チョコの甘さと特製生クリームのさっぱりとした甘さの相性が抜群です。</p>
            </div>
        </div>


    </div>
    </body>
</html>
