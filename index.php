<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
  # code...
  header("Location: siswa/login-siswa.php");
  exit;
 } 
