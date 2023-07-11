<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'function/functions.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = query($conn,"SELECT * FROM petugas WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if($data['level']=="admin"){

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:admin/dashboard_admin.php");

    // cek jika user login sebagai pegawai
    }else if($data['level']=="petugas"){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "petugas";
        // alihkan ke halaman dashboard pegawai
        header("location:petugas/dashboard_petugas.php");
    }else{

        // alihkan ke halaman login kembali
        header("location:login-admin.php?pesan=gagal");
    }   
}else{
    header("location:login-admin.php?pesan=gagal");
}

?>