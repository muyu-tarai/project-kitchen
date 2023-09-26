@extends('preLoginLayout')
@section('css')
<link rel="stylesheet" href="/css/mypage.css">
@endsection

@section('content')


<body>

  <div class="imag-car">
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <p class="panel-heading">マイページ</p>
          <form action="{{ route('mypage') }}" method="post">
            @csrf
            <div class="panel-body">
              <div class="about">
                <label for="name">ユーザー名</label>
                @error('name')
                <span class="alert" role="alert">{{ $message }}</span>
                @enderror
              </div>
              <div class="input">
                <input type="text" class="form-control" id="name" name="name" value="{{  Auth::user()->name }}" />

              </div>

              <div class="email">
                <p>メールアドレス</p>
              </div>
              <div class="email2">
                <p>{{ Auth::user()->email }}</p>
              </div>
            </div>
            <div class="button">
              <input type="submit" class="updeta" formaction="{{ route('mypage') }}" value="更新">
              <input type="submit" class="Withdrawal" formaction="{{ route('leave_account')}}" value="退会">
            </div>
          </form>
          <form action="{{ route('leave_account') }}"></form>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection