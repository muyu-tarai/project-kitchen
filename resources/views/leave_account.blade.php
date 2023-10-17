@extends('layout')
@section('css')
<link rel="stylesheet" href="/css/leave_account.css">
@endsection
@section('content')

<body>
  <div class="y">
    <div class="container">
      <div class="row">
        <div class="Withdrawal">
          <p>登録された内容は全て消去されますが</p>
        </div>
        <div class="Withdrawal2">
          <h1>本当に退会しますか？</h1>
        </div>

        <div class="button">
          <input type="submit" id="modal" class="yes" value="はい"></input>
          <a href="mypage" class="no">いいえ</a>
        </div>
        </form>
        <form action="{{ route('mypage') }}" method="get">
          @csrf
        </form>
      </div>
    </div>
  </div>
</body>
@endsection
@section('js')
<script src="/js/leave_account.js"></script>
@endsection
<div id="myModal" style="display: none;">
  <p class="modal1">メールアドレスを入力して<br>送信ボタンを押してください</p>

  <form action="{{ route('leave_account_complete') }}" method="post">
    @csrf
    <div class="button">
      <input type="submit" class="send" formaction="{{ route('leave_account_complete') }}" value="送信"></input>
    </div>
    <a href="mypage" class="close">閉じる</a>
  </form>
</div>