<?php

include_once("./baglan.php");

$ogrenci_id = $_POST["ogrenci_id"];
$ders_id = $_POST["ders_id"];
$vize = $_POST["vize"];
$final = $_POST["final"];

if (empty($ogrenci_id) || empty($ders_id) || empty($vize) || empty($final)) {
    header('Location: ' . $url . '?url=not-ekle&islem=bos');
} else {

    $NotSorgula = $baglan->prepare("SELECT * FROM ogrenci_notlar WHERE ogrenci_id = ? AND ders_id = ?");
    $NotSorgula->execute(array($ogrenci_id, $ders_id));

    if ($NotSorgula->rowCount() == 0) {
        $sorgu = $baglan->prepare("INSERT INTO ogrenci_notlar SET ogrenci_id = ?, ders_id = ?, vize = ?, final = ?");
        $ekle = $sorgu->execute(array($ogrenci_id, $ders_id, $vize, $final));

        if ($ekle) {
            header('Location: ' . $url . '?url=not-ekle&islem=basarili');
        } else {
            header('Location: ' . $url . '?url=not-ekle&islem=basarisiz');
        }
    } else {
        header('Location: ' . $url . '?url=not-ekle&islem=noteklenmis');
    }
}
