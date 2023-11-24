<?php
// Sambungkan ke DB
include '../config.php';

// Mulai Session
session_start();

$nim = $_POST['nim'];
$foto_img = $_POST['foto_img'];

// fetch data dari DB
$fetch_foto = mysqli_query($conn, "SELECT * FROM table_mahasiswa WHERE nim = '$nim'");
$data = mysqli_fetch_array($fetch_foto);

if($foto_img == 'foto_img_1') {
?>
    <img src="../uploads/<?= $data['foto_img_1'] ?>" alt="" style="width: 100%">
<?php } elseif ($foto_img == 'foto_img_2') { ?>
    <img src="../uploads/<?= $data['foto_img_2'] ?>" alt="" style="width: 100%">
<?php } ?>