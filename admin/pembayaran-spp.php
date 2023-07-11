<?php 
require '../function/functions.php';
if (isset($_POST["bayar"])) {
  # code...

  //cek data
  if ( bayar($_POST) > 0 ) {
    # code...
    echo "
    <script>
    alert('Data berhasil di tambahkan !');
    document.location.href = 'pembayaran-spp.php';
    </script>
    ";
  } 
  else {
    echo "
    <script>
    alert('Data gagal di tambahkan !');
    document.location.href = 'pembayaran-spp.php';
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
      <!-- font awesome -->
<link href="../fontawesome/css/all.css" rel="stylesheet">
    <!-- <title>Dashboard Template for Bootstrap</title> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
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
            <li><a href="dashboard_admin.php"><i class="fa fa-tachometer fa-fw" aria-hidden="true"></i>Dashboard</a></li>
            <li><a href="logout-admin.php"><i class="fa fa-sign-out"></i></a></li>

          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="dashboard_admin.php"><i class="fas fa-history fa-fw" aria-hidden="true"></i>Riwayat Pembayaran <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="pembayaran-spp.php"><i class="fas fa-luggage-cart"></i>Transaksi Pembayaran</a></li>
            <li><a href="spp.php"><i class="fas fa-money-bill-wave"></i>Data SPP</a></li>
            <li><a href="kelas.php"><i class="fas fa-school"></i>Data Kelas</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="siswa.php"><i class="fas fa-users fa-fw" aria-hidden="true"></i>Data Siswa</a></li>
            <li><a href="petugas.php"><i class="fas fa-user fa-fw" aria-hidden="true"></i>Data petugas</a></li>
            <li><a href="laporan.php"><i class="fas fa-file-text fa-fw" aria-hidden="true"></i>Laporan</a></li>
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

          <h2 class="sub-header">Form Pembayaran Spp</h2>
          <div class="table-responsive">
           <form action="" method="post">
          <div class="mb-3">
            <label >Pilih petugas</label>
            <select name="id_petugas" class="form-control">
              <option value=""> pilih</option>
              <?php 
              $sql_petugas = mysqli_query($conn, "SELECT * FROM petugas") or die(mysqli_error($conn));
              while($data_petugas = mysqli_fetch_array($sql_petugas)) {
                echo'<option value="'.$data_petugas['id_petugas'].'">'.$data_petugas['nama_lengkap'].'</option>';

              }
               ?>
                    </select>
          </div>

          <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukan Nisn Anda ">
          </div>
          <div class="mb-3">
            <label for="tgl_bayar" class="form-label">Tanggal</label>
            <input type="date" name="tgl_bayar" class="form-control" id="tgl_bayar" placeholder="Masukan Tanggal ">
          </div>
          <div class="form-check">
             <label for="bulan" class="form-label">Bulan</label>
             <select name="bulan_dibayar" id="bulan" class="form-control">
               <option value="">--Pilih--</option>
               <option value="januari">Januari</option>
               <option value="februari">Februari</option>
               <option value="maret">Maret</option>
               <option value="april">April</option>
               <option value="mei">Mei</option>
               <option value="juni">Juni</option>
               <option value="juli">Juli</option>
               <option value="agustus">Agustus</option>
               <option value="september">September</option>
               <option value="oktober">Oktober</option>
               <option value="november">November</option>
               <option value="desember">Desember</option>
             </select>
  </label>
</div>
          <div class="mb-3">
            <label for="tahun_dibayar" class="form-label">Tahun</label>
            <input type="text" name="tahun_dibayar" class="form-control" id="tahun_dibayar" placeholder="Tahun ">
          </div>
          <div class="mb-3">
            <label >Spp</label>
            <select name="id_spp" class="form-control">
              <option value=""> pilih</option>
              <?php 
              $sql_spp = mysqli_query($conn, "SELECT * FROM spp") or die(mysqli_error($conn));
              while($data_spp = mysqli_fetch_array($sql_spp)) {
                echo'<option value="'.$data_spp['id_spp'].'">'.$data_spp['nominal'].'</option>';

              }
               ?>
                    </select>
          </div>
                    <div class="mb-3">
            <label for="jumlah_bayar" class="form-label">Jumlah</label>
            <input type="text" class="form-control" name="jumlah_bayar">
          </div>
          <br>
          <div class="mb-3">
            <button type="submit" name="bayar" class="btn btn-block btn-success"><i class="far fa-money-bill-alt fa-2x"></i></button>
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
