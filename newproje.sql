-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 06 May 2019, 13:48:24
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `newproje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ders`
--

CREATE TABLE `ders` (
  `ders_id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `k_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ders`
--

INSERT INTO `ders` (`ders_id`, `img`, `k_id`) VALUES
(4, 'dfsdfsdfsdfsdfsdfsd.sadsadsad', 3),
(11, 'http://www.ktu.edu.tr/dosyalar/bilgisayar_1fd3b.pdf', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `id` int(11) NOT NULL,
  `duyuru` varchar(255) NOT NULL,
  `k_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`id`, `duyuru`, `k_id`) VALUES
(3, 'son 14 gün', 3),
(4, 'son 34 gün', 3),
(13, 'TORUN', 1),
(15, 'Oğuzhan', 1),
(16, 'SA', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlik`
--

CREATE TABLE `etkinlik` (
  `id` int(11) NOT NULL,
  `etkinlik` varchar(255) NOT NULL,
  `tarih` date NOT NULL,
  `k_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `etkinlik`
--

INSERT INTO `etkinlik` (`id`, `etkinlik`, `tarih`, `k_id`) VALUES
(1, 'allame gelecek ', '2019-05-23', 1),
(6, 'CEZA COK KOTU RAP YAPAR A DOSTLAR', '2019-05-25', 1),
(7, '20 Mayıs Günü Mikroişlemciler Finali Var', '2019-05-20', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `k_id` int(11) NOT NULL,
  `k_ad` varchar(20) NOT NULL,
  `sifre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`k_id`, `k_ad`, `sifre`) VALUES
(1, 'bilgisayar', '123456'),
(2, 'makine', '123456'),
(3, 'elektrik', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `resim_id` int(11) NOT NULL,
  `resim` varchar(250) NOT NULL,
  `aciklama` varchar(250) NOT NULL,
  `k_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`resim_id`, `resim`, `aciklama`, `k_id`) VALUES
(11, '2429245397.jpg', 'vngnv', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `aciklama` varchar(255) NOT NULL,
  `k_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `video`
--

INSERT INTO `video` (`id`, `link`, `aciklama`, `k_id`) VALUES
(8, '3298631776.mp4', 'dvdf', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ders`
--
ALTER TABLE `ders`
  ADD PRIMARY KEY (`ders_id`),
  ADD KEY `k_id` (`k_id`);

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kullanici_duyuru` (`k_id`);

--
-- Tablo için indeksler `etkinlik`
--
ALTER TABLE `etkinlik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kullanici_etkinlik` (`k_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`k_id`);

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`resim_id`),
  ADD KEY `k_id` (`k_id`);

--
-- Tablo için indeksler `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kullanici_video` (`k_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ders`
--
ALTER TABLE `ders`
  MODIFY `ders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Tablo için AUTO_INCREMENT değeri `etkinlik`
--
ALTER TABLE `etkinlik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `ders`
--
ALTER TABLE `ders`
  ADD CONSTRAINT `ders_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`);

--
-- Tablo kısıtlamaları `duyuru`
--
ALTER TABLE `duyuru`
  ADD CONSTRAINT `kullanici_duyuru` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `etkinlik`
--
ALTER TABLE `etkinlik`
  ADD CONSTRAINT `kullanici_etkinlik` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `resim`
--
ALTER TABLE `resim`
  ADD CONSTRAINT `resim_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`);

--
-- Tablo kısıtlamaları `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `kullanici_video` FOREIGN KEY (`k_id`) REFERENCES `kullanici` (`k_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
