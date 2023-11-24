 <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index" class="logo">
                            <img src="index_asset/index_asset/assets/images/logo_pemira.png" alt=""/>
                        </a>
                        <!-- ***** Logo End ***** -->
                        
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav align-middle">
                            <li class="align-middle"><a href="#beranda" class="<?php if($page == 'pemilihan') {echo '';} else {echo 'active';} ?>">Beranda</a></li>
                            <li class="align-middle"><a href="#tentang">Tentang</a></li>
                            <li class="align-middle"><a href="#galeri">Galeri</a></li>
                            <li class="align-middle"><a href="#pemira2023">PEMIRA 2023</a></li>
                            <?php date_default_timezone_set("Asia/Jakarta"); if ($_SESSION['status'] == 'login' && $_SESSION['verified'] == 'sudah') { ?>
                            <li class="align-middle">
                                <a class="<?php if($page == 'pemilihan') {echo 'active';} else {echo '';} ?>" href="pemilihan">Pemilihan</a>
                            </li>
                            <?php } else {echo '';} ?>
                            <li class="align-middle">
                                <?php if ($_SESSION['status'] == 'login') { ?>
                                    <a class="dropdown-toggle me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= strtoupper($_SESSION['nama']) ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if($_SESSION['verified'] <> 'sudah' && $_SESSION['nim'] <> 'admin') { ?>
                                            <li><a class="dropdown-item" href="verif"><i class="bi bi-person-check"></i> Verifikasi Akun</a></li>
                                        <?php } else { ?>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reset_pass" style="cursor: pointer"><i class="bi bi-pencil"></i> Reset Password</a></li>
                                        <?php } ?>
                                        <?php if($_SESSION['nim'] == 'admin') {echo '<li><a class="dropdown-item" href="daftar_verif"><i class="bi bi-person-lines-fill"></i> Daftar Usulan</a></li>';} else {echo '';} ?>
                                        <?php if($_SESSION['nim'] == 'admin' && date('Y/m/d') > '2023/12/20') {echo '<li><a class="dropdown-item" href="daftar_voting"><i class="bi bi-card-checklist"></i> Daftar Voting</a></li>';} else {echo '';} ?>
                                        <li><a class="dropdown-item" href="./action/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                                    </ul>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-warning align-middle" data-bs-toggle="modal" data-bs-target="#login_modal">
                                        <i class="bi bi-door-open-fill"></i> Login
                                    </button>
                                <?php } ?>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
<!-- ***** Header Area End ***** -->

<!--nav class="navbar navbar-expand-lg bg-unguprimary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index">
            <img src="./src/img/logo_stan.png" alt="" width="100">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light active" aria-current="page" href="#">TL KEGIATAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">SYARAT PASLON</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">PASLON BEM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">PASLON BLM</a>
                </li>
                <?php if ($_SESSION['status'] == 'login' && $_SESSION['verified'] == 'sudah') { ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="pemilihan">PEMILIHAN</a>
                </li>
                <?php } else {echo '';} ?>
            </ul>
            <div class="d-flex" style="list-style: none;">
                <li class="nav-item dropdown">
                    <?php if ($_SESSION['status'] == 'login') { ?>
                        <a class="nav-link dropdown-toggle text-light me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= strtoupper($_SESSION['nama']) ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if($_SESSION['verified'] <> 'sudah' && $_SESSION['nim'] <> 'admin') { ?>
                                <li><a class="dropdown-item" href="verif">Verifikasi Akun</a></li>
                            <?php } else { ?>
                                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reset_pass"><i class="bi bi-pencil"></i> Reset Password</a></li>
                            <?php } ?>
                            <?php if($_SESSION['nim'] == 'admin') {echo '<li><a class="dropdown-item" href="daftar_verif"><i class="bi bi-person-lines-fill"></i> Daftar Usulan</a></li>';} else {echo '';} ?>
                            <?php if($_SESSION['nim'] == 'admin') {echo '<li><a class="dropdown-item" href="daftar_voting"><i class="bi bi-card-checklist"></i> Daftar Voting</a></li>';} else {echo '';} ?>
                            <li><a class="dropdown-item" href="./action/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                        </ul>
                    <?php } else { ?>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#login_modal">
                            <i class="bi bi-door-open-fill"></i> LOGIN
                        </button>
                    <?php } ?>
                </li>
            </div>
        </div>
    </div>
</nav-->

<?php if($_SESSION['verified'] <> 'sudah' && $_SESSION['nim'] <> 'admin') {echo '';} else { ?>
    <!-- Modal Reset Password -->
    <div class="modal fade" id="reset_pass" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Reset Password</h1>
                </div>
                <form method="post" action="./action/reset_pass">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="132456789" name="nim" value="<?= $_SESSION['nim'] ?>" required>
                            <label for="floatingInput">Nomor Induk Mahasiswa</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput" placeholder="132456789" name="password" required>
                            <label for="floatingInput">Password Baru</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning"><i class="bi bi-pen-fill"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($_SESSION['status'] == 'login') { echo '';} else { ?>
<div class="modal fade" id="login_modal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Silahkan Login Untuk Memilih</h1>
            </div>
            <form method="post" action="./action/login">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="132456789" name="nim" required>
                        <label for="floatingInput">Nomor Induk Mahasiswa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" placeholder="132456789" name="password" required>
                        <label for="floatingInput">Password</label>
                    </div>
                    
                    <a class="text-danger text-end pe-auto" href="#" data-bs-toggle="modal" data-bs-target="#lupa_password"><small><?php if($_SESSION['login'] == 'failed') {echo 'NIM atau Password Anda Salah, Lupa Password?';} else {echo 'Lupa Password?';} ?></small></a>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Login <i class="bi bi-box-arrow-in-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if($_SESSION['login'] == 'failed') { unset($_SESSION['login']) ?>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#login_modal').modal('show');
    });
</script>
<?php } else {echo '';} ?>

<div class="modal fade" id="lupa_password" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Silahkan masukkan NIM Anda</h1>
            </div>
            <form method="post" action="./action/reset_password" onsubmit="return confirm('Apakah NIM anda sudah benar?Link akan dikirimkan ke email terdaftar sesuai NIM.');">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="132456789" name="nim" required>
                        <label for="floatingInput">Nomor Induk Mahasiswa</label>
                    </div>
                    <p class="text-info"><small>*Link akan dikirimkan ke email kampus sesuai NIM Mahasiswa.</small></p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-send-fill"></i> Kirim Link</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>