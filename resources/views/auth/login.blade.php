@extends('preLoginLayout')
@section('css')
<link rel="stylesheet" href="/css/login.css">
@endsection

@section('content')

<body>
  <div class="imag-car">
    <div class="container">
    <div class="text-center">
          <button type="submit" class="guest" href="">ゲスト</button>
        </div>
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">LOG IN</div>

            <form action="{{ route('login') }}" method="POST">
              
              @csrf
              <div class="form-group">
                <label for="email" class="label">mail</label>
                @error('email')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="password" class="label
                ">password</label>
                @error('password')
                    <span role="alert">{{ $message }}</span>
                    @enderror
                <input type="password" class="form-control" id="password" name="password" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">LOG IN</button>
              </div>
            </form>
        </div>
        </nav>
        
      </div>
    </div>
  </div>
  </div>
</body>
@endsection