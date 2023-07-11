<?php 
//koneksi
require 'functions.php';
if (isset($_POST["submit"])) {
	# code...

	//cek data
	if ( tambah($_POST) > 0 ) {
		# code...
		echo "
		<script>
		alert('Data berhasil di tambahkan !');
		document.location.href = 'index.php';
		</script>
		";
	} 
	else {
		echo "
		<script>
		alert('Data gagal di tambahkan !');
		document.location.href = 'tambah.php';
		</script>
		";
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>pembayaran spp</title>
	<style>
		body {
			background-color: #f5f5f0;
		}
		.body {
			width: 1300px;
			
			margin: auto;
			
		}
		h1{
			text-align: center;
			font-size: 30px;
			font-family: italic;
		}
		h5{
			text-align: center;
			opacity: 80%;
		}
		label {
			display: block;
		}
		form {
			align-items: center;
		}
		ul, li {
			list-style: none;
		}
		.container{
			margin: auto;
			width: 700px;
			background-color: #aeaeae;
			border: 2px solid black;
		}
		img {
			padding-top: 200px;
			z-index: -99999;
			opacity: 40%;
		}
	</style>
</head>
<body>
	<div class="body">
	<h1>FORM PEMBAYARAN SPP</h1>
	<h5>SMK IGASAR PINDAD BANDUNG</h5>
<div class="container">
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			
			<li>
				<label for="id_pembayaran">ID PEMBAYARAN :</label>
				<input type="text" name="id_pembayaran" id="id_pembayaran" required>
			</li>
			<li>
				<label for="nrp">Nrp :</label>
				<input type="text" name="nrp" id="nrp" required>
			</li>
			<li>
			<label for="nisn">Nisn :</label>
				<input type="text" name="nisn" id="nisn" required>
			</li>
			<li>
				<label for="tgl_bayar">Tanggal Bayar :</label>
				<input type="date" name="tgl_bayar" id="tgl_bayar" required>
			</li>
			<li>
				<label for="bulan_dibayar">Bulan Bayar :</label>
				<input type="text" name="bulan_dibayar" id="bulan_dibayar">
			</li>
			<li>
				<label for="tahun_dibayar">Tahun Bayar :</label>
				<input type="text" name="tahun_dibayar" id="tahun_dibayar">
			</li>
			<li>
				<label for="id_spp">Id SPP :</label>
				<input type="text" name="id_spp" id="id_spp">
			</li>
			<li>
				<label for="jumlah_bayar">Jumlah:</label>
				<input type="text" name="jumlah_bayar" id="jumlah_bayar">
			</li>
			<li>
				<button type="submit" name="submit">Bayar!</button>
			</li>
		</ul>




<a href="dashboard_admin.php">Kembali</a>
	</form>
</div>
</div>
</body>
</html>

