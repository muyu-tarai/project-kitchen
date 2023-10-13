@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/store_view.css">
@endsection
@section('content')
<div class="wrapper">
    <div class="title-bar">
        <h1>{{ isset($store_items->store_name)?$store_items->store_name :''}}</h1>
        <p id="update-at">{{ isset($carbonUpate) ? $carbonUpate : ''}} 更新</p>
        <input type="hidden" id="o_flag" value="{{ $store_items->opening_flag }}" >
    </div>
    <div class="contents1">
        <p id="closing-datetime"> 閉店予定　{{ isset($carbon_close ) ? $carbon_close  : '' }}</p>
        <input type="hidden" id="location" value="{{ isset($store_items->current_location) ? $store_items->current_location : ''}}">
        <div id="gmap">
        </div>
    </div>
    <h2 class="content-bar">{{ isset($store_items->store_name) ? $store_items->store_name : '' }} 詳細</h2>
    <div class="detail-content">
        <div class="store-img-div">
            <img class="store-img" alt="store-img" src="data:image/{{ $store_items->ext }};base64,{{ $store_items->store_image }}">
        </div>
        <div class="store-comment-div">
            <p id="store-comment">
                {{ isset($store_items->store_comment) ? $store_items->store_comment : ''  }}
            </p>
        </div>
    </div>
    <h2 class="content-bar">メニュー</h2>
    <div class="menu-content">
        @if(isset($menu_items))
        @foreach($menu_items as $menu_item )
        <div class="menu" id="munu{{ $menu_item->id}}">
            <div class="menu-img-div">
                <img class="menu-img" src="data:image/{{ $menu_item->ext }};base64,{{ $menu_item->menu_image }}" alt="menu-img">
            </div>
            <div class="menu-text">
                <p class="menu-name">{{ isset($menu_item ->menu_name ) ? $menu_item ->menu_name  : ''  }}</p>
                <p class="price">{{ isset($menu_item ->price) ? $menu_item ->price : ''   }}</p>
                <p class="menu-comment">{{ isset($menu_item ->menu_comment) ? $menu_item ->menu_comment : '' }}</p>
                <input type="hidden" class="menu_flag" value="{{  isset($menu_item->sold_out_flag) ? $menu_item->sold_out_flag : '' }}">
            </div>
            <div class="soldout hide"><img src="data:image/png;base64,{{ base64_encode(Storage::disk('dropbox')->get('view/soldout.png')) }}"></div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="return-img">
    </div>
</div>
@endsection

@section('js')
<script src="/js/store_view.js "></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCipJ9Mk5Gn8xK2NlQksyz9D4fQgszTOM&callback=initMap"></script>
@endsection