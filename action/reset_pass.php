<?php
// Hubungkan ke DB
include '../config.php';

// ambil data yang sudah diinput
$nim = $_POST['nim'];
$password = $_POST['password'];

// buat encrypt password
$ambil_pass = substr($password, 0, 5);
$md5_pass = md5($ambil_pass);
$password_sha1 = sha1($md5_pass);
// $password_hash = password_hash($md5_pass, PASSWORD_DEFAULT);

// Update data ke DB
$update = mysqli_query($conn, "UPDATE table_mahasiswa SET password = '$password_sha1' WHERE nim = '$nim'");

// Alihkan ke Halaman Utama
header('location: ../index')
?>