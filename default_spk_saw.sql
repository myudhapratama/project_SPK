-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 08:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `default_spk_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `alternatif` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `alternatif`, `nama`) VALUES
(16, 'KK 1', 'PSN'),
(17, ' KK 2', 'YSNR'),
(18, 'KK 3', 'MSDLN'),
(19, 'KK 4', 'ELHSN'),
(21, 'KK 5', 'IDTMBN'),
(27, 'KK 6', 'YLRD'),
(28, 'KK 7', 'NESTRS'),
(29, 'KK 8', 'ALRZL'),
(30, 'KK 9', 'JML'),
(31, 'KK 10', 'ZMR'),
(32, 'KK 11', 'TRNH'),
(33, 'KK 12', 'MYRP'),
(34, 'KK 13', 'RDH'),
(35, 'KK 14', 'HRJSMTR'),
(36, 'KK 15', 'TRYN'),
(37, 'KK 16', 'EDWR'),
(38, 'KK 17', 'ARJMLH'),
(39, 'KK 18', 'LL'),
(40, 'KK 19', 'DSNH'),
(41, 'KK 20', 'ASM'),
(42, 'KK 21', 'YSTRH'),
(43, 'KK 22', 'SYMDRP'),
(44, 'KK 23', 'YKP'),
(45, 'KK 24', 'NS'),
(46, 'KK 25', 'ZLFT'),
(47, 'KK 26', 'BDRH'),
(48, 'KK 27', 'ASH'),
(49, 'KK 28', 'CHS'),
(50, 'KK 29', 'LA'),
(51, 'KK 30', 'RML'),
(52, 'KK 31', 'ABDRYS'),
(53, 'KK 32', 'DRN'),
(54, 'KK 33', 'HA'),
(55, 'KK 34', 'JNR'),
(56, 'KK 35', 'AZ'),
(57, 'KK 36', 'BHR'),
(58, 'KK 37', 'PLS'),
(59, 'KK 38', 'RFH'),
(60, 'KK 39', 'SYM'),
(61, 'KK 40', 'RSNH'),
(62, 'KK 41', 'MHDM'),
(63, 'KK 42', 'BKHR'),
(64, 'KK 43', 'SHRD'),
(65, 'KK 44', 'NRBT'),
(66, 'KK 45', 'N'),
(67, 'KK 46', 'MKSFH'),
(68, 'KK 47', 'SGT'),
(69, 'KK 48', 'JMT'),
(70, 'KK 49', 'SJ'),
(71, 'KK 50', 'KN'),
(72, 'KK 51', 'WS'),
(73, 'KK 52', 'HP'),
(74, 'KK 53', 'RBRS'),
(75, 'KK 54', 'SG'),
(76, 'KK 55', 'KP'),
(77, 'KK 56', 'LBRS'),
(78, 'KK 57', 'BSR'),
(79, 'KK 59', 'SMYM'),
(80, 'KK 60', 'EP'),
(81, 'KK 61', 'DS');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `kode_hasil` varchar(255) DEFAULT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `kode_hasil`, `id_alternatif`, `nilai`) VALUES
(1, 'kode-68734efa2ebfd9.66071733', 16, 0.743),
(2, 'kode-68734efa35f6c3.28250192', 17, 0.798),
(3, 'kode-68734efa3f9277.89346834', 18, 0.683),
(4, 'kode-68734efa469955.78357041', 19, 0.495),
(5, 'kode-68734efa4b1620.95745998', 21, 0.75),
(6, 'kode-68734efa50a2b0.45228342', 27, 0.466),
(7, 'kode-68734efa56b580.92774031', 28, 0.497),
(8, 'kode-68734efa747889.01285744', 29, 0.741),
(9, 'kode-68734efa9892e5.33888274', 30, 0.612),
(10, 'kode-68734efa9d7f34.88643189', 31, 0.836),
(11, 'kode-68734efaa20c84.47602018', 32, 0.724),
(12, 'kode-68734efaa75984.67872713', 33, 0.503),
(13, 'kode-68734efaab2177.85379564', 34, 0.727),
(14, 'kode-68734efaafdd17.17848699', 35, 0.509),
(15, 'kode-68734efab54ad0.32617712', 36, 0.761),
(16, 'kode-68734efac1bf93.74600146', 37, 0.462),
(17, 'kode-68734efac6fcd6.91684733', 38, 0.812),
(18, 'kode-68734efacad5d0.71910541', 39, 0.692),
(19, 'kode-68734efae340c9.46050599', 40, 0.739),
(20, 'kode-68734efae8bc11.07557975', 41, 0.755),
(21, 'kode-68734efaee5679.77263834', 42, 0.717),
(22, 'kode-68734efaf35c35.35971653', 43, 0.501),
(23, 'kode-68734efb054ab9.76818695', 44, 0.765),
(24, 'kode-68734efb0a3da9.74398759', 45, 0.468),
(25, 'kode-68734efb0e0171.09641060', 46, 0.587),
(26, 'kode-68734efb139479.64442689', 47, 0.61),
(27, 'kode-68734efb175011.82123380', 48, 0.632),
(28, 'kode-68734efb1d0173.30316710', 49, 0.759),
(29, 'kode-68734efb20bcb5.42754142', 50, 0.736),
(30, 'kode-68734efb258176.24721929', 51, 0.482),
(31, 'kode-68734efb2a17d8.13736629', 52, 0.731),
(32, 'kode-68734efb2ece49.26280937', 53, 0.473),
(33, 'kode-68734efb33c979.45511546', 54, 0.579),
(34, 'kode-68734efb3783a4.06978638', 55, 0.733),
(35, 'kode-68734efb3bcaf5.25125184', 56, 0.753),
(36, 'kode-68734efb3f9b83.03215829', 57, 0.751),
(37, 'kode-68734efb45f780.95727730', 58, 0.769),
(38, 'kode-68734efb4aec60.47204619', 59, 0.728),
(39, 'kode-68734efb4f1239.78992749', 60, 0.723),
(40, 'kode-68734efb546bb1.12718009', 61, 0.606),
(41, 'kode-68734efb586016.75574507', 62, 0.746),
(42, 'kode-68734efb5cee90.82344335', 63, 0.737),
(43, 'kode-68734efb608eb4.31346225', 64, 0.634),
(44, 'kode-68734efb64c048.18628126', 65, 0.636),
(45, 'kode-68734efb686a71.12725332', 66, 0.614),
(46, 'kode-68734efb6d0c65.92510472', 67, 0.467),
(47, 'kode-68734efb70bdc4.65651936', 68, 0.626),
(48, 'kode-68734efb74f865.90147075', 69, 0.787),
(49, 'kode-68734efb78ff00.58628857', 70, 0.747),
(50, 'kode-68734efb80acf6.08133130', 71, 0.781),
(51, 'kode-68734efb856625.29210180', 72, 0.749),
(52, 'kode-68734efb899623.31199146', 73, 0.62),
(53, 'kode-68734efb8e20b1.77991401', 74, 0.592),
(54, 'kode-68734efb9cfaf8.46485839', 75, 0.477),
(55, 'kode-68734efba14528.71795022', 76, 0.757),
(56, 'kode-68734efba71288.56873627', 77, 0.722),
(57, 'kode-68734efbab1918.21181058', 78, 0.808),
(58, 'kode-68734efbafcd19.88238425', 79, 0.456),
(59, 'kode-68734efbb4d294.31678503', 80, 0.628),
(60, 'kode-68734efbb91f32.77025773', 81, 0.719);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `type` enum('Benefit','Cost') NOT NULL,
  `bobot` float NOT NULL,
  `ada_pilihan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `kriteria`, `type`, `bobot`, `ada_pilihan`) VALUES
