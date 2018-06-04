-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Haz 2018, 20:47:12
-- Sunucu sürümü: 5.7.18-log
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `albatros`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme_data`
--

CREATE TABLE `odeme_data` (
  `id` int(11) NOT NULL,
  `aylar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_odeme` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_bilgisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `odeme_data`
--

INSERT INTO `odeme_data` (`id`, `aylar`, `date_odeme`, `o_bilgisi`, `student_FK`, `personel_FK`) VALUES
(47, 'NİSAN', '2018-04-16', 'Ödendi', 1, 23),
(48, 'OCAK', '2018-01-03', 'Ödendi', 1, 23),
(49, 'ŞUBAT', '2018-02-04', 'Ödendi', 1, 23),
(50, 'ŞUBAT', '2018-02-10', 'Ödendi', 1, 23),
(51, 'MART', '2018-03-07', 'Ödendi', 1, 23),
(52, 'MART', '2018-03-07', 'Ödendi', 1, 23),
(71, 'ŞUBAT', '2018-02-04', 'Ödendi', 2, 23),
(72, 'ŞUBAT', '2018-02-24', 'Ödendi', 2, 23),
(73, 'NİSAN', '2018-04-16', 'Ödendi', 2, 23),
(74, 'OCAK', '2018-01-03', 'Ödendi', 2, 23),
(75, 'ŞUBAT', '2018-02-04', 'Ödendi', 2, 23),
(76, 'ŞUBAT', '2018-02-10', 'Ödendi', 2, 23),
(99, 'NİSAN', '2018-04-18 00:00:00', 'Ödendi', 3, 23),
(100, 'NİSAN', '2018-04-30 00:00:00', 'Ödendi', 3, 23),
(101, 'HAZİRAN', '2018-06-03 02:30:00', 'Ödendi', 1, 23),
(102, 'HAZİRAN', '2018-06-05 00:00:00', 'Ödendi', 1, 23);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `odeme_data`
--
ALTER TABLE `odeme_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_FK` (`student_FK`),
  ADD KEY `personel_FK` (`personel_FK`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `odeme_data`
--
ALTER TABLE `odeme_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `odeme_data`
--
ALTER TABLE `odeme_data`
  ADD CONSTRAINT `odeme_data_ibfk_1` FOREIGN KEY (`student_FK`) REFERENCES `student` (`student_PK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `odeme_data_ibfk_2` FOREIGN KEY (`personel_FK`) REFERENCES `personel` (`personel_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
