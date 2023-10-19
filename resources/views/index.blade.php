@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/index.css">
@endsection
@section('content')
<div class="top-section">
  <style>
    .top-section{
    background-image: url("data:image/jpg;base64,{{ base64_encode(Storage::disk('dropbox')->get('view/hero.jpg')) }}");
    }
  </style>
  <div class="top-section-items">
    <h1 class="large">出店様へ</h1>
    <p class="medium">このサイトはフードカーを盛り上げるために制作さ<br>れたサイトです。もし興味がありましたら、下のア<br>イコンから登録をお願いします。</p>
    <div class="top-section-buttons">
      <a class="" href="/register"><img src="data:image/png;base64,{{ base64_encode(Storage::disk('dropbox')->get('view/signInButton.png')) }}"></a>
      <a class="" href="/login"><img src="data:image/png;base64,{{ base64_encode(Storage::disk('dropbox')->get('view/loginButton.png')) }}"></a>
    </div>
  </div>
</div>

<div class="stores">
  <div class="store-open">
    <div class="store-title">
      <h1 class="large">オープン中の店舗</h1>
    </div>
    <div class="store-items">
      @if(isset($open_stores))
      @foreach($open_stores as $open_stores )
      <div class="store-item">
        <div class="store-item-image">
          <a href="store/{{ $open_stores->id}}"><img src="data:image/{{ $open_stores->ext }};base64,{{ $open_stores->store_image }}"></a>
        </div>
        <p class="medium">{{ isset($open_stores->store_name) ? $open_stores->store_name : '' }}</p>
      </div>
      @endforeach
      @endif
    </div>

    <div class="store-close">
      <div class="store-title">
        <h1 class="large">クローズ中の店舗</h1>
      </div>
      <div class="store-items">
        @if(isset($close_stores))
        @foreach($close_stores as $close_stores )
        <div class="store-item">
          <div class="store-item-image">
            <a href="store/{{ $close_stores->id}}"><img src="data:image/{{ $close_stores->ext }};base64,{{ $close_stores->store_image }}"></a>
          </div>
          <p class="medium">{{ isset($close_stores->store_name) ? $close_stores->store_name : '' }}</p>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
  @endsection