<?php
// Sambungkan ke DB
include '../config.php';
//Ambil data session
session_start();
$nim = $_SESSION['nim'];
$foto_img_1 = $_SESSION['foto_1'];
$foto_img_2 = $_SESSION['foto_2'];

// Encrypt password
$password = $_POST['password'];
$ambil_pass = substr($password, 0, 5);
$md5_pass = md5($ambil_pass);
$password_sha1 = sha1($md5_pass);

// Olah foto agar bisa disimpan
$img = $_POST['image'];
$folderPath = '../uploads/';

$image_parts = explode(';base64,', $img);
$image_type_aux = explode('image/', $image_parts[0]);
$image_type = $image_type_aux[1];

$image_base64 = base64_decode($image_parts[1]);
if($foto_img_1 == '' && $foto_img_2 == '') {
    $filename = $_SESSION['nim'] . '_1.png';
} elseif($foto_img_1 <> '' && $foto_img_2 == '') {
    $filename = $_SESSION['nim'] . '_2.png';
}

// add foto pada folder uploads
$file = $folderPath . $filename;
file_put_contents($file, $image_base64);

// Update data foto dan pass pada database
if($foto_img_1 == '' && $foto_img_2 == '') {
    $updatefoto = mysqli_query($conn, "UPDATE table_mahasiswa SET foto_img_1 = '$filename' WHERE nim = '$nim'");
    $_SESSION['foto_1'] = $filename;
    header('location: ../verif');
} else if($foto_img_1 <> '' && $foto_img_2 == '') {
    $updatefoto = mysqli_query($conn, "UPDATE table_mahasiswa SET foto_img_2 = '$filename', password = '$password_sha1', ganti_pass = 'sudah' WHERE nim = '$nim'");
    $_SESSION['foto_2'] = $filename;
    header('location: ../index');
}

?>