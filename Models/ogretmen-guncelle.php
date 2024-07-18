<?php

include_once "./baglan.php";

$ogretmen_id = $_POST["ogretmen_id"];
$ogretmen_numarasi = $_POST["ogretmen_numarasi"];
// $bolum_id = $_POST["bolum_id"];

if (empty($ogretmen_id) || empty($ogretmen_numarasi)) {
    header('Location:' . $url . '?url=ogretmen-listele&islem=bos');
} else {
    $NumaraSorgula = $baglan->prepare("SELECT * FROM ogretmen WHERE ogretmen_numarasi = ?");
    $NumaraSorgula->execute(array($ogretmen_numarasi));

    if ($NumaraSorgula->rowCount() == 0) {
        $sorgu = $baglan->prepare("UPDATE ogretmen SET ogretmen_numarasi = ? WHERE ogretmen_id = ?");
        $guncelle = $sorgu->execute(array($ogretmen_numarasi, $ogretmen_id));

        if ($guncelle)
            header('Location: ' . $url . '?url=ogretmen-listele&islem=basarili');
        else
            header('Location: ' . $url . '?url=ogretmen-listele&islem=basarisiz');
    } else {
        header('Location: ' . $url . '?url=ogretmen-listele&islem=no_var');
    }
}
