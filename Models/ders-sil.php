<?php

include_once "baglan.php";

$id = $_GET["ders_id"];

$DersSil = $baglan->prepare("DELETE FROM ders WHERE ders_id = ?");
$DersSil->execute(array($id));

if ($DersSil) {
    header('Location: ' . $url . '?url=ders-listele&islem=silmebasarili');
    exit;
}
