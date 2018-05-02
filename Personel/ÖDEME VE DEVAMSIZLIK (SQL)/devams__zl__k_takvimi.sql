-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 May 2018, 13:28:19
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
-- Tablo için tablo yapısı `devamsızlık_takvimi`
--

CREATE TABLE `devamsızlık_takvimi` (
  `id` int(11) NOT NULL,
  `tarih` date NOT NULL,
  `durum` varchar(255) NOT NULL,
  `aciklama_devam` varchar(255) NOT NULL,
  `student_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `devamsızlık_takvimi`
--

INSERT INTO `devamsızlık_takvimi` (`id`, `tarih`, `durum`, `aciklama_devam`, `student_FK`) VALUES
(1, '2018-02-07', 'Gelmedi', 'Hastalık', 1),
(2, '2018-03-22', 'Gelmedi', 'Şehir Dışında', 1),
(3, '2018-03-24', 'Gelmedi', 'Hastalık', 1),
(4, '2018-03-16', 'Gelmedi', 'İzinli', 1),
(16, '2018-01-01', 'Gelmedi', 'Yılbaşı', 1),
(17, '2018-05-01', 'Gelmedi', 'Hastalık', 1),
(18, '2018-03-14', 'Gelmedi', 'Resmi tatil', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `devamsızlık_takvimi`
--
ALTER TABLE `devamsızlık_takvimi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_FK` (`student_FK`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `devamsızlık_takvimi`
--
ALTER TABLE `devamsızlık_takvimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
