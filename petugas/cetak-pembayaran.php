<?php 
require '../function/functions.php';
$id_pembayaran = $_GET["id_pembayaran"];
$pembayaran = query("SELECT spp.nominal ,siswa.nama,petugas.nama_lengkap ,pembayaran.* FROM pembayaran INNER JOIN spp ON pembayaran.id_spp = spp.id_spp INNER JOIN siswa ON pembayaran.nisn = siswa.nisn INNER JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas WHERE id_pembayaran = $id_pembayaran")[0];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Struk pembayaran</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<b>STRUK PEMBAYARAN</b>
	<br/>
	<hr/>
	
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<thead>
		<th>NO</th>
		<th>NAMA</th>
		<th>TANGGAL</th>
		<th>BULAN</th>
		<th>TAHUN</th>
		<th>JUMLAH</th>
	</tr>
	</thead>
	<?php $i = 1; ?>
	<tbody>
	<tr>
		<td align="center"><?= $i; ?></td>
		<td align="center"><?= $pembayaran['nama'] ?></td>
		<td align="center"><?= $pembayaran['tgl_bayar'] ?></td>
		<td align=""><?= $pembayaran['bulan_dibayar'] ?></td>
		<td align=""><?= $pembayaran['tahun_dibayar'] ?></td>
		<td align=""><?= $pembayaran['jumlah_bayar'] ?></td>
	</tr>
	<?php $i++; ?>
</tbody>
	
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Bandung , <?= date('d/m/y') ?> <br/>
				Operator,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>
