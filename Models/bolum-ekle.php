<?php

include_once "./baglan.php";

$bolum_adi = $_POST["bolum_adi"];

if ($bolum_adi == "") {
    header('Location:' . $url . '?url=bolum-ekle&islem=bos');
    // echo "Boş alan bırakmayınız";
} else {
    $sorgu = $baglan->prepare("INSERT INTO bolum SET bolum_adi = ?");
    $ekle = $sorgu->execute(array($bolum_adi));

    if ($ekle) {
        header('Location: ' . $url . '?url=bolum-ekle&islem=basarili');
    } else {
        header('Location: ' . $url . '?url=bolum-ekle&islem=basarisiz');
    }
}
