<?php

include_once("./baglan.php");

$ogretmen_ad    = $_POST["ogretmen_ad"];
$ogretmen_soyad = $_POST["ogretmen_soyad"];
$ogretmen_numarasi    = $_POST["ogretmen_numarasi"];
$ogretmen_sifre = $_POST["ogretmen_sifre"];
$ogretmen_cinsiyet = $_POST["ogretmen_cinsiyet"];
$bolum_id       = $_POST["bolum_id"];

if (empty($ogretmen_ad) || empty($ogretmen_soyad) || empty($ogretmen_numarasi) || empty($ogretmen_sifre) || empty($bolum_id)) {
    header('Location: ' . $url . '?url=ogretmen-ekle&islem=bos');
} else {

    $NumaraSorgula = $baglan->prepare("SELECT * FROM ogretmen WHERE ogretmen_numarasi = ?");
    $NumaraSorgula->execute(array($ogretmen_numarasi));

    if ($NumaraSorgula->rowCount() == 0) {
        $sorgu = $baglan->prepare("INSERT INTO ogretmen SET ogretmen_ad = ?, ogretmen_soyad = ?, ogretmen_numarasi = ?, ogretmen_sifre = ?, bolum_id = ?, ogretmen_cinsiyet = ?");
        $ekle = $sorgu->execute(array($ogretmen_ad, $ogretmen_soyad, $ogretmen_numarasi, $ogretmen_sifre, $bolum_id, $ogretmen_cinsiyet));

        if ($ekle) {
            header('Location: ' . $url . '?url=ogretmen-ekle&islem=basarili');
        } else {
            header('Location: ' . $url . '?url=ogretmen-ekle&islem=basarisiz');
        }
    } else {
        header('Location: ' . $url . '?url=ogretmen-ekle&islem=no_var');
    }
}
