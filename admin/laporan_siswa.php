<?php 
require '../function/functions.php';
$siswa = query("SELECT spp.nominal ,kelas.kompetensi_keahlian ,siswa.* FROM siswa INNER JOIN spp ON siswa.id_spp = spp.id_spp INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Siswa</title>
	
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
	<b>LAPORAN DATA SISWA</b>
	<br/>
	<hr/>
	
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<thead>
		<th>NO</th>
		<th>NISN</th>
		<th>NIS</th>
		<th>NAMA</th>
		<th>KELAS</th>
		<th>ALAMAT</th>
		<th>NO TELPON</th>
		<th>JUMLAH SPP</th>
	</tr>
	</thead>
	<?php $i = 1; ?>
	<?php foreach ($siswa as $row ) :
		# code...
	?>
	<tbody>
	<tr>
		<td align="center"><?= $i; ?></td>
		<td align="center"><?= $row['nisn'] ?></td>
		<td align="center"><?= $row['nis'] ?></td>
		<td align=""><?= $row['nama'] ?></td>
		<td align=""><?= $row['kompetensi_keahlian'] ?></td>
		<td align=""><?= $row['alamat'] ?></td>
		<td align=""><?= $row['no_telp'] ?></td>
		<td align=""><?= $row['nominal'] ?></td>
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
