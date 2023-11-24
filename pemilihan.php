<?php
// Sambungkan ke DB
include 'config.php';

// Memulai Session
session_start();
$timeout = 60; // setting timeout dalam menit
$logout = "index"; // redirect halaman logout
$timeout = $timeout * 60; // menit ke detik
if(isset($_SESSION['start_session'])){
    $elapsed_time = time()-$_SESSION['start_session'];
    if($elapsed_time >= $timeout){
        session_destroy();
        echo "<script type='text/javascript'>alert('Sesi telah berakhir, silahkan login kembali');window.location='$logout'</script>";
    }
}

$_SESSION['start_session']=time();

$page = ($_SESSION['page'] = 'pemilihan');

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="login"){
//melakukan pengalihan
header("location: index");
}

// Cek User Sudah Login Belum
if (!isset($_SESSION['status'])) {
    $_SESSION['status'] = '';
}
if (!isset($_SESSION['verified'])) {
    $_SESSION['verified'] = '';
}
if (!isset($_SESSION['nim'])) {
    $_SESSION['nim'] = '';
}
$login = $_SESSION['status'];
$nim = $_SESSION['nim'];
$dapil = $_SESSION['dapil'];

// Get Timezone
date_default_timezone_set("Asia/Jakarta");
$tanggal_pemilihan_awal = '2023/11/22';
$tanggal_pemilihan_akhir = '2023/12/12';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMIRA 2023</title>
    <link rel="shortcut icon" type="image/x-icon" href="index_asset/index_asset/assets/images/ico.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="index_asset/index_asset/assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="style.css">
        
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Panitia PEMIRA 2023">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="index_asset/index_asset/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="index_asset/index_asset/assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="index_asset/index_asset/assets/css/templatemo-softy-pinko.css">
    
     <style>
        * {box-sizing: border-box;}
        body {font-family: Verdana, sans-serif;}
        .mySlides {display: none;}
        img {vertical-align: middle;}
        
        /* Slideshow container */
        .slideshow-container {
          max-width: 1000px;
          position: relative;
          margin: auto;
        }
        
        /* Caption text */
        .text {
          color: #f2f2f2;
          font-size: 15px;
          padding: 8px 12px;
          position: absolute;
          bottom: 8px;
          width: 100%;
          text-align: center;
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
          color: #f2f2f2;
          font-size: 12px;
          padding: 8px 12px;
          position: absolute;
          top: 0;
        }
        
        /* The dots/bullets/indicators */
        .dot {
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
          transition: background-color 0.6s ease;
        }
        
        .active {
          background-color: #fff;
        }
        
        /* Fading animation */
        .fade {
          animation-name: fade;
          animation-duration: 1.5s;
        }
        
        @keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }
        
        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .text {font-size: 11px}
        }
        </style>
</head>

<body class="bg-unguprimary">
    <main class="mx-auto">
        
        <div class="container">
            <?php include 'navbar.php' ?>
        </div>
        
        
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="beranda">

        <div class="container">
            <?php
            if (date('Y/m/d') < $tanggal_pemilihan_awal) {
                echo '<h1 class="text-center text-light">Waktu Pemilihan Akan Diadakan Pada Tanggal 11 Desember 2023 s.d. 12 Desember 2023</h1>';
            } else if (date('Y/m/d') > $tanggal_pemilihan_akhir) {
                echo '<h1 class="text-center text-light">Waktu Pemilihan Sudah Diadakan Pada Tanggal 11 Desember 2023 s.d. 12 Desember 2023</h1>';
            } else {

                $fetch_pemilihan = mysqli_query($conn, "SELECT * FROM table_pilihan WHERE nim = '$nim' ");
                $pemilih = mysqli_fetch_array($fetch_pemilihan);
                if (!isset($pemilih['nim'])) {
                    $pemilih['nim'] = '';
                }

                if ($_SESSION['nim'] === $pemilih['nim']) {
                    echo '<h1 class="text-center text-light">Anda Sudah Melakukan Pemilihan, Terima Kasih Atas Partisipasinya</h1>';
                } else {
            ?>
                    <form action="./action/voting.php" method="post" onsubmit="return confirm('Apakah anda sudah yakin dengan pilihan anda?');">
                        <div class="slide-container swiper mt-5" id="bem">
                            <h3 class="text-center text-light mb-3">Daftar Paslon BEM</h3>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card swiper-slide mb-3">
                                        <div class="image-content">
                                            <span class="overlay"></span>
                                            <div class="card-image">
                                                <!--<img src="images/profile1.jpg" alt="" class="card-img">-->
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h2 class="name">David Dell</h2>
                                            <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="David Dell">
                                            <label class="btn btn-outline-primary" for="btnradio1">Pilih Paslon</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="card swiper-slide mb-3">
                                        <div class="image-content">
                                            <span class="overlay"></span>
                                            <div class="card-image">
                                                <!--<img src="images/profile2.jpg" alt="" class="card-img">-->
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h2 class="name">Jono Simatupang</h2>
                                            <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="Jono Simatupang">
                                            <label class="btn btn-outline-primary" for="btnradio2">Pilih Paslon</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">  
                                    <div class="card swiper-slide mb-3">
                                        <div class="image-content">
                                            <span class="overlay"></span>
                                            <div class="card-image">
                                                <!--<img src="images/profile3.jpg" alt="" class="card-img">-->
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h2 class="name">Surip Kencono</h2>
                                            <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>
                                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="Surip Kencono">
                                            <label class="btn btn-outline-primary" for="btnradio3">Pilih Paslon</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="slide-container swiper mt-5" id="blm">
                            <h3 class="text-center text-light">Daftar Paslon BLM</h3>
                            <div class="row">
                                <?php
                                $fetch_blm = mysqli_query($conn, "SELECT * FROM table_blm WHERE dapil = '$dapil'");
                                while ($datablm = mysqli_fetch_array($fetch_blm)) {
                                ?>
                                <div class="col-12 col-md-6 col-lg-3">
                                    <div class="card mb-3 overflow-hidden h-100">
                                        <img src="./src/img/foto.jpg" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $datablm['nama'] ?></h5>
                                            <p class="card-text"><strong>VISI : </strong><?= $datablm['visi'] ?></p>
                                            <p class="card-text"><strong>MISI : </strong><?= $datablm['misi'] ?></p>
                                            <input type="radio" class="btn-check" name="btnradio1" id="btnradioblm<?= $datablm['id'] ?>" autocomplete="off" value="<?= $datablm['nama'] ?>">
                                            <label class="btn btn-outline-primary" for="btnradioblm<?= $datablm['id'] ?>">Pilih Paslon</label>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row mb-3">
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-warning" id="prev"><i class="bi bi-arrow-left"></i> Sebelumnya</button>
                                    <button type="button" class="btn btn-success" id="next">Lanjut <i class="bi bi-arrow-right"></i></button>
                                    <button type="submit" class="btn btn-success ms-3" id="submit"><i class="bi bi-check-square"></i> Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
            <?php }
            } ?>
        </div>
    </main>
</body>

</html>

<script>
    $(document).ready(function() {
        $('#bem').show();
        $('#blm').hide();
        $('#prev').hide();
        $('#submit').hide();

        $('#next').click(function() {
            $('#bem').hide();
            $('#blm').show();
            $('#prev').show();
            $('#next').hide();
            $('#submit').show();
        })

        $('#prev').click(function() {
            $('#blm').hide();
            $('#bem').show();
            $('#prev').hide();
            $('#next').show();
            $('#submit').hide();
        })
    })
</script>