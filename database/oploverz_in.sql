-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 04:00 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oploverz_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `no_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `no_admin`) VALUES
('admin', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `no_anime` int(11) NOT NULL,
  `judul_anime` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `produser` varchar(300) NOT NULL,
  `jdwl_rilis` varchar(10) NOT NULL,
  `tgl_penyiaran` date NOT NULL,
  `durasi` varchar(30) NOT NULL,
  `gambar` varchar(200) NOT NULL DEFAULT 'default_image.png',
  `skor` float NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`no_anime`, `judul_anime`, `deskripsi`, `produser`, `jdwl_rilis`, `tgl_penyiaran`, `durasi`, `gambar`, `skor`, `status`) VALUES
(1, 'Accel World', '<p>Haruyuki Arita adalah seorang anak muda yang selalu diganggu oleh teman sekelasnya. Malu dengan kehidupannya yang miris,, Haruyuki hanya dapat mengatasi semua itu dengan permainan virtual. Tapi itu semua berubah ketika Kuroyukihime, gadis paling populer di sekolah, memperkenalkan dia program misterius yang disebut Brain Burst dan realitas maya yang disebut Dunia Accel.</p>\r\n', 'Sunrise, Genco, Viz MediaL, Rakuonsha, Warner Bros., flying DOG, ASCII Media Works', 'Selasa', '2019-01-14', '24 menit', 'accel2.jpg', 8, 'ongoing'),
(2, 'Kimetsu no Yaiba', '<p>Sejak dahulu kala, rumor tentang iblis pemakan manusia telah menyebar luas. Karena hal inilah, para penduduk tak pernah berkeliaran keluar di malam hari. Dalam rumor itu terdapat juga legenda tentang Pembunuh Iblis yang juga berkeliaran memburu para iblis di malam hari. Bagi Tanjirou, rumor yang awalnya tak diyakininya itu justru menjadi pengalaman pahit baginya. Seluruh keluarganya dibantai oleh iblis dan hanya menyisakan adiknya yang berubah menjadi iblis.</p>\r\n', 'Ufotable, Aniplex, Shueisha', 'Selasa', '2019-04-09', '24 menit', 'kimetsu.jpg', 8, 'ongoing'),
(4, 'Mob Psycho 100', '<p>menceritakan kisah mob</p>\r\n', 'toei animation', 'Selasa', '2019-04-01', '24 menit', 'mob1.jpg', 8.9, 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `no_episode` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `judul_episode` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `thumbnail` varchar(300) NOT NULL DEFAULT 'default_image.png',
  `no_anime` int(11) NOT NULL,
  `tgl_rilis` date NOT NULL,
  `link_streaming` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`no_episode`, `episode`, `judul_episode`, `deskripsi`, `thumbnail`, `no_anime`, `tgl_rilis`, `link_streaming`) VALUES
(1, 1, 'Kekejaman !', '<p>Kimetsu no Yaiba Sub Indo Episode 01, seluruh keluarga Tanjirou dibantai dan hanya menyisakan adiknya yang berubah menjadi iblis pemakan manusia.</p>\r\n', 'default_image.png', 2, '2019-04-09', 'https://drive.google.com/file/d/1By55LCqRrKUG6bLAocYFbvsYgvCjiAXb/preview'),
(2, 2, 'episode', '<p>dd captions to your slides easily with the <code>.carousel-caption</code> element within any <code>.carousel-item</code>. They can be easily hidden on smaller viewports, as shown below, with optional <a href=\"https://getbootstrap.com/docs/4.3/utilities/display/\">display utilities</a>. We hide them initially with <code>.d-none</code> and bring them back on medium-sized devices with <code>.d-md-block</code>.</p>\r\n', 'kimetsu1.jpg', 2, '2019-04-17', 'https://drive.google.com/file/d/16zEzZr7WY9SgDA5jV6U_Wv5-fR-JgZue/preview');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `no_genre` int(11) NOT NULL,
  `nama_genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`no_genre`, `nama_genre`) VALUES
