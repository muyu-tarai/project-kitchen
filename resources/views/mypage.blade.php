@extends('Layout')
@section('css')
<link rel="stylesheet" href="/css/mypage.css">
@endsection
@section('content')



<div class="imag-car">
  <style>
    .imag-car{
    background-image: url("data: image/jpg;base64,{{ base64_encode(Storage::disk('dropbox')->get('view/truck9.jpg')) }}");
    }
  </style>
  <div class="container">
    <div class="row">

      <p class="panel-heading">マイページ</p>
      <div>
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
              <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="email">
              <p>メールアドレス</p>
            </div>
            <div class="email2">
              <p>{{ Auth::user()->email }}</p>
            </div>

            <div class="button">
              @if(Auth::user()->id !== 42)
              <input type="submit" class="updeta" formaction="{{ route('mypage') }}" value="更新">
              <input type="submit" class="Withdrawal" formaction="{{ route('leave_account') }}" value="退会">
              @endif
            </div>
          </div>
        </form>
        <form action="{{ route('leave_account') }}"></form>
      </div>
    </div>
  </div>
</div>

@endsection