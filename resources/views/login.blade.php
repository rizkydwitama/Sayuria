<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/css/login.css">
</head>
<body>
  <div class="mt-5">
    @if (session('success'))
    <div class="alert alert-success">
      <p>{{ session('success') }}</p>
    </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <p>{{ session('error') }}</p>
        </div>
    @endif
  </div>
  <table>
     <tr>
      <td>
      <img src="asset/fotologin.png" class="img-fluid" >
      </td>
      <td class="colom_form">
        <h4>Login</h4>
        <p>Selamat Datang! Silakan login agar Anda <br> dapat melakukan aktivitas belanja di <br>Sayuria
        <form class=login action="{{route('login.post')}}" method="POST">
        @csrf 
        <input type="text" class="form-control" id="input" placeholder="Username atau Email" name="login_id"><br>
        @error('login_id')
          <span class="text-danger">{{$message}}</span>
        @enderror
        <input type="password" id="input" class="form-control" placeholder="Password" name=password><br>
        @error('password')
        <span class="text-danger">{{$message}}</span>
      @enderror
        <input type="submit" value="Masuk" class="btn_login"><br>
        <p>Belum memiliki akun? <a href="{{ route('register') }}">Registrasi</a>
        </form>
      </td>
     </tr>
  </table>
</body>
</html>

