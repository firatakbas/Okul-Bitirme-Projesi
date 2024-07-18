<?php

include_once "baglan.php";

echo $id = $_GET["bolum_id"];

$DersleriSil = $baglan->prepare("DELETE ders FROM ders INNER JOIN bolum ON ders.bolum_id = bolum.bolum_id WHERE ders.bolum_id = ? ");
$DersleriSil->execute(array($id));

$BolumSil = $baglan->prepare("DELETE FROM bolum WHERE bolum_id = ?");
$BolumSil->execute(array($id));

if ($DersleriSil and $BolumSil) {
    header('Location: ' . $url . '?url=bolum-listele&islem=silmebasarili');
    exit;
}
