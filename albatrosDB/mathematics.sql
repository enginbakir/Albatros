-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Mar 2018, 09:24:03
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
-- Tablo için tablo yapısı `mathematics`
--

CREATE TABLE `mathematics` (
  `mathematic_id` int(2) NOT NULL,
  `mathematic` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `evet_m` varchar(250) NOT NULL DEFAULT 'Evet',
  `hayir_m` varchar(250) NOT NULL DEFAULT 'Hayır',
  `aciklama_m` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mathematics`
--

INSERT INTO `mathematics` (`mathematic_id`, `mathematic`, `evet_m`, `hayir_m`, `aciklama_m`) VALUES
(1, 'Uzamsal ilişkileri ifade etmek için uygun terim kullanır.', 'Evet', 'Hayır', NULL),
(2, 'İkişer ritmik sayar.', 'Evet', 'Hayır', NULL),
(3, 'Üçer ritmik sayar.', 'Evet', 'Hayır', NULL),
(4, 'Dörder ritmik sayar.', 'Evet', 'Hayır', NULL),
(5, 'Altışar ritmik sayar.', 'Evet', 'Hayır', NULL),
(6, 'Yedişer ritmik sayar.', 'Evet', 'Hayır', NULL),
(7, 'Sekizer ritmik sayar.', 'Evet', 'Hayır', NULL),
(8, 'Dokuzar ritmik sayar.', 'Evet', 'Hayır', NULL),
(9, 'İki basamaklı doğal sayıları ayırt eder.', 'Evet', 'Hayır', NULL),
(10, 'Üç ve daha fazla basamaklı doğal sayıları ayırt eder.', 'Evet', 'Hayır', NULL),
(11, 'Eldesiz toplama işlemi yapar.', 'Evet', 'Hayır', NULL),
(12, 'Eldeli toplama işlemi yapar.', 'Evet', 'Hayır', NULL),
(13, 'Onluk bozma gerektirmeyen çıkarma işlemi yapar.', 'Evet', 'Hayır', NULL),
(14, 'Onluk bozma gerektiren çıkarma işlemi yapar.', 'Evet', 'Hayır', NULL),
(15, 'Çıkarma işlemi yaparak problem çözer.', 'Evet', 'Hayır', NULL),
(16, 'Eldesiz çarpma işlemi yapar.', 'Evet', 'Hayır', NULL),
(17, 'Eldeli çarpma işlemi yapar.', 'Evet', 'Hayır', NULL),
(18, 'Kısa yoldan çarpma işlemi yapar.', 'Evet', 'Hayır', NULL),
(19, 'Çarpma işlemi yaparak problem çözer.', 'Evet', 'Hayır', NULL),
(20, 'Kalansız bölme işlemi yapar.', 'Evet', 'Hayır', NULL),
(21, 'Kalanlı bölme işlemi yapar.', 'Evet', 'Hayır', NULL),
(22, 'Kısa yoldan bölme işlemi yapar.', 'Evet', 'Hayır', NULL),
(23, 'Bölme işlemi yaparak problem çözer.', 'Evet', 'Hayır', NULL),
(24, 'Dört işlem yaparak problem çözer.', 'Evet', 'Hayır', NULL),
(25, 'Kesirlerle ilgili problem çözer.', 'Evet', 'Hayır', NULL),
(26, 'Uzunluk ölçüleri arasında işlem yapar.', 'Evet', 'Hayır', NULL),
(27, 'Sıvı ölçüleri arasında işlem yapar.', 'Evet', 'Hayır', NULL),
(28, 'Kütle ölçüleri arasında işlem yapar.', 'Evet', 'Hayır', NULL),
(29, 'Değer ölçüleri arasında işlem yapar.', 'Evet', 'Hayır', NULL),
(30, 'Zaman ölçüleri arasında işlem yapar.', 'Evet', 'Hayır', NULL),
(31, 'Geometrik şekiller arasında ilişki kurar.', 'Evet', 'Hayır', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `mathematics`
--
ALTER TABLE `mathematics`
  ADD PRIMARY KEY (`mathematic_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
