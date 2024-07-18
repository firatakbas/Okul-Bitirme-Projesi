<?php
include_once "./baglan.php";

$ogrenci_id = $_POST["ogrenci_id"];
$ogrenci_sinif = $_POST["ogrenci_sinif"];
$bolum_id = $_POST["bolum_id"];


if (empty($ogrenci_id) || empty($ogrenci_sinif) || empty($bolum_id)) {
    header('Location:' . $url . '?url=bolum-listele&islem=bos');
} else {
    $sorgu = $baglan->prepare("UPDATE ogrenci SET ogrenci_sinif = ?, bolum_id = ? WHERE ogrenci_id = ?");
    $guncelle = $sorgu->execute(array($ogrenci_sinif, $bolum_id, $ogrenci_id));

    if ($guncelle) {
        header('Location: ' . $url . '?url=ogrenci-listele&islem=basarili');
    } else {
        header('Location: ' . $url . '?url=ogrenci-listele&islem=basarisiz');
    }
}
