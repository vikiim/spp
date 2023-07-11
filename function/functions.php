<?php 
// koneksi ke database
// index.php / tampil data
$conn = mysqli_connect("localhost", "root", "", "db_spp_viki");

function query($query) {
	global $conn;
$result = mysqli_query($conn, $query);
$rows = [];
while ( $row = mysqli_fetch_assoc($result)) {

	$rows[] = $row;
}
return $rows;

}

// tambah spp
 function tambah_spp($data) {
global $conn;
//ambil data dari tiap element

	$tahun = htmlspecialchars($data["tahun"]);
	$nominal = htmlspecialchars($data["nominal"]);

	//query insert data
	$query = "INSERT INTO spp
				VALUES
				('',
				'$tahun',
				'$nominal')
				";
	mysqli_query($conn, $query);


return mysqli_affected_rows($conn);
}


// hapus spp
function hapus_spp($id) {

	global $conn;

	mysqli_query($conn, "DELETE FROM spp WHERE id_spp = $id");

	return mysqli_affected_rows($conn);
}

//edit spp

function edit_spp($data) {
global $conn;
//ambil data dari tiap element
	$id_spp = $data["id_spp"];
	$tahun = htmlspecialchars($data["tahun"]);
	$nominal = htmlspecialchars($data["nominal"]);
	//query upadate data
	$query = "UPDATE spp SET
				tahun = '$tahun',
				nominal = '$nominal'
				WHERE id_spp = $id_spp
				";
	mysqli_query($conn, $query);


return mysqli_affected_rows($conn);

}



 // tambah kelas

 function tambah_kelas($data) {
global $conn;
//ambil data dari tiap element

	$nama_kelas = htmlspecialchars($data["nama_kelas"]);
	$kompetensi_keahlian = htmlspecialchars($data["kompetensi_keahlian"]);

	//query insert data
	$query = "INSERT INTO kelas
				VALUES
				('',
				'$nama_kelas',
				'$kompetensi_keahlian')
				";
	mysqli_query($conn, $query);


return mysqli_affected_rows($conn);
}

// hapus kelas

function hapus_kelas($id) {

	global $conn;

	mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = $id");

	return mysqli_affected_rows($conn);
}

// edit kelas

function edit_kelas($data) {
global $conn;
//ambil data dari tiap element
	$id_kelas = $data["id_kelas"];
	$nama_kelas = htmlspecialchars($data["nama_kelas"]);
	$kompetensi_keahlian = htmlspecialchars($data["kompetensi_keahlian"]);
	//query upadate data
	$query = "UPDATE kelas SET
				nama_kelas = '$nama_kelas',
				kompetensi_keahlian = '$kompetensi_keahlian'
				WHERE id_kelas = $id_kelas
				";
	mysqli_query($conn, $query);


return mysqli_affected_rows($conn);

}


// tambah data siswa
function tambah_siswa($data) {
global $conn;
//ambil data dari tiap element

	$nisn = htmlspecialchars($data["nisn"]);
	$nis = htmlspecialchars($data["nis"]);
	$nama = htmlspecialchars($data["nama"]);
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_telp = htmlspecialchars($data["no_telp"]);
	$id_spp = htmlspecialchars($data["id_spp"]);

	//query insert data
	$query = "INSERT INTO `siswa` (
					`nisn`,
					 `nis`,
					  `nama`,
					   `id_kelas`,
					    `alamat`,
					     `no_telp`,
					      `id_spp`)
					       VALUES ('$nisn',
					        '$nis',
					         '$nama', 
					         '$id_kelas',
					          '$alamat',
					           '$no_telp',
					            '$id_spp');
				";
	mysqli_query($conn, $query);


return mysqli_affected_rows($conn) ;
}

//hapus siswa

function hapus_siswa($nisn) {

	global $conn;

	mysqli_query($conn, "DELETE FROM siswa WHERE nisn = $nisn");

	return mysqli_affected_rows($conn);
}


