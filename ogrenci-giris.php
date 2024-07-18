<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBS - Öğretmen Girişi</title>
    <!-- Bootstrap CSS -->
    <link href="./dist/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Sweet Alert 2 CSS-JS -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.11.0/sweetalert2.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="./dist/sweetalert2.css">
</head>

<body>

    <div class="bg-white p-5 rounded w-25 mx-auto mt-5 shadow ">
        <h1 class="text-center mb-5 fw-bold">Öğrenci Girişi</h1>
        <form class="w-100 mx-auto" action="./Models/ogrenci-giris.php" method="POST">
            <div class="mb-3">
                <label for="ogrenci_no" class="form-label">Öğrenci Numaranız</label>
                <input type="text" class="form-control" name="ogrenci_no" id="ogrenci_no">
            </div>
            <div class="mb-5">
                <label for="ogrenci_sifre" class="form-label">Öğrenci Şifreniz</label>
                <input type="text" class="form-control" name="ogrenci_sifre" id="ogrenci_sifre">
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Öğrenci Olarak Giriş Yap</button>
            <a href="./ogretmen-giris.php" class="btn btn-dark w-100">
                <i class="bi bi-person-badge"></i>
                Öğretmen Girişi Paneli
            </a>
        </form>
    </div>

    <?php if (isset($_GET["islem"]) && $_GET["islem"] === "girisyap") { ?>
        <script>
            Swal.fire({
                // position: "top-end",
                icon: "error",
                title: 'Giriş Yapınız',
                width: '300px',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    <?php } ?>

    <?php if (isset($_GET["islem"]) && $_GET["islem"] === "bos") { ?>
        <script>
            Swal.fire({
                // position: "top-end",
                icon: "warning",
                title: 'Boş Alan Bırakmayınız',
                width: '300px',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    <?php } ?>

    <?php if (isset($_GET["islem"]) && $_GET["islem"] === "bilgiyanlis") { ?>
        <script>
            Swal.fire({
                // position: "top-end",
                icon: "warning",
                title: 'Numaranızı Veya Şifrenizi Yanlış Girdiniz',
                width: '300px',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    <?php } ?>


</body>

</html>