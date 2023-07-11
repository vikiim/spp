<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
  # code...
  header("Location: login-siswa.php");
  exit;
 }  
require '../function/functions.php';
$pembayaran = query("SELECT spp.nominal ,siswa.nama,petugas.nama_lengkap ,pembayaran.* FROM pembayaran INNER JOIN spp ON pembayaran.id_spp = spp.id_spp INNER JOIN siswa ON pembayaran.nisn = siswa.nisn INNER JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas");

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
<!-- font awesome -->
<link href="../fontawesome/css/all.css" rel="stylesheet">
    <!-- <title>Dashboard Template for Bootstrap</title> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
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
            <li><a href="logout-siswa.php"><i class="fa fa-sign-out"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="dashboard_siswa.php"><i class="fas fa-history fa-fw" aria-hidden="true"></i>Riwayat Pembayaran <span class="sr-only">(current)</span></a></li>
                     </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <div class="row placeholders">
            <div class="col-xs-2 col-sm-2 placeholder ">
              <img src="../img/img1.jpeg" width="140" height="140" class="img-responsive" alt="Generic placeholder thumbnail">
            </div>
              <div class="col-xs-8 col-sm-4 placeholder" style="padding-top: 40px;">
                  <h4>  SMK IGASAR PINDAD BANDUNG</h4>
              <span class="text-muted">Jl. Cisaranten kulon no. 17 Bandung</span>
                </div>
          </div>

          <h2 class="sub-header">Riwayat Pembayaran</h2>
          <div class="table-responsive">
            <table class="table table-striped" cellpadding="10" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NAMA PETUGAS</th>
                  <th>NAMA</th>
                  <th>TANGGAL</th>
                  <th>BULAN</th>
                  <th>TAHUN</th>
                  <th>NOMINAL</th>
                  <th>JUMLAH</th>
                  <th>CETAK</th>
                </tr>
              </thead>
              <?php $i = 1; ?>
<?php foreach ( $pembayaran as $row ) :
  # code...
 ?>
              <tbody>
             
                <tr>
                <td><?= $i; ?> </td>
                <td><?= $row["nama_lengkap"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["tgl_bayar"]; ?></td>
                <td><?= $row["bulan_dibayar"]; ?></td>
                <td><?= $row["tahun_dibayar"]; ?></td>
                <td><?= $row["nominal"]; ?></td>
                <td><?= $row["jumlah_bayar"]; ?></td>
                <td>
                  <a href="cetak-pembayaran.php?id_pembayaran=<?= $row["id_pembayaran"]; ?> " target="_blank"><button class="btn btn-primary btn-sm" ><i class="fas fa-print fa-2x"></i></button></a> 
                   
                </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>









                <tr>
                <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>                 
                </tr>
              </tbody>
            </table>
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
