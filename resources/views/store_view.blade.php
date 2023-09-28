@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/store_view.css" >
@endsection
@section('content')
    <div class = "wrapper">
        <div class="title-bar">
                <h1>{{ isset($store_items->store_name)?$store_items->store_name :''}}</h1>
                <p id="update-at">{{ isset($carbonUpate) ? $carbonUpate : ''}} 更新</p>
        </div>
        <div class="contents1">
            <p id="closing-datetime">{{ isset($carbon_close ) ? $carbon_close  : '' }} 閉店予定</p>
            <input type="hidden" id="location" value="{{ isset($store_items->current_location) ? $store_items->current_location : ''}}">
            <div id="gmap">
            </div>
        </div>
            <h2 class="content-bar">{{ isset($store_items->store_name) ? $store_items->store_name : '' }}  詳細</h2>
        <div class="detail-content">
            <div class="store-img-div">
                <img class="store-img"  alt="store-img" src="{{$store_items->store_image}}">
            </div>
            <div class="store-comment-div">
                <p id="store-comment">
                {{ isset($store_items->store_comment) ? $store_items->store_comment : ''  }}
                </p>
            </div>
        </div>
        <h2 class="content-bar">メニュー</h2>
        <div class="menu-content">
            @foreach($menu_items  as $menu_items )
                <div class="menu" id="munu{{ $menu_items->id}}">
                    <div class="menu-img">
                        <img src="{{ $menu_items->menu_image }}" alt="menu-img">
                    </div>
                    <div class="menu-text">
                        <p class="menu-name">{{ isset($menu_items ->menu_name ) ? $menu_items ->menu_name  : ''  }}</p>
                        <p class="price">{{ isset($menu_items ->price) ? $menu_items ->price : ''   }}</p>
                        <p class="menu-comment">{{ isset($menu_items ->menu_comment) ? $menu_items ->menu_comment : '' }}</p>
                        <input type="hidden" class="menu_flag"  value="{{  isset($menu_items->sold_out_flag) ? $menu_items->sold_out_flag : '' }}">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="return-img">
        <a href="#"><img src="/images/icons/return_top.svg"></a>
        </div>
    </div>
    @endsection

    @section('js')
    <script src="/js/store_view.js "></script>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCipJ9Mk5Gn8xK2NlQksyz9D4fQgszTOM&callback=initMap"></script>
    @endsection