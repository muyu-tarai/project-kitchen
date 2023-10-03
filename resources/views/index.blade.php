@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/index.css">
@endsection
@section('content')
<div class="top-section">
  <div class="top-section-items">
    <h1 class="large">出店様へ</h1>
    <p class="medium">このサイトはフードカーを盛り上げるために制作さ<br>れたサイトです。もし興味がありましたら、下のア<br>イコンから登録をお願いします。</p>
    <div class="top-section-buttons">
      <a class="x-large" href="/register"><img src="/images/icons/サインインボタン.png"></a>
      <a class="x-large" href="/login"><img src="/images/icons/ログインボタン.png"></a>
    </div>
  </div>
</div>

<div class="stores">
  <div class="stores-open">
    <div class="stores-title">
      <h1 class="large">オープン中の店舗</h1>
    </div>
    <div class="stores-items">
      @foreach($open_stores  as $open_stores )
        <div class="stores-item">
          <a href="store/{{ $open_stores->id}}"><img src="{{ $open_stores->store_image }}"></a>
          <p class="medium">>{{ isset($open_stores->store_name) ? $open_stores->store_name : '' }}</p>
        </div>
      @endforeach
    </div>

    <div class="stores-close">
      <div class="stores-title">
        <h1 class="large">クローズ中の店舗</h1>
      </div>
      <div class="stores-items">
      @foreach($close_stores  as $close_stores )
        <div class="stores-item">
          <a href="store/{{ $close_stores->id}}"><img src="{{ $open_stores->store_image }}"></a>
          <p class="medium">{{ isset($close_stores->store_name) ? $close_stores->store_name : '' }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
    @endsection
    @section('js')
    <script src="/js/index.js "></script>
    @endsection