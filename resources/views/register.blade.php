<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="asset/css/register.css">
</head>
<body>
  <div class="mt-5">
    <div>
      @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
              <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
      @endif

      @if(session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
      @endif

      @if(session()->has('success'))
        <div class="alert alert-success">{{session('success')}}</div>
      @endif
    </div>
  </div>
  <table>
     <tr>
      <td>
      <img src="asset/images/register_image.png" class="img-fluid" >
      </td>
      <td class="colom_form">
        <h4>Register Account</h4>
        <p>Selamat Datang! Selamat bergabung <br> menjadi bagian dari aplikasi Sayuria. <br>Silakan isi data diri untuk membuat akun
        <form class=login action="{{route('register.post')}}" method="POST">
        @csrf 
        <input type="text" class="form-control" id="input" placeholder="Nama Depan" name="nama_depan"><br>
        <input type="text" class="form-control" id="input" placeholder="Nama Belakang" name="nama_belakang"><br>
        <input type="email" class="form-control" id="input" placeholder="Email" name="email"><br>
        <input type="text" class="form-control" id="input" placeholder="Username baru"name="username"><br>
        <input type="password" id="input" class="form-control" placeholder="Password"name="password"><br>
        <input type="password" id="input" class="form-control" placeholder="Konfirmasi Password" name="konfirmasi_password"><br>
        <input type="submit" value="Daftar" class="btn_login"><br>
        <p>Sudah memiliki akun? <a href="{{route('login')}}">Login</a>
        </form>
      </td>
     </tr>
  </table>
</body>
</html>

