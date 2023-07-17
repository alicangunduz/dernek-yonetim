-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Tem 2023, 10:55:09
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dernek`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `kullanici_adi`, `sifre`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelir`
--

CREATE TABLE `gelir` (
  `id` int(11) NOT NULL,
  `gelir_id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `dekont_no` text NOT NULL,
  `miktar` int(11) NOT NULL,
  `gelir_turu` enum('Aidat','Burs','Bağış') NOT NULL,
  `aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gider`
--

CREATE TABLE `gider` (
  `id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `dekont_no` int(11) NOT NULL,
  `miktar` int(11) NOT NULL,
  `aciklama` varchar(255) NOT NULL,
  `createddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `gider`
--

INSERT INTO `gider` (`id`, `tarih`, `dekont_no`, `miktar`, `aciklama`, `createddate`) VALUES
(2, '2000-10-20', 234, 1000, 'Camcı', '2023-07-17 08:43:26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_ayarlar`
--

CREATE TABLE `site_ayarlar` (
  `id` int(11) NOT NULL,
  `tema_renk` enum('light','dark') NOT NULL,
  `dernek_adi` varchar(255) NOT NULL,
  `dernek_aciklama` varchar(255) NOT NULL,
  `logo_link` varchar(255) NOT NULL,
  `aidat_kac_gun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `site_ayarlar`
--

INSERT INTO `site_ayarlar` (`id`, `tema_renk`, `dernek_adi`, `dernek_aciklama`, `logo_link`, `aidat_kac_gun`) VALUES
(0, 'light', 'Atatürkçü Düşünce Derneği', 'ADD Aydin', 'http://www.vektorelcizim.net/uploads/file/images/ADD_Ataturkcu_Dusunce_Dernegi_Logo_9918_dikey.png', 30);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye_bilgi`
--

CREATE TABLE `uye_bilgi` (
  `id` int(11) NOT NULL,
  `ad` text NOT NULL,
  `soyad` text NOT NULL,
  `tckn` text NOT NULL,
  `tel` text NOT NULL,
  `uyelik_no` text NOT NULL,
  `baba_adi` text NOT NULL,
  `ana_adi` text NOT NULL,
  `uyruk` text NOT NULL,
  `dogum_yeri` text NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `tc_seri_no` text NOT NULL,
  `ikametgah_adresi` text NOT NULL,
  `meslek` text NOT NULL,
  `is_adresi` text NOT NULL,
  `ilk_uyelik_karar_no` text NOT NULL,
  `ilk_uyelik_karar_tarihi` date NOT NULL,
  `defter_kayit_sayfa_no` text NOT NULL,
  `uyelik_durumu` enum('Aktif','Pasif','Vefat','İhraç','İstifa') NOT NULL,
  `uyelik_ayrilis_tarihi` date NOT NULL,
  `uyelik_ayrilis_karar_tarihi` date NOT NULL,
  `ayrilis_karar_no` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `uye_bilgi`
--

INSERT INTO `uye_bilgi` (`id`, `ad`, `soyad`, `tckn`, `tel`, `uyelik_no`, `baba_adi`, `ana_adi`, `uyruk`, `dogum_yeri`, `dogum_tarihi`, `tc_seri_no`, `ikametgah_adresi`, `meslek`, `is_adresi`, `ilk_uyelik_karar_no`, `ilk_uyelik_karar_tarihi`, `defter_kayit_sayfa_no`, `uyelik_durumu`, `uyelik_ayrilis_tarihi`, `uyelik_ayrilis_karar_tarihi`, `ayrilis_karar_no`) VALUES
(3, 'Ali Can', '', '', '', '', '', '', '', '', '1970-01-01', '', '', '', '', '', '1970-01-01', '', 'Aktif', '0000-00-00', '0000-00-00', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gelir`
--
ALTER TABLE `gelir`
  ADD PRIMARY KEY (`gelir_id`);

--
-- Tablo için indeksler `gider`
--
ALTER TABLE `gider`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uye_bilgi`
--
ALTER TABLE `uye_bilgi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `gelir`
--
ALTER TABLE `gelir`
  MODIFY `gelir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `gider`
--
ALTER TABLE `gider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `uye_bilgi`
--
ALTER TABLE `uye_bilgi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