(1, 'C1', 'Lanjut Usia', 'Benefit', 0.2, 0),
(2, 'C2', 'Penyakit Kronis', 'Cost', 0.3, 1),
(3, 'C3', 'Penerima Bantuan Lainnya', 'Benefit', 0.25, 1),
(4, 'C4', 'Penyandang Disabilitas', 'Benefit', 0.25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(50) NOT NULL,
  `id_alternatif` int(10) NOT NULL,
  `id_kriteria` int(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(316, 17, 1, 63),
(317, 17, 2, 3),
(318, 17, 3, 7),
(319, 17, 4, 9),
(321, 18, 1, 67),
(322, 18, 2, 3),
(323, 18, 3, 8),
(324, 18, 4, 9),
(377, 31, 1, 79),
(378, 31, 2, 3),
(379, 31, 3, 7),
(380, 31, 4, 9),
(381, 19, 1, 72),
(382, 19, 2, 5),
(383, 19, 3, 8),
(384, 19, 4, 31),
(385, 21, 1, 85),
(386, 21, 2, 2),
(387, 21, 3, 8),
(388, 21, 4, 31),
(389, 27, 1, 66),
(390, 27, 2, 6),
(391, 27, 3, 8),
(392, 27, 4, 31),
(393, 28, 1, 73),
(394, 28, 2, 5),
(395, 28, 3, 8),
(396, 28, 4, 31),
(397, 30, 1, 69),
(398, 30, 2, 5),
(399, 30, 3, 7),
(400, 30, 4, 31),
(401, 32, 1, 70),
(402, 32, 2, 6),
(403, 32, 3, 7),
(404, 32, 4, 9),
(405, 33, 1, 76),
(406, 33, 2, 5),
(407, 33, 3, 8),
(408, 33, 4, 31),
(409, 34, 1, 65),
(410, 34, 2, 5),
(411, 34, 3, 7),
(412, 34, 4, 9),
(413, 35, 1, 78),
(414, 35, 2, 5),
(415, 35, 3, 8),
(416, 35, 4, 31),
(417, 36, 1, 79),
(418, 36, 2, 5),
(419, 36, 3, 7),
(420, 36, 4, 9),
(421, 37, 1, 65),
(422, 37, 2, 6),
(423, 37, 3, 8),
(424, 37, 4, 31),
(429, 39, 1, 60),
(430, 39, 2, 2),
(431, 39, 3, 8),
(432, 39, 4, 31),
(433, 40, 1, 70),
(434, 40, 2, 5),
(435, 40, 3, 7),
(436, 40, 4, 9),
(437, 41, 1, 66),
(438, 41, 2, 4),
(439, 41, 3, 7),
(440, 41, 4, 9),
(441, 42, 1, 60),
(442, 42, 2, 5),
(443, 42, 3, 7),
(444, 42, 4, 9),
(449, 44, 1, 81),
(450, 44, 2, 5),
(451, 44, 3, 7),
(452, 44, 4, 9),
(453, 45, 1, 67),
(454, 45, 2, 6),
(455, 45, 3, 8),
(456, 45, 4, 31),
(461, 47, 1, 68),
(462, 47, 2, 5),
(463, 47, 3, 8),
(464, 47, 4, 9),
(465, 46, 1, 65),
(466, 46, 2, 6),
(467, 46, 3, 8),
(468, 46, 4, 9),
(473, 49, 1, 78),
(474, 49, 2, 5),
(475, 49, 3, 7),
(476, 49, 4, 9),
(477, 50, 1, 75),
(478, 50, 2, 6),
(479, 50, 3, 7),
(480, 50, 4, 9),
(481, 51, 1, 73),
(482, 51, 2, 6),
(483, 51, 3, 8),
(484, 51, 4, 31),
(485, 52, 1, 66),
(486, 52, 2, 5),
(487, 52, 3, 7),
(488, 52, 4, 9),
(489, 53, 1, 63),
(490, 53, 2, 5),
(491, 53, 3, 8),
(492, 53, 4, 31),
(497, 55, 1, 67),
(498, 55, 2, 5),
(499, 55, 3, 7),
(500, 55, 4, 9),
(501, 56, 1, 76),
(502, 56, 2, 5),
(503, 56, 3, 7),
(504, 56, 4, 9),
(505, 57, 1, 75),
(506, 57, 2, 5),
(507, 57, 3, 7),
(508, 57, 4, 9),
(509, 58, 1, 72),
(510, 58, 2, 4),
(511, 58, 3, 7),
(512, 58, 4, 9),
(513, 59, 1, 71),
(514, 59, 2, 6),
(515, 59, 3, 7),
(516, 59, 4, 9),
(517, 60, 1, 63),
(518, 60, 2, 5),
(519, 60, 3, 7),
(520, 60, 4, 9),
(525, 62, 1, 79),
(526, 62, 2, 6),
(527, 62, 3, 7),
(528, 62, 4, 9),
(529, 63, 1, 69),
(530, 63, 2, 5),
(531, 63, 3, 7),
(532, 63, 4, 9),
(533, 64, 1, 78),
(534, 64, 2, 5),
(535, 64, 3, 7),
(536, 64, 4, 31),
(545, 67, 1, 60),
(546, 67, 2, 5),
(547, 67, 3, 8),
(548, 67, 4, 31),
(549, 68, 1, 75),
(550, 68, 2, 5),
(551, 68, 3, 7),
(552, 68, 4, 31),
(553, 69, 1, 80),
(554, 69, 2, 4),
(555, 69, 3, 7),
(556, 69, 4, 9),
(557, 70, 1, 73),
(558, 70, 2, 5),
(559, 70, 3, 7),
(560, 70, 4, 9),
(561, 71, 1, 77),
(562, 71, 2, 4),
(563, 71, 3, 7),
(564, 71, 4, 9),
(565, 72, 1, 64),
(566, 72, 2, 4),
(567, 72, 3, 7),
(568, 72, 4, 9),
(577, 75, 1, 65),
(578, 75, 2, 5),
(579, 75, 3, 8),
(580, 75, 4, 31),
(581, 76, 1, 77),
(582, 76, 2, 5),
(583, 76, 3, 7),
(584, 76, 4, 9),
(585, 77, 1, 69),
(586, 77, 2, 6),
(587, 77, 3, 7),
(588, 77, 4, 9),
(589, 78, 1, 67),
(590, 78, 2, 3),
(591, 78, 3, 7),
(592, 78, 4, 9),
(601, 81, 1, 61),
(602, 81, 2, 5),
(603, 81, 3, 7),
(604, 81, 4, 9),
(605, 79, 1, 62),
(606, 79, 2, 6),
(607, 79, 3, 8),
(608, 79, 4, 31),
(609, 48, 1, 77),
(610, 48, 2, 5),
(611, 48, 3, 8),
(612, 48, 4, 9),
(613, 65, 1, 79),
(614, 65, 2, 5),
(615, 65, 3, 8),
(616, 65, 4, 9),
(617, 54, 1, 61),
(618, 54, 2, 6),
(619, 54, 3, 7),
(620, 54, 4, 31),
(621, 74, 1, 60),
(622, 74, 2, 5),
(623, 74, 3, 8),
(624, 74, 4, 9),
(625, 66, 1, 70),
(626, 66, 2, 5),
(627, 66, 3, 8),
(628, 66, 4, 9),
(641, 38, 1, 69),
(642, 38, 2, 3),
(643, 38, 3, 7),
(644, 38, 4, 9),
(645, 61, 1, 66),
(646, 61, 2, 5),
(647, 61, 3, 8),
(648, 61, 4, 9),
(649, 29, 1, 60),
(650, 29, 2, 4),
(651, 29, 3, 7),
(652, 29, 4, 9),
(657, 43, 1, 65),
(658, 43, 2, 4),
(659, 43, 3, 8),
(660, 43, 4, 31),
(661, 16, 1, 71),
(662, 16, 2, 5),
(663, 16, 3, 7),
(664, 16, 4, 9),
(665, 80, 1, 76),
(666, 80, 2, 5),
(667, 80, 3, 8),
(668, 80, 4, 9),
(669, 73, 1, 72),
(670, 73, 2, 5),
(671, 73, 3, 7),
(672, 73, 4, 31);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(50) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `sub_kriteria` varchar(50) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `sub_kriteria`, `nilai`) VALUES
(2, 2, '> 10 Tahun', 1),
(3, 2, '7 - 10 Tahun', 2),
(4, 2, '4 - 6 Tahun', 3),
(5, 2, '1 - 3 Tahun', 4),
(6, 2, '< 1 Tahun', 5),
(7, 3, 'Tidak ', 2),
(8, 3, 'Ya', 1),
(9, 4, 'Ya', 2),
(31, 4, 'Tidak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` char(1) NOT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `role`, `rw`, `rt`) VALUES
(16, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Kepala Desa', 'admin@gmail.com', '1', NULL, NULL),
(19, 'yudha', 'c63bd52776dbe04a7c37d9240a2fecc7fb80e91a', 'Yudha', 'yudha@gmail.com', '2', '003', '001'),
(20, 'rt', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'RT', 'datates@gmail.com', '4', '004', '003'),
(21, 'rw', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'RW', 'datates@gmail.com', '3', '004', '004'),
(22, 'rw2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'RW2', 'rw@gmail.com', '3', '002', '001'),
(23, 'rw3', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'RW3', 'rw3@gmail.com', '3', '003', '001');

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `usia` int(2) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `penyakit_kronis` varchar(100) NOT NULL,
  `penerima_bantuan` varchar(255) DEFAULT NULL,
  `disabilitas` varchar(20) DEFAULT NULL,
  `surat_sakit` varchar(255) DEFAULT NULL,
  `validasi` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id_warga`, `usia`, `nama`, `rt`, `rw`, `penyakit_kronis`, `penerima_bantuan`, `disabilitas`, `surat_sakit`, `validasi`) VALUES
(1, 71, 'Pesan (KK 1)', '001', '001', 'Stroke (1 Tahun 3 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 1),
(2, 63, 'Yusniar (KK2)', '001', '001', 'Stroke (7 Tahun 3 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 2),
(3, 67, 'Masdalena (KK3)', '001', '002', 'Stroke (7 tahun 2 Bulan)', 'PKH', 'Ya', 'uploads/contoh.jpeg', 0),
(4, 72, 'Elly Husain (KK4)', '001', '002', 'Diabetes (2 Tahun)', 'PKH', 'Tidak', 'uploads/contoh.jpeg', 1),
(5, 85, 'Idris Tambunan (KK5)', '001', '007', 'Asma (10 Tahun 8 Bulan)', 'PKH', 'Tidak', 'uploads/contoh.jpeg', 1),
(6, 66, 'Yuliardi (KK6)', '001', '007', 'Diabetes (6 Bulan)', 'Tidak', 'Tidak', 'uploads/contoh.jpeg', 1),
(7, 73, 'Norita Elidawati BR Sitorus (KK7)', '001', '007', 'Hypertensi (1 Tahun)', 'PKH', 'Tidak', 'uploads/contoh.jpeg', 1),
(8, 60, 'Alrizal (KK8)', '001', '009', 'Stroke (4 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(9, 69, 'Jumali (KK9)', '001', '001', 'Asma (3 Tahun)', 'Tidak', 'Tidak', 'uploads/contoh.jpeg', 1),
(10, 79, 'Zumaro (KK10)', '001', '001', 'Stroke (5 Tahun 8 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 1),
(11, 70, 'Turinah (KK11)', '001', '001', 'Stroke (7 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 1),
(12, 76, 'Mayurip (KK12)', '001', '001', 'Asma (3 Tahun)', 'BPNT', 'Tidak', 'uploads/contoh.jpeg', 1),
(13, 65, 'Rodiah (KK13)', '001', '001', 'Stroke (2 Tahun 4 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 1),
(14, 78, 'Harjo Sumitro (KK14)', '001', '001', 'Asma (1 Tahun 2 Bulan)', 'PKH', 'Tidak', 'uploads/contoh.jpeg', 1),
(15, 79, 'Triyono (KK15)', '001', '001', 'Stroke (1 Tahun 9 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(17, 65, 'Edwar (KK16)', '001', '001', 'Asma (10 Bulan)', 'BPNT', 'Tidak', 'uploads/contoh.jpeg', 0),
(18, 69, 'Arjamilah (KK17)', '001', '002', 'Stroke (7 Tahun 7 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(19, 60, 'Lili (KK18)', '001', '002', 'Asma (10 Tahun 5 Bulan)', 'BPNT', 'Tidak', 'uploads/contoh.jpeg', 0),
(20, 70, 'Dasinah (KK19)', '001', '002', 'Stroke (2 Tahun 2 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(21, 66, 'Asmi (KK20)', '001', '002', 'Stroke (4 Tahun 1 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(22, 60, 'Yustirah (KK21)', '001', '002', 'Stroke (3 Tahun 1 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(23, 65, 'Syamsidar Piliang (KK22)', '001', '002', 'Asma (5 Tahun)', 'PKH', 'Tidak', 'uploads/contoh.jpeg', 0),
(24, 81, 'Yakup (KK23)', '001', '003', 'Stroke (2 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 2),
(25, 67, 'Netti Sudarsih (KK24)', '001', '003', 'Asma (11 Bulan)', 'PKH', 'Tidak', 'uploads/contoh.jpeg', 0),
(26, 65, 'Zulfitri (KK25)', '001', '003', 'Stroke (9 Bulan)', 'PKH', 'Ya', 'uploads/contoh.jpeg', 1),
(27, 68, 'Badriah (KK26)', '001', '003', 'Stroke (1 Tahun)', 'BPNT', 'Ya', 'uploads/contoh.jpeg', 0),
(28, 77, 'Aisah (KK27)', '001', '003', 'Stroke (2 Tahun)', 'PKH', 'Ya', 'uploads/contoh.jpeg', 0),
(29, 78, 'Chosea (KK28)', '001', '003', 'Stroke (3 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(30, 75, 'Lasmina Astika (KK29)', '001', '003', 'Stroke (8 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(31, 73, 'Ramlah (KK30)', '001', '003', 'Asma (6 Bulan)', 'PKH', 'Tidak', 'uploads/contoh.jpeg', 0),
(32, 66, 'ABD. Rahman YS. (KK31)', '001', '003', 'Stroke (2 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(33, 63, 'Daraini (KK32)', '001', '003', 'Asma (2 Tahun)', 'BPNT', 'Tidak', 'uploads/contoh.jpeg', 0),
(34, 61, 'Hamzah Amran (KK33)', '001', '003', 'Asma (7 Bulan)', 'Tidak', 'Tidak', 'uploads/contoh.jpeg', 0),
(35, 67, 'Juniar (KK34)', '001', '003', 'Stroke (3 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(36, 76, 'Azwar (KK35)', '001', '003', 'Stroke (1 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(37, 75, 'Bahari (KK36)', '001', '003', 'Stroke (1 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(38, 72, 'Pilus (KK37)', '001', '003', 'Stroke (4 Tahun 5 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(39, 71, 'Roftah (KK38)', '001', '003', 'Stroke (8 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(40, 63, 'Syamsidar (KK39)', '001', '003', 'Stroke (1 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(41, 66, 'Rusnah (KK40)', '001', '003', 'Stroke (2 Tahun)', 'PKH', 'Ya', 'uploads/contoh.jpeg', 0),
(42, 79, 'Mahadum (KK41)', '001', '003', 'Stroke (6 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(43, 69, 'Bukhari (KK42)', '001', '004', 'Stroke (2 Tahun 9 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(44, 78, 'Sharudin (KK43)', '001', '004', 'Asma (1 Tahun 1 Bulan)', 'Tidak', 'Tidak', 'uploads/contoh.jpeg', 0),
(45, 79, 'Nurbaiti (KK44)', '001', '004', 'Stroke (1 Tahun 2 Bulan)', 'PKH', 'Ya', 'uploads/contoh.jpeg', 0),
(46, 70, 'Ninik (KK45)', '001', '004', 'Stroke (2 Tahun 8 Bulan)', 'PKH', 'Ya', 'uploads/contoh.jpeg', 0),
(47, 60, 'Mukasifah (KK46)', '001', '005', 'Asma (3 Tahun 6 Bulan)', 'PKH', 'Tidak', 'uploads/contoh.jpeg', 0),
(48, 75, 'Sugianto (KK47)', '001', '005', 'Stroke (2 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(49, 80, 'Jumiati (KK48)', '001', '005', 'Stroke (5 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(50, 73, 'Siju (KK49)', '001', '005', 'Stroke (3 Tahun 1 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(51, 77, 'Korbin Nainggolan (KK50)', '001', '006', 'Stroke (5 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(52, 64, 'Williancen Sitohang (KK51)', '001', '006', 'Stroke (6 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(53, 72, 'Hotma Pasaribu (KK52)', '001', '006', 'Asma (3 Tahun 2 Bulan)', 'Tidak', 'Tidak', 'uploads/contoh.jpeg', 0),
(54, 60, 'Rosmita BR Sitompul (KK53)', '001', '006', 'Stroke (1 Tahun 3 Bulan)', 'PKH', 'Ya', 'uploads/contoh.jpeg', 0),
(55, 65, 'Solo Ginting (KK54)', '001', '006', 'Asma (2 Tahun 2 Bulan)', 'PKH', 'Tidak', 'uploads/contoh.jpeg', 0),
(56, 77, 'Koster Pangaribuan (KK55)', '001', '006', 'Stroke (3 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(57, 69, 'Lisnarohtuahni BR Saragih (KK56)', '001', '006', 'Stroke (9 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(58, 67, 'Basari (KK57)', '001', '007', 'Stroke (7 Tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(59, 71, 'Alizar (KK58)', '001', '007', 'Diabetes (4 Tahun 3 Bulan)', 'BPNT', 'Tidak', 'uploads/contoh.jpeg', 2),
(60, 62, 'Sumiyem (KK59)', '001', '007', 'Diabetes (6 Bulan)', 'Tidak', 'Tidak', 'uploads/contoh.jpeg', 0),
(61, 76, 'Eli Puspita (KK60)', '001', '007', 'Stroke (2 Tahun)', 'PKH', 'Ya', 'uploads/contoh.jpeg', 0),
(62, 61, 'Darmini Sinaga (KK61)', '001', '007', 'Stroke (2 Tahun 6 Bulan)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 0),
(67, 76, 'yudha', '001', '001', 'stroke (1 tahun)', 'Tidak', 'Ya', 'uploads/contoh.jpeg', 1),
(68, 60, 'Adit', '001', '001', 'Asma', 'pkh', 'Tidak', 'uploads/Analisis Sistem Berjalan_page-0001.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `fk_hasil` (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `fk_penilaian_alternatif` (`id_alternatif`),
  ADD KEY `fk_penilaian_kriteria` (`id_kriteria`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `fk_sub_kriteria_id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=673;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `fk_hasil` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fk_penilaian_alternatif` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`),
  ADD CONSTRAINT `fk_penilaian_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `fk_sub_kriteria_id_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
