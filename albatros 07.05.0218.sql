-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 May 2018, 06:52:54
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 7.1.1

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
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_PK` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_PK`, `name`, `surname`, `email`) VALUES
(1, 'engin', 'bakir', 'enginbakir1311@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_log`
--

CREATE TABLE `admin_log` (
  `AdminLog_PK` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `was_time_out` time NOT NULL,
  `userAdmin_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_user`
--

CREATE TABLE `admin_user` (
  `userAdmin_PK` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin_user`
--

INSERT INTO `admin_user` (`userAdmin_PK`, `username`, `password`, `admin_FK`) VALUES
(1, 'engin', 'bakir', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `attendance_type`
--

CREATE TABLE `attendance_type` (
  `attendance_type_PK` int(11) NOT NULL,
  `attendance_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bepform`
--

CREATE TABLE `bepform` (
  `bep_PK` int(11) NOT NULL,
  `evaluation_date` date NOT NULL,
  `student_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `bepform`
--

INSERT INTO `bepform` (`bep_PK`, `evaluation_date`, `student_FK`) VALUES
(1, '0000-00-00', 13),
(2, '2018-05-16', 15),
(3, '2018-05-14', 15),
(4, '2018-05-22', 13),
(5, '2018-05-13', 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bepform_and_lesson`
--

CREATE TABLE `bepform_and_lesson` (
  `bepform_and_lesson_PK` int(11) NOT NULL,
  `lesson_FK` int(11) NOT NULL,
  `bepform_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `bepform_and_lesson`
--

INSERT INTO `bepform_and_lesson` (`bepform_and_lesson_PK`, `lesson_FK`, `bepform_FK`) VALUES
(1, 5, 1),
(3, 5, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bepform_and_personel`
--

CREATE TABLE `bepform_and_personel` (
  `bepform_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `degree_of_proximity`
--

CREATE TABLE `degree_of_proximity` (
  `DofP_PK` int(11) NOT NULL,
  `DofP_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `degree_of_proximity`
--

INSERT INTO `degree_of_proximity` (`DofP_PK`, `DofP_type`) VALUES
(1, 'MOTHER'),
(2, 'FATHER'),
(3, 'OTHER');

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
(18, '2018-03-14', 'Gelmedi', 'Resmi tatil', 1),
(23, '2018-05-01', 'Gelmedi', 'ŞehirDışında', 1),
(24, '2018-05-09', 'Gelmedi', 'Hasta', 13),
(25, '2018-05-07', 'Geldi', '', 13),
(26, '2018-05-08', 'Gelmedi', 'Düğünü var gelmedi', 1),
(27, '0000-00-00', 'Gelmedi', '', 1),
(28, '2018-05-01', 'Gelmedi', 'Düğünü Var Gelmedi', 13),
(29, '0000-00-00', 'Gelmedi', '', 15),
(49, '2018-05-03', 'Gelmedi', '', 13),
(50, '2018-05-09', 'Gelmedi', '', 15),
(51, '2018-05-16', 'Gelmedi', '', 15),
(52, '2018-05-10', 'Gelmedi', 'awdaw', 15),
(53, '2018-05-15', 'Gelmedi', 'açıklama', 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `educational_diagnosis`
--

CREATE TABLE `educational_diagnosis` (
  `diagnosis_PK` int(11) NOT NULL,
  `diagnosis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `educational_diagnosis`
--

INSERT INTO `educational_diagnosis` (`diagnosis_PK`, `diagnosis`) VALUES
(1, 'Hafif Düzey Zihinsel Yetersizlik (HDZY)'),
(2, 'Orta Düzey Zihinsel Yetersizlik (ODZY)'),
(3, 'Ağır Düzey Zihinsel Yetersizlik (ADZY)'),
(4, 'Çok Ağır Düzey Zihinsel Yetersizlik (CADZY)'),
(5, 'Bedensel Yetersizlik'),
(6, 'Görme Yetersizliği'),
(7, 'Duygusal Davranış Bozukluğu (DDB)'),
(8, 'Yaygın Gelişimsel Bozukluk (OTİZM)'),
(9, 'Özel Öğrenme Güçlüğü (ÖÖG)'),
(10, 'Dikkat Eksikliği ve Hiperaktivite Bozukluğu (DEHB)'),
(11, 'Dil Konuşma Güçlüğü (DKG)'),
(12, 'Üstün Yetenekli Birey (ÜYB)'),
(13, 'İşitme Yetersizliği'),
(14, 'Normal');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'All Day Event', '#40E0D0', '2016-01-01 00:00:00', '0000-00-00 00:00:00'),
(2, 'Long Event', '#FF0000', '2016-01-07 00:00:00', '2016-01-10 00:00:00'),
(3, 'Repeating Event', '#0071c5', '2016-01-09 16:00:00', '0000-00-00 00:00:00'),
(4, 'Conference', '#40E0D0', '2016-01-11 00:00:00', '2016-01-13 00:00:00'),
(5, 'Meeting', '#000', '2016-01-12 10:30:00', '2016-01-12 12:30:00'),
(6, 'Lunch', '#0071c5', '2016-01-12 12:00:00', '0000-00-00 00:00:00'),
(7, 'Happy Hour', '#0071c5', '2016-01-12 17:30:00', '0000-00-00 00:00:00'),
(8, 'Dinner', '#0071c5', '2016-01-12 20:00:00', '0000-00-00 00:00:00'),
(9, 'Birthday Party', '#FFD700', '2016-01-14 07:00:00', '2016-01-14 07:00:00'),
(10, 'Double click to change', '#008000', '2016-01-28 00:00:00', '0000-00-00 00:00:00'),
(15, 'ENGİN BAKIR- adwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwaddddddddddddddddddddddd', '#40E0D0', '2018-05-02 11:30:00', '2018-05-02 11:30:00'),
(20, 'awd', '#FF8C00', '2018-05-02 00:00:00', '2018-05-03 00:00:00'),
(21, '', '#40E0D0', '2018-04-29 07:30:00', '2018-04-29 07:30:00'),
(22, 'ENGİN BAKIR', '#FF0000', '2018-04-28 00:00:00', '2018-04-29 00:00:00'),
(23, 'awdawdawdaw', '#000', '2018-05-09 08:30:00', '2018-05-09 08:30:00'),
(24, 'yeni not', '#008000', '2018-05-02 08:00:00', '2018-05-02 08:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gender`
--

CREATE TABLE `gender` (
  `gender_PK` int(11) NOT NULL,
  `gender_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gender`
--

INSERT INTO `gender` (`gender_PK`, `gender_type`) VALUES
(1, 'FEMALE'),
(2, 'MALE');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kd_matematik`
--

CREATE TABLE `kd_matematik` (
  `m_ID` int(2) NOT NULL,
  `m_kazanımlar` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `m_evet` varchar(250) NOT NULL DEFAULT 'Evet',
  `m_hayir` varchar(250) NOT NULL DEFAULT 'Hayır',
  `m_aciklama` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kd_matematik`
--

INSERT INTO `kd_matematik` (`m_ID`, `m_kazanımlar`, `m_evet`, `m_hayir`, `m_aciklama`) VALUES
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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kd_ogrenmeyehazirlik`
--

CREATE TABLE `kd_ogrenmeyehazirlik` (
  `oH_ID` int(11) NOT NULL,
  `oH_kazanimlar` varchar(100) NOT NULL,
  `oH_evet` varchar(250) NOT NULL DEFAULT 'Evet',
  `oH_hayir` varchar(250) NOT NULL DEFAULT 'Hayır',
  `oH_aciklama` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kd_ogrenmeyehazirlik`
--

INSERT INTO `kd_ogrenmeyehazirlik` (`oH_ID`, `oH_kazanimlar`, `oH_evet`, `oH_hayir`, `oH_aciklama`) VALUES
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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kd_okumayazma`
--

CREATE TABLE `kd_okumayazma` (
  `oY_ID` int(11) NOT NULL,
  `oY_kazanimlar` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `oY_evet` varchar(250) NOT NULL DEFAULT 'Evet',
  `oY_hayir` varchar(250) NOT NULL DEFAULT 'Hayır',
  `oY_aciklama` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kd_okumayazma`
--

INSERT INTO `kd_okumayazma` (`oY_ID`, `oY_kazanimlar`, `oY_evet`, `oY_hayir`, `oY_aciklama`) VALUES
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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lessons`
--

CREATE TABLE `lessons` (
  `lessons_PK` int(11) NOT NULL,
  `lesson_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `lesson_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `lessons`
--

INSERT INTO `lessons` (`lessons_PK`, `lesson_name`, `lesson_type`) VALUES
(1, 'BİLİŞSEL BECERİLER', 0),
(2, 'DİL VE KONUŞMA BECERİLERİ', 0),
(3, 'OKUMA YAZMA/TÜRKÇE', 0),
(4, 'PSİKOMOTOR BECERİLER', 0),
(5, 'MATEMATİK', 0),
(6, 'ÖZ BAKIM', 0),
(7, 'HAYAT BİLGİSİ/SOSYAL BİLGİLER', 0),
(8, 'SOSYAL BECERİLER', 0),
(9, 'BİLİŞSEL BECERİLER', 1),
(10, 'DİL VE KONUŞMA BECERİLERİ', 1),
(11, 'OKUMA YAZMA/TÜRKÇE', 1),
(12, 'PSİKOMOTOR BECERİLER', 1),
(13, 'MATEMATİK', 1),
(14, 'ÖZ BAKIM', 1),
(15, 'HAYAT BİLGİSİ/SOSYAL BİLGİLER', 1),
(16, 'SOSYAL BECERİLER', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lesson_event`
--

CREATE TABLE `lesson_event` (
  `lesson_event_PK` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL,
  `lesson_FK` int(11) NOT NULL,
  `attendance_type_FK` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `lesson_event`
--

INSERT INTO `lesson_event` (`lesson_event_PK`, `student_FK`, `personel_FK`, `lesson_FK`, `attendance_type_FK`, `date`) VALUES
(1, 13, 23, 5, 13, '2018-05-23 00:00:00'),
(2, 13, 23, 3, 0, '2018-05-15 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notes`
--

CREATE TABLE `notes` (
  `note_PK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `notes`
--

INSERT INTO `notes` (`note_PK`, `personel_FK`, `student_FK`, `note`, `tarih`) VALUES
(1, 1, 4, 'engininin notu', '2018-04-10'),
(2, 1, 4, 'engininin 2. notu', '2018-04-26'),
(3, 2, 5, 'şeymanın notu', '2018-04-10'),
(4, 2, 5, 'şeymanın ikinci notu', '2018-04-01'),
(5, 2, 9, 'mervenin nazmiyeden notu', '2018-04-11'),
(6, 1, 9, 'mervenin atıftan notu', '2018-04-28'),
(7, 2, 4, 'enginin nazmiyeden notu', '2018-04-26'),
(8, 3, 12, 'awdawd', '2018-05-01'),
(9, 23, 13, 'şeymanin notu', '2018-05-17'),
(10, 24, 13, 'şeymanın diğer notu', '2018-05-08'),
(11, 23, 13, 'şeymanın diğer notu ', '2018-05-09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme_bilgileri`
--

CREATE TABLE `odeme_bilgileri` (
  `id_aylar` int(11) NOT NULL,
  `aylar` varchar(255) NOT NULL,
  `ödeme` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `odeme_bilgileri`
--

INSERT INTO `odeme_bilgileri` (`id_aylar`, `aylar`, `ödeme`, `student_FK`) VALUES
(1, 'OCAK', 1, 1),
(2, 'ŞUBAT', 1, 1),
(3, 'MART', 0, 1),
(4, 'NİSAN', 1, 1),
(5, 'MAYIS', 0, 1),
(6, 'HAZİRAN', 1, 1),
(7, 'TEMMUZ', 0, 1),
(8, 'AĞUSTOS', 1, 1),
(9, 'EYLÜL', 1, 1),
(10, 'EKİM', 1, 1),
(11, 'KASIM', 0, 1),
(12, 'ARALIK', 1, 1),
(38, 'OCAK', 0, 13),
(39, 'ŞUBAT', 1, 13),
(40, 'MART', 0, 13),
(41, 'NİSAN', 1, 13),
(42, 'MAYIS', 0, 13),
(43, 'HAZİRAN', 1, 13),
(44, 'TEMMUZ', 0, 13),
(45, 'AĞUSTOS', 1, 13),
(46, 'EYLÜL', 1, 13),
(47, 'EKİM', 1, 13),
(48, 'KASIM', 0, 13),
(49, 'ARALIK', 1, 13);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `parent`
--

CREATE TABLE `parent` (
  `parent_PK` int(11) NOT NULL,
  `tel_no` bigint(11) NOT NULL,
  `sabit_tel` bigint(11) NOT NULL,
  `tc_no` bigint(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `work_adress` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `email_adress` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `degree_of_proximity_FK` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `parent`
--

INSERT INTO `parent` (`parent_PK`, `tel_no`, `sabit_tel`, `tc_no`, `name`, `surname`, `adress`, `work_adress`, `description`, `email_adress`, `degree_of_proximity_FK`, `student_FK`) VALUES
(76, 3464562, 52423, 10819613032, 'Hatice', 'tunçel', 'Ankara', 'çankaya', '', 'enginbakir1311@gmail.com', 1, 12),
(77, 12312, 15324, 10819613032, 'mustafa', 'yiğit', 'Niğde', 'Niğde', '', '1235123', 1, 13),
(78, 0, 0, 0, 'Edanın Velisi', 'Edanın Velisi', '', '', '', '', 1, 14),
(79, 6512312, 51231, 10819613032, 'İsmail', 'Bakır', 'Ankara', 'Çankaya', 'açıklama', 'enginbakir1311@gmail.com', 2, 15),
(80, 0, 0, 0, 'Engin', 'Engin Bakırın Velisinin Soyadı', '', '', '', '', 1, 16);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `parent_log`
--

CREATE TABLE `parent_log` (
  `ParentLog_PK` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `was_time_out` time NOT NULL,
  `userParent_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `parent_user`
--

CREATE TABLE `parent_user` (
  `userParent_PK` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `parent_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE `personel` (
  `personel_PK` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `registration_date` date NOT NULL,
  `deletion_date` date NOT NULL,
  `email_address` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tel_no` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `status` int(2) NOT NULL,
  `personel_type_FK` int(11) NOT NULL,
  `gender_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`personel_PK`, `name`, `surname`, `registration_date`, `deletion_date`, `email_address`, `tel_no`, `photo`, `status`, `personel_type_FK`, `gender_FK`) VALUES
(23, 'Nazmiye', 'Hanım', '2018-05-05', '2018-05-29', 'enginbakir1311@gmail.com', 2345234, '../images/wallhaven-118071.png', 1, 3, 2),
(24, 'Atıf', 'Tokar', '2018-05-05', '2018-05-05', 'enginbakir1311@gmail.com', 23423432, '../images/wallhaven-37426.jpg', 0, 2, 2),
(25, 'Personel Adı', 'Personel Soyadı', '2018-05-06', '2018-05-22', 'enginbakir1311@gmail.com', 251231, '../images/wallhaven-511071.jpg', 1, 3, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel_log`
--

CREATE TABLE `personel_log` (
  `PersonelLog_PK` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `was_time_out` time NOT NULL,
  `userPersonel_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel_types`
--

CREATE TABLE `personel_types` (
  `personel_type_PK` int(11) NOT NULL,
  `personel_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `personel_types`
--

INSERT INTO `personel_types` (`personel_type_PK`, `personel_type`) VALUES
(1, 'OKUL MÜDÜRÜ'),
(2, 'MÜDÜR YARDIMCISI'),
(3, 'SINIF ÖĞRETMENİ'),
(4, 'REHBER ÖĞRETMENİ'),
(5, 'ÖZEL EĞİTİM ÖĞRETMENİ'),
(6, 'TÜRKÇE ÖĞRETMENİ'),
(7, 'MATEMATİK ÖĞRETMENİ'),
(8, 'FEN BİLİMLERİ ÖĞRETMENİ'),
(9, 'SOSYAL BİLGİLER ÖĞRETMENİ'),
(10, 'MÜZİK ÖĞRETMENİ'),
(11, 'DİĞER');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel_user`
--

CREATE TABLE `personel_user` (
  `userPersonel_PK` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `personel_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `personel_user`
--

INSERT INTO `personel_user` (`userPersonel_PK`, `username`, `password`, `personel_FK`) VALUES
(1, 'personel', 'personel', 23);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE `student` (
  `student_PK` int(11) NOT NULL,
  `tc_no` bigint(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `class` int(11) NOT NULL,
  `rapor_no` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `photo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `registration_date` date NOT NULL,
  `deletion_date` date NOT NULL,
  `rehberlik_merkezi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `term_start_date` date NOT NULL,
  `term_finish_date` date NOT NULL,
  `status` int(2) NOT NULL,
  `gender_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`student_PK`, `tc_no`, `name`, `surname`, `class`, `rapor_no`, `birthday`, `photo`, `registration_date`, `deletion_date`, `rehberlik_merkezi`, `term_start_date`, `term_finish_date`, `status`, `gender_FK`, `personel_FK`) VALUES
(12, 10819613032, 'Mervewewa', 'Tunçelee', 2, 23122, '2018-05-25', '../images/wallhaven-511072.png', '2018-05-04', '2018-05-04', 'Mervenin Rehberlik Mewew', '2018-05-01', '2018-05-15', 0, 2, 1),
(13, 10819613032, 'hatice şeyma', 'yiğit', 1, 12, '2018-05-30', '../images/wallhaven-37426.jpg', '2018-05-04', '2018-05-05', 'rehberlik araştırma merkezi', '2018-05-02', '2018-05-31', 0, 2, 23),
(14, 0, 'Eda', 'Kara', 0, 0, '0000-00-00', '../images/avatar5.png', '2018-05-05', '2018-05-05', '', '2018-05-16', '2018-05-17', 0, 2, 24),
(15, 10819613032, 'Engin', 'Bakır', 1, 41, '2018-05-23', '../images/avatar5.png', '2018-05-05', '2018-05-06', 'rehberlik araştırma merkezi', '2018-05-03', '2018-05-31', 0, 2, 23),
(16, 10819613032, 'Ahmet', 'Takan', 1, 12, '2018-05-31', '../images/wallhaven-118071.png', '2018-05-06', '0000-00-00', 'ne yazsam bilemedim', '2018-05-17', '2018-05-31', 1, 2, 23);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student_attendance`
--

CREATE TABLE `student_attendance` (
  `student_FK` int(11) NOT NULL,
  `attendance_PK` int(11) NOT NULL,
  `date` date NOT NULL,
  `lesson_event_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student_diagnosis`
--

CREATE TABLE `student_diagnosis` (
  `id` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL,
  `diagnosis_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `student_diagnosis`
--

INSERT INTO `student_diagnosis` (`id`, `student_FK`, `diagnosis_FK`) VALUES
(416, 12, 0),
(417, 14, 3),
(418, 14, 5),
(419, 15, 1),
(420, 15, 3),
(421, 15, 4),
(422, 15, 6),
(425, 13, 0),
(430, 16, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student_transportation`
--

CREATE TABLE `student_transportation` (
  `student_FK` int(11) NOT NULL,
  `transportation_FK` int(11) NOT NULL,
  `degree_of_proximity_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transportation`
--

CREATE TABLE `transportation` (
  `transportation_PK` int(11) NOT NULL,
  `transportation_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `transportation`
--

INSERT INTO `transportation` (`transportation_PK`, `transportation_type`) VALUES
(1, 'Servis'),
(2, 'Veli');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_PK`);

--
-- Tablo için indeksler `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`AdminLog_PK`),
  ADD KEY `userAdmin_FK` (`userAdmin_FK`);

--
-- Tablo için indeksler `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`userAdmin_PK`),
  ADD KEY `admin_FK` (`admin_FK`);

--
-- Tablo için indeksler `attendance_type`
--
ALTER TABLE `attendance_type`
  ADD PRIMARY KEY (`attendance_type_PK`);

--
-- Tablo için indeksler `bepform`
--
ALTER TABLE `bepform`
  ADD PRIMARY KEY (`bep_PK`),
  ADD KEY `student_FK` (`student_FK`);

--
-- Tablo için indeksler `bepform_and_lesson`
--
ALTER TABLE `bepform_and_lesson`
  ADD PRIMARY KEY (`bepform_and_lesson_PK`),
  ADD KEY `lesson_FK` (`lesson_FK`),
  ADD KEY `bepform_FK` (`bepform_FK`);

--
-- Tablo için indeksler `bepform_and_personel`
--
ALTER TABLE `bepform_and_personel`
  ADD KEY `bepform_lesson_and_personel_FK` (`bepform_FK`),
  ADD KEY `personel_FK` (`personel_FK`);

--
-- Tablo için indeksler `degree_of_proximity`
--
ALTER TABLE `degree_of_proximity`
  ADD PRIMARY KEY (`DofP_PK`);

--
-- Tablo için indeksler `devamsızlık_takvimi`
--
ALTER TABLE `devamsızlık_takvimi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_FK` (`student_FK`);

--
-- Tablo için indeksler `educational_diagnosis`
--
ALTER TABLE `educational_diagnosis`
  ADD PRIMARY KEY (`diagnosis_PK`);

--
-- Tablo için indeksler `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_PK`);

--
-- Tablo için indeksler `kd_matematik`
--
ALTER TABLE `kd_matematik`
  ADD PRIMARY KEY (`m_ID`);

--
-- Tablo için indeksler `kd_ogrenmeyehazirlik`
--
ALTER TABLE `kd_ogrenmeyehazirlik`
  ADD PRIMARY KEY (`oH_ID`);

--
-- Tablo için indeksler `kd_okumayazma`
--
ALTER TABLE `kd_okumayazma`
  ADD PRIMARY KEY (`oY_ID`);

--
-- Tablo için indeksler `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lessons_PK`);

--
-- Tablo için indeksler `lesson_event`
--
ALTER TABLE `lesson_event`
  ADD PRIMARY KEY (`lesson_event_PK`),
  ADD KEY `student_FK` (`student_FK`),
  ADD KEY `personel_FK` (`personel_FK`),
  ADD KEY `lesson_FK` (`lesson_FK`),
  ADD KEY `attendance_type_FK` (`attendance_type_FK`);

--
-- Tablo için indeksler `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_PK`);

--
-- Tablo için indeksler `odeme_bilgileri`
--
ALTER TABLE `odeme_bilgileri`
  ADD PRIMARY KEY (`id_aylar`);

--
-- Tablo için indeksler `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_PK`),
  ADD KEY `degree_of_proximity_FK` (`degree_of_proximity_FK`),
  ADD KEY `student_FK` (`student_FK`);

--
-- Tablo için indeksler `parent_log`
--
ALTER TABLE `parent_log`
  ADD PRIMARY KEY (`ParentLog_PK`),
  ADD KEY `userParent_FK` (`userParent_FK`);

--
-- Tablo için indeksler `parent_user`
--
ALTER TABLE `parent_user`
  ADD PRIMARY KEY (`userParent_PK`),
  ADD KEY `parent_FK` (`parent_FK`);

--
-- Tablo için indeksler `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`personel_PK`),
  ADD KEY `personel_type_FK` (`personel_type_FK`),
  ADD KEY `gender_FK` (`gender_FK`);

--
-- Tablo için indeksler `personel_log`
--
ALTER TABLE `personel_log`
  ADD PRIMARY KEY (`PersonelLog_PK`),
  ADD KEY `userPersonel_FK` (`userPersonel_FK`);

--
-- Tablo için indeksler `personel_types`
--
ALTER TABLE `personel_types`
  ADD PRIMARY KEY (`personel_type_PK`);

--
-- Tablo için indeksler `personel_user`
--
ALTER TABLE `personel_user`
  ADD PRIMARY KEY (`userPersonel_PK`),
  ADD KEY `personel_FK` (`personel_FK`);

--
-- Tablo için indeksler `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_PK`);

--
-- Tablo için indeksler `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`attendance_PK`),
  ADD KEY `lesson_event_FK` (`lesson_event_FK`);

--
-- Tablo için indeksler `student_diagnosis`
--
ALTER TABLE `student_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_FK` (`student_FK`),
  ADD KEY `diagnosis_FK` (`diagnosis_FK`);

--
-- Tablo için indeksler `student_transportation`
--
ALTER TABLE `student_transportation`
  ADD KEY `student_FK` (`student_FK`),
  ADD KEY `transportation_FK` (`transportation_FK`),
  ADD KEY `degree_of_proximity_FK` (`degree_of_proximity_FK`);

--
-- Tablo için indeksler `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`transportation_PK`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `AdminLog_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `userAdmin_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `attendance_type`
--
ALTER TABLE `attendance_type`
  MODIFY `attendance_type_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `bepform`
--
ALTER TABLE `bepform`
  MODIFY `bep_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `bepform_and_lesson`
--
ALTER TABLE `bepform_and_lesson`
  MODIFY `bepform_and_lesson_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `degree_of_proximity`
--
ALTER TABLE `degree_of_proximity`
  MODIFY `DofP_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `devamsızlık_takvimi`
--
ALTER TABLE `devamsızlık_takvimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Tablo için AUTO_INCREMENT değeri `educational_diagnosis`
--
ALTER TABLE `educational_diagnosis`
  MODIFY `diagnosis_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Tablo için AUTO_INCREMENT değeri `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `kd_ogrenmeyehazirlik`
--
ALTER TABLE `kd_ogrenmeyehazirlik`
  MODIFY `oH_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Tablo için AUTO_INCREMENT değeri `kd_okumayazma`
--
ALTER TABLE `kd_okumayazma`
  MODIFY `oY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessons_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `lesson_event`
--
ALTER TABLE `lesson_event`
  MODIFY `lesson_event_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `notes`
--
ALTER TABLE `notes`
  MODIFY `note_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `odeme_bilgileri`
--
ALTER TABLE `odeme_bilgileri`
  MODIFY `id_aylar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- Tablo için AUTO_INCREMENT değeri `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- Tablo için AUTO_INCREMENT değeri `parent_log`
--
ALTER TABLE `parent_log`
  MODIFY `ParentLog_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `parent_user`
--
ALTER TABLE `parent_user`
  MODIFY `userParent_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `personel`
--
ALTER TABLE `personel`
  MODIFY `personel_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Tablo için AUTO_INCREMENT değeri `personel_log`
--
ALTER TABLE `personel_log`
  MODIFY `PersonelLog_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `personel_types`
--
ALTER TABLE `personel_types`
  MODIFY `personel_type_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `personel_user`
--
ALTER TABLE `personel_user`
  MODIFY `userPersonel_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `student`
--
ALTER TABLE `student`
  MODIFY `student_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `student_diagnosis`
--
ALTER TABLE `student_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;
--
-- Tablo için AUTO_INCREMENT değeri `transportation`
--
ALTER TABLE `transportation`
  MODIFY `transportation_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `admin_log`
--
ALTER TABLE `admin_log`
  ADD CONSTRAINT `admin_log_ibfk_1` FOREIGN KEY (`userAdmin_FK`) REFERENCES `admin_user` (`userAdmin_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `admin_user`
--
ALTER TABLE `admin_user`
  ADD CONSTRAINT `admin_user_ibfk_1` FOREIGN KEY (`admin_FK`) REFERENCES `admin` (`admin_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `bepform_and_lesson`
--
ALTER TABLE `bepform_and_lesson`
  ADD CONSTRAINT `bepform_and_lesson_ibfk_1` FOREIGN KEY (`bepform_FK`) REFERENCES `bepform` (`bep_PK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bepform_and_lesson_ibfk_2` FOREIGN KEY (`lesson_FK`) REFERENCES `lessons` (`lessons_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `bepform_and_personel`
--
ALTER TABLE `bepform_and_personel`
  ADD CONSTRAINT `bepform_and_personel_ibfk_1` FOREIGN KEY (`bepform_FK`) REFERENCES `bepform` (`bep_PK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bepform_and_personel_ibfk_2` FOREIGN KEY (`personel_FK`) REFERENCES `personel` (`personel_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `parent_log`
--
ALTER TABLE `parent_log`
  ADD CONSTRAINT `parent_log_ibfk_1` FOREIGN KEY (`userParent_FK`) REFERENCES `parent_user` (`userParent_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `parent_user`
--
ALTER TABLE `parent_user`
  ADD CONSTRAINT `parent_user_ibfk_1` FOREIGN KEY (`parent_FK`) REFERENCES `parent` (`parent_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `personel_log`
--
ALTER TABLE `personel_log`
  ADD CONSTRAINT `personel_log_ibfk_1` FOREIGN KEY (`userPersonel_FK`) REFERENCES `personel_user` (`userPersonel_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `personel_user`
--
ALTER TABLE `personel_user`
  ADD CONSTRAINT `personel_user_ibfk_1` FOREIGN KEY (`personel_FK`) REFERENCES `personel` (`personel_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
