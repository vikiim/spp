<?php 


require '../function/functions.php';
if ( isset($_POST["register"]) ) {
  # code...

  if (registrasi($_POST) > 0 ) {
    # code...
    echo "<script>
    alert('user baru berhasil di tambahkan');
    </script>";
  } else {
    echo mysqli_error($conn);
  }
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Register Akun</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <label>REGISTER SISWA</label>
              <hr>
                <form action="" method="post">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
                </div>

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                  <label for="password2">Konfirmasi Password</label>
                  <input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password anda">
                </div>
                
                
                
                <button class="btn btn-register btn-block btn-success" name="register">REGISTER</button>
              </form>
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
            Sudah punya akun? <a href="login-siswa.php">Silahkan Login</a>
          </div>

        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

  
  </body>
</html>