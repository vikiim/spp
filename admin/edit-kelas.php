<?php 
//koneksi
require '../function/functions.php';

//ambil data di url
$id_kelas = $_GET["id_kelas"];
//query data mahasiswa berdasarkan id_kelas
$kelas = query("SELECT * FROM kelas WHERE id_kelas = $id_kelas")[0];

if (isset($_POST["submit-kelas"])) {
  # code...

  //cek data
  if ( edit_kelas($_POST) > 0 ) {
    # code...
    echo "
    <script>
    alert('Data berhasil di Ubah !');
    document.location.href = 'kelas.php';
    </script>
    ";
  } 
  else {
    echo "
    <script>
    alert('Data gagal di Ubah !');
    document.location.href = 'edit-kelas.php';
    </script>
    ";
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <!-- <title>Dashboard Template for Bootstrap</title> -->

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PEMBAYARAN SPP SMK IGASAR PINDAD BANDUNG</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard_admin.php">Dashboard</a></li>
            <li><a href="logout-admin.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="kelas.php">Data kelas <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="edit-kelas.php">Edit Data kelas</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<div class="row placeholders">
            <div class="col-xs-2 col-sm-2 placeholder ">
              <img src="../img/img1.jpeg" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
            </div>
              <div class="col-xs-8 col-sm-4 placeholder" style="padding-top: 40px;">
                  <h4>  SMK IGASAR PINDAD BANDUNG</h4>
              <span class="text-muted">Jl. Cisaranten kulon no. 17 Bandung</span>
                </div>
          </div>
          <h2 class="sub-header">Form Edit Data Kelas</h2>
          <div class="table-responsive">
           <form action="" method="post">
            <input type="hidden" name="id_kelas" value="<?= $kelas["id_kelas"]; ?> ">
                      <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama kelas</label>
            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="<?= $kelas["nama_kelas"]; ?> " required>
          </div>
          <div class="mb-3">
            <label for="kompetensi_keahlian" class="form-label">kompetensi_keahlian</label>
            <input type="text" name="kompetensi_keahlian" class="form-control" id="kompetensi_keahlian" value="<?= $kelas["kompetensi_keahlian"]; ?> " required>
          </div>
          <br>
          <div class="mb-3">
            <button type="submit" name="submit-kelas" class="btn btn-block btn-success">Edit Data</button>
          </div>
           </form> 
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
