<?php
include 'config.php';
session_start();

$nim = $_GET['nim'];
$password = $_GET['encrypt'];

$fetch_data = mysqli_query($conn, "SELECT * FROM table_mahasiswa WHERE nim='$nim' AND password = '$password'");
$data = mysqli_fetch_array($fetch_data);
$jumlah_data = mysqli_num_rows($fetch_data);

if($jumlah_data > 0) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTING YOUR LEADER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="./src/img/logo_stan_kotak.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-unguprimary">
    <main class="mx-auto">
        <div class="container">
            <?php include 'navbar.php' ?>
        </div>

        <div class="container mt-5">
            <h2 class="text-center text-light font-big">STAN ... STAN ... STAN</h2>
            <h1 class="text-center text-light font-big">SELALU TERDEPAN</h1> <br>
            <h2 class="text-center text-light font-big">STAN ... STAN ... STAN</h2>
            <h1 class="text-center text-light font-big">PASTI ADA HARAPAN</h1> <br>
            <h2 class="text-center text-light font-big">STAN ... STAN ... STAN</h2>
            <h1 class="text-center text-light font-big">HIDUP SEMAKIN MAPAN</h1>
        </div>
    </main>
</body>
</html>

<!-- Modal Reset Password -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Reset Password</h1>
            </div>
            <form method="post" action="./action/reset_pass" onsubmit="return confirm('Apakah anda sudah yakin update data mahasiswa?');">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="132456789" name="nim" value="<?= $nim ?>" required readonly>
                        <label for="floatingInput">Nomor Induk Mahasiswa</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" placeholder="132456789" name="password" required>
                        <label for="floatingInput">Password Baru</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(window).on('load', function() {
        $('#staticBackdrop').modal('show');
    });
</script>
<?php } else { header('location: index');} ?>