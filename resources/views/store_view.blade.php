@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/store_view.css" >
@endsection
@section('content')
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
            <div class="store-img-div">
                <img class="store-img"  alt="store-img" src="/images/trucks/truck1.jpg">
            </div>
            <div class="store-comment-div">
                <p id="store-comment">
                当店は新鮮な材料と職人の技術を駆使して、薄くてふわふわのクレープを提供しています。甘いデザートクレープからヘルシーなサヴォリークレープまで、多彩なバリエーションが揃っており、どんな好みにも合わせられます。また、カフェメニューもご用意しており、美味しいコーヒーや紅茶を楽しむこともできます。リラックスした雰囲気の店内で、友人や家族と特別なひとときを過ごしませんか？日常の喧騒から離れて、一口で幸せを味わうために、ぜひ当店にお越しください。
                 </p>
            </div>
        </div>
        <h2 class="content-bar">メニュー</h2>
        <div class="menu-content">
            <div class="menu">
                <div class="menu-img">
                    <img src="/images/foods/Crepe1.jpg" alt="menu-img">
                </div>
                <div class="menu-text">
                    <p class="menu-name">チョコバナナクレープ</p>
                    <p class="price">600円</p>
                    <p class="menu-comment">濃厚なチョコと甘いバナナの絶妙な組み合わせ。</p>
                </div>
            </div>
            <div class="menu">
                <div class="menu-img">
                    <img src="/images/foods/Crepe1.jpg" alt="menu-img">
                </div>
                <div class="menu-text">
                    <p class="menu-name">チョコバナナクレープ</p>
                    <p class="price">600円</p>
                    <p class="menu-comment">クレープの王道チョコバナナ！チョコの甘さと特製生クリームのさっぱりとした甘さの相性が抜群です。</p>
                </div>
            </div>
            <div class="menu">
                <div class="menu-img">
                    <img src="/images/foods/Crepe1.jpg" alt="menu-img">
                </div>
                <div class="menu-text">
                    <p class="menu-name">チョコバナナクレープ</p>
                    <p class="price">600円</p>
                    <p class="menu-comment">クレープの王道チョコバナナ！チョコの甘さと特製生クリームのさっぱりとした甘さの相性が抜群です。</p>
                </div>
            </div>
            <div class="menu">
                <div class="menu-img">
                    <img src="/images/foods/Crepe1.jpg" alt="menu-img">
                </div>
                <div class="menu-text">
                    <p class="menu-name">チョコバナナクレープ</p>
                    <p class="price">600円</p>
                    <p class="menu-comment">クレープの王道チョコバナナ！チョコの甘さと特製生クリームのさっぱりとした甘さの相性が抜群です。</p>
                </div>
            </div>
            <div class="menu">
                <div class="menu-img">
                    <img src="/images/foods/Crepe1.jpg" alt="menu-img">
                </div>
                <div class="menu-text">
                    <p class="menu-name">チョコバナナクレープ</p>
                    <p class="price">600円</p>
                    <p class="menu-comment">クレープの王道チョコバナナ！チョコの甘さと特製生クリームのさっぱりとした甘さの相性が抜群です。</p>
                </div>
            </div>
            <div class="menu">
                <div class="menu-img">
                    <img src="/images/foods/Crepe1.jpg" alt="menu-img">
                </div>
                <div class="menu-text">
                    <p class="menu-name">チョコバナナクレープ</p>
                    <p class="price">600円</p>
                    <p class="menu-comment">クレープの王道チョコバナナ！チョコの甘さと特製生クリームのさっぱりとした甘さの相性が抜群です。</p>
                </div>
            </div>
        </div>
        <div class="return-img">
            <img src="/images/icons/return_top.svg">
            </div>


    </div>
    @endsection
