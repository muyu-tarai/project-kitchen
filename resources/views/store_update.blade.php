@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/store_update.css">
@endsection

@section('content')
<div class="wrapper">
  <div class=o-c-btn>
        <p class="o-btn">OPEN</p>
        <p class="c-btn">CLOSE</p>
  </div>
    <h2>出店情報</h2>
    <div class="store-contnents">
        <p>閉店時間</p>
        <div class="close-time">
        <p class="close-month">12</p>
        <p>月</p>
        <p class="close-day">22</p>
        <p>日</p>
        <p class="close-hour-minute">10:15</p>
        </div>
    </div>
    <h3>メニュー</h3>
    <div class="menu-contents">
        <div class="menu-item">
        <div class="food-wrp"><img alt="item" src="/images/foods/Crepe1.jpg">
        </div>
        <p>チョコバナナ</p>
        </div>
        <div class="menu-item">
        <div class="food-wrp"><img alt="item" src="/images/foods/Crepe1.jpg">
        </div>
        <p>チョコバナナ</p>
        </div>
        <div class="menu-item">
        <div class="food-wrp"><img alt="item" src="/images/foods/Crepe1.jpg">
        </div>
        <p>チョコバナナ</p>
        </div>
    </div>
    </div>
</div>
@endsection