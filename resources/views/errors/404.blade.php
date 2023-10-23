@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/common.css">
@endsection
@section('content')
  <div class="container">
    <div class="row">
        <div class="error-contents x-large">
            <h1 class="error-title">4<i class="fa-regular fa-face-dizzy"></i>4</h1>
          <p>お探しのページは見つかりませんでした。</p>
          <a href="{{ route('index') }}" class="btn">
            店舗一覧画面へ戻る
          </a>
        </div>
    </div>
  </div>
@endsection