@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/storeRegister.css">
@endsection
@section('content')
<h1 class="top-title">詳細登録画面</h1>
<hr>
<div class="inner-top">
  <h2>店舗名</h2>
  <input type="text">
  <h2>店舗画像</h2>
  <img src="/images/icons/noImage.jpg" class="store-img" alt="">
  <div class="for-button">
    <label>
      <button></button>画像を削除
    </label>
    <label>
      <input type="file">写真を選択
    </label>
  </div>
</div>
<div class="inner-middle">
  <div>
    <h2>店舗紹介コメント</h2>
    <textarea name="" id="" cols="30" rows="10"></textarea>
  </div>
  <div class="stores-items">
    <div class="stores-item">
      <img src="/images/foods/Crepe1.jpg" alt="クレープ">
      <p class="menu-title">チョコバナナ生クレープ</p>
      <p class="menu-amount">4600円</p>
      <p class="menu-text">
        クレープの王道チョコバナナ！
        チョコの甘さと特製生クリームの
        さっぱりとした甘さの相性が抜群
        です。
      </p>
      <div class="menu-delete"><label><button></button>削除</label></div>
    </div>
    <div class="stores-item">
      <img src="/images/foods/Crepe4.jpg" alt="クレープ">
      <p class="menu-title">クラシックストロベリー</p>
      <p class="menu-amount">400円</p>
      <p class="menu-text">
        新鮮な苺とホイップクリームの贅沢な組み合わせ。
      </p>
      <div class="menu-delete"><label><button></button>削除</label></div>
    </div>
    <div class="stores-item">
      <img src="/images/foods/Crepe3.jpg" alt="クレープ">
      <p class="menu-title">サボテンのオアシス</p>
      <p class="menu-amount">660円</p>
      <p class="menu-text">
        クリームチーズとキウイの爽やかなハーモニー。
      </p>
      <div class="menu-delete"><label><button></button>削除</label></div>
    </div>
    <div class="stores-item">
      <img src="/images/foods/Crepe4.jpg" alt="クレープ">
      <p class="menu-title">シナモンアップルクラシック</p>
      <p class="menu-amount">500円</p>
      <p class="menu-text">
        シナモン調のりんごとシロップの美味しさ。
      </p>
      <div class="menu-delete"><label><button></button>削除</label></div>
    </div>
  </div>
</div>

<div class="inner-bottom">
  <h2>メニュー追加</h2>
  <div class="inner-add-menu">
    <div class="add-menu-image">
      <h3>メニュー画像</h3>
      <img src="/images/icons/noImage.jpg" class="store-img" alt="">
      <div class="for-button">
        <label>
          <button></button>画像を削除
        </label>
        <label>
          <input type="file">写真を選択
        </label>
      </div>
    </div>
    <div>
      <h3>メニュー名</h3>
      <input type="text">
    </div>
    <div>
      <h3>メニュー金額</h3>
      <div class="add-menu-amount">
        <input type="text">
        <p>円</p>
      </div>
    </div>
    <div>
      <h3>メニュー紹介コメント</h3>
      <textarea name="" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="for-button">
      <label>
        <button></button>メニューを追加する
      </label>
    </div>
  </div>
  <div class="for-button register-button">
    <label>
      <button></button>店舗情報を登録する
    </label>
  </div>
</div>
</dev>
@endsection