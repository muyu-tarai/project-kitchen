@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/store_view.css" >
@endsection
@section('content')
    <div class = "wrapper">
        <div class="title-bar">
                <h1>{{ $store_items->store_name  }}</h1>
                <p id="update-at">{{$carbonUpate}} 更新</p>
        </div>
        <div class="contents1">
            <p id="closing-datetime">{{ $carbon_close }} 閉店予定</p>
            <input type="hidden" id="location" value="{{$store_items->current_location}}">
            <div id="gmap">
            </div>
        </div>
            <h2 class="content-bar">{{$store_items->store_name }}  詳細</h2>
        <div class="detail-content">
            <div class="store-img-div">
                <img class="store-img"  alt="store-img" src="{{$store_items->store_image}}">
            </div>
            <div class="store-comment-div">
                <p id="store-comment">
                {{ $store_items->store_comment }}
                </p>
            </div>
        </div>
        <h2 class="content-bar">メニュー</h2>
        <div class="menu-content">
            @foreach($menu_items  as $menu_items )
                <div class="menu">
                    <div class="menu-img">
                        <img src="{{ $menu_items->menu_image }}" alt="menu-img">
                    </div>
                    <div class="menu-text">
                        <p class="menu-name">{{ $menu_items ->menu_name }}</p>
                        <p class="price">{{ $menu_items ->price }}</p>
                        <p class="menu-comment">{{ $menu_items ->menu_comment }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="return-img">
        <a href="#"><img src="/images/icons/return_top.svg"></a>
        </div>
    </div>
    @endsection
