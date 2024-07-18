<?php
include_once "./baglan.php";

$bolum_id = $_POST["bolum_id"];
$bolum_adi = $_POST["bolum_adi"];

if (empty($bolum_id) || empty($bolum_adi)) {
    header('Location:' . $url . '?url=bolum-listele&islem=bos');
} else {
    $sorgu = $baglan->prepare("UPDATE bolum SET bolum_adi = ? WHERE bolum_id = ?");
    $guncelle = $sorgu->execute(array($bolum_adi, $bolum_id));
    if ($guncelle) {
        header('Location: ' . $url . '?url=bolum-listele&islem=basarili');
    } else {
        header('Location: ' . $url . '?url=bolum-listele&islem=basarisiz');
    }
}
