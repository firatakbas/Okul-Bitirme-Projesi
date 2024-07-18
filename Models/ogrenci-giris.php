<?php

require_once "./baglan.php";

$ogrenci_no = $_POST["ogrenci_no"];
$ogrenci_sifre = $_POST["ogrenci_sifre"];

if (empty($ogrenci_no) || empty($ogrenci_sifre)) {
    header('Location: ' . $url . 'ogrenci-giris.php?islem=bos');
} else {
    $OgrenciBilgiSorgula = $baglan->prepare("SELECT * FROM ogrenci WHERE ogrenci_no = ? AND ogrenci_sifre = ? ");
    $OgrenciBilgiSorgula->execute(array($ogrenci_no, $ogrenci_sifre));

    $saydir = $OgrenciBilgiSorgula->rowCount();

    if ($saydir == 1) {

        $_SESSION["oturum"] = $ogrenci_no;
        header('Location: ' . $url . '?anasayfa&islem=bos');
    } else {
        echo "Bilgiler Yanlış";
    }
}
