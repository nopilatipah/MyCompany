@php
$komponen = App\Komponen::find(1);
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Masuk Sebagai Admin</title>
    <link rel="stylesheet" href="{{ asset('css/log.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/'.$komponen->logo) }}">
</head>
<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active">  </h2>

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('img/'.$komponen->logo) }}" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="Alamat E-Mail">
      <br>
      @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Kata Sandi">
      <br>
      @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
      <input type="submit" class="fadeIn fourth" value="Masuk">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="{{ route('password.request') }}">Lupa Kata Sandi</a>
    </div>

  </div>
</div>

</body>
</html>

















<!-- 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
