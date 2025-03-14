<?php
require("data/data.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script defer src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Nav Start -->
    <nav class="navbar sticky-top navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Rental Mobil</a>
        </div>
    </nav>
    <!-- Nav End -->

    <div class="container mb-4">

        <!-- Banner Start -->
        <div class="container text-center mt-2 mb-2">
            <div class="row align-items-center">
                <div class="col">
                    <div class="text-start">
                        <h1>Rental Mobil</h1><br>
                        <h4>Kami Adalah Penyedia Layanan Rental Mobil.</h4>
                        <button class="btn btn-outline-dark mt-2" name="lihat">Lihat</button>
                    </div>
                </div>
                <div class="col">
                    <img src="img/logo2.png" width="60%">
                </div>
            </div>
        </div>
        <hr class="shadow-lg">
        <!-- Banner End -->

        <div class="row">
            <!-- Items Start -->
            <div class="text-center">
                <h3>Jenis Mobil</h3>
            </div>
            <div class="row justify-content-center text-center">
                <?php
                foreach ($data as $id => $value_data) {
                ?>
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <div class="card shadow">
                            <img src="img/<?= $value_data[2] ?>" class="card-img-top" height="150vh">
                            <div class="card-body">
                                <h5 class="card-title mb-auto"><?php echo $value_data[0]; ?></h5>
                                <p class="card-text mt-auto">Rp.<?php echo number_format($value_data[1]); ?></p>
                                <a href="pesan.php?id=<?= $id; ?>" class="btn btn-outline-dark mt-4">Pesan Mobil</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- Items End -->
        </div>
        <div class="text-center">
            <a href="pesan.php" class="btn btn-outline-dark mt-4">Pesan Mobil</a>
        </div>
    </div>
</body>

</html>