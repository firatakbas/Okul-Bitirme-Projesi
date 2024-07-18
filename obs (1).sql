-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 13 Tem 2024, 12:19:52
-- Sunucu sürümü: 8.2.0
-- PHP Sürümü: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `obs`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

DROP TABLE IF EXISTS `bolum`;
CREATE TABLE IF NOT EXISTS `bolum` (
  `bolum_id` int NOT NULL AUTO_INCREMENT,
  `bolum_adi` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`bolum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`bolum_id`, `bolum_adi`) VALUES
(1, 'Bilgisayar Programcılığı'),
(3, 'Grafik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders`
--

DROP TABLE IF EXISTS `ders`;
CREATE TABLE IF NOT EXISTS `ders` (
  `ders_id` int NOT NULL AUTO_INCREMENT,
  `ders_adi` varchar(50) COLLATE utf8mb3_turkish_ci NOT NULL,
  `bolum_id` int NOT NULL,
  `ogretmen_id` int NOT NULL,
  PRIMARY KEY (`ders_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `ders`
--

INSERT INTO `ders` (`ders_id`, `ders_adi`, `bolum_id`, `ogretmen_id`) VALUES
(1, 'İnternet Programcılığı I', 1, 2),
(2, 'İnternet Programcılığı II', 1, 2),
(3, 'Veri Yapıları Ve Algoritmalar', 1, 2),
(4, 'Programlama Temelleri', 1, 2),
(5, 'Sistem Analizi Ve Tasarımı', 1, 3),
(6, 'Görsel Programlama I', 1, 3),
(7, 'Görsel Programlama II', 1, 3),
(8, 'ASD', 3, 6),
(9, 'KYSFW', 3, 7),
(10, 'AAAA', 3, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

DROP TABLE IF EXISTS `ogrenci`;
CREATE TABLE IF NOT EXISTS `ogrenci` (
  `ogrenci_id` int NOT NULL AUTO_INCREMENT,
  `ogrenci_ad` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `ogrenci_soyad` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `ogrenci_no` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `ogrenci_sinif` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `ogrenci_cinsiyet` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `baslangic_yili` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `ogrenci_sifre` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `bolum_id` int NOT NULL,
  PRIMARY KEY (`ogrenci_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`ogrenci_id`, `ogrenci_ad`, `ogrenci_soyad`, `ogrenci_no`, `ogrenci_sinif`, `ogrenci_cinsiyet`, `baslangic_yili`, `ogrenci_sifre`, `bolum_id`) VALUES
(1, 'Muhammet', 'Akbaş', '123', '1.Sınıf', 'Erkek', '2024-06-10', '1', 1),
(2, 'Metecan', 'Başalır', '0123', '1.Sınıf', 'Erkek', '2024-06-10', '1', 1),
(3, 'Furkan', 'Altay', '12345', '1.Sınıf', 'Erkek', '2024-06-10', '1', 1),
(4, 'Caner', 'Aydın', '123456', '1.Sınıf', 'Erkek', '2024-06-10', '1', 1),
(5, 'Fahri Can', 'Arslan', '00124', '1.Sınıf', 'Erkek', '2024-06-10', '1', 1),
(6, 'Kemal', 'Uzun', '41', '4.Sınıf', 'Erkek', '2024-06-11', '123', 3),
(7, 'UZUZUN', 'DSIIF', '11', '1.Sınıf', 'Erkek', '2024-06-11', '4', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci_notlar`
--

DROP TABLE IF EXISTS `ogrenci_notlar`;
CREATE TABLE IF NOT EXISTS `ogrenci_notlar` (
  `ogrenci_id` int NOT NULL,
  `ders_id` int NOT NULL,
  `vize` int NOT NULL,
  `final` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `ogrenci_notlar`
--

INSERT INTO `ogrenci_notlar` (`ogrenci_id`, `ders_id`, `vize`, `final`) VALUES
(4, 1, 78, 49),
(5, 1, 100, 50),
(4, 2, 92, 50),
(5, 4, 100, 100),
(3, 1, 75, 100),
(4, 5, 45, 100),
(4, 6, 75, 78),
(4, 7, 45, 49),
(5, 7, 100, 95),
(4, 3, 65, 50),
(5, 2, 90, 49),
(4, 4, 100, 50),
(3, 2, 13, 12),
(6, 8, 100, 100),
(6, 9, 48, 100);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogretmen`
--

DROP TABLE IF EXISTS `ogretmen`;
CREATE TABLE IF NOT EXISTS `ogretmen` (
  `ogretmen_id` int NOT NULL AUTO_INCREMENT,
  `ogretmen_ad` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `ogretmen_soyad` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `ogretmen_numarasi` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `ogretmen_sifre` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `bolum_id` int NOT NULL,
  `ogretmen_cinsiyet` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `yetki` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`ogretmen_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `ogretmen`
--

INSERT INTO `ogretmen` (`ogretmen_id`, `ogretmen_ad`, `ogretmen_soyad`, `ogretmen_numarasi`, `ogretmen_sifre`, `bolum_id`, `ogretmen_cinsiyet`, `yetki`) VALUES
(1, 'Fırat', 'Akbaş', '002233', '123', 1, 'Erkek', 0),
(2, 'Mehmet Fatih', 'Karaca', '1123', '123', 1, 'Erkek', 1),
(3, 'Yasin', 'Ünal', '1234', '123', 1, 'Erkek', 1),
(6, 'MURAT', 'ASD', '12', '75', 3, 'Erkek', 1),
(7, 'uaıhsda', 'OHIOFHOB', '444', '1', 3, 'Kadın', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
