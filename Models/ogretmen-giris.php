<?php

require_once "./baglan.php";

$ogretmen_numarasi = $_POST["ogretmen_numarasi"];
$ogretmen_sifre = $_POST["ogretmen_sifre"];

if (empty($ogretmen_numarasi) || empty($ogretmen_sifre)) {
    header('Location: ' . $url . 'ogretmen-giris.php?islem=bos');
} else {
    $OgretmenBilgiSorgula = $baglan->prepare("SELECT * FROM ogretmen WHERE ogretmen_numarasi = ? AND ogretmen_sifre = ? ");
    $OgretmenBilgiSorgula->execute(array($ogretmen_numarasi, $ogretmen_sifre));

    $saydir = $OgretmenBilgiSorgula->rowCount();

    if ($saydir == 1) {
        $_SESSION["oturum"] = $ogretmen_numarasi;
        header('Location: ' . $url . '?anasayfa&islem=bos');
    } else {
        echo "Bilgiler Yanlış";
    }
}
