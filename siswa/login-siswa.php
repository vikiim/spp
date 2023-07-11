<?php

session_start();
require '../function/functions.php';


if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	# code...
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id" );
	$row = mysqli_fetch_assoc($result);

	// cek kookie
	if ($key === hash('sha256', $row['username'])) {
		# code...
		$_SESSION['login'] = true;
	}
}


if (isset($_SESSION["login"])) {
	# code...
	header("Location: dashboard_siswa.php");
	exit;
}


if ( isset($_POST["login"])) {
	# code...
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username' ");

	// cek username
	if ( mysqli_num_rows($result) === 1) {
		# code...
		// cek password 
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"]) ) {
//set session
	        $_SESSION["login"] = true;	
// cek cookie

	        if (isset($_POST['remember']) ) {
	        	# code...
	        	setcookie('id', $row['id'] , time() + 60);
	        	setcookie('key', hash('sha256', $row['username']), time()+60);
	        }

			header("Location: dashboard_siswa.php");
			exit;
		}
	}

	$error = true;
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Login Akun Siswa</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <form action="" method="post">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <div class="card-header">
                 <label>LOGIN SISWA</label>
                 <br>
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
                <button class="btn btn-register btn-block btn-success" name="login">LOGIN</button>
              
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
            Belum memiliki Akun? <a href="register-siswa.php">Silahkan Daftar</a>
          </div>
          <div class="text-center" style="margin-top: 15px">
          	Login Sebagai <a href="../login-admin.php"> Admin/Petugas</a>
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