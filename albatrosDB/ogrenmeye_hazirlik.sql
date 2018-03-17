-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Mar 2018, 09:03:38
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
-- Tablo için tablo yapısı `ogrenmeye_hazirlik`
--

CREATE TABLE `ogrenmeye_hazirlik` (
  `kazanım_o_id` int(11) NOT NULL,
  `kazanımlar_o` varchar(100) NOT NULL,
  `evet_o` varchar(250) NOT NULL DEFAULT 'Evet',
  `hayir_o` varchar(250) NOT NULL DEFAULT 'Hayır',
  `aciklama_o` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ogrenmeye_hazirlik`
--

INSERT INTO `ogrenmeye_hazirlik` (`kazanım_o_id`, `kazanımlar_o`, `evet_o`, `hayir_o`, `aciklama_o`) VALUES
(1, 'Metinde istenen şekli bulur.', 'Evet', 'Hayır', NULL),
(2, 'Benzer şekilleri eşleştirir.', 'Evet', 'Hayır', NULL),
(4, 'Farklı şekilleri ayırt eder.', 'Evet', 'Hayır', NULL),
(5, 'Sesin geldiği yönü bulur.', 'Evet', 'Hayır', NULL),
(6, 'Sesleri tanır.', 'Evet', 'Hayır', NULL),
(7, 'Aynı anda işitilen farklı seslerden birine odaklanır.', 'Evet', 'Hayır', NULL),
(8, 'Dokunduğu nesneyi tanır.', 'Evet', 'Hayır', NULL),
(9, 'Nesneleri duruş yönlerine göre eşleştirir.', 'Evet', 'Hayır', NULL),
(10, 'Nesneleri duruş yönlerine göre gruplar.', 'Evet', 'Hayır', NULL),
(11, 'Söyleniş sırasına göre yönergeleri uygular.', 'Evet', 'Hayır', NULL),
(12, 'Ritim tutar.', 'Evet', 'Hayır', NULL),
(13, 'Benzer sesler arasındaki farkı ayırt eder.', 'Evet', 'Hayır', NULL),
(14, 'Hecelerdeki ses sırasını ayırt eder.', 'Evet', 'Hayır', NULL),
(15, 'Sözcükleri doğru telaffuz eder.', 'Evet', 'Hayır', NULL),
(16, 'Vücudundan gelen uyaranları algılar.', 'Evet', 'Hayır', NULL),
(17, 'Vücudundan gelen uyaranlara uygun tepki verir.', 'Evet', 'Hayır', NULL),
(18, 'Yürütülen çalışma süresince dikkatini toplamaya özen gösterir.', 'Evet', 'Hayır', NULL),
(19, 'Konuşmayı dinlediğini uygun jest, mimik ve hareketlerle gösterir.', 'Evet', 'Hayır', NULL),
(20, 'Yönergeleri istenen sürede uygular.', 'Evet', 'Hayır', NULL),
(21, 'Sorular sorar.', 'Evet', 'Hayır', NULL),
(22, 'Bilgiyi gerektiğinde kullanır.', 'Evet', 'Hayır', NULL),
(23, 'Yapacağı çalışmayı planlar.', 'Evet', 'Hayır', NULL),
(24, 'Yaptığı çalışma planına uyar.', 'Evet', 'Hayır', NULL),
(25, 'Yaptığı çalışmanın, çalışma planına uygunluğunu kontrol eder.', 'Evet', 'Hayır', NULL),
(26, 'Başladığı çalışmayı tamamlar.', 'Evet', 'Hayır', NULL),
(27, 'Dinlediği veya okuduğu konuyla ilgili not tutar.', 'Evet', 'Hayır', NULL),
(28, 'Zamanını etkin kullanır.', 'Evet', 'Hayır', NULL),
(29, 'Bağımsız çalışma alışkanlığı edinir.', 'Evet', 'Hayır', NULL),
(30, 'Beden duruşuna göre yönleri ayırt eder.', 'Evet', 'Hayır', NULL),
(31, 'Yürüme ile koordinasyon sağlar.', 'Evet', 'Hayır', NULL),
(32, 'Yuvarlanma, takla atma, sürünmeyle koordinasyon sağlar.', 'Evet', 'Hayır', NULL),
(33, 'Kaldırma ve taşımalarla koordinasyon sağlar.', 'Evet', 'Hayır', NULL),
(34, 'Asılma ve sallanmalarla koordinasyon sağlar.', 'Evet', 'Hayır', NULL),
(35, 'El, göz koordinasyonu sağlar.', 'Evet', 'Hayır', NULL),
(36, 'Atma ve tutmalarla koordinasyon sağlar.', 'Evet', 'Hayır', NULL),
(37, 'El, parmak koordinasyonu sağlar.', 'Evet', 'Hayır', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ogrenmeye_hazirlik`
--
ALTER TABLE `ogrenmeye_hazirlik`
  ADD PRIMARY KEY (`kazanım_o_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ogrenmeye_hazirlik`
--
ALTER TABLE `ogrenmeye_hazirlik`
  MODIFY `kazanım_o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
