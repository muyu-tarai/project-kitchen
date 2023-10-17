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
          <p>本当に退会しますか？</p>
        </div>
        <form action="{{ route('leave_account_complete') }}" method="post">
          @csrf
          <div class="button">
            <input type="submit" class="yes" formaction="{{ route('leave_account_complete') }}" value="はい"></input>
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