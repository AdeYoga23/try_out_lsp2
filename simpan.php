<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'nama' => $_POST['nama'] ?? '',
        'jenis_kelamin' => $_POST['jenis_kelamin'] ?? '',
        'nomor_identitas' => $_POST['nomor_identitas'] ?? '',
        'tipe_mobil' => $_POST['tipe_mobil'] ?? '',
        'harga' => $_POST['harga'] ?? '',
        'tanggal_pesan' => $_POST['tanggal_pesan'] ?? '',
        'durasi_sewa' => $_POST['durasi_sewa'] ?? '',
        'tambahan' => $_POST['tambahan'] ?? '',
        'total' => $_POST['total_bayar'] ?? '',
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
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Nav Start -->
    <nav class="navbar sticky-top navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Rental Mobil</a>
        </div>
    </nav>
    <!-- Nav End -->

    <div class="container mt-4">
        <div class="row">
            <div class="col"></div>

            <div class="card" style="width: 34rem;">
                <div class="col">

                    Nama Pemesan : <?= $data['nama'] ?><br>
                    Nomor Identitas : <?= $data['nomor_identitas'] ?><br>
                    Jenis Kelamin : <?= $data['jenis_kelamin'] ?><br>
                    Tanggal Pemesanan : <?= $data['tanggal_pesan'] ?><br>
                    Tipe Mobil : <?php if ($data['tipe_mobil'] == 2000000) {
                                        echo "Fortuner";
                                    } elseif ($data['tipe_mobil'] == 1200000) {
                                        echo "Creta";
                                    } elseif ($data['tipe_mobil'] == 2500000) {
                                        echo "Crv";
                                    } ?><br>
                    Durasi Sewa : <?= $data['durasi_sewa'] ?> Hari<br>
                    Tambahan : <?php
                                if (empty($data['tambahan'])) {
                                    echo "-";
                                } else {
                                    echo "Sopir";
                                }
                                ?> <br>
                    Discount : <?php if($data['durasi_sewa'] > 3){ echo "10%"; } else { echo "-"; } ?><br>
                    Total Bayar : Rp.<?= number_format($data['total']) ?>
                </div>
            </div>

            <?php
            if ($data['tipe_mobil'] == 2000000) {
                echo "Fortuner";
            } elseif ($data['tipe_mobil'] == 1200000) {
                echo "Creta";
            } elseif ($data['tipe_mobil'] == 2500000) {
                echo "Crv";
            }

            if ($data['durasi_sewa'] > 3) {
                echo " DISKON 10%";
            }
            ?>

            <div class="col"></div>
        </div>
    </div>
</body>

</html>