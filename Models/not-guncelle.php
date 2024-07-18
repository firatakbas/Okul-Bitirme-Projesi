<?php

require_once("./baglan.php");

$ogrenci_id = $_POST["ogrenci_id"];
$ders_id = $_POST["ders_id"];
$vize = $_POST["vize"];
$final = $_POST["final"];

if (empty($vize) || empty($final)) {
    header('Location:' . $url . '?url=not-ekle&islem=bos');
} else {
    $sorgu = $baglan->prepare("UPDATE ogrenci_notlar SET vize = ?, final = ? WHERE ogrenci_id = ? AND ders_id = ?");
    $guncelle = $sorgu->execute(array($vize, $final, $ogrenci_id, $ders_id));

    if ($guncelle) {
        header('Location: ' . $url . '?url=not-ekle&islem=guncellendi');
    } else {
        header('Location: ' . $url . '?url=not-ekle&islem=basarisiz');
    }
}
