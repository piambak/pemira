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
        </style>
</head>

<body class="bg-unguprimary">
    <main class="mx-auto">
        
        <div class="container">
            <?php include 'navbar.php' ?>
        </div>
        
        
    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="beranda">

        <div class="container bg-light rounded">
            <div class="p-3 my-3">
                <h3 class="text-center">DAFTAR MAHASISWA VERIF</h3>
                <div class="row my-3">
                    <div class="col-12 col-md-8">
                        <div class="row" id="filter">
                            <div class="col-12 col-md-6">
                                <select name="dapil" id="dapil" class="form-select">
                                    <option value="">SEMUA DAPIL</option>
                                    <option value="a1">A1</option>
                                    <option value="a2">A2</option>
                                    <option value="a3">A3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="search" class="form-control" name="cari" id="cari" placeholder="Cari Apa Ya..." aria-controls="table">
                    </div>
                </div>
                <div class="overflow-auto px-3">
                    <table id="table" class="table table-hover table-striped" >
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">NIM</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">FOTO + KTM</th>
                                <th class="text-center">FOTO KTM</th>
                                <th class="text-center">VERIFIED</th>
                            </tr>
                        </thead>
        
                        <tbody id="data">
                            <?php
                            $fetch_daftar = mysqli_query($conn, "SELECT * FROM table_mahasiswa");
                            $no = 1;
                            while ($data = mysqli_fetch_array($fetch_daftar)) {
                            ?>
                            <tr class="align-middle" data-id="<?= $data['nim'] ?>" data-bs-toggle="modal" data-bs-target="#detil_modal">
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-start"><?= $data['nim'] ?></td>
                                <td class="text-start"><?= $data['nama'] ?></td>

                                <?php if($data['foto_img_1'] == '') {?>
                                    <td class="text-center"><button class="btn btn-sm btn-warning pe-none">BELUM UPLOAD</button></td>
                                <?php } else { ?>
                                    <td class="text-center"><button class="btn btn-sm btn-success" data-id="<?= $data['nim'] ?>" data-id1="foto_img_1" data-bs-toggle="modal" data-bs-target="#foto_modal">SUDAH UPLOAD</button></td>
                                <?php } ?>

                                <?php if($data['foto_img_2'] == '') {?>
                                    <td class="text-center"><button class="btn btn-sm btn-warning pe-none">BELUM UPLOAD</button></td>
                                <?php } else { ?>
                                    <td class="text-center"><button class="btn btn-sm btn-success" data-id="<?= $data['nim'] ?>" data-id1="foto_img_2" data-bs-toggle="modal" data-bs-target="#foto_modal">SUDAH UPLOAD</button></td>
                                <?php } ?>
        
                                <td class="text-center fw-bold <?php if($data['verified'] == 'belum') {echo 'text-warning';} elseif($data['verified'] == 'sudah') {echo 'text-success';} else {echo 'text-danger';} ?>"><?= strtoupper($data['verified']) ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "dom": 'rtip'
        });
    })
</script>

<script>
$(document).ready(function(){
    $("#cari").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#data tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $("#filter").change(function(){
        var dapil = $('#dapil').val();
        //alert(value);
        $.ajax({
            url: "./fetch/filter_dapil.php",
            type: "POST",
            data: {dapil:dapil},
            beforeSend: function(){
                    $('.overlay').show();
                },
            complete: function(){
                    $('.overlay').hide();
                },
            success:function(data){
                $("#data").html(data);
            }
        });
    });
});
</script>

<!-- Modal Detil Usulan -->
<div class="modal fade" id="detil_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">DETAIL USULAN</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                    
            <div class="modal-body">
                <div class="loading"></div>
                <div class="hasil-data"></div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#detil_modal').on('show.bs.modal', function (e) {
        var nim = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : './fetch/modal_detil.php',
            data : {nim:nim},
            cache: false,
            beforeSend: function(){
                        $('.loading').show();
                    },
            complete: function(){
                    $('.loading').hide();
                },
            success : function(data){
            $('.hasil-data').html(data);
            }
        });
    });
});
</script>
<!-- Akhir modal Detil Usulan -->

<!-- Modal Data Foto -->
<div class="modal fade" id="foto_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row" style="width: 100vw">
                    <div class="col-12">
                        <h4 class="modal-title" id="myModalLabel">FOTO UPLOAD</h4>
                    </div>
                </div>
            </div>
                    
            <div class="modal-body">
                <div class="loading"></div>
                <div class="hasil-data"></div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#foto_modal').on('show.bs.modal', function (e) {
        var nim = $(e.relatedTarget).data('id');
        var foto_img = $(e.relatedTarget).data('id1');
        $.ajax({
            type : 'post',
            url : './fetch/modal_foto.php',
            data : {nim:nim, foto_img:foto_img},
            cache: false,
            beforeSend: function(){
                        $('.loading').show();
                    },
            complete: function(){
                    $('.loading').hide();
                },
            success : function(data){
            $('.hasil-data').html(data);
            }
        });
    });
});
</script>
<!-- Akhir modal Data Foto -->