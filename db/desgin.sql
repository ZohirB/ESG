
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `desgin` (
  `id_desgin` int(11) NOT NULL,
  `backgroundcolor` varchar(6) NOT NULL,
  `linecolor` varchar(6) NOT NULL,
  `textcolor` varchar(6) NOT NULL,
  `headertextcolor` varchar(6) NOT NULL DEFAULT 'ffffff',
  `cellcolor` varchar(6) NOT NULL,
  `headercolor` varchar(6) NOT NULL,
  `titlecolor` varchar(6) NOT NULL DEFAULT 'ffffff',
  `endtitlecolor` varchar(6) NOT NULL DEFAULT 'ffffff'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

ALTER TABLE `desgin`
  ADD PRIMARY KEY (`id_desgin`);

ALTER TABLE `desgin`
  MODIFY `id_desgin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
