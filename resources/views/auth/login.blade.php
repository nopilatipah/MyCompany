<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Company Login</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'>

      <link rel="stylesheet" href="{{asset('Login/modal/css/style.css')}}">

  
</head>

<body>
  
<!-- Form-->
<div class="form">
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Masuk Dengan Akun Anda</h1>
    </div>
    <div class="form-content">
      {!! Form::open(['url'=>'login', 'class'=>'form-horizontal']) !!}
        <div class="form-group">
          <label for="username">Email</label>
          <input type="text" id="username" name="email" required="required"/>
        </div>
        <div class="form-group">
          <label for="password">Kata Sandi</label>
          <input type="password" id="password" name="password" required="required"/>
        </div>
        <div class="form-group">
          <label class="form-remember">
            <input type="checkbox" name="remember" />Ingat Saya
          </label><a href="{{ url('/password/reset')}}" class="form-recovery">Lupa Kata Sandi</a>
        </div>
        <div class="form-group">
          <button type="submit">Masuk</button>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
  <div class="form-panel two">
    <div class="form-header">
      <h1>Registrasi Akun</h1>
    </div>
    <div class="form-content">
      <form>
        
        <div class="form-group">
          <label for="password">Anda Dapat Menghubungi <b>Admin Utama</b> Secara Langsung Untuk Mendaftarkan Akun</label>
        </div>
        <div class="form-group">
          <label for="cpassword">Perhatian: Akun Hanya Dapat Digunakan Oleh Petugas Sekolah</label>
        </div>
        <div class="form-group">
          <label for="email">_________________________________________________________</label>
        </div>
        <div class="form-group">
          <label for="email"></label>
        </div>
        <div class="form-group">
          <button type="submit">adminutama@gmail.com</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="{{asset('Login/modal/js/index.js')}}"></script>

</body>
</html>
