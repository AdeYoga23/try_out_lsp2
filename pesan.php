<?php

$nama_pemesan = "";
$jenis_kelamin = "";
$nomor_identitas = "";
$tipe_mobil = "";
$harga = 0;
$tanggal_pesan = "";
$durasi_sewa = 0;
$tambahan = "";
$total = 0;

if (isset($_POST['hitung_total'])) {
    // echo "<script>
    //     alert('BIJI');
    //     </script>";

    $nama_pemesan = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_identitas = $_POST['nomor_identitas'];
    $tipe_mobil = $_POST['tipe_mobil'];
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
        $total = ($harga * $durasi_sewa) + $tambahan - $potongan;
    } else if ($durasi_sewa <= 3 && !empty($tambahan)) {
        $total = $harga * $durasi_sewa + $tambahan;
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
                    <form method="POST" action="simpan.php">
                        <label class="form-label mt-2">Nama Pemesan</label>
                        <input type="text" name="nama" class="form-control shadow-lg mb-2" value="<?php if (empty($nama_pemesan)) {
                                                                                                        echo "";
                                                                                                    } else {
                                                                                                        echo $nama_pemesan;
                                                                                                    } ?>">

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
                        <input type="number" name="nomor_identitas" class="form-control shadow-lg mb-2" value="<?= $nomor_identitas; ?>">

                        <label class="form-label">Tipe Mobil</label>
                        <select class="form-select mb-2" aria-label="Default select example" id="tipe_mobil" name="tipe_mobil" onchange="UpdateInput()">
                            <option value="2000000" selected <?= $tipe_mobil == 2000000 ? 'selected' : '' ?>>Fortuner</option>
                            <option value="1200000" <?= $tipe_mobil == 1200000 ? 'selected' : '' ?>>Creta</option>
                            <option value="2500000" <?= $tipe_mobil == 2500000 ? 'selected' : '' ?>>Crv</option>
                        </select>

                        <label class="form-label">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control shadow-lg mb-2" value="<?= $harga; ?>" readonly>

                        <label class="form-label">Tanggal Pesan</label>
                        <input type="date" name="tanggal_pesan" class="form-control shadow-lg mb-2" value="<?= $tanggal_pesan; ?>">

                        <label class="form-label">Durasi Sewa</label>
                        <input type="number" name="durasi_sewa" min="1" class="form-control shadow-lg mb-2" value="<?= $durasi_sewa; ?>">

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="100000" name="tambahan" id="flexCheckDefault" <?= $tambahan == 100000 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexCheckDefault">
                                Termasuk Sopir
                            </label>
                        </div>

                        <label class="form-label">Total Bayar</label>
                        <input type="number" name="total_bayar" class="form-control shadow-lg mb-2" value="<?= $total ?>" readonly>

                        <div class="text-end mb-4 mt-2">
                            <button name="hitung_total" class="btn btn-outline-primary" formaction="pesan.php">Hitung Total Bayar</button>
                            <button name="simpan" class="btn btn-outline-success" formaction="simpan.php">Simpan</button>
                            <button name="cancel" class="btn btn-outline-danger" formaction="index.php">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col"></div>
            <script>
                function UpdateInput() {
                    let select = document.getElementById("tipe_mobil");
                    let input = document.getElementById("harga");
                    input.value = select.value;
                }
            </script>
        </div>
    </div>
</body>

</html>