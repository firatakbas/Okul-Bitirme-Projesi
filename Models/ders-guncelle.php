<?php

include_once "./baglan.php";

$ders_id = $_POST["ders_id"];
$ders_adi = $_POST["ders_adi"];

if (empty($ders_id) || empty($ders_adi)) {
    header('Location:' . $url . '?url=ders-listele&islem=bos');
} else {
    $sorgu = $baglan->prepare("UPDATE ders SET ders_adi = ? WHERE ders_id = ?");
    $guncelle = $sorgu->execute(array($ders_adi, $ders_id));
    if ($guncelle) {
        header('Location: ' . $url . '?url=ders-listele&islem=basarili');
    } else {
        header('Location: ' . $url . '?url=ders-listele&islem=basarisiz');
    }
}
