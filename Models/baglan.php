<?php
try {
    $baglan = new PDO("mysql:host=localhost;dbname=obs", "root", "");
    //echo "bağlantı kuruldu";
} catch (PDOException $e) {
    print $e->getMessage();
    //echo "bağlantı hatası";
}


session_start();
$url = "http://localhost/";
