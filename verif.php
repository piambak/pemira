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

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="login"){
//melakukan pengalihan
header("location: index");
}

// Cek User Sudah Login Belum
if(!isset($_SESSION['status'])) {
    $_SESSION['status'] = '';
}
if(!isset($_SESSION['verified'])) {
    $_SESSION['verified'] = '';
}
if(!isset($_SESSION['foto_1'])) {
    $_SESSION['foto_1'] = '';
}
if(!isset($_SESSION['foto_2'])) {
    $_SESSION['foto_2'] = '';
}
$login = $_SESSION['status'];
$foto_1 = $_SESSION['foto_1'];
$foto_2 = $_SESSION['foto_2'];
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        
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
        
        /*Setting Camera*/
        #my_camera {
            width: 100% !important;
            height: 100% !important;
        }
        
        video {
            width: 100% !important;
            height: 100% !important;
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
            <?php if($foto_1 <> '' && $foto_2 <> '') {echo '<h1 class="text-center text-light">Foto Yang Anda Lampirkan sedang diverifikasi oleh panitia, harap selalu pastikan hasil verifikasi pada menu verifikasi akun. Terima Kasih </h1>';} else { ?>
                <?php if($foto_1 == '') { ?>
                    <h1 class="text-center text-light">Ambil Foto Dengan KTM</h1>
                <?php } else { ?>
                    <h1 class="text-center text-light">Ambil Foto KTM Saja</h1>
                <?php } ?>
                <form method="post" action="./action/storeImage" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda sudah yakin dengan data yang anda masukkan?');">
                    <div class="row">
                        <div class="col-12 col-md-6 position-relative">
                            <div id="my_camera"></div>
                            <?php if($foto_1 == '') { ?>
                                <div class="border border-light rounded-circle position-absolute top-0 start-50 translate-middle-x mt-3 lingkaratas" style="width: 200px; height: 220px"></div>
                                <div class="border border-light rounded position-absolute bottom-0 start-50 translate-middle-x mb-5 ktmkecil" style="width: 100px; height: 150px"></div>
                            <?php } else { ?>
                                <div class="border border-light rounded position-absolute bottom-0 start-50 translate-middle-x mb-5 ktmbesar" style="width: 250px; height: 350px"></div>
                            <?php } ?>
                            <br>
                            <input type="hidden" name="image" class="image-tag">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="text-light text-center" id="results">Hasil Foto:</div>
                        </div>

                        <?php if($foto_1 == '') { ?>
                        <div class="col-12 text-center">
                            <input  class="btn btn-warning me-3" type="button" value="Take Snapshot" onclick="take_Snapshot()">
                            <button type="submit" class="btn btn-success">Next</button>
                        </div>
                        <?php } else { ?>
                        <div class="row mt-3">
                            <div class="col-12 col-md-9 mb-3">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="password" required>
                                    <label for="floatingInput">Password Baru</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 align-self-center mb-3">
                                <input  class="btn btn-warning me-3" type="button" value="Take Snapshot" onclick="take_Snapshot()">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </form>
                
                <script>
                    Webcam.set({
                        width: 490,
                        height: 390,
                        image_format:'jpeg',
                        jpeg_quality: 100
                    })

                    //webcam attach
                    Webcam.attach('#my_camera')

                    //take snapshot of user
                    function take_Snapshot() {
                        Webcam.snap(function(data_uri){
                            $('.image-tag').val(data_uri)
                            document.getElementById('results').innerHTML = '<img  style="width: 100%; height: 100%" src="' + data_uri + '"/>'
                        })
                    }
                </script>
            <?php } ?>
        </div>
    </main>
</body>
</html>