<?php 
require '../function/functions.php';
$pembayaran = query("SELECT spp.nominal ,siswa.nama,petugas.nama_lengkap ,pembayaran.* FROM pembayaran INNER JOIN spp ON pembayaran.id_spp = spp.id_spp INNER JOIN siswa ON pembayaran.nisn = siswa.nisn INNER JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Pembayaran</title>
	
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
	<b>LAPORAN DATA PEMBAYARAN</b>
	<br/>
	<hr/>
	
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<thead>
		<th>NO</th>
		<th>NAMA</th>
		<th>NISN</th>
		<th>TANGGAL</th>
		<th>BULAN</th>
		<th>TAHUN</th>
		<th>JUMLAH SPP</th>
	</tr>
	</thead>
	<?php $i = 1; ?>
	<?php foreach ($pembayaran as $row ) :
		# code...
	?>
	<tbody>
	<tr>
		<td align="center"><?= $i; ?></td>
		<td align="center"><?= $row['nama'] ?></td>
		<td align="center"><?= $row['nisn'] ?></td>
		<td align=""><?= $row["tgl_bayar"]; ?></td>
        <td align=""> <?= $row["bulan_dibayar"]; ?></td>
        <td align=""><?= $row["tahun_dibayar"]; ?></td>
        <td align=""><?= $row["jumlah_bayar"]; ?></td>
              	
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
</tbody>
	
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Bandung , <?= date('d/m/y') ?> <br/>
				TU,
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
