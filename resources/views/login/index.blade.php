<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('assets/asset/login.css')}}">
</head>
<body>

  <div class="login-container">
    <div class="login-image"></div>
    <div class="login-form">
      @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
      @endif
      @if($errors->any())
        @foreach($errors->all() as $err)
          <p class="alert alert-danger text-lg">{{ $err }}</p>
        @endforeach
      @endif
      <h2 class="mb-4">Login Calon Karyawan</h2>
      <form method="post" action="/login_action">
        @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Silahkan Masukan Email Anda">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Silahkan Masukan Password Anda">
        </div>
        <button>Masuk</button>
      </form>
      <p class="mt-3">Belum Memiliki Akun? <a href="{{'/register'}}">Silahkan Login Disini</a></p>
    </div>
  </div>

</body>
</html>
