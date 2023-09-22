@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/store_update.css">
@endsection

@section('content')
<div class="wrapper">
<form action="/submit" method="post">
    @csrf
    <div class="contents1">
        <div class=o-c-btn>
                <p class="o-btn" id="open">OPEN</p>
                <p class="c-btn" id="close">CLOSE</p>
                <input type="hidden" id="o_flag" name="o_flag" value="{{ $store_items->opening_flag }}">
        </div>
        <input type="submit" class="update-btn">
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
        @foreach($menu_items  as $menu_items )
            <div class="menu-item" id="munu{{ $menu_items->id }}">
                <div class="food-wrp"><img alt="item" src="{{ $menu_items->menu_image }}">
                </div>
                <p>{{ $menu_items ->menu_name }}</p>
                <input type="hidden" class="menu_id" name="menu_id" value="{{ $menu_items->id }}">
                <input type="hidden" class="menu_flag" name="menu_flag" value="{{ $menu_items->sold_out_flag }}">
            </div>
        @endforeach
        </div>
        <div class="last">
        <input type="submit" class="update-btn under-botton">
        </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="/js/update.js "></script>
@endsection