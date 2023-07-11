<?php 
require '../function/functions.php';
$id_petugas = $_GET["id_petugas"];

if (hapus_petugas($id_petugas) > 0 ) {
	# code...
	echo "
		<script>
		alert('Data berhasil di Hapus !');
		document.location.href = 'petugas.php';
		</script>
		";
} else {
	echo "
		<script>
		alert('Data gagal di Hapus !');
		document.location.href = 'petugas.php';
		</script>
		";

 }
?>