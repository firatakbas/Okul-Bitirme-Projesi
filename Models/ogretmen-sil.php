<?php
include_once "baglan.php";
$ogretmen_id = $_GET["ogretmen_id"];

$OgretmenSil = $baglan->prepare("DELETE FROM ogretmen WHERE ogretmen_id = ?");
$OgretmenSil->execute(array($ogretmen_id));

if ($OgretmenSil) {
    header('Location: ' . $url . '?url=ogretmen-listele&islem=silmebasarili');
    exit;
}
