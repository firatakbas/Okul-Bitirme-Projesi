<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBS - Öğretmen Girişi</title>
    <!-- Bootstrap CSS -->
    <link href="./dist/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="bg-white p-5 rounded w-25 mx-auto mt-5 shadow ">
        <h1 class="text-center mb-5 fw-bold">Öğretmen Girişi</h1>
        <form class="w-100 mx-auto" action="./Models/ogretmen-giris.php" method="POST">
            <div class="mb-3">
                <label for="ogretmen_numarasi" class="form-label">Öğretmen Numaranız</label>
                <input type="text" class="form-control" name="ogretmen_numarasi" id="ogretmen_numarasi">
            </div>
            <div class="mb-5">
                <label for="ogretmen_sifre" class="form-label">Öğretmen Şifreniz</label>
                <input type="text" class="form-control" name="ogretmen_sifre" id="ogretmen_sifre">
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-2">Öğretmen Olarak Giriş Yap</button>
            <a href="./ogrenci-giris.php" class="btn btn-dark w-100">
                <i class="bi bi-person-badge"></i>
                Öğrenci Girişi Paneli
            </a>
        </form>
    </div>
</body>

</html>