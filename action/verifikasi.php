<?php
// Sambungkan ke DB
include '../config.php';

// Hubungkan ke session
session_start();

// Post data
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$verified = $_POST['verified'];

$fetch_mahasiswa = mysqli_query($conn, "SELECT * FROM table_mahasiswa WHERE nim = '$nim' ");
$data = mysqli_fetch_array($fetch_mahasiswa);

// Check checkbox
if(isset($_POST['foto_img_1']) && isset($_POST['foto_img_2']) && $verified == 'sudah') {
    $update = mysqli_query($conn, "UPDATE table_mahasiswa SET verified = '$verified' WHERE nim = '$nim' ");

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "gop7273@gmail.com";
    $to = $data['email'];
    $subject = "Konfirmasi Hasil Verifikasi Akun";
    $message = "Selamat Akun yang anda ajukan sudah terverifikasi oleh panitia, silahkan login kembali pada alamat https://pemirapknstan.com/ untuk dapat melakukan pemilihan, Terima Kasih";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);

    header('location: ../daftar_verif');
} else if($verified == 'belum') {
    $update = mysqli_query($conn, "UPDATE table_mahasiswa SET verified = '$verified' WHERE nim = '$nim' ");

    header('location: ../daftar_verif');
}else {
    $update = mysqli_query($conn, "UPDATE table_mahasiswa SET foto_img_1 = '', foto_img_2 = '', verified = '$verified' WHERE nim = '$nim' ");
    
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "gop7273@gmail.com";
    $to = $data['email'];
    $subject = "Konfirmasi Hasil Verifikasi Akun";
    $message = "Sayang sekali, hasil ajuan verifikasi akun kamu ditolak, silahkan ajukan lagi pada alamat https://pemirapknstan.com/ untuk dapat melanjutkan ke tahap pemilihan, Terima kasih";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    
    header('location: ../daftar_verif');
}

?>