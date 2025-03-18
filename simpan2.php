<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = [
        'nama' => $_POST['nama'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'nomor_identitas' => $_POST['nomor_identitas'],
        'tipe_ruangan' => $_POST['tipe_ruangan'],
        'harga' => $_POST['harga'],
        'tanggal_pesan' => $_POST['tanggal_pesan'],
        'durasi_sewa' => $_POST['durasi_sewa'],
        'tambahan' => $_POST['tambahan'] ?? '',
        'total' => $_POST['total_bayar'],
    ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Nav Start -->
    <nav class="navbar sticky-top navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Gedung Lima Rasa Restaurant</a>
        </div>
    </nav>
    <!-- Nav End -->

    <div class="container mt-4">
        <div class="row">
            <div class="col"></div>

            <div class="card shadow-lg" style="width: 34rem;">
                <div class="col">

                    - Nomor Identitas : <?= $data['nomor_identitas'] ?><br>
                    - Nama Pemesan : <?= $data['nama'] ?><br>
                    - Jenis Kelamin : <?= $data['jenis_kelamin'] ?><br>
                    - Tanggal Pemesanan : <?= $data['tanggal_pesan'] ?><br>
                    - Tipe Gedung : <?php
                                    if ($data['tipe_ruangan'] == 2000000) {
                                        echo "VIP";
                                    } elseif ($data['tipe_ruangan'] == 2500000) {
                                        echo "BALL-ROOM";
                                    } elseif ($data['tipe_ruangan'] == 1200000) {
                                        echo "OUT-DOOR";
                                    } ?><br>
                    - Durasi Sewa : <?= $data['durasi_sewa'] ?> Hari<br>
                    - Catering : <?php
                                    if (empty($data['tambahan'])) {
                                        echo "Tidak";
                                    } else {
                                        echo "Ya";
                                    }
                                    ?> <br>
                    - Discount : <?php if ($data['durasi_sewa'] > 3) {
                                        echo "10%";
                                    } else {
                                        echo "-";
                                    } ?><br>
                    - Total Bayar : Rp.<?= number_format($data['total']) ?><br>
                    - Foto : <br>
                    <img src="img/<?php if ($data['tipe_ruangan'] == 2000000) {
                                        echo "VIP.jpg";
                                    } else if ($data['tipe_ruangan'] == 2500000) {
                                        echo "BALLROOM.jpg";
                                    } elseif ($data['tipe_ruangan'] == 1200000) {
                                        echo "OUTDOOR.jpg";
                                    } ?>" width="250vh" class="mt-2 mb-2">
                </div>
                <div class="text-end mb-2">
                    <a href="index.php" class="btn btn-outline-danger" >Kembali</a>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <footer class="bg-dark text-center">
        <p>@Copyright 2025</p>
    </footer>
</body>

</html>
