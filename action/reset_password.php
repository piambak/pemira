<?php

include '../config.php';

$nim = $_POST['nim'];

$fetch_nim = mysqli_query($conn, "SELECT * FROM table_mahasiswa WHERE nim = '$nim'");
$data = mysqli_fetch_array($fetch_nim);
$password = $data['password'];

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "gop7273@gmail.com";
$to = $data['email'];
$subject = "Link Untuk Reset Password";
$message = "Berikut adalah link yang dapat diakses untuk reset password https://pemirapknstan.com/lupa_password?nim=$nim&encrypt=$password";
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);

header('location: ../index');
?>