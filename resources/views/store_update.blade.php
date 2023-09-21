@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/store_update.css">
@endsection

@section('content')
<div class="wrapper">
    <div class="contents1">
        <div class=o-c-btn>
                <p class="o-btn" id="open">OPEN</p>
                <p class="c-btn out" id="close">CLOSE</p>
        </div>
        <p class="update-btn">更新</p>
    </div>
    <div id="hide-content">
        <h2>出店情報</h2>
        <div class="store-contents">
            <p>閉店時間</p>
            <div class="close-time">
                <input type="text" class="month text" id="month">
                <p class="under-take">月</p>
                <input type="text" class="day text" id="day">
                <p class="under-take">日</p>
                <input type="time" class="hour-secound text" id="time">
            </div>
            <img class="geo-api" src="/images/trucks/truck5.jpg" alt="api">
        </img>
        <h2>メニュー</h2>
        <div class="menu-contents">
            <div class="menu-item">
            <div class="food-wrp"><img alt="item" src="/images/foods/Crepe1.jpg">
            </div>
            <p>チョコバナナ</p>
            </div>
        </div>
        <div class="last">
        <p class="update-btn under-botton">更新</p>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="/js/update.js "></script>
@endsection