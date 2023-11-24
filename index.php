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
            <?php include 'navbar.php' ?>
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
                        <a href="pendaftaran_calon.php" class="main-button-slider" target=_blank><strong>Pendaftaran Bakal Calon PEMIRA<strong></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->
    
    <!-- ***** Features Small Start ***** -->
    <section class="section home-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <a href="informasi.php" target=_blank>
                                        <img  src="index_asset/index_asset/assets/images/featured-item-01.png" alt="" >
                                    </a>
                                </div>
                                <h5 class="features-title">Produk Hukum</h5>
                                <!--p>Customize anything in this template to fit your website needs</p-->
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <a href="index_asset/index_asset/segera_hadir/index-segera-hadir.html" target=_blank>
                                        <img  src="index_asset/index_asset/assets/images/featured-item-02.png" alt="" >
                                    </a>                                </div>
                                <h5 class="features-title">Informasi Calon</h5>
                                <!--p>Contact us immediately if you have a question in mind</p-->
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->

                        <!-- ***** Features Small Item Start ***** -->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                            <div class="features-small-item">
                                <div class="icon">
                                    <a href="informasi_lain.php" target=_blank>
                                        <img  src="index_asset/index_asset/assets/images/featured-item-03.png" alt="" >
                                    </a>
                                </div>
                                <h5 class="features-title">Informasi Lain</h5>
                                <!--p>You just need to tell your friends about our free templates</p-->
                            </div>
                        </div>
                        <!-- ***** Features Small Item End ***** -->
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                        <h2 class="section-title">Tentang PEMIRA</h2>
                    </div>
                    <div class="left-text">
                        <p>Pemilihan Raya atau PEMIRA PKN STAN adalah pesta demokrasi tahunan terbesar di PKN STAN yang dijadikan sebagai ajang pemilihan presiden dan wakil presiden mahasiswa serta pengurus Badan Legislatif Mahasiswa.</p>
                        <br>
                        <p>Pemilihan Raya bertujuan untuk memfasilitasi seluruh mahasiswa aktif PKN STAN yang ingin bergabung dan berkontribusi sebagai presiden dan wakil presiden mahasiswa serta pengurus Badan Legislatif Mahasiswa. Selain itu, PEMIRA juga bertujuan untuk menyelenggarakan pesta demokrasi dengan asas LUBERJURDIL sehingga terselenggaranya pemilihan raya yang transparan, akuntabel, dan profesional demi terpilihnya pemimpin-pemimpin yang sesuai dan bertanggung jawab.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading">
                        <h2 class="section-title">PEMIRA Tahun Ini</h2>
                    </div>
                    <div class="left-text">
                        <p>Dengan mengusung tema besar "Teknologi dalam Demokrasikan Aspirasi," penyelenggaraan PEMIRA tahun ini mengalami sedikit perubahan dibandingkan dengan tahun-tahun sebelumnya. PEMIRA 2023 akan mengandalkan teknologi sebagai amunisi utama, menjadikannya acara hybrid yang menggabungkan aspek offline dan online. Secara khusus, aspek teknis pemilihan pada tahun ini akan dilakukan secara online untuk meningkatkan efisiensi waktu sekaligus mempermudah mahasiswa dalam memberikan hak suaranya tanpa batasan ruang, hal ini sesuai dengan Tagline yang diusung PEMIRA tahun 2023 yaitu, "Suarakan Aspirasi, Wujudkan Demokrasi". Tagline tersebut memberikan makna bahwa demokrasi bukan hanya terbatas pada pemilihan umum, melainkan juga mencakup partisipasi mahasiswa PKN STAN dalam mewujudkan demokrasi yang memperhatikan kebutuhan dan aspirasi mereka. Tagline ini menegaskan pentingnya setiap mahasiswa untuk menyuarakan aspirasinya, sehingga mereka dapat berperan aktif dalam menciptakan demokrasi yang lebih baik dengan menjunjung prinsip dan taat asas yang berlaku.
</p>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="index_asset/index_asset/assets/images/right-pemira.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="galeri">
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
                <div class="slideshow-container">

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
            </div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->

    <!-- ***** Pricing Plans Start ***** -->
    <section class="section1 colored" id="pemira2023">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div>
                    <div class="center-text">
                        <div class="container py-5">

                            <div class="col-lg-12">
                                <div class="center-heading">
                                    <h2 class="section-title">Timeline PEMIRA 2023</h2>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-10 mx-auto">
                                        
                                        <!-- Timeline -->
                                        <ul class="timeline">
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Launching Website dan Pengumuman Pembukaan PEMIRA PKN STAN 2023</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>20 November 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Pendaftaran Bakal Calon Presma dan Wapresma Maupun bakal Calon Anggota BLM <br>PKN STAN 2023</h2>
                                                <span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>20 November 2023 - 29 November 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Fit and Proper test</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>30 November 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Seremonial pengundian nomor urut calon dan pengembalian berkas fisik</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>2 Desember 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Hearing calon Presma dan Wapresma maupun calon anggota BLM dengan pengurus periode sebelumnya</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>2 Desember 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Debat terbuka calon Presma dan Wapresma</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>5 Desember 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Mimbar bebas</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>4 Desember 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Podcast radio blast calon Presma dan Wapresma</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>6 Desember 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Kampanye</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>2 - 8 Desember 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Verifikasi Pemilih</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>4 - 8 Desember 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Pemilihan Online</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>11 - 12 Desember 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Pengumuman Hasil Pemilihan</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>12 Desember 2023</span>
                                            </li>
                                            <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                                                <div class="timeline-arrow"></div>
                                                <h2 class="h6 mb-0">Sidang Penetapan dan Hasil PEMIRA 2023</h2><span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>13 Desember 2023</span>
                                            </li>
                                        </ul><!-- End -->
                        
                                    </div>
                                </div>
                                
                            </div>
                        
                        
                                
                            </div>
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