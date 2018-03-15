-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Mar 2018, 20:45:03
-- Sunucu sürümü: 5.7.18-log
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kazanımlar`
--

CREATE TABLE `kazanımlar` (
  `kazanım_id` int(11) NOT NULL,
  `kazanım_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `evet` varchar(250) NOT NULL DEFAULT 'Evet',
  `hayır` varchar(250) NOT NULL DEFAULT 'Hayır',
  `acıklama` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kazanımlar`
--

INSERT INTO `kazanımlar` (`kazanım_id`, `kazanım_name`, `evet`, `hayır`, `acıklama`) VALUES
(1, 'Yazı araç-gereçlerini tanır.', 'Evet', 'Hayır', NULL),
(2, 'Yazı araç-gereçlerini kurallarına uygun kullanır.', 'Evet', 'Hayır', NULL),
(3, 'Temel çizgiler çizer', 'Evet', 'Hayır', NULL),
(4, 'Sesleri okur.', 'Evet', 'Hayır', NULL),
(5, 'Sesleri yazar.', 'Evet', 'Hayır', NULL),
(6, 'Heceleri okur.', 'Evet', 'Hayır', NULL),
(7, 'Heceleri yazar.', 'Evet', 'Hayır', NULL),
(8, 'Kelimeleri okur.', 'Evet', 'Hayır', NULL),
(9, 'Tümceleri okur.', 'Evet', 'Hayır', NULL),
(10, 'Tümceleri yazar.', 'Evet', 'Hayır', NULL),
(11, 'Metin okur.', 'Evet', 'Hayır', NULL),
(12, 'Metin yazar.', 'Evet', 'Hayır', NULL),
(13, 'Etkili okur.', 'Evet', 'Hayır', NULL),
(14, 'Okuduğu metinle ilgili neden-sonuç ilişkisi kurar', 'Evet', 'Hayır', NULL),
(15, 'Okuduğu metni anlar.', 'Evet', 'Hayır', NULL),
(16, 'Olaylar arasında neden-sonuç ilişkisi kurar.', 'Evet', 'Hayır', NULL),
(17, 'Okumaya istekli olur.', 'Evet', 'Hayır', NULL),
(18, 'Yazım kurallarına uyar.', 'Evet', 'Hayır', NULL),
(19, 'Noktalama işaretlerini yerinde kullanır.', 'Evet', 'Hayır', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kazanımlar`
--
ALTER TABLE `kazanımlar`
  ADD PRIMARY KEY (`kazanım_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kazanımlar`
--
ALTER TABLE `kazanımlar`
  MODIFY `kazanım_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
