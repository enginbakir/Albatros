-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 19 Haz 2018, 07:42:21
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

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
(1, 'Atıf', 'Tokar', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin_log`
--

CREATE TABLE `admin_log` (
  `AdminLog_PK` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `userAdmin_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin_log`
--

INSERT INTO `admin_log` (`AdminLog_PK`, `login_time`, `logout_time`, `userAdmin_FK`) VALUES
(32, '2018-06-09 11:53:56', '2018-06-09 12:44:50', 1),
(33, '2018-06-09 17:00:23', '2018-06-09 17:06:39', 1);

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
(1, 'c741c538c26b1430e074d07ec6c91474', '4037ecb043f44ae22c4b50a149e392ad', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `altkazanimlar_matematik`
--

CREATE TABLE `altkazanimlar_matematik` (
  `altkazanimlar_matematik_PK` int(11) NOT NULL,
  `bildirim` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kazanimlar_FK` int(11) NOT NULL,
  `lesson_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `altkazanimlar_matematik`
--

INSERT INTO `altkazanimlar_matematik` (`altkazanimlar_matematik_PK`, `bildirim`, `kazanimlar_FK`, `lesson_FK`) VALUES
(1, 'İki ve daha fazla işlem kullanarak 10\'a kadar olan doğal sayılarla problem çözer.', 25, 5),
(2, 'İki ve daha fazla işlem kullanarak 100\'e kadar olan doğal sayılarla problem çözer.', 25, 5),
(3, 'İki ve daha fazla işlem kullanarak 1000\'e kadar olan doğal sayılarla problem çözer.', 25, 5),
(4, 'İki ve daha fazla işlem kullanarak 1000\'den fazla doğal sayılarla problem çözer.', 25, 5),
(5, 'Nesneleri bütün, yarım ve çeyrek olma durumuna göre ayırt eder.', 25, 5),
(6, 'İki varlık arasından bütün olanı gösterir.', 25, 5),
(7, 'İki resim kartından bütünü ifade eden resim kartını gösterir.', 25, 5),
(8, 'İki resim kartından bütünü ifade eden resim kartını gösterir.', 25, 5),
(9, 'İki varlık arasından yarım olanı gösterir.', 25, 5),
(10, 'İki resim kartından yarımı ifade eden resim kartını gösterir.', 25, 5),
(11, 'İki varlık arasından çeyrek olanı gösterir.', 25, 5),
(12, 'İki resim kartından çeyreği ifade eden resim kartını gösterir.', 25, 5),
(13, 'Bir bütünün üzerinde, istenilen kesir kadarını tarayarak gösterir.', 25, 5),
(14, 'Bir bütünün taranmış kısmını gösteren kesri, verilen kesirler arasından işaretler.', 25, 5),
(15, 'Bölünmüş bir bütünün belirtilen kesrini gösteren sayıyı yazar.', 25, 5),
(16, 'Verilen bir kesri ifade eden şekli/şemayı çizer.', 25, 5),
(17, 'Verilen bir kesirde payı, paydayı ve kesir çizgisini gösterir/yazar.', 25, 5),
(18, 'Toplama işlemi gerektiren kesir problemlerini çözer.', 27, 5),
(19, 'Çıkarma işlemi gerektiren kesir problemlerini çözer.', 27, 5),
(20, 'İki işlem gerektiren kesir problemlerini çözer.', 27, 5),
(21, 'Atatürk\'ün önderliğinde ölçme birimlerine getirilen yeniliklerin gerekliliğini nedenleriyle açıklar.', 28, 5),
(22, 'Standart uzunluk ölçme birimlerinden kilometre ve milimetrenin kullanım alanlarını belirtir.', 28, 5),
(23, 'Milimetre - santimetre, santimetre - metre ve metre - kilometre arasındaki ilişkileri açıklar.', 28, 5),
(24, 'Belirli uzunlukları farklı uzunluk ölçme birimleriyle ifade eder.', 28, 5),
(25, 'Bir uzunluğu en uygun uzunluk ölçme birimiyle tahmin eder ve tahminini ölçme yaparak kontrol eder.', 28, 5),
(26, 'Metre - kilometre, metre - santimetre - milimetre birimlerini birbirine dönüştürür.', 28, 5),
(27, 'Milimetre, santimetre, metre ve kilometre birimleri arasındaki dönüşümleri içeren problemleri çözer ve kurar.', 28, 5),
(28, 'Kilogramın ve gramın kullanıldığı yerleri belirtir.', 30, 5),
(29, 'Kilogram ve gramla ilgili problemleri çözer ve kurar.', 30, 5),
(30, 'Tonun kullanıldığı yerleri belirtir.', 30, 5),
(31, 'Ton - kilogram, kilogram - gram ve gram - miligram arasındaki ilişkileri belirtir.', 30, 5),
(32, 'Ton, kilogram, gram ve miligramla ilgili problemleri çözer ve kurar.', 30, 5),
(33, 'Litre ve mililitre arasındaki ilişkiyi belirtir.', 29, 5),
(34, 'Litre ve mililitre arasındaki dönüşümleri yapar.', 29, 5),
(35, 'Bir kaptaki sıvının miktarını, litre ve mililitre birimleriyle tahmin eder ve ölçme yaparak tahmini kontrol eder.', 29, 5),
(36, 'Litre ve mililitre ile ilgili problemleri çözer ve kurar.', 29, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `altkazanimlar_okuma_yazma`
--

CREATE TABLE `altkazanimlar_okuma_yazma` (
  `altkazanimlar_okuma_yazma_PK` int(11) NOT NULL,
  `bildirim` varchar(255) NOT NULL,
  `kazanimlar_FK` int(11) NOT NULL,
  `lesson_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `altkazanimlar_okuma_yazma`
--

INSERT INTO `altkazanimlar_okuma_yazma` (`altkazanimlar_okuma_yazma_PK`, `bildirim`, `kazanimlar_FK`, `lesson_FK`) VALUES
(1, 'Dik Oturur.', 14, 3),
(2, 'Işığın geliş yönüne uygun durur.', 14, 3),
(3, 'Kitabı göze uygun uzaklıkta okur.', 14, 3),
(4, 'Metni konuşma sesi ile okur.', 14, 3),
(5, 'Ses tonunu duyulacak biçimde ayarlar.', 14, 3),
(6, 'Sözcükleri doğru ve anlaşılır biçimde söyler.', 14, 3),
(7, 'Kişilerin konuşmalarını canlandırarak okur.', 14, 3),
(8, 'Noktalama imlerine uygun duraklamalar yapar.', 14, 3),
(9, 'Sözcüklerin anlamına uygun vurgulamalar yapar.', 14, 3),
(10, 'Satırları gözü ile takip ederek okur.', 14, 3),
(11, 'Sessiz okumada konuşma organlarını hareket ettirmez', 14, 3),
(12, 'Özel anların ilk harfinin büyük yazar.', 19, 3),
(13, 'Cümlenin ilk harfini büyük yazar.', 19, 3),
(14, 'Mektuplarda ve resmi yazışmalarda hitapların ilk kelimesinin ilk harfini büyük yazar.', 19, 3),
(15, 'Güneş, ay, dünya sözcüklerini coğrafi terim olarak kullanıyorsa ilk harfini büyük yazar.', 19, 3),
(16, 'Unvan, devlet, kurum, şirket adlarının kısaltılmış biçimlerini yazar', 19, 3),
(17, 'Belirli bir tarih içinde geçen gün, ay adlarının ilk harfini büyük yazar.', 19, 3),
(18, 'Cümlenin sonuna nokta koyar.', 20, 3),
(19, 'Tarihleri yazarken gün, ay, yılı gösteren sayılar arasına nokta koyar.', 20, 3),
(20, 'Saat ve dakikaları gösteren sayıları birbirinden ayırmak için nokta koyar.', 20, 3),
(21, 'Kısaltmaların sonuna nokta koyar.', 20, 3),
(22, 'Sıra bildirmek için sayılardan sonra nokta koyar.', 20, 3),
(23, 'Üçlü gruplara ayrılarak yazılan büyük sayılarda gruplar arasına nokta koyar.', 20, 3),
(24, 'Cümlede birbiri ardına sıralanan eş görevli kelimelerin arasına virgül koyar.', 20, 3),
(25, 'Cümlede eş görevli kelimelerin arasına virgül koyar.', 20, 3),
(26, 'Hitap için kullanılan kelimelerden sonra virgül koyar.', 20, 3),
(27, 'Soru bildiren cümle ya da kelimelerin sonuna soru işaret koyar.', 20, 3),
(28, 'Duygu bildiren tümce ya da sözcüklerin sonuna ünlem imi koyar.', 20, 3),
(29, 'Satıra sığmayan kelimelerin sonuna soru işareti koyar.', 20, 3),
(30, 'Özel adlara gelen ekleri ayırmak için kesme imi koyar.', 20, 3),
(31, 'Yazıda konuşmaları göstermek için uzun çizgi imi koyar.', 20, 3),
(32, 'Cümle ya da kelimeyle ilgili açıklamanın başına ve sonuna yay ayıraç koyar.', 20, 3),
(33, 'Cümle içinde belirtilmek istenen kelime ya da sözlerin başına ve sonuna tırnak işareti koyar.', 20, 3);

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

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bepform_and_lesson`
--

CREATE TABLE `bepform_and_lesson` (
  `bepform_and_lesson_PK` int(11) NOT NULL,
  `lesson_FK` int(11) NOT NULL,
  `bepform_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(62, '2018-06-14', 'Gelmedi', 'hasta gelemedi', 28),
(63, '2018-06-21', 'Gelmedi', '', 0);

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
  `student_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `events`
--

INSERT INTO `events` (`id`, `title`, `student_FK`, `personel_FK`, `color`, `start`, `end`) VALUES
(90, 'Engin bakır', 28, 27, '#008000', '2018-06-08 08:30:00', '2018-06-08 09:30:00'),
(91, 'Engin bakır', 28, 27, '#FFD700', '2018-06-06 00:00:00', '2018-06-07 00:00:00'),
(92, 'Ersin Bakır', 29, 27, '#008000', '2018-06-11 00:00:00', '2018-06-12 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `event_admin`
--

CREATE TABLE `event_admin` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `admin_FK` int(11) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `event_admin`
--

INSERT INTO `event_admin` (`id`, `title`, `admin_FK`, `color`, `start`, `end`) VALUES
(18, 'toplantı', 1, '#40E0D0', '2018-06-06 00:00:00', '2018-06-07 00:00:00');

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
-- Tablo için tablo yapısı `kazanimlar_degerlendirme`
--

CREATE TABLE `kazanimlar_degerlendirme` (
  `kazanimlar_degerlendirme_PK` int(11) NOT NULL,
  `kazanimlar_ders_ogrenci_FK` int(11) NOT NULL,
  `kazanimlar_FK` int(11) NOT NULL,
  `durum` int(11) NOT NULL,
  `aciklama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kazanimlar_degerlendirme`
--

INSERT INTO `kazanimlar_degerlendirme` (`kazanimlar_degerlendirme_PK`, `kazanimlar_ders_ogrenci_FK`, `kazanimlar_FK`, `durum`, `aciklama`) VALUES
(845, 34, 1, 1, ''),
(846, 34, 2, 0, ''),
(847, 34, 3, 0, ''),
(848, 34, 4, 0, ''),
(849, 34, 5, 0, ''),
(850, 34, 6, 0, ''),
(851, 34, 7, 0, ''),
(852, 34, 8, 0, ''),
(853, 34, 9, 0, ''),
(854, 34, 10, 0, ''),
(855, 34, 11, 0, ''),
(856, 34, 12, 1, ''),
(857, 34, 13, 0, ''),
(858, 34, 14, 0, ''),
(859, 34, 15, 0, ''),
(860, 34, 16, 0, ''),
(861, 34, 17, 0, ''),
(862, 34, 18, 0, ''),
(863, 34, 19, 0, ''),
(864, 34, 20, 0, ''),
(865, 34, 21, 0, ''),
(866, 34, 22, 1, ''),
(867, 34, 23, 0, ''),
(868, 34, 24, 0, ''),
(869, 34, 25, 0, ''),
(870, 34, 26, 0, ''),
(871, 34, 27, 0, ''),
(872, 34, 28, 0, ''),
(873, 34, 29, 0, ''),
(874, 34, 30, 0, ''),
(875, 34, 31, 0, ''),
(876, 34, 32, 0, ''),
(877, 34, 33, 0, ''),
(878, 34, 34, 0, ''),
(879, 35, 1, 0, ''),
(880, 35, 2, 0, ''),
(881, 35, 3, 0, ''),
(882, 35, 4, 0, ''),
(883, 35, 5, 0, ''),
(884, 35, 6, 1, ''),
(885, 35, 7, 0, ''),
(886, 35, 8, 0, ''),
(887, 35, 9, 0, ''),
(888, 35, 10, 0, ''),
(889, 35, 11, 0, ''),
(890, 35, 12, 0, ''),
(891, 35, 13, 0, ''),
(892, 35, 14, 0, ''),
(893, 35, 15, 0, ''),
(894, 35, 16, 0, ''),
(895, 35, 17, 0, ''),
(896, 35, 18, 0, ''),
(897, 35, 19, 0, ''),
(898, 35, 20, 0, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kazanimlar_degerlendirme_ogretmen`
--

CREATE TABLE `kazanimlar_degerlendirme_ogretmen` (
  `kazanimlar_degerlendirme_ogretmen_PK` int(11) NOT NULL,
  `kazanimlar_ders_ogrenci_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kazanimlar_degerlendirme_ogretmen`
--

INSERT INTO `kazanimlar_degerlendirme_ogretmen` (`kazanimlar_degerlendirme_ogretmen_PK`, `kazanimlar_ders_ogrenci_FK`, `personel_FK`) VALUES
(43, 34, 27),
(44, 35, 27);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kazanimlar_ders_ogrenci`
--

CREATE TABLE `kazanimlar_ders_ogrenci` (
  `kazanimlar_ders_ogrenci_PK` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL,
  `lessons_FK` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kazanimlar_ders_ogrenci`
--

INSERT INTO `kazanimlar_ders_ogrenci` (`kazanimlar_ders_ogrenci_PK`, `student_FK`, `lessons_FK`, `date`) VALUES
(34, 28, 5, '2018-06-10'),
(35, 28, 3, '2018-06-10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kazanimlar_lessons`
--

CREATE TABLE `kazanimlar_lessons` (
  `kazanim_PK` int(11) NOT NULL,
  `kazanim` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lesson_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kazanimlar_lessons`
--

INSERT INTO `kazanimlar_lessons` (`kazanim_PK`, `kazanim`, `lesson_FK`) VALUES
(1, 'Yazı araç-gereçlerini tanır.', 3),
(2, 'Yazı araç-gereçlerini kurallara uygun kullanır.', 3),
(3, 'Temel çizgiler çizer.', 3),
(4, 'Sesleri okur.', 3),
(5, 'Sesleri yazar.', 3),
(6, 'Heceleri okur.', 3),
(7, 'Heceleri yazar.', 3),
(8, 'Kelimeleri okur.', 3),
(9, 'Kelimeleri yazar.', 3),
(10, 'Tümceleri okur.', 3),
(11, 'Tümceleri yazar.', 3),
(12, 'Metin okur.', 3),
(13, 'Metin yazar.', 3),
(14, 'Etkili okur.', 3),
(15, 'Okuduğu metinle ilgili neden-sonuç ilişkisi kurar.', 3),
(16, 'Okuduğu metni anlar.', 3),
(17, 'Olaylar arasında neden-sonuç ilişkisi kurar.', 3),
(18, 'Okumaya istekli olur.', 3),
(19, 'Yazım kurallarına uyar.', 3),
(20, 'Noktalama işaretlerini yerinde kullanır.', 3),
(21, 'Uzamsal ilişkileri ifade etmek için uygun terim kullanılır.', 5),
(22, 'İkişer ritmik sayar', 5),
(23, 'Üçer ritmik sayar.', 5),
(24, 'Dörder ritmik sayar.', 5),
(25, 'Altışar ritmik sayar.', 5),
(26, 'Yedişer ritmik sayar.', 5),
(27, 'Sekizer ritmik sayar.', 5),
(28, 'Dokuzar ritmik sayar.', 5),
(29, 'İki basamaklı doğal sayıları ayırt eder.', 5),
(30, 'Üç ve daha fazla basamaklı doğal sayıları ayırt eder.', 5),
(31, 'Eldesiz toplama işlemi yapar.', 5),
(32, 'Eldeli toplama işlemi yapar.', 5),
(33, 'Toplama işlemi yaparak problem çözer.', 5),
(34, 'Onluk bozma gerektirmeyen çıkarma işlemi yapar.', 5),
(35, 'Onluk bozma gerektiren çıkarma işlemi yapar.', 5),
(36, 'Çıkarma işlemi yaparak problem çözer.', 5),
(37, 'Eldesiz çarpma işlemi yapar.', 5),
(38, 'Eldeli çarpma işlemi yapar.', 5),
(39, 'Kısa yoldan çarpma işlemi yapar.', 5),
(40, 'Çarpma işlemi yaparak problem çözer.', 5),
(41, 'Kalansız bölme işlemi yapar.', 5),
(42, 'Kalanlı bölme işlemi yapar.', 5),
(43, 'Kısa yoldan bölme işlemi yapar.', 5),
(44, 'Bölme işlemi yaparak problem çözer.', 5),
(45, 'Dört işlem yaparak problem çözer.', 5),
(46, 'Nesneleri bütün, yarım ve çeyrek olma durumuna göre ayırt.', 5),
(47, 'Kesirlerle ilgili problem çözer.', 5),
(48, 'Uzunluk ölçüleri arasında işlem yapar.', 5),
(49, 'Sıvı ölçüleri arasında işlem yapar.', 5),
(50, 'Kütle ölçüleri arasında işlem yapar.', 5),
(51, 'Değer ölçüleri arasında işlem yapar.', 5),
(52, 'Zaman ölçüleri arasında işlem yapar.', 5),
(53, 'Alan ölçüleri arasında işlem yapar.', 5),
(54, 'Geometrik şekiller arasında ilişki kurar.', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kazanimlar_matematik`
--

CREATE TABLE `kazanimlar_matematik` (
  `kazanimlar_PK` int(11) NOT NULL,
  `kazanimlar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Tablo döküm verisi `kazanimlar_matematik`
--

INSERT INTO `kazanimlar_matematik` (`kazanimlar_PK`, `kazanimlar`) VALUES
(1, 'Uzamsal ilişkileri ifade etmek için uygun terim kullanılır.'),
(2, 'İkişer ritmik sayar'),
(3, 'Üçer ritmik sayar.'),
(4, 'Dörder ritmik sayar.'),
(5, 'Altışar ritmik sayar.'),
(6, 'Yedişer ritmik sayar.'),
(7, 'Sekizer ritmik sayar.'),
(8, 'Dokuzar ritmik sayar.'),
(9, 'İki basamaklı doğal sayıları ayırt eder.'),
(10, 'Üç ve daha fazla basamaklı doğal sayıları ayırt eder.'),
(11, 'Eldesiz toplama işlemi yapar.'),
(12, 'Eldeli toplama işlemi yapar.'),
(13, 'Toplama işlemi yaparak problem çözer.'),
(14, 'Onluk bozma gerektirmeyen çıkarma işlemi yapar.'),
(15, 'Onluk bozma gerektiren çıkarma işlemi yapar.'),
(16, 'Çıkarma işlemi yaparak problem çözer.'),
(17, 'Eldesiz çarpma işlemi yapar.'),
(18, 'Eldeli çarpma işlemi yapar.'),
(19, 'Kısa yoldan çarpma işlemi yapar.'),
(20, 'Çarpma işlemi yaparak problem çözer.'),
(21, 'Kalansız bölme işlemi yapar.'),
(22, 'Kalanlı bölme işlemi yapar.'),
(23, 'Kısa yoldan bölme işlemi yapar.'),
(24, 'Bölme işlemi yaparak problem çözer.'),
(25, 'Dört işlem yaparak problem çözer.'),
(26, 'Nesneleri bütün, yarım ve çeyrek olma durumuna göre ayırt.'),
(27, 'Kesirlerle ilgili problem çözer.'),
(28, 'Uzunluk ölçüleri arasında işlem yapar.'),
(29, 'Sıvı ölçüleri arasında işlem yapar.'),
(30, 'Kütle ölçüleri arasında işlem yapar.'),
(31, 'Değer ölçüleri arasında işlem yapar.'),
(32, 'Zaman ölçüleri arasında işlem yapar.'),
(33, 'Alan ölçüleri arasında işlem yapar.'),
(34, 'Geometrik şekiller arasında ilişki kurar.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kazanimlar_okuma_yazma`
--

CREATE TABLE `kazanimlar_okuma_yazma` (
  `kazanimlar_okuma_yazma_PK` int(11) NOT NULL,
  `kazanimlar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kazanimlar_okuma_yazma`
--

INSERT INTO `kazanimlar_okuma_yazma` (`kazanimlar_okuma_yazma_PK`, `kazanimlar`) VALUES
(1, 'Yazı araç-gereçlerini tanır.'),
(2, 'Yazı araç-gereçlerini kurallara uygun kullanır.'),
(3, 'Temel çizgiler çizer.'),
(4, 'Sesleri okur.'),
(5, 'Sesleri yazar.'),
(6, 'Heceleri okur.'),
(7, 'Heceleri yazar.'),
(8, 'Kelimeleri okur.'),
(9, 'Kelimeleri yazar.'),
(10, 'Tümceleri okur.'),
(11, 'Tümceleri yazar.'),
(12, 'Metin okur.'),
(13, 'Metin yazar.'),
(14, 'Etkili okur.'),
(15, 'Okuduğu metinle ilgili neden-sonuç ilişkisi kurar.'),
(16, 'Okuduğu metni anlar.'),
(17, 'Olaylar arasında neden-sonuç ilişkisi kurar.'),
(18, 'Okumaya istekli olur.'),
(19, 'Yazım kurallarına uyar.'),
(20, 'Noktalama işaretlerini yerinde kullanır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lessons`
--

CREATE TABLE `lessons` (
  `lessons_PK` int(11) NOT NULL,
  `lesson_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `lessons`
--

INSERT INTO `lessons` (`lessons_PK`, `lesson_name`) VALUES
(1, 'BİLİŞSEL BECERİLER'),
(2, 'DİL VE KONUŞMA BECERİLERİ'),
(3, 'OKUMA YAZMA/TÜRKÇE'),
(4, 'ÖĞRENMEYE HAZIRLIK'),
(5, 'MATEMATİK'),
(6, 'ÖZ BAKIM'),
(7, 'HAYAT BİLGİSİ/SOSYAL BİLGİLER'),
(8, 'SOSYAL BECERİLER');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lesson_event`
--

CREATE TABLE `lesson_event` (
  `lesson_event_PK` int(11) NOT NULL,
  `student_lessons_FK` int(11) NOT NULL,
  `attendance_type_FK` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
(28, 27, 28, 'enginin notu', '2018-06-09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `notifications`
--

INSERT INTO `notifications` (`id`, `name`, `surname`, `type`, `message`, `status`, `date`) VALUES
(13, 'MERVE', 'TUNÇEL', 'personel', 'eklendi', 'read', '2018-06-04 05:45:12'),
(14, 'SEYMA', 'YİGİT', 'student', 'eklendi', 'read', '2018-06-04 05:45:40'),
(15, 'Utku', 'Özdemir', 'student', 'eklendi', 'read', '2018-06-04 17:43:16'),
(16, 'Derya', 'AGA', 'student', 'eklendi', 'read', '2018-06-04 17:52:51'),
(17, 'Uğur', 'Hassamancıoğlu', 'personel', 'eklendi', 'unread', '2018-06-04 18:03:57'),
(18, 'Merve', 'Tunçel', 'student', 'güncellendi', 'read', '2018-06-04 18:09:33'),
(19, 'Onur', 'Acar', 'personel', 'güncellendi', 'unread', '2018-06-04 18:12:52'),
(22, 'Uğur', 'Hassamancıoğlu', 'personel', 'silindi', 'unread', '2018-06-04 18:23:54'),
(23, 'Ahmet', 'Takan', 'student', 'silindi', 'unread', '2018-06-04 18:27:13'),
(24, 'ali', 'yigit', 'student', 'eklendi', 'read', '2018-06-04 21:33:16'),
(25, 'Cemal', 'Bakır', 'student', 'eklendi', 'read', '2018-06-05 19:01:31'),
(26, 'Yeni Ogrenci', 'Yeni Öğrenci', 'student', 'eklendi', 'read', '2018-06-06 16:09:14'),
(27, 'Engin', 'bakır', 'student', 'eklendi', 'unread', '2018-06-09 11:25:20'),
(28, 'Engin', 'bakır', 'student', 'eklendi', 'unread', '2018-06-09 11:26:05'),
(29, 'Engin', 'bakır', 'student', 'eklendi', 'unread', '2018-06-09 11:27:48'),
(30, 'Engin', 'bakır', 'student', 'eklendi', 'unread', '2018-06-09 12:00:47'),
(31, 'Ersin', 'Bakır', 'student', 'eklendi', 'unread', '2018-06-09 12:02:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme_aylar`
--

CREATE TABLE `odeme_aylar` (
  `id` int(11) NOT NULL,
  `aylar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `odeme_aylar`
--

INSERT INTO `odeme_aylar` (`id`, `aylar`) VALUES
(1, 'OCAK'),
(2, 'ŞUBAT'),
(3, 'MART'),
(4, 'NİSAN'),
(5, 'MAYIS'),
(6, 'HAZİRAN'),
(7, 'TEMMUZ'),
(8, 'AĞUSTOS'),
(9, 'EYLÜL'),
(10, 'EKİM'),
(11, 'KASIM'),
(12, 'ARALIK');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme_bilgileri`
--

CREATE TABLE `odeme_bilgileri` (
  `id_o` int(11) NOT NULL,
  `bilgiler` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `odeme_bilgileri`
--

INSERT INTO `odeme_bilgileri` (`id_o`, `bilgiler`) VALUES
(1, 'Ödendi'),
(2, 'Ödenmedi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odeme_data`
--

CREATE TABLE `odeme_data` (
  `id` int(11) NOT NULL,
  `aylar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_odeme` datetime NOT NULL,
  `o_bilgisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `odeme_data`
--

INSERT INTO `odeme_data` (`id`, `aylar`, `date_odeme`, `o_bilgisi`, `student_FK`, `personel_FK`) VALUES
(126, 'HAZİRAN', '2018-06-06 08:30:00', 'Ödendi', 28, 27),
(127, 'HAZİRAN', '2018-06-06 00:00:00', 'Ödendi', 28, 27),
(128, 'HAZİRAN', '2018-06-08 08:30:00', 'Ödenmedi', 28, 27);

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
  `status` int(11) NOT NULL,
  `email_adress` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `degree_of_proximity_FK` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `parent`
--

INSERT INTO `parent` (`parent_PK`, `tel_no`, `sabit_tel`, `tc_no`, `name`, `surname`, `adress`, `work_adress`, `description`, `status`, `email_adress`, `degree_of_proximity_FK`, `student_FK`) VALUES
(92, 15123123, 15123, 10819613032, 'İsmail', 'Bakır', 'Kolej', 'Ankara', '', 1, 'enginbakir1311@gmail.com', 2, 28),
(93, 12512312, 5123123, 10819613032, 'Nuray', 'Bakır', 'Kolej', 'Ankara', '', 1, 'enginbakir1311@gmail.com', 2, 29);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `parent_log`
--

CREATE TABLE `parent_log` (
  `ParentLog_PK` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `userParent_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `parent_log`
--

INSERT INTO `parent_log` (`ParentLog_PK`, `login_time`, `logout_time`, `userParent_FK`) VALUES
(5, '2018-06-09 12:01:03', '2018-06-09 12:01:17', 8),
(6, '2018-06-09 12:03:17', '2018-06-09 12:03:20', 9);

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

--
-- Tablo döküm verisi `parent_user`
--

INSERT INTO `parent_user` (`userParent_PK`, `username`, `password`, `parent_FK`) VALUES
(8, 'f3b32717d5322d7ba7c505c230785468', '5b32d2b633074d709203fe2f7c14e747', 92),
(9, '62ecbb76abfdc3145dd998dce9377fd5', '5b32d2b633074d709203fe2f7c14e747', 93);

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
(27, 'Cezair', 'Cezairrrrr', '2018-06-09', '2018-06-28', 'cezair@gmail.com', 251231, '../images/wallhaven-110442.jpg', 1, 6, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel_log`
--

CREATE TABLE `personel_log` (
  `PersonelLog_PK` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `userPersonel_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `personel_log`
--

INSERT INTO `personel_log` (`PersonelLog_PK`, `login_time`, `logout_time`, `userPersonel_FK`) VALUES
(28, '2018-06-09 11:59:32', '2018-06-09 11:59:36', 14),
(29, '2018-06-09 12:03:35', '0000-00-00 00:00:00', 14),
(30, '2018-06-09 15:13:52', '2018-06-09 16:59:45', 14),
(31, '2018-06-09 17:06:48', '2018-06-11 14:06:11', 14);

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
(14, '659d1ddb58b08f6ff7c57b68faa42eaf', '8ee3d4dc02455f1228229e97697b4b64', 27);

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
(28, 10819613032, 'Engin', 'bakır', 2, 22, '2018-06-30', '../images/wallhaven-254987.jpg', '2018-06-09', '0000-00-00', 'rehberlik araştırma merkezi', '2018-06-07', '2018-06-22', 1, 2, 27),
(29, 10819613032, 'Ersin', 'Bakır', 3, 12, '2018-06-14', '../images/wallhaven-511072.png', '2018-06-09', '2018-06-09', 'rehberlik araştırma merkezi', '2018-05-11', '2018-08-25', 0, 2, 27);

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
(497, 28, 2),
(498, 28, 3),
(499, 28, 4),
(500, 28, 5),
(501, 29, 1),
(502, 29, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student_lessons`
--

CREATE TABLE `student_lessons` (
  `student_lessons_PK` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL,
  `lesson_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `student_lessons`
--

INSERT INTO `student_lessons` (`student_lessons_PK`, `student_FK`, `lesson_FK`, `personel_FK`) VALUES
(30, 28, 3, 23),
(31, 28, 4, 23);

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
-- Tablo için indeksler `altkazanimlar_matematik`
--
ALTER TABLE `altkazanimlar_matematik`
  ADD PRIMARY KEY (`altkazanimlar_matematik_PK`);

--
-- Tablo için indeksler `altkazanimlar_okuma_yazma`
--
ALTER TABLE `altkazanimlar_okuma_yazma`
  ADD PRIMARY KEY (`altkazanimlar_okuma_yazma_PK`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_FK` (`student_FK`),
  ADD KEY `personel_FK` (`personel_FK`);

--
-- Tablo için indeksler `event_admin`
--
ALTER TABLE `event_admin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_PK`);

--
-- Tablo için indeksler `kazanimlar_degerlendirme`
--
ALTER TABLE `kazanimlar_degerlendirme`
  ADD PRIMARY KEY (`kazanimlar_degerlendirme_PK`),
  ADD KEY `kazanimlar_ders_ogrenci_FK` (`kazanimlar_ders_ogrenci_FK`),
  ADD KEY `kazanimlar_FK` (`kazanimlar_FK`);

--
-- Tablo için indeksler `kazanimlar_degerlendirme_ogretmen`
--
ALTER TABLE `kazanimlar_degerlendirme_ogretmen`
  ADD PRIMARY KEY (`kazanimlar_degerlendirme_ogretmen_PK`),
  ADD KEY `kazanimlar_ders_ogrenci_FK` (`kazanimlar_ders_ogrenci_FK`);

--
-- Tablo için indeksler `kazanimlar_ders_ogrenci`
--
ALTER TABLE `kazanimlar_ders_ogrenci`
  ADD PRIMARY KEY (`kazanimlar_ders_ogrenci_PK`),
  ADD KEY `student_FK` (`student_FK`),
  ADD KEY `lessons_FK` (`lessons_FK`);

--
-- Tablo için indeksler `kazanimlar_lessons`
--
ALTER TABLE `kazanimlar_lessons`
  ADD PRIMARY KEY (`kazanim_PK`),
  ADD KEY `lesson_FK` (`lesson_FK`);

--
-- Tablo için indeksler `kazanimlar_matematik`
--
ALTER TABLE `kazanimlar_matematik`
  ADD PRIMARY KEY (`kazanimlar_PK`);

--
-- Tablo için indeksler `kazanimlar_okuma_yazma`
--
ALTER TABLE `kazanimlar_okuma_yazma`
  ADD PRIMARY KEY (`kazanimlar_okuma_yazma_PK`);

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
  ADD KEY `attendance_type_FK` (`attendance_type_FK`);

--
-- Tablo için indeksler `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_PK`);

--
-- Tablo için indeksler `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odeme_aylar`
--
ALTER TABLE `odeme_aylar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `odeme_bilgileri`
--
ALTER TABLE `odeme_bilgileri`
  ADD PRIMARY KEY (`id_o`);

--
-- Tablo için indeksler `odeme_data`
--
ALTER TABLE `odeme_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_FK` (`student_FK`),
  ADD KEY `personel_FK` (`personel_FK`);

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
-- Tablo için indeksler `student_lessons`
--
ALTER TABLE `student_lessons`
  ADD PRIMARY KEY (`student_lessons_PK`);

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
  MODIFY `AdminLog_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Tablo için AUTO_INCREMENT değeri `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `userAdmin_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `altkazanimlar_matematik`
--
ALTER TABLE `altkazanimlar_matematik`
  MODIFY `altkazanimlar_matematik_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Tablo için AUTO_INCREMENT değeri `altkazanimlar_okuma_yazma`
--
ALTER TABLE `altkazanimlar_okuma_yazma`
  MODIFY `altkazanimlar_okuma_yazma_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Tablo için AUTO_INCREMENT değeri `attendance_type`
--
ALTER TABLE `attendance_type`
  MODIFY `attendance_type_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `bepform`
--
ALTER TABLE `bepform`
  MODIFY `bep_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `bepform_and_lesson`
--
ALTER TABLE `bepform_and_lesson`
  MODIFY `bepform_and_lesson_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `degree_of_proximity`
--
ALTER TABLE `degree_of_proximity`
  MODIFY `DofP_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `devamsızlık_takvimi`
--
ALTER TABLE `devamsızlık_takvimi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- Tablo için AUTO_INCREMENT değeri `educational_diagnosis`
--
ALTER TABLE `educational_diagnosis`
  MODIFY `diagnosis_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- Tablo için AUTO_INCREMENT değeri `event_admin`
--
ALTER TABLE `event_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Tablo için AUTO_INCREMENT değeri `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `kazanimlar_degerlendirme`
--
ALTER TABLE `kazanimlar_degerlendirme`
  MODIFY `kazanimlar_degerlendirme_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=899;
--
-- Tablo için AUTO_INCREMENT değeri `kazanimlar_degerlendirme_ogretmen`
--
ALTER TABLE `kazanimlar_degerlendirme_ogretmen`
  MODIFY `kazanimlar_degerlendirme_ogretmen_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Tablo için AUTO_INCREMENT değeri `kazanimlar_ders_ogrenci`
--
ALTER TABLE `kazanimlar_ders_ogrenci`
  MODIFY `kazanimlar_ders_ogrenci_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Tablo için AUTO_INCREMENT değeri `kazanimlar_lessons`
--
ALTER TABLE `kazanimlar_lessons`
  MODIFY `kazanim_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- Tablo için AUTO_INCREMENT değeri `kazanimlar_matematik`
--
ALTER TABLE `kazanimlar_matematik`
  MODIFY `kazanimlar_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Tablo için AUTO_INCREMENT değeri `kazanimlar_okuma_yazma`
--
ALTER TABLE `kazanimlar_okuma_yazma`
  MODIFY `kazanimlar_okuma_yazma_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Tablo için AUTO_INCREMENT değeri `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessons_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `lesson_event`
--
ALTER TABLE `lesson_event`
  MODIFY `lesson_event_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `notes`
--
ALTER TABLE `notes`
  MODIFY `note_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Tablo için AUTO_INCREMENT değeri `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Tablo için AUTO_INCREMENT değeri `odeme_data`
--
ALTER TABLE `odeme_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- Tablo için AUTO_INCREMENT değeri `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- Tablo için AUTO_INCREMENT değeri `parent_log`
--
ALTER TABLE `parent_log`
  MODIFY `ParentLog_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `parent_user`
--
ALTER TABLE `parent_user`
  MODIFY `userParent_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `personel`
--
ALTER TABLE `personel`
  MODIFY `personel_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Tablo için AUTO_INCREMENT değeri `personel_log`
--
ALTER TABLE `personel_log`
  MODIFY `PersonelLog_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Tablo için AUTO_INCREMENT değeri `personel_types`
--
ALTER TABLE `personel_types`
  MODIFY `personel_type_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `personel_user`
--
ALTER TABLE `personel_user`
  MODIFY `userPersonel_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `student`
--
ALTER TABLE `student`
  MODIFY `student_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Tablo için AUTO_INCREMENT değeri `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `attendance_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `student_diagnosis`
--
ALTER TABLE `student_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;
--
-- Tablo için AUTO_INCREMENT değeri `student_lessons`
--
ALTER TABLE `student_lessons`
  MODIFY `student_lessons_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
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
-- Tablo kısıtlamaları `kazanimlar_degerlendirme`
--
ALTER TABLE `kazanimlar_degerlendirme`
  ADD CONSTRAINT `kazanimlar_degerlendirme_ibfk_1` FOREIGN KEY (`kazanimlar_ders_ogrenci_FK`) REFERENCES `kazanimlar_ders_ogrenci` (`kazanimlar_ders_ogrenci_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `kazanimlar_degerlendirme_ogretmen`
--
ALTER TABLE `kazanimlar_degerlendirme_ogretmen`
  ADD CONSTRAINT `kazanimlar_degerlendirme_ogretmen_ibfk_1` FOREIGN KEY (`kazanimlar_ders_ogrenci_FK`) REFERENCES `kazanimlar_ders_ogrenci` (`kazanimlar_ders_ogrenci_PK`) ON DELETE CASCADE ON UPDATE CASCADE;

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
