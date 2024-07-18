<?php

include_once "./baglan.php";

$ders_adi = $_POST["ders_adi"];
$bolum_id = $_POST["bolum_id"];
$ogretmen_id = $_POST["ogretmen_id"];

if (empty($ders_adi) || empty($bolum_id) || empty($ogretmen_id)) {
    header('Location:' . $url . '?url=ders-ekle&islem=bos');
} else {
    $sorgu = $baglan->prepare("INSERT INTO ders SET ders_adi = ?, bolum_id = ?, ogretmen_id = ?");
    $ekle = $sorgu->execute(array($ders_adi, $bolum_id, $ogretmen_id));

    if ($ekle) {
        header('Location: ' . $url . '?url=ders-ekle&islem=basarili');
    } else {
        header('Location: ' . $url . '?url=ders-ekle&islem=basarisiz');
    }
}
