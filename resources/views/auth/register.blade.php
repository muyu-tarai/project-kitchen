<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/css/register.css">
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="panel panel-default">
        <div class="panel-heading">SIGN UP</div>
        <div class="panel-body">
          @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
            @endforeach
          </div>
          @endif
          <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
              <div class="about">
                <label for="name">username</label>
              </div>
              <div class="input">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>


              <div class="form-group">
                <div class="about">
                  <label for="email">mail</label>
                </div>
                <div class="input">
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
                </div>


                <div class="about">
                  <label for="password">password</label>
                </div>
                <div class="input">
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="about">
                  <label for="password-confirm">password check</label>
                </div>
                <div class="input">
                  <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">SIGN UP</button>
              </div>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
</body>

</html>
