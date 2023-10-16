@extends('preLoginLayout')

@section('css')
<link rel="stylesheet" href="/css/login.css">

@endsection

@section('content')

<body>
  <div class="imag-car">
    <style>
      .imag-car {
        background-image: url("data: image/jpg;base64,{{ base64_encode(Storage::disk('dropbox')->get('view/truck8.jpg'))}}");
      }
    </style>
    <div class="container">
      <form action="{{ route('login') }}">
        @csrf
        <div class="text-center">
          <a class="guest" href="{{ route('login.guest') }}">ゲスト</a>
        </div>
      </form>
      <div class="row">
        <div class="panel-heading">LOG IN</div>
        @if($errors->any())
        <div class="err">
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST" class="form">
          @csrf
          <div class="form-group">
            <div>
              <label for="email" class="label">mail</label>
            </div>

            <div class="input">
              <input type="text" class="form-control" id="email" name="email" value="{{ isset($gest) ? $gest : old('email') }}" />
            </div>
          </div>
          <div class="form-group">
            <div>
              <label for="password" class="label
                ">password</label>
            </div>

            <div class="input">
              <input type="password" class="form-control" id="password" name="password" value="{{ isset($password) ? $password : '' }}" />
            </div>
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-primary">LOG IN</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  </div>
</body>
@endsection