function edit_siswa($data) {
global $conn;
//ambil data dari tiap element
	$nisn = htmlspecialchars($data["nisn"]);
	$nis = htmlspecialchars($data["nis"]);
	$nama = htmlspecialchars($data["nama"]);
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_telp = htmlspecialchars($data["no_telp"]);
	$id_spp = htmlspecialchars($data["id_spp"]);

	//query upadate data
	$query = "UPDATE `siswa` SET 
			`nisn` = '$nisn',
			 `nis` = '$nis', 
			 `nama` = '$nama',
			  `id_kelas` = '$id_kelas',
			   `alamat` = '$alamat',
			    `no_telp` = '$no_telp',
			     `id_spp` = '$id_spp'
			      WHERE `siswa`.`nisn` = '$nisn'
				";
	mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}


//hapus petugas

function hapus_petugas($id_petugas) {

	global $conn;

	mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = $id_petugas");

	return mysqli_affected_rows($conn);
}



// bayar spp
function bayar($data) {
global $conn;
//ambil data dari tiap element

	$id_petugas = htmlspecialchars($data["id_petugas"]);
	$nisn = htmlspecialchars($data["nisn"]);
	$tgl_bayar = htmlspecialchars($data["tgl_bayar"]);
	$bulan_dibayar = htmlspecialchars($data["bulan_dibayar"]);
	$tahun_dibayar = htmlspecialchars($data["tahun_dibayar"]);
	$id_spp = htmlspecialchars($data["id_spp"]);
	$jumlah_bayar = htmlspecialchars($data["jumlah_bayar"]);
	//query insert data
	$query = "INSERT INTO `pembayaran`
		 (`id_pembayaran`,
		  `id_petugas`,
		   `nisn`, 
		   `tgl_bayar`,
		    `bulan_dibayar`, 
		    `tahun_dibayar`,
		     `id_spp`,
		      `jumlah_bayar`)
		       VALUES 
		       ('',
		       '$id_petugas',
		       '$nisn',
		       '$tgl_bayar',
		       '$bulan_dibayar',
		       '$tahun_dibayar',
		       '$id_spp',
		       '$jumlah_bayar'
		       );
		       ";
	mysqli_query($conn, $query);


return mysqli_affected_rows($conn) ;
}

// hapus pembayaran

function hapus_pembayaran($id) {

	global $conn;

	mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = $id");

	return mysqli_affected_rows($conn);
}



// cari data

function cari($keyword) {
	$query = "SELECT * FROM pembayaran WHERE
		id_petugas LIKE '%$keyword%' OR
		nisn LIKE '%$keyword%' OR
		tgl_bayar LIKE '%$keyword%' OR
		bulan_dibayar LIKE '%$keyword%' OR
		tahun_dibayar LIKE '%$keyword%' OR
		id_spp LIKE '%keyword%' OR
		jumlah_bayar LIKe '%keyword%'
		";

		return query($query);
}








































//registrasi

function registrasi($data) {
global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	// cek username sudah ada atau tidak

	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");

	if (mysqli_fetch_assoc($result)) {
			# code...
		echo "<script>
		alert('Username ini Sudah Tersedia!')
		</script>
		 ";
		 return false;
		}	

	// cek konfirmasi password

	if ($password !== $password2) {
		# code...
		echo "<script>
		alert('Password anda tidak sesuai !')
		</script>
		 ";
		 return false;
	}
//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	// tambahkan user baru ke database

	//query insert data

	mysqli_query($conn, "INSERT INTO user VALUES('','$nama' , '$username', '$password') ");
return mysqli_affected_rows($conn);

}

function registrasi_admin($data) {
global $conn;
	$nama = htmlspecialchars($data["nama_lengkap"]);
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$level = htmlspecialchars($data["level"]);


	// cek username sudah ada atau tidak

	$result = mysqli_query($conn, "SELECT username FROM petugas WHERE username = '$username' ");

	if (mysqli_fetch_assoc($result)) {
			# code...
		echo "<script>
		alert('Username ini Sudah Tersedia!')
		</script>
		 ";
		 return false;
		}	

	// cek konfirmasi password

	if ($password !== $password2) {
		# code...
		echo "<script>
		alert('Password anda tidak sesuai !')
		</script>
		 ";
		 return false;
	}
//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	// tambahkan user baru ke database

	//query insert data

	mysqli_query($conn, "INSERT INTO petugas VALUES('','$nama', '$username', '$password', '$level') ");
return mysqli_affected_rows($conn);

}

 ?>