@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/storeRegister.css">
@endsection
@section('content')
<h1 class="top-title">詳細登録画面</h1>
<hr>
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $message)
    <li>{{ $message }}</li>
    @endforeach
  </ul>
</div>
@endif
<form action="/store_register_after" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="inner-top">
    <h2>店舗名</h2>
    <input type="text" name="store_name" value="{{ isset($storeName) ? $storeName : old('store_name') }}">
    <h2>店舗画像</h2>
    <img src="data:image/{{ $ext }};base64,{{ $storeImage }}" class="store-figure" id="store-figure" name="image_file" alt="">
    <div class="for-button">
      <label>
        <input type="file" name="store_image" id="add-store-image" accept="image/">写真を選択
      </label>
    </div>
  </div>
  <div class="inner-middle">
    <div>
      <h2>店舗紹介コメント</h2>
      <textarea name="store_comment" id="" cols="30" rows="10">{{ isset($storeComment) ? $storeComment : old('store_comment') }}</textarea>
    </div>
    <div class="stores-items" id="stores-items">
      @if(isset($menus))
      @foreach($menus as $menu)
      <div class="stores-item">
        <img src="data:image/{{ $menu->ext }};base64,{{ $menu->menu_image }}" class="store-figure" id="added-menu-figure" alt="">
        <p class="menu-title">{{ $menu->menu_name }}</p>
        <p class="menu-price" name="menu_price_display">{{ $menu->price }}</p>
        <p class="menu-text">{{ $menu->menu_comment }}</p>
        <input type="hidden" value="{{ $menu->menu_image }}" name="send_menu_image[]" multiple>
        <input type="hidden" value="{{ $menu->menu_name }}" name="send_menu_name[]">
        <input type="hidden" value="{{ $menu->price }}" name="send_menu_price[]">
        <input type="hidden" value="{{ $menu->menu_comment }}" name="send_menu_comment[]">
        <div class="menu-delete"><label><button type="button" onclick="removeItem(this)"></button>削除</label></div>
      </div>
      @endforeach
      @endif
    </div>
  </div>

  <div class="inner-bottom">
    <h2>メニュー追加</h2>
    <div class="inner-add-menu">
      <div class="add-menu-image">
        <h3>メニュー画像</h3>
        <img src="data:image/jpg;base64,{{ base64_encode(Storage::disk('dropbox')->get('store/noImage.jpg')) }}" class="store-figure" id="menu-figure" alt="">
        <div class="for-button" id="add-menu-images">
          <label>
            <button></button>画像を削除
          </label>
          <label id="add-menu-image-label" class="add-menu-image-label">
            <input type="file" name="menu_image[]" id="add-menu-image">写真を選択
          </label>
        </div>
      </div>
      <div>
        <h3>メニュー名</h3>
        <input type="text" name="menu_name" id="add-menu-name">
      </div>
      <div>
        <h3>メニュー金額</h3>
        <div class="add-menu-price">
          <input type="text" name="menu_price" id="add-menu-price">
          <p>円</p>
        </div>
      </div>
      <div>
        <h3>メニュー紹介コメント</h3>
        <textarea name="menu_comment" id="add-menu-comment" cols="30" rows="10"></textarea>
      </div>
      <div class="for-button">
        <label>
          <button type="button" id="add-menu"></button>メニューを追加する
        </label>
      </div>
    </div>
    <div class="for-button register-button">
      <label>
        <input type="submit"></input>店舗情報を登録する
      </label>
    </div>
  </div>
</form>
@section('js')
<script src="/js/storeRegister.js"></script>
@endsection
@endsection