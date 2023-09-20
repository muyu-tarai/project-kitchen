@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/store_view.css" >
@endsection
@section('content')
    <div class = "wrapper">
        <div class="title-bar">
                <h1>{{ $task->due_date }}</h1>
                <p id="update-at">{{ $task->due_date }}更新</p>
        </div>
        <div class="contents1">
            <p id="closing-datetime">22日14:30閉店予定</p>
            <div id="current-location">
                <img src="/images/map.png" alt="location">
            </div>
        </div>
            <h2 class="content-bar">{{ $task->due_date }}  詳細</h2>
        <div class="detail-content">
            <div class="store-img-div">
                <img class="store-img"  alt="store-img" src="/images/trucks/truck1.jpg">
            </div>
            <div class="store-comment-div">
                <p id="store-comment">
                {{ $task->due_date }}
                 </p>
            </div>
        </div>
        <h2 class="content-bar">メニュー</h2>
        <div class="menu-content">
            @foreach($tasks as $task)
                <div class="menu">
                    <div class="menu-img">
                        <img src="{{ $task->due_date }}" alt="menu-img">
                    </div>
                    <div class="menu-text">
                        <p class="menu-name">{{ $task->due_date }}</p>
                        <p class="price">{{ $task->due_date }}</p>
                        <p class="menu-comment">{{ $task->due_date }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="return-img">
            <img src="/images/icons/return_top.svg">
            </div>


    </div>
    @endsection
