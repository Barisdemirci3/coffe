-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Oca 2022, 15:09:48
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `caffe`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `isim` varchar(55) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hakkimizda` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `konum` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`isim`, `hakkimizda`, `mail`, `konum`, `tel`) VALUES
('Deneme', '', 'ccccc', 'aaaa', 'bbbbb'),
('Deneme', '', 'ccccc', 'aaaa', 'bbbbb'),
('Deneme', 'da', 'ccccc', 'aaaa', 'bbbbb');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunlistesi`
--

CREATE TABLE `urunlistesi` (
  `urun_id` int(11) NOT NULL,
  `urun_kategori` varchar(55) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_isim` varchar(55) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_fiyat` varchar(55) COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_resim` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_nick` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `uye_mail` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `uye_yetki` int(11) NOT NULL,
  `uye_sifre` varchar(128) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `urunlistesi`
--
ALTER TABLE `urunlistesi`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `urunlistesi`
--
ALTER TABLE `urunlistesi`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
