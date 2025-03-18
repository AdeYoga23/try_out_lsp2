<?php
require 'data/data.php';
$id = $_GET['id'] ?? null;

$nama_pemesan = "";
$jenis_kelamin = "";
$nomor_identitas = "";
$tipe_ruangan = "";
$harga = 2000000;
$tanggal_pesan = "";
$durasi_sewa = 0;
$tambahan = "";
$total = "";

if (isset($_POST['hitung_total'])) {

    $nama_pemesan = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_identitas = $_POST['nomor_identitas'];
    $tipe_ruangan = $_POST['tipe_ruangan'];
    $harga = (int) $_POST['harga'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $durasi_sewa = (int) $_POST['durasi_sewa'];
    $tambahan = isset($_POST['tambahan']) ? (int) $_POST['tambahan'] : "";
    $total = $_POST['total_bayar'];

    if ($durasi_sewa > 3 && empty($tambahan)) {
        $potongan = ($harga * 10) / 100;
        $total = ($harga * $durasi_sewa) - $potongan;
    } else if ($durasi_sewa <= 3 && empty($tambahan)) {
        $total = $harga * $durasi_sewa;
    } else if ($durasi_sewa > 3 && !empty($tambahan)) {
        $potongan = ($harga * 10) / 100;
        $hitung_tambahan = $durasi_sewa * $tambahan;
        $total = ($harga * $durasi_sewa) + $hitung_tambahan - $potongan;
    } else if ($durasi_sewa <= 3 && !empty($tambahan)) {
        $hitung_tambahan = $durasi_sewa * $tambahan;
        $total = ($harga * $durasi_sewa) + $hitung_tambahan;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
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
    <?php
    print_r($id);
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col"></div>

            <div class="card" style="width: 34rem;">
                <div class="col">
                    <form method="POST" action="simpan.php">
                        <label class="form-label mt-2">Nama Pemesan</label>
                        <input type="text" name="nama" class="form-control shadow-lg mb-2"
                            value="<?php if (empty($nama_pemesan)) {
                                        echo "";
                                    } else {
                                        echo $nama_pemesan;
                                    } ?>" placeholder="Nama Pemesan" required>

                        <label class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="laki-laki" id="flexRadioDefault2" <?= $jenis_kelamin == "laki-laki" ? 'checked' : '' ?> checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="perempuan" id="flexRadioDefault1" <?= $jenis_kelamin == "perempuan" ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Perempuan
                            </label>
                        </div>

                        <label class="form-label">Nomor Identitas</label>
                        <input type="number" name="nomor_identitas" min="16" class="form-control shadow-lg mb-2" value="<?= $nomor_identitas; ?>" placeholder="(16 digit)" required>

                        <label class="form-label">Tipe Gedung</label>
                        <select class="form-select mb-2" aria-label="Default select example" id="tipe_ruangan" name="tipe_ruangan" onchange="UpdateInput()">
                            <?php
                            foreach ($data as $id => $value_data) {
                            ?>
                                <option value="<?= $value_data[1]; ?>" <?= $tipe_ruangan == $value_data[1] ? 'selected' : ''; ?>><?= $value_data[0]; ?></option>
                            <?php
                            }
                            ?>
                        </select>

                        <label class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control shadow-lg mb-2" value="<?= $harga; ?>" readonly>

                        <label class="form-label">Tanggal Pesan</label>
                        <input type="date" name="tanggal_pesan" class="form-control shadow-lg mb-2" value="<?= $tanggal_pesan; ?>" required>

                        <label class="form-label">Durasi Sewa</label>
                        <input type="number" name="durasi_sewa" min="1" class="form-control shadow-lg mb-2" value="<?= $durasi_sewa; ?>">

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="1200000" name="tambahan" id="flexCheckDefault" <?= $tambahan == 1200000 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Termasuk Catering (Rp 1.200.000/hari)
                            </label>
                        </div>

                        <label class="form-label">Total Bayar</label>
                        <input type="text" name="total_bayar" class="form-control shadow-lg mb-2" value="<?= $total ?>" required readonly>

                        <div class="text-end mb-4 mt-2">
                            <button name="hitung_total" class="btn btn-outline-primary" formaction="pesan.php">Hitung Total Bayar</button>
                            <button name="simpan" class="btn btn-outline-success" formaction="simpan.php">Simpan</button>
                            <a href="index.php" class="btn btn-outline-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col"></div>
        </div>
    </div>
    <footer class="bg-dark text-center mt-4">
        <p>@Copyright 2025</p>
    </footer>

    <script>
        function UpdateInput() {
            let select = document.getElementById("tipe_ruangan");
            let input = document.getElementById("harga");
            input.value = select.value;
        }
    </script>
</body>

</html>