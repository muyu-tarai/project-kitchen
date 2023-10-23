@extends('preloginLayout')
@section('css')
<link rel="stylesheet" href="/css/register.css">
@endsection
@section('content')

<body>
  <div class="imag-car">
    <style>
      .imag-car {
        background-image: url("data: image/jpg;base64,{{ base64_encode(Storage::disk('dropbox')->get('view/truck5.jpg'))}}");
      }
    </style>
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">

          <div class="panel-heading">SIGN UP</div>
          @if($errors->any())
          <div class="err">
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </div>
          @endif
          <div class="panel-body">
            <form onsubmit="return false;" action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name" class="alert">username</label><br>
                <div class="input">
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="alert">mail</label><br>
                <div class="input">
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="alert">password</label><br>
                <div class="input">
                  <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
              <div class="form-group">
                <label for="password-confirm" class="alert">password check</label><br>
                <div class="input">
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                </div>
              </div>

              <div class="text-right">
                <input type="button" class="btn-primary" value="SIGN UP" onclick="submit();">
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection