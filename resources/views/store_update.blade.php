@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/store_update.css">
@endsection

@section('content')
<div class="wrapper">
<div class="panel-body">
@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
    @endforeach
    </ul>
</div>
@endif
<form action="/store_update" method="post">
    @csrf
    <div class="contents1">
        <div class=o-c-btn>
                <p class="o-btn" id="open">OPEN</p>
                <p class="c-btn" id="close">CLOSE</p>
                <input type="hidden" id="o_flag" name="o_flag" value="{{ isset($store_items[0]->opening_flag ) ? $store_items[0]->opening_flag  : ''}}">
        </div>
        <div class="upper-submit">
        <input type="submit" class="update-btn" value="更新">
        </div>
    </div>
    <div id="hide-content"></h2>
        <div class="store-contents">
            <p class = "closed-time">現在 {{isset($store_items[0]->closing_datetime) ? $store_items[0]->closing_datetime : '' }} 閉店予定 </p>
            <p class="close-item">閉店時間設定</p>
            <div class="close-time">
                <input type="text" class="year text" id="year" name="year">
                <p class="under-take">年</p>
                <input type="text" class="month text" id="month" name="month">
                <p class="under-take">月</p>
                <input type="text" class="day text" id="day" name="day">
                <p class="under-take">日</p>
                <input type="time" class="hour-secound text" id="time" name="time">
            </div>
            <input type="hidden" id="locate" name="locate">
            <div id="gmap"></div>

        </img>
        <h2>メニュー</h2>
        <div class="menu-contents">
        @foreach($menu_items  as $menu_item )
            <div class="menu-item" id="munu{{ $menu_item->id }}">
                <div class="food-wrp"><img class="menu-img" alt="item" src="data:image/{{ $menu_item->ext }};base64,{{ $menu_item->menu_image }}">
                </div>
                <p>{{isset($menu_item ->menu_name ) ? $menu_item ->menu_name  : '' }}</p>
                <input type="hidden" class="menu_id" name="menu_id[]" value="{{ isset($menu_item->id) ? $menu_item->id : '' }}">
                <input type="hidden" class="menu_flag" name="menu_flag[]" value="{{ isset($menu_item->sold_out_flag) ? $menu_item->sold_out_flag : '' }}">
            </div>
        @endforeach
        </div>
        <div class="under-submit">
        <input type="submit"class="update-btn "  value="更新">
        </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="/js/update.js "></script>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCipJ9Mk5Gn8xK2NlQksyz9D4fQgszTOM&callback=initMap"></script>
@endsection
