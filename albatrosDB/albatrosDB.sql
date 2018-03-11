-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 08 Mar 2018, 11:48:17
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
-- Tablo için tablo yapısı `attendance`
--

CREATE TABLE `attendance` (
  `attendance_PK` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `lesson_event_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
-- Tablo için tablo yapısı `lessons`
--

CREATE TABLE `lessons` (
  `lessons_PK` int(11) NOT NULL,
  `lesson_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `lesson_type_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lesson_event`
--

CREATE TABLE `lesson_event` (
  `lesson_event_PK` int(11) NOT NULL,
  `student_FK` int(11) NOT NULL,
  `personel_FK` int(11) NOT NULL,
  `lesson_FK` int(11) NOT NULL,
  `attendance_type_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lesson_types`
--

CREATE TABLE `lesson_types` (
  `lesson_types_PK` int(11) NOT NULL,
  `lesson_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `note`
--

CREATE TABLE `note` (
  `note_PK` int(11) NOT NULL,
  `note` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `lesson_event_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
  `degree_of_proximity_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `parent`
--

INSERT INTO `parent` (`parent_PK`, `tel_no`, `sabit_tel`, `tc_no`, `name`, `surname`, `adress`, `work_adress`, `description`, `email_adress`, `degree_of_proximity_FK`) VALUES
(105, 0, 0, 2147483647, 'Engin', 'Bakır', 'Ankara', 'İstanul', 'bu bir açıklamadır', 'enginbakir1311@gmail.com', 1),
(106, 98761512, 98231, 2147483647, 'Engin', 'Bakır', 'Ankara', 'İstanbul', 'bu bir açıklamadır', 'enginbakir1311@gmail.com', 2),
(107, 98761512, 98231, 2147483647, 'Engin', 'Bakır', 'Ankara', 'İstanbul', 'bu bir açıklamadır', 'enginbakir1311@gmail.com', 2),
(108, 98761512, 98231, 2147483647, 'Engin', 'Bakır', 'Ankara', 'İstanbul', 'bu bir açıklamadır', 'enginbakir1311@gmail.com', 2),
(109, 98761512, 98231, 2147483647, 'Engin', 'Bakır', 'Ankara', 'İstanbul', 'bu bir açıklamadır', 'enginbakir1311@gmail.com', 1),
(110, 0, 0, 0, 'Engin', 'Bakir', '', '', '', '', 1),
(111, 0, 0, 0, 'ıŞıç', 'şçğ', '', '', '', '', 1),
(112, 0, 0, 0, 'ıŞıç', 'şçğ', '', '', '', '', 1),
(113, 0, 0, 0, 'ıŞıç', 'şçğ', '', '', '', '', 1),
(114, 215123, 2147483647, 2147483647, 'Nazımın Velisinin Adı', 'Nazımın Velisinin Soyadı', 'Ankara', 'Çankaya', 'bu bir açıklamadır', 'enginbakir1311@gmail.com', 2),
(115, 215123, 98765432198, 10819613032, 'Nazımın Velisinin Adı', 'Nazımın Velisinin Soyadı', 'Ankara', 'Çankaya', 'bu bir açıklamadır', 'enginbakir1311@gmail.com', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE `personel` (
  `personel_PK` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tel_no` int(11) NOT NULL,
  `photo` longblob NOT NULL,
  `username` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `personel_type_FK` int(11) NOT NULL,
  `gender_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel_types`
--

CREATE TABLE `personel_types` (
  `personel_type_PK` int(11) NOT NULL,
  `personel_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE `student` (
  `student_PK` int(11) NOT NULL,
  `tc_no` bigint(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rapor_no` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `birthday` date NOT NULL,
  `photo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `registration_date` date NOT NULL,
  `rehberlik_merkezi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `term_start_date` date NOT NULL,
  `term_finish_date` date NOT NULL,
  `gender_FK` int(11) NOT NULL,
  `parent_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `student`
--

INSERT INTO `student` (`student_PK`, `tc_no`, `name`, `surname`, `class`, `rapor_no`, `birthday`, `photo`, `registration_date`, `rehberlik_merkezi`, `username`, `password`, `term_start_date`, `term_finish_date`, `gender_FK`, `parent_FK`) VALUES
(308, 10819613032, 'Kemalettin', 'atakul', '3', '3', '2017-12-08', '', '2018-03-05', 'rehberlik araştırma merkezi', '', '', '2018-03-11', '2018-03-29', 2, 105),
(309, 10819613032, 'Ahmet', 'Bakir', '5', '513', '0000-00-00', '', '2018-03-05', 'rehberlik araştırma merkezi', '', '', '2018-03-14', '2018-03-15', 2, 107),
(310, 10819613032, 'Ahmet', 'Bakir', '5', '513', '0000-00-00', '', '2018-03-05', 'rehberlik araştırma merkezi', '', '', '2018-03-14', '2018-03-15', 2, 108),
(311, 10819613032, 'Ahmet', 'Bakir', '5', '513', '2018-03-15', '', '2018-03-05', 'rehberlik araştırma merkezi', '', '', '2018-03-14', '2018-03-15', 1, 109),
(312, 0, 'Engin', 'Bakir', '', '', '0000-00-00', '', '2018-03-05', '', '', '', '2018-03-16', '2018-06-29', 2, 110),
(313, 0, 'Cemal', 'Akyurt', '', '', '0000-00-00', '', '2018-03-05', '', '', '', '2018-03-15', '2018-03-31', 2, 111),
(314, 0, 'Cemal', 'Akyurt', '', '', '0000-00-00', '', '2018-03-05', '', '', '', '2018-03-15', '2018-03-31', 2, 112),
(315, 0, 'Cemal', 'Akyurt', '', '', '0000-00-00', '', '2018-03-05', '', '', '', '2018-03-15', '2018-03-31', 2, 113),
(316, 10819613032, 'Nazım', 'Hikmet', '2', '41', '2017-10-12', '', '2018-03-07', 'rehberlik araştırma merkezi', '', '', '2018-03-08', '2018-03-31', 2, 114),
(317, 10819613032, 'Nazım', 'Hikmet', '2', '41', '2017-10-12', '', '2018-03-07', 'rehberlik araştırma merkezi', '', '', '2018-03-08', '2018-03-31', 2, 115);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student_diagnosis`
--

CREATE TABLE `student_diagnosis` (
  `id` int(11) NOT NULL,
  `student_PK` int(11) NOT NULL,
  `diagnosis_PK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `student_diagnosis`
--

INSERT INTO `student_diagnosis` (`id`, `student_PK`, `diagnosis_PK`) VALUES
(83, 308, 1),
(84, 308, 3),
(85, 308, 6),
(86, 308, 12),
(87, 309, 2),
(88, 309, 3),
(89, 309, 5),
(90, 309, 8),
(91, 309, 10),
(92, 309, 11),
(93, 310, 2),
(94, 310, 3),
(95, 310, 5),
(96, 310, 8),
(97, 310, 10),
(98, 310, 11),
(99, 311, 2),
(100, 311, 3),
(101, 311, 5),
(102, 311, 8),
(103, 311, 10),
(104, 311, 11),
(105, 312, 2),
(106, 312, 4),
(107, 312, 6),
(108, 312, 7),
(109, 313, 2),
(110, 313, 4),
(111, 314, 2),
(112, 314, 4),
(113, 315, 2),
(114, 315, 4),
(115, 316, 4),
(116, 316, 6),
(117, 316, 10),
(118, 317, 4),
(119, 317, 6),
(120, 317, 10);

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
-- Tablo için tablo yapısı `system_registration_records`
--

CREATE TABLE `system_registration_records` (
  `system_registration_records_PK` int(11) NOT NULL,
  `login_date` date NOT NULL,
  `logout_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `transportation`
--

CREATE TABLE `transportation` (
  `transportation_PK` int(11) NOT NULL,
  `transportation_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_PK`),
  ADD KEY `lesson_event_FK` (`lesson_event_FK`);

--
-- Tablo için indeksler `attendance_type`
--
ALTER TABLE `attendance_type`
  ADD PRIMARY KEY (`attendance_type_PK`);

--
-- Tablo için indeksler `degree_of_proximity`
--
ALTER TABLE `degree_of_proximity`
  ADD PRIMARY KEY (`DofP_PK`);

--
-- Tablo için indeksler `educational_diagnosis`
--
ALTER TABLE `educational_diagnosis`
  ADD PRIMARY KEY (`diagnosis_PK`);

--
-- Tablo için indeksler `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_PK`);

--
-- Tablo için indeksler `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lessons_PK`),
  ADD KEY `lesson_type_FK` (`lesson_type_FK`);

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
-- Tablo için indeksler `lesson_types`
--
ALTER TABLE `lesson_types`
  ADD PRIMARY KEY (`lesson_types_PK`);

--
-- Tablo için indeksler `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_PK`),
  ADD KEY `lesson_event_FK` (`lesson_event_FK`);

--
-- Tablo için indeksler `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_PK`),
  ADD KEY `degree_of_proximity_FK` (`degree_of_proximity_FK`);

--
-- Tablo için indeksler `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`personel_PK`),
  ADD KEY `personel_type_FK` (`personel_type_FK`),
  ADD KEY `gender_FK` (`gender_FK`);

--
-- Tablo için indeksler `personel_types`
--
ALTER TABLE `personel_types`
  ADD PRIMARY KEY (`personel_type_PK`);

--
-- Tablo için indeksler `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_PK`),
  ADD KEY `gender_FK` (`gender_FK`),
  ADD KEY `parent_FK` (`parent_FK`);

--
-- Tablo için indeksler `student_diagnosis`
--
ALTER TABLE `student_diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `student_transportation`
--
ALTER TABLE `student_transportation`
  ADD KEY `student_FK` (`student_FK`),
  ADD KEY `transportation_FK` (`transportation_FK`),
  ADD KEY `degree_of_proximity_FK` (`degree_of_proximity_FK`);

--
-- Tablo için indeksler `system_registration_records`
--
ALTER TABLE `system_registration_records`
  ADD PRIMARY KEY (`system_registration_records_PK`);

--
-- Tablo için indeksler `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`transportation_PK`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `attendance_type`
--
ALTER TABLE `attendance_type`
  MODIFY `attendance_type_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `degree_of_proximity`
--
ALTER TABLE `degree_of_proximity`
  MODIFY `DofP_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `educational_diagnosis`
--
ALTER TABLE `educational_diagnosis`
  MODIFY `diagnosis_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lessons_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `lesson_event`
--
ALTER TABLE `lesson_event`
  MODIFY `lesson_event_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `lesson_types`
--
ALTER TABLE `lesson_types`
  MODIFY `lesson_types_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- Tablo için AUTO_INCREMENT değeri `personel`
--
ALTER TABLE `personel`
  MODIFY `personel_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `personel_types`
--
ALTER TABLE `personel_types`
  MODIFY `personel_type_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `student`
--
ALTER TABLE `student`
  MODIFY `student_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;
--
-- Tablo için AUTO_INCREMENT değeri `student_diagnosis`
--
ALTER TABLE `student_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- Tablo için AUTO_INCREMENT değeri `system_registration_records`
--
ALTER TABLE `system_registration_records`
  MODIFY `system_registration_records_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `transportation`
--
ALTER TABLE `transportation`
  MODIFY `transportation_PK` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
