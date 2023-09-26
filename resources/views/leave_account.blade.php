@extends('preLoginLayout')
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
            <input type="submit" class="no" formaction="{{ route('mypage') }}" value="いいえ"></input>
          </div>
        </form>
        <form action="{{ route('mypage') }}"></form>

      </div>
    </div>
  </div>
</body>
@endsection