(2, 'adventure'),
(3, 'comedy'),
(4, 'demons'),
(5, 'drama'),
(6, 'Fantasy'),
(7, 'Game'),
(8, 'Harem'),
(9, 'Historical'),
(10, 'Horor'),
(11, 'Josei'),
(12, 'Magic'),
(15, 'Martial Arts'),
(16, 'Military'),
(17, 'Mystery'),
(18, 'Police'),
(19, 'Romance'),
(20, 'School'),
(21, 'Seinen'),
(22, 'Slice of Life'),
(23, 'Sports'),
(24, 'Supernatural'),
(25, 'Mecha'),
(26, 'Music'),
(27, 'Parody'),
(28, 'Psychological'),
(29, 'Samurai'),
(30, 'Sci-Fi'),
(31, 'Shoujo'),
(32, 'Shounen Duration : 1 hour'),
(33, 'Space'),
(34, 'Super Power'),
(35, 'Thriller'),
(36, 'Vampire'),
(37, 'Adzab'),
(38, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `genre_meliputi_anime`
--

CREATE TABLE `genre_meliputi_anime` (
  `no_anime` int(11) NOT NULL,
  `no_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre_meliputi_anime`
--

INSERT INTO `genre_meliputi_anime` (`no_anime`, `no_genre`) VALUES
(4, 3),
(4, 5),
(4, 12),
(4, 24),
(2, 4),
(2, 9),
(2, 32),
(2, 24),
(1, 3),
(1, 4),
(1, 16),
(1, 30),
(1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `no_komentar` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` date NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'OK',
  `no_episode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`no_komentar`, `nama`, `email`, `isi_komentar`, `tgl_komentar`, `status`, `no_episode`) VALUES
(1, 'anak gemuk', 'anakgemuk@yahoo.com', 'keren nih kyknya, mirip2 inuyasha/kekkaishi gitu atmosfirnya. nice min', '2019-04-09', 'OK', 1),
(2, 'nizar', 'nizar@gmail.com', 'Makasih min buat Kimetsu no Yaiba episode 1 nya ?', '2019-04-01', 'Block', 1),
(3, 'Mantappu', 'mantappu@gmail.com', 'Mantab nih anime', '2019-04-03', 'OK', 1),
(4, 'Orrel', 'orel@gmail.com', 'mantap min', '2019-04-10', 'OK', 1),
(5, 'Fua', 'fua@gmail.com', 'Setelah penantian panjang baca manganya, akhirnya bisa nonton versi animenya', '2019-04-01', 'OK', 1),
(6, 'Fandri', 'fandri@gmail.com', 'Mantul….', '2019-04-05', 'OK', 1),
(7, 'Faris l', 'faris@gmail.com', 'wah mamtep ini, penasaran ama lagu endingnya, ternyata bener suaranya lisa wkwk', '2019-04-08', 'OK', 1),
(8, 'tester', 'tester@gmail.com', 'mantap anjeng', '2019-04-18', 'OK', 1),
(9, 'Hendro', 'hendro@gmail.com', 'mantap coy', '2019-04-23', 'Block', 1);

-- --------------------------------------------------------

--
-- Table structure for table `link_download`
--

CREATE TABLE `link_download` (
  `no_link` int(11) NOT NULL,
  `nama_link` varchar(100) NOT NULL,
  `link` varchar(150) NOT NULL,
  `no_episode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_download`
--

INSERT INTO `link_download` (`no_link`, `nama_link`, `link`, `no_episode`) VALUES
(1, 'elsfile', 'http://elsfile.org/amcuh41yezfo', 1),
(2, 'zippyshare', 'https://www77.zippyshare.com/v/BWokeBdg/file.html', 1),
(3, 'megaup', 'https://megaup.net/89gq/oploverz_-_KnY_01_[mp4_480p].mp4', 1),
(4, 'upfile', 'http://upfile.mobi/YCGVJEYp2sp', 1),
(5, 'uptobox', 'https://uptobox.com/xidbu8d0ptwn', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no_admin`);

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`no_anime`);

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`no_episode`),
  ADD KEY `episodeanime` (`no_anime`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`no_genre`);

--
-- Indexes for table `genre_meliputi_anime`
--
ALTER TABLE `genre_meliputi_anime`
  ADD KEY `genreanime` (`no_anime`),
  ADD KEY `genregenre` (`no_genre`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`no_komentar`),
  ADD KEY `komentarepisode` (`no_episode`);

--
-- Indexes for table `link_download`
--
ALTER TABLE `link_download`
  ADD PRIMARY KEY (`no_link`),
  ADD KEY `linkepisode` (`no_episode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `no_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `no_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `no_episode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `no_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `no_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `link_download`
--
ALTER TABLE `link_download`
  MODIFY `no_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episodeanime` FOREIGN KEY (`no_anime`) REFERENCES `anime` (`no_anime`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genre_meliputi_anime`
--
ALTER TABLE `genre_meliputi_anime`
  ADD CONSTRAINT `genreanime` FOREIGN KEY (`no_anime`) REFERENCES `anime` (`no_anime`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genregenre` FOREIGN KEY (`no_genre`) REFERENCES `genre` (`no_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentarepisode` FOREIGN KEY (`no_episode`) REFERENCES `episode` (`no_episode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `link_download`
--
ALTER TABLE `link_download`
  ADD CONSTRAINT `linkepisode` FOREIGN KEY (`no_episode`) REFERENCES `episode` (`no_episode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
