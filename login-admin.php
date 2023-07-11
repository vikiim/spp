<?php

session_start();
require 'function/functions.php';
 $_SESSION["login_admin"] = true; 
if ( isset($_POST["login_admin"])) {
	# code...
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM petugas WHERE username ='$username' ");
  $cek = mysqli_num_rows($result);
  $data = mysqli_fetch_assoc($result);
if (isset($_SESSION["login_admin"])) {
 

  if ($cek > 0) {
    # code...
    if($data['level'] == 'admin'){
        $_SESSION['level'] = 'admin';
        $_SESSION['username'] = $data['username'];
        header('location:admin/dashboard_admin.php');
    }elseif ($data['level'] == 'petugas') {
      # code...
       $_SESSION['level'] = 'petugas';
        $_SESSION['username'] = $data['username'];
        header('location:petugas/dashboard_petugas.php');
    }
  }
	
	$error = true;
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <!-- font awesome -->
<link href="../fontawesome/css/all.css" rel="stylesheet">
    <!-- <title>Dashboard Template for Bootstrap</title> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Login Akun Admin</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <form action="" method="post">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
             <div class="card-header">
            <h5 class="text-info">Login Admin</h5>
          <?php 
if (isset($error)) :
  # code...
?>
<label style="color: red;">Username/ Password Anda Salah</label>
<?php endif; ?>

        </div>
              <hr>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                </div>
                <button class="btn btn-register btn-block btn-warning" name="login_admin">LOGIN</button>
              
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
            Belum memiliki Akun? <a href="register-admin.php">Silahkan Daftar</a>
          </div>
          <div class="text-center" style="margin-top: 15px">
          	Login Sebagai <a href="siswa/login-siswa.php"> Siswa</a>
          </div>

        </div>
      </div>
    </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

  
  </body>
</html>