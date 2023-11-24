<?php
// Sambungkan ke DB
include '../config.php';
session_start();

// Post Data dari Input
$nim = $_POST['nim'];
$password = $_POST['password'];

$ambil_pass = substr($password, 0, 5);
$md5_pass = md5($ambil_pass);
$password_sha1 = sha1($md5_pass);

// Konfirmasi apakah user sudah diverifikasi
$confirm_pass = mysqli_query($conn, "SELECT * FROM table_mahasiswa WHERE nim = '$nim' ");
$fetch_ganti_pass = mysqli_fetch_array($confirm_pass);

// Konfirmasi Data ke DB
if($fetch_ganti_pass['ganti_pass'] == 'sudah') {
    $confirm = mysqli_query($conn, "SELECT * FROM table_mahasiswa WHERE nim = '$nim' AND password = '$password_sha1' ");
} else {
    $confirm = mysqli_query($conn, "SELECT * FROM table_mahasiswa WHERE nim = '$nim' AND password = '$password' ");
}
// Fetch Data dari DB
$data = mysqli_fetch_array($confirm);
$jumlah = mysqli_num_rows($confirm);

// Check Data DB Ada Tidak Untuk Dialihkan ke Halaman Utama
if($jumlah > 0) {
    $_SESSION['nim'] = $data['nim'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['password'] = $data['password'];
    $_SESSION['verified'] = $data['verified'];
    $_SESSION['foto_1'] = $data['foto_img_1'];
    $_SESSION['foto_2'] = $data['foto_img_2'];
    $_SESSION['dapil'] = $data['dapil'];
    $_SESSION['status'] = 'login';
    $_SESSION['login'] = 'success';
    header('location: ../index');
} else {
    $_SESSION['login'] = 'failed';
    header('location: ../index');
}


?>