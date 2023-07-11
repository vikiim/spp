<?php 
require '../function/functions.php';
$id = $_GET["id_kelas"];

if (hapus_kelas($id) > 0 ) {
	# code...
	echo "
		<script>
		alert('Data berhasil di Hapus !');
		document.location.href = 'kelas.php';
		</script>
		";
} else {
	echo "
		<script>
		alert('Data gagal di Hapus !');
		document.location.href = 'kelas.php';
		</script>
		";

 }
?>