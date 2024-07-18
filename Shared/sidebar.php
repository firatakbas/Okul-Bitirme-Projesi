<?php
include_once "Models/baglan.php";
// $url = "http://localhost:9090/";

if (!isset($_SESSION["oturum"])) {
    // $geldigi_sayfa = $_SERVER['HTTP_REFERER'];
    header('Location: ' . $url . 'ogrenci-giris.php?islem=girisyap');
}

@$OgretmenBilgileriniGetir = $baglan->prepare("SELECT * FROM ogretmen WHERE ogretmen_numarasi = ?");
@$OgretmenBilgileriniGetir->execute(array($_SESSION["oturum"]));
@$ogretmen_bilgi = $OgretmenBilgileriniGetir->fetch(PDO::FETCH_ASSOC);

@$OgrenciBilgileriniGetir = $baglan->prepare("SELECT * FROM ogrenci WHERE ogrenci_no = ?");
@$OgrenciBilgileriniGetir->execute(array($_SESSION["oturum"]));
@$ogrenci_bilgi = $OgrenciBilgileriniGetir->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OBS - <?= $title ?></title>

    <!-- Bootstrap CSS -->
    <link href="<?= $url ?>dist/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Sweet Alert 2 CSS-JS -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.11.0/sweetalert2.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?= $url ?>dist/sweetalert2.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.css">

    <!-- jquery JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script=> -->
    <script src="<?= $url ?>dist/jquery.min.js"></script>

    <!-- Datatables CSS-JS -->
    <link rel="stylesheet" href="<?= $url ?>dist/datatables.min.css">
    <script src="<?= $url ?>dist/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= $url ?>dist/style.css">
</head>

<body>

    <div class="d-flex">
        <div class="sidebar col bg-dark text-white" style="border-right: 1px solid #595c5f;">
            <h3 class="text-center my-3">
                Öğrenci <br> Bilgi Sistemi <br>

                <!-- <div class="bg-black text-white p-2 rounded m-1">AKBAŞ ÜNİ...</div> <br> -->
            </h3>
            <ul class="nav flex-column">
                <li class="nav-item ">
                    <a class="nav-link text-white" href="?url=anasayfa">
                        <i class="fa-solid fa-house"></i>
                        Ana Sayfa
                    </a>
                </li>
                <hr>

                <?php
                if (@$ogretmen_bilgi["yetki"] == "0") {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=bolum-ekle">
                            <i class="fa-solid fa-plus"></i>
                            Bölüm Ekle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=bolum-listele">
                            <i class="fa-solid fa-list"></i>
                            Bölümleri Listele
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=ders-ekle">
                            <i class="fa-solid fa-plus"></i>
                            Ders Ekle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=ders-listele">
                            <i class="fa-solid fa-list"></i>
                            Dersleri Listele
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=ogrenci-ekle">
                            <i class="fa-solid fa-plus"></i>
                            Öğrenci Ekle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=ogrenci-listele">
                            <i class="fa-solid fa-list"></i>
                            Öğrencileri Listele
                        </a>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=ogretmen-ekle">
                            <i class="fa-solid fa-plus"></i>
                            Öğretmen Ekle
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=ogretmen-listele">
                            <i class="fa-solid fa-list"></i>
                            Öğretmenleri Listele
                        </a>
                    </li>
                    <hr>
                    <!-- <li class="nav-item">
                        <a class="nav-link text-white" href="?url=not-ekle">
                            <i class="fa-solid fa-plus"></i>
                            Not Ekle
                        </a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link text-white" href="?url=anasayfa">
                            <i class="bi bi-list"></i>
                            Notları Listele
                        </a>
                    </li> -->
                <?php
                } elseif (@$ogretmen_bilgi["yetki"] == "1") {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=not-ekle">
                            <i class="bi bi-plus"></i>
                            Not Ekle
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link text-white" href="?url=anasayfa">
                            <i class="bi bi-list"></i>
                            Notları Listele
                        </a>
                    </li> -->
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="?url=not-goruntule">
                            <i class="bi bi-plus"></i>
                            Notları Görüntüle
                        </a>
                    </li>
                <?php
                }

                ?>
            </ul>
        </div>