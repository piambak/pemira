<?php
// Sambungkan ke DB
include '../config.php';

// Hubungkan ke session
session_start();

// Get Timezone
date_default_timezone_set("Asia/Jakarta");

// Post Data
$nim = $_SESSION['nim'];
$nama = $_SESSION['nama'];
$waktu_memilih = date('Y/m/d h:i:sa');

// Storing a string into the variable which
// needs to be Encrypted
$simple_string = $nim.$_POST['btnradio'];

// Storingthe cipher method
$ciphering = "AES-128-CTR";

// Using OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Storing the encryption key
$encryption_key = $nama;

// Using openssl_encrypt() function to encrypt the data
$bem_pilihan = openssl_encrypt($simple_string, $ciphering, $encryption_key, $options, $encryption_iv);

// BLM PILIHAN

$simple_string1 = $nim.$_POST['btnradio1'];

// Using openssl_encrypt() function to encrypt the data
$blm_pilihan = openssl_encrypt($simple_string1, $ciphering, $encryption_key, $options, $encryption_iv);

if(isset($_POST['btnradio'])) {
    // echo $nim.','.$nama.','.$waktu_memilih.','.$bem_pilihan.','.$blm_pilihan;
    $update = mysqli_query($conn, "INSERT INTO table_pilihan(nim, nama, bem_pilihan, blm_pilihan, waktu_memilih) VALUES('$nim', '$nama', '$bem_pilihan', '$blm_pilihan', '$waktu_memilih')");
    header('location: ../index');
} else {
    echo 'ada yang salah nih';
}
?>