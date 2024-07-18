<?php
$url = @$_GET["url"];

switch ($url) {
    case 'anasayfa':
        $title = "Anasayfa";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Anasayfa/anasayfa.php");
        include("./Shared/footer.php");
        break;
    case 'bolum-ekle':
        $title = "Bölüm Ekle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Bolum/bolum-ekle.php");
        include("./Shared/footer.php");
        break;
    case 'bolum-listele':
        $title = "Bölümleri Listele";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Bolum/bolum-listele.php");
        include("./Shared/footer.php");
        break;
    case 'bolum-guncelle':
        $title = "Bölüm Düzenle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Bolum/bolum-guncelle.php");
        include("./Shared/footer.php");
        break;
    case 'bolum-sil':
        $title = "Bölüm Sil";
        include("./Models/bolum-sil.php");
        break;
    case 'ders-ekle':
        $title = "Ders Ekle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Ders/ders-ekle.php");
        include("./Shared/footer.php");
        break;
    case 'ders-listele':
        $title = "Ders Ekle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Ders/ders-listele.php");
        include("./Shared/footer.php");
        break;
    case 'ders-guncelle':
        $title = "Ders Düzenle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Ders/ders-guncelle.php");
        include("./Shared/footer.php");
        break;
    case 'ders-sil':
        $title = "Ders Sil";
        include("./Models/ders-sil.php");
        break;
    case 'ogrenci-ekle':
        $title = "Öğrenci Ekle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Ogrenci/ogrenci-ekle.php");
        include("./Shared/footer.php");
        break;
    case 'ogrenci-listele':
        $title = "Öğrenci Listele";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Ogrenci/ogrenci-listele.php");
        include("./Shared/footer.php");
        break;
    case 'ogrenci-guncelle':
        $title = "Öğrenci Güncelle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Ogrenci/ogrenci-guncelle.php");
        include("./Shared/footer.php");
        break;
    case 'ogrenci-sil':
        $title = "Öğrenci Sil";
        // include("./Shared/header.php");
        include("./Models/ogrenci-sil.php");
        break;
    case 'ogretmen-ekle':
        $title = "Öğretmen Ekle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Ogretmen/ogretmen-ekle.php");
        include("./Shared/footer.php");
        break;
    case 'ogretmen-listele':
        $title = "Öğretmen Ekle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Ogretmen/ogretmen-listele.php");
        include("./Shared/footer.php");
        break;
    case 'ogretmen-guncelle':
        $title = "Öğretmen Güncelle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Ogretmen/ogretmen-guncelle.php");
        include("./Shared/footer.php");
        break;
    case 'ogretmen-sil':
        $title = "Öğretmen Sil";
        // include("./Shared/header.php");
        include("./Models/ogretmen-sil.php");
        break;
    case 'not-ekle':
        $title = "Not Ekle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/OgrenciNotlar/not-ekle.php");
        include("./Shared/footer.php");
        break;
    case 'notu-goruntule':
        $title = "Notu Görüntüle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/OgrenciNotlar/notu-goruntule.php");
        include("./Shared/footer.php");
        break;
    case 'not-guncelle':
        $title = "Not Güncelle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/OgrenciNotlar/not-guncelle.php");
        include("./Shared/footer.php");
        break;
    case 'not-goruntule':
        $title = "Not Güncelle";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/not-goruntule.php");
        include("./Shared/footer.php");
        break;
    default:
        $title = "Anasayfa";
        // include("./Shared/header.php");
        include("./Shared/sidebar.php");
        include("./Shared/navbar.php");
        include("./Views/Anasayfa/anasayfa.php");
        include("./Shared/footer.php");
        break;
}
