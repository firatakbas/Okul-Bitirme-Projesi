<?php
include_once "baglan.php";
$ogrenci_id = $_GET["ogrenci_id"];

$OgrenciSil = $baglan->prepare("DELETE FROM ogrenci WHERE ogrenci_id = ?");
$OgrenciSil->execute(array($ogrenci_id));

if ($OgrenciSil) {
    header('Location: ' . $url . '?url=ogrenci-listele&islem=silmebasarili');
    exit;
}
