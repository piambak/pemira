<?php
// Sambungkan ke DB
include 'config.php';

// Memulai Session
session_start();

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

<body>
    
    <main class="mx-auto">
          <!-- ***** Preloader Start ***** -->
            <div id="preloader">
                <div class="jumper">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>  
        <!-- ***** Preloader End ***** -->
    
        <div class="container">
            <?php include 'navbar_2.php' ?>
        </div>

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="beranda">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <!--h1><strong>PEMIRA</strong></h1>
                        <p>PKN STAN 2023</p-->
                        <h1 style="font-size:45px; font-family: Verdana, sans-serif;">Informasi Lain</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->
    
    <!-- ***** Features Small Start ***** -->
    <!--section class="section home-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- ***** Features Small Item Start ***** -->
                        <!--div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <a href="index_asset/index_asset/segera_hadir/index-segera-hadir.html" target=_blank>
                                        <img  src="index_asset/index_asset/assets/images/featured-item-01.png" alt="" >
                                    </a>
                                </div>
                                <h5 class="features-title">Produk Hukum</h5>
                                <!--p>Customize anything in this template to fit your website needs</p-->
                            <!--/div-->
                        <!--/div-->
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <!--div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <a href="index_asset/index_asset/segera_hadir/index-segera-hadir.html" target=_blank>
                                        <img  src="index_asset/index_asset/assets/images/featured-item-02.png" alt="" >
                                    </a>                                </div>
                                <h5 class="features-title">Informasi Calon</h5>
                                <!--p>Contact us immediately if you have a question in mind</p-->
                            <!--/div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <!--div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <a href="index_asset/index_asset/segera_hadir/index-segera-hadir.html" target=_blank>
                                        <img  src="index_asset/index_asset/assets/images/featured-item-03.png" alt="" >
                                    </a>
                                </div>
                                <h5 class="features-title">Informasi Lain</h5>
                                <!--p>You just need to tell your friends about our free templates</p-->
                            <!--/div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->
                    <!--/div>
                </div>
            </div>
        <!--/div>
    <!--/section -->
    <!-- ***** Features Small End ***** -->
    
    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-top-70 padding-bottom-0" id="tentang">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="index_asset/index_asset/assets/images/left-pemira.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Alur Pendaftaran Pendaftaran Bakal Calon PEMIRA</h2>
                    </div>
                    <div class="left-text">
                        <ol class="list-group">
                            <li class="list-group-item">Membuka link pendaftaran berkas pada link: <a href="https://docs.google.com/forms/d/e/1FAIpQLSeQEAhC1CI1q2Og-0pB9YhXguuEhe0Dx9ZomwbohUgtmG9zOQ/viewform" target=_blank>staner.id/PengambilanBerkasPEMIRA2023</a></li>
                            <li class="list-group-item">Mengisi link pengambilan berkas dan submit</li>
                            <li class="list-group-item">Membaca peraturan dan syarat-syarat yang harus dilengkapi yang telah disediakan setelah melakukan submit</li>
                            <li class="list-group-item">Mengumpulkan berkas pada link: <a href="https://docs.google.com/forms/d/e/1FAIpQLSeIqI7ypT5Hrk2yNcshRVNxOT0eNSu3NG88O3YUHBBq0kMMng/viewform" target=_blank>staner.id/PengumpulanBerkasPEMIRA2023</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hr"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <!--section class="section padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Peraturan Terkait</h2>
                    </div>
                    <div class="left-text">
                        <ol class="list-group">
                            <li class="list-group-item"><a href="https://drive.google.com/file/d/1-HsVT3DdsMEpKygpPHMhQEFilFR6_atD/view?usp=share_link" target=_blank>TAP BLM Nomor 006/KEP.01/BLM/2023</a></li>
                            <li class="list-group-item"><a href="https://drive.google.com/file/d/121oMRtSSdtuA50IfgHpYd9vLvmowXqA8/view?usp=share_link" target=_blank>PER Panitia PEMIRA Nomor 1 Tahun 2023</a></li>
                            <li class="list-group-item"><a href="https://drive.google.com/file/d/1ufNOVqJ89RSqjLkdWIJG8GQpvPTpIUyh/view?usp=share_link" target=_blank>PER Panitia PEMIRA Nomor 2 Tahun 2023</a></li>
                            <li class="list-group-item"><a href="https://drive.google.com/file/d/16lwItNA3LY1GHDWs0E5ys3Do87c1tFsp/view?usp=share_link" target=_blank>KEP Ketua Panitia PEMIRA Nomor 1 Tahun 2023</a></li>
                            <li class="list-group-item"><a href="https://drive.google.com/file/d/11Ii5G-EXXEKnX6f9WS2mgHpI2oXRlp70/view?usp=share_link" target=_blank>KEP Ketua Panitia PEMIRA Nomor 2 Tahun 2023</a></li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="index_asset/index_asset/assets/images/right-pemira.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section-->
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Home Parallax Start ***** -->
    <!--section class="mini" id="galeri">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>Dokumentasi PEMIRA 2022 </h1>
                        </div>
                    </div>
                </div>

                <!-- ***** Mini Box Start ***** -->
                <!--div class="slideshow-container">

                    <div class="mySlides fade">
                      <img src="index_asset/index_asset/assets/images/Dokumentasi-Web/DSC03938.jpg" style="width:100%">
                    </div>
                    
                    <div class="mySlides fade">
                      <img src="index_asset/index_asset/assets/images/Dokumentasi-Web/DSC03956.jpg" style="width:100%">
                    </div>
                    
                    <div class="mySlides fade">
                      <img src="index_asset/index_asset/assets/images/Dokumentasi-Web/DSC03963.jpg" style="width:100%">
                    </div>
                    
                    <div class="mySlides fade">
                        <img src="index_asset/index_asset/assets/images/Dokumentasi-Web/DSC04077.jpg" style="width:100%">
                      </div>
                      
                    </div>
                    <br>
                    
                    <div style="text-align:center">
                      <span class="dot"></span> 
                      <span class="dot"></span> 
                      <span class="dot"></span>
                      <span class="dot"></span>  
                    </div>
                    
                    <script>
                    let slideIndex = 0;
                    showSlides();
                    
                    function showSlides() {
                      let i;
                      let slides = document.getElementsByClassName("mySlides");
                      let dots = document.getElementsByClassName("dot");
                      for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";  
                      }
                      slideIndex++;
                      if (slideIndex > slides.length) {slideIndex = 1}    
                      for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                      }
                      slides[slideIndex-1].style.display = "block";  
                      dots[slideIndex-1].className += " active";
                      setTimeout(showSlides, 3500); // Change image every 2 seconds
                    }
                    </script>
                <!-- ***** Mini Box End ***** -->
            <!--/div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->

    <!-- ***** Pricing Plans Start ***** -->
    <section class="section colored" id="pemira2023">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>“Suarakan Aspirasi, Wujudkan Demokrasi”</p>
                    </div>
                </div><div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">PEMIRA 2023</h2>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

        </div>
    </section>
    <!-- ***** Pricing Plans End ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="https://www.instagram.com/pemirapknstan2023/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <!--li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li-->
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Copyright &copy; 2023 Panitia PEMIRA</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer End ***** -->

    </main>
    
    <!-- jQuery -->
    <script src="index_asset/index_asset/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="index_asset/index_asset/assets/js/popper.js"></script>
    <script src="index_asset/index_asset/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="index_asset/index_asset/assets/js/scrollreveal.min.js"></script>
    <script src="index_asset/index_asset/assets/js/waypoints.min.js"></script>
    <script src="index_asset/index_asset/assets/js/jquery.counterup.min.js"></script>
    <script src="index_asset/index_asset/assets/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="index_asset/index_asset/assets/js/custom.js"></script>
    
</body>

</html>