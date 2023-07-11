<?php 
require '../function/functions.php';
$siswa = query("SELECT spp.nominal ,kelas.kompetensi_keahlian ,siswa.* FROM siswa INNER JOIN spp ON siswa.id_spp = spp.id_spp INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
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
<!-- font awesome -->
<link href="../fontawesome/css/all.css" rel="stylesheet">
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
            <li><a href="dashboard_admin.php"><i class="fas fa-history"></i>Riwayat Pembayaran <span class="sr-only">(current)</span></a></li>
            <li><a href="pembayaran-spp.php"><i class="fas fa-luggage-cart"></i>Transaksi Pembayaran</a></li>
            <li><a href="spp.php"><i class="fas fa-money-bill-wave"></i>Data SPP</a></li>
            <li><a href="kelas.php"><i class="fas fa-school"></i>Data Kelas</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="siswa.php"><i class="fas fa-users fa-fw" aria-hidden="true"></i>Data Siswa</a></li>
            <li><a href="petugas.php"><i class="fas fa-user fa-fw" aria-hidden="true"></i>Data petugas</a></li>
            <li><a href="laporan.php"><i class="fa fa-file-text fa-fw" aria-hidden="true"></i>Laporan</a></li>
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

          <h2 class="sub-header">DAFTAR DATA SISWA</h2>
          <div class="table-responsive">
            <table class="table table-striped" cellpadding="10" cellspacing="0">
              <button class="btn btn-success"><a href="tambah-siswa.php" style="color: white;"><i class="fa fa-user-plus"></i></a></button>
              <thead>
                <tr>
                	<th>No</th>
                  <th>NISN</th>
                  <th>NIS</th>
                  <th>NAMA</th>
                  <th>KELAS</th>
                  <th>ALAMAT</th>
                  <th>TELPON</th>
                  <th>JUMLAH SPP</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <?php $i = 1; ?>
<?php foreach ( $siswa as $row ) :
	# code...
 ?>
              <tbody>
             
              	<tr>
              	<td><?= $i; ?> </td>
              	<td><?= $row["nisn"]; ?></td>
              	<td><?= $row["nis"]; ?></td>
              	<td><?= $row["nama"]; ?></td>
                <td><?= $row["kompetensi_keahlian"]; ?></td>
                <td><?= $row["alamat"]; ?></td>
                <td><?= $row["no_telp"]; ?></td>
                <td><?= $row["nominal"]; ?></td>
              	<td>
              		<button class="btn btn-warning"><a href="edit-siswa.php?nisn=<?= $row["nisn"]; ?>" style="color: white;"><i class="fa fa-edit"></i></a></button>  
				          <button class="btn btn-danger">
                    <a href="hapus-siswa.php?nisn=<?= $row["nisn"]; ?>" style="color: white;" 
                      onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="fa fa-user-times"></i></a></button> 
              	</td>
              	</tr>
              	<?php $i++; ?>
              <?php endforeach; ?>  
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
