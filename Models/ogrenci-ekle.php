<?php

include_once("./baglan.php");

$ogrenci_ad = $_POST["ogrenci_ad"];
$ogrenci_soyad = $_POST["ogrenci_soyad"];
$ogrenci_no = $_POST["ogrenci_no"];
$ogrenci_sifre = $_POST["ogrenci_sifre"];
$ogrenci_sinif = $_POST["ogrenci_sinif"];
$ogrenci_cinsiyet = $_POST["ogrenci_cinsiyet"];
$baslangic_yili = $_POST["baslangic_yili"];
$bolum_id = $_POST["bolum_id"];

if (empty($ogrenci_ad) || empty($ogrenci_soyad) || empty($ogrenci_no) || empty($ogrenci_sifre) || empty($ogrenci_sinif) || empty($ogrenci_cinsiyet) || empty($baslangic_yili) || empty($bolum_id)) {
    header('Location: ' . $url . '?url=ogrenci-ekle&islem=bos');
} else {

    $NumaraSorgula = $baglan->prepare("SELECT * FROM ogrenci WHERE ogrenci_no = ?");
    $NumaraSorgula->execute(array($ogrenci_no));

    if ($NumaraSorgula->rowCount() == 0) {
        $sorgu = $baglan->prepare("INSERT INTO ogrenci SET ogrenci_ad = ?, ogrenci_soyad = ?, ogrenci_no = ?, ogrenci_sifre = ?, ogrenci_sinif = ?, ogrenci_cinsiyet = ?, baslangic_yili = ?, bolum_id = ?");
        $ekle = $sorgu->execute(array($ogrenci_ad, $ogrenci_soyad, $ogrenci_no, $ogrenci_sifre, $ogrenci_sinif, $ogrenci_cinsiyet, $baslangic_yili, $bolum_id));

        if ($ekle)
            header('Location: ' . $url . '?url=ogrenci-ekle&islem=basarili');
        else
            header('Location: ' . $url . '?url=ogrenci-ekle&islem=basarisiz');
    } else {
        header('Location: ' . $url . '?url=ogrenci-ekle&islem=no_var');
    }
}
