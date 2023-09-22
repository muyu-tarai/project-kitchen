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
      <a class="x-large" href="#"><img src="/images/icons/サインインボタン.png"></a>
      <a class="x-large" href="#"><img src="/images/icons/ログインボタン.png"></a>
    </div>
  </div>
</div>

<div class="stores">
  <div class="stores-open">
    <div class="stores-title">
      <h1 class="large">オープン中の店舗</h1>
    </div>
    <div class="stores-items">
      <div class="stores-item">
        <a href="#"><img src="/images/trucks/truck1.jpg"></a>
        <p class="medium">フレッツアメリカ</p>
      </div>
      <div class="stores-item">
        <a href="#"><img src="/images/trucks/truck2.jpg"></a>
        <p class="medium">コスタリカドラゴンズ</p>
      </div>
      <div class="stores-item">
        <a href="#"><img src="/images/trucks/truck3.jpg"></a>
        <p class="medium">ロシアンベアー</p>
      </div>
      <div class="stores-item">
        <a href="#"><img src="/images/trucks/truck4.jpg"></a>
        <p class="medium">アゼルバイジャンラテ</p>
      </div>
      <div class="stores-item">
        <a href="#"><img src="/images/trucks/truck5.jpg"></a>
        <p class="medium">トニオカフェ</p>
      </div>
    </div>

    <div class="stores-close">
      <div class="stores-title">
        <h1 class="large">クローズ中の店舗</h1>
      </div>
      <div class="stores-items">
        <div class="stores-item">
          <a href="#"><img src="/images/trucks/truck6.jpg"></a>
          <p class="medium">チョコレートキッカー</p>
        </div>
      </div>
    </div>
    <div class="pager medium">1 2 3</div>
  </div>
    @endsection