<?php 
require '../function/functions.php';
$id = $_GET["id_pembayaran"];

if (hapus_pembayaran($id) > 0 ) {
	# code...
	echo "
		<script>
		alert('Data berhasil di Hapus !');
		document.location.href = 'dashboard_petugas.php';
		</script>
		";
} else {
	echo "
		<script>
		alert('Data gagal di Hapus !');
		document.location.href = 'dashboard_petugas.php';
		</script>
		";

 }
?>