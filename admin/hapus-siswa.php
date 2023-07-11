<?php 
require '../function/functions.php';
$nisn = $_GET["nisn"];

if (hapus_siswa($nisn) > 0 ) {
	# code...
	echo "
		<script>
		alert('Data berhasil di Hapus !');
		document.location.href = 'siswa.php';
		</script>
		";
} else {
	echo "
		<script>
		alert('Data gagal di Hapus !');
		document.location.href = 'siswa.php';
		</script>
		";

 }
?>