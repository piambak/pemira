<?php
// Connect DB
include '../config.php';

$dapil = $_POST['dapil'];

$fetch_dapil = mysqli_query($conn, "SELECT * FROM table_mahasiswa WHERE dapil like '%$dapil%'");
$no = 1;
while ($data = mysqli_fetch_array($fetch_dapil)) {
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