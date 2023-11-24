<?php
// Sambungkan ke DB
include '../config.php';

// Memulai Session
session_start();

// Post data
$nim = $_POST['nim'];

// Fetch Data dari DB
$fetch_data = mysqli_query($conn, "SELECT * FROM table_mahasiswa WHERE nim = '$nim'");
$data = mysqli_fetch_array($fetch_data);
?>

<form action="../action/verifikasi.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('Apakah anda sudah yakin update data mahasiswa?');">
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="nim" value="<?= $data['nim'] ?>" name="nim">
                <label for="floatingInput" name="npwp">Nomor Induk Mahasiswa</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="nama" value="<?= $data['nama'] ?>" name="nama">
                <label for="floatingInput">Nama Mahasiswa</label>
            </div>
        </div>
    </div>

    <!-- FOTO -->
    <div class="row mb-3" style="border-top: 2px solid #ccc">
        <h5 class="text-success text-center mt-2">FOTO UPLOAD</h5>
    </div>

    <?php if($data['foto_img_1'] == '' && $data['foto_img_2'] == '') {echo '';} else { ?>
    <div class="row">
        <div class="col-6">
            <p class="text-center">Foto Dengan KTM</p>
        </div>
        <div class="col-6">
            <p class="text-center">Foto KTM</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <img src="<?php if($data['foto_img_1'] <> '') {echo '../uploads/'. $nim .'_1.png';} else {echo '../voting/src/img/no_img.jpg';} ?>" alt="" style="width: 100%; height: 100%" >
        </div>
        <div class="col-6">
            <img src="<?php if($data['foto_img_2'] <> '') {echo '../uploads/'. $nim .'_2.png';} else {echo '../voting/src/img/no_img.jpg';} ?>" alt="" style="width: 100%; height: 100%" >
        </div>
    </div>
    <?php } ?>

    <div class="row mb-3">
        <div class="col-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="foto_img_1" <?php if($data['foto_img_1'] <> '') {echo 'checked';} else {echo '';} ?>>
                <label class="form-check-label" for="flexCheckDefault">
                    Foto Diri dan KTM
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="foto_img_2" <?php if($data['foto_img_2'] <> '') {echo 'checked';} else {echo '';} ?>>
                <label class="form-check-label" for="flexCheckChecked">
                    Foto KTM
                </label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="verified">
                    <option value="<?= $data['verified'] ?>"><?= ucfirst($data['verified']) ?></option>
                    <option value="belum" <?php if($data['verified'] == 'belum') {echo 'hidden';} else {echo '';} ?>>Belum</option>
                    <option value="sudah" <?php if($data['verified'] == 'sudah') {echo 'hidden';} else {echo '';} ?>>Sudah</option>
                    <option value="ditolak" <?php if($data['verified'] == 'ditolak') {echo 'hidden';} else {echo '';} ?>>Ditolak</option>
                </select>
                <label for="floatingSelect">Hasil Verifikasi</label>
            </div>
        </div>
    </div>
    
    <div class="modal-footer pb-0">
        <button type="submit" class="btn btn-sm btn-success" name="update"><i class="bi bi-pen-fill"></i> UPDATE</button>
    </div>
</form>