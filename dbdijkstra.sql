-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2019 at 04:37 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdijkstra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'oggy', 'oggy', 'oggy');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(10) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `berita` text,
  `tanggal` varchar(25) DEFAULT NULL,
  `gambar` varchar(144) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `berita`, `tanggal`, `gambar`) VALUES
(6, 'jajal', 'mb uh hkjd kdj cbjbjzhu shlk cndb cz nlm ;xscdfv gbvc sdx dvb gfv cdsx', '12/08/2019', '2127394cb4b0e49855f4e32b29893cff--gag-stones.jpg'),
(7, 'aa', '	mb uh hkjd kdj cbjbjzhu shlk cndb cz nlm ;xscdfv gbvc sdx dvb gfv', '12/12/20112', 'C0Nfi_RUoAAnlBY.jpg'),
(8, 'AAAASSSSSSSSSSS', 'ASSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSFDDDD SGR GGRGRGRXBASBKB KJABK KJBK WHHWHLII WHLHWLHDL WL W LIDLWHLI HLWIHDLI WLLI WHILWLIHDLWHLDHLWIDD', '', 'C0Nfi_RUoAAnlBY.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id_buku_tamu` int(4) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `company` varchar(35) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `subjek` varchar(30) DEFAULT NULL,
  `pesan` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_buku_tamu`, `nama`, `email`, `company`, `telepon`, `subjek`, `pesan`) VALUES
(1, 'afif', 'afif_123@yahoo.co.id', 'lampung', '085228883437', 'admin', 'test pesan buku tamu');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jenis` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `jenis`, `aktif`) VALUES
(45, 'Wisata Alam', 'lingkungan.png', 'Y'),
(44, 'Wisata Budaya', 'budaya.png', 'Y'),
(47, 'Wisata Religi', 'religi.png', 'Y'),
(48, 'Wisata Air', 'air.png', 'Y'),
(49, 'Wisata Sejarah dan Edukasi', 'pendidikan.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `peta_wisata`
--

CREATE TABLE IF NOT EXISTS `peta_wisata` (
  `id_wisata` int(4) NOT NULL,
  `id_kategori` int(4) DEFAULT NULL,
  `nama` text,
  `deskripsi` text,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `alamat` text,
  `gambar` text
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peta_wisata`
--

INSERT INTO `peta_wisata` (`id_wisata`, `id_kategori`, `nama`, `deskripsi`, `lat`, `lng`, `alamat`, `gambar`) VALUES
(26, 45, 'Taman Maerokoco', 'Konsep dari objek wisata Puri Maerokoco Semarang adalah menyerupai Taman Mini Indonesia Indah (TMII). Untuk anda warga Jawa Tengah yang belum pernah berkunjung ke TMII maka tempat ini harus dikunjungi terlebih dahulu tidak usah jauh – jauh sampai Ibukota Jakarta. Anda tak perlu khawatir karena harga tiket Puri Maerokoco tidak semahal harga tiket TMII.\r\nPuri Maerokoco Semarang diresmikan tahun 1980 oleh Gubernur Ismail yang merupakan bagian dari Pusat Rekreasi dan Promosi Pembangunan (PRPP) Jawa Tengah. Dan pada tanggal 12 Mei 2017 berganti nama menjadi Grand Maerakaca. Pemilihan nama Grand semata – mata untuk memberikan kesan elegant dan berkelas suatu tempat wisata.\r\nUntuk Jam Operasional Taman Maerokoco sendiri yaitu:\r\nSenin-Jumat : 08.00 - 18.00 WIB\r\nSabtu : 08.00 - 22.00 WIB\r\nMinggu : 08.00 - 18.00 WIB\r\n\r\nHArga Tiket adalah sebesar Rp 10.000,-\r\n', -6.95972190538665, 110.386767983437, 'Jl. Puri Maerokoco, Tawangsari, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50144, Indonesia', 'maerokoco.jpg'),
(27, 48, 'Jungle Toon Waterpark', 'Jungle Toon Waterpark Semarang – Merupakan tempat wisata waterpark yang saat ini banyak di minati para pengunjung untuk berlibur diakhir pekan. Kolam renang yang ada di Jungle Toon Waterpark ini juga ada banyak dan di desain sangat unik dan keren. Selain kolam renang waterpark ini juga ada beberapa wahana waterboom jungle dimana pengunjung selain berenang juga bisa bermain air.\r\n\r\nUntuk Lokasi Jungle Toon Waterpark ini pun sangat mudah di jangkau dengan kendaraan bermotor atau dengan mobil. Waterpark ini biasanya ramai dikunjungi pada akhir pekan atau hari – hari libur. Bahkan pengunjung yang datang tidak hanya dari dalam kota namun juga ada yang dari luar kota. Katergori pengunjung yang datang ke Jungle Toon Waterpark ini biasanya paling banyak anak – anak sekolah, kolam renang yang disediakan juga ada banyak kategori. Mulai dari kategori anak di bawah umur sampai dengan orang dewasa, untuk kedalaman maksimal di Jungle Toon Waterpark Semarang ini mencapai 2 meter.\r\n\r\nHarga Tiket Masuk Jungle Toon Waterpark:\r\nSenin- Jumat : Rp 20.000,-\r\nSabtu-Minggu : Rp 30.000,-', -7.00381724662703, 110.386127606034, 'Unnamed Road, Manyaran, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50147, Indonesia', 'jungle-toon-semarang.jpg'),
(25, 45, 'Bonbin Mangkang', 'Bonbin sendiri adalah singkatan dari kebon binatang atau kebun binatang, namun orang Semarang lebih akrab dengan sebutan Bonbin Mangkang. Di Bonbin Mangkang ini Kamu bisa melihat banyaknya jenis binatang baik itu yang di lindungi ataupun liar.\r\nerdapat banyak sekali jenis hewan yang ada di Bonbin Mangkang ini, karena itulah kebun binatang ini dibilang destinasi wisata yang memiliki spesies hewan paling banyak, yaitu sekitar 40 spesies dan itu sama dengan hewan yang berjumlah 200.\r\nBeberapa hewan itu adalah Singa, Buaya, Rusa Timor, Gajah Sumatera, Kangguru, Beruang, Kera Jawa, dan tentu masih banyak lagi yang lainnya.\r\nBagi kamu yang tertarik untuk berkunjung ke Bonbin Mangkang ini, ada baiknya untuk mengetahui beberapa harga tiket yang tertera di bawah ini supaya kamu bisa mempersiapkan anggaran yang pas.\r\n\r\n• Tiket Masuk Pintu Utama\r\n- Hari Biasa : Rp 7.500\r\n- Hari Libur : Rp 10.000\r\n- Lebaran/Tahun Baru : Rp 15.000\r\n', -6.9698683749627, 110.28721511364, 'Jl. Nasional 1, Wonosari, Kec. Ngaliyan, Kota Semarang, Jawa Tengah 50244, Indonesia', 'bonbin semarang.jpg'),
(24, 45, 'Pantai Marina', 'Pantai Marina terletak di ujung utara Kota Semarang, tepatnya di belakang PRPP. PAntai Marina merupakan Pantai yang berdekatan dengan Banda Internasional Ahmad Dani. Pantai marina merupakan Pantai yang dijaga kebersihan oleh pemerintah setempat. Selain itu juga terdapathamparan batu karang ditepian pantai yang digunakan untuk menikmati pemandangan indah pantai di Pagi dan sore hari.\r\nPengunjung pantai MArina tidak perlu khawatir untuk melihat keadaan sekitar pantai, karena disediakan kapal kecil yang di gunakan untuk melayani wisatawan untuk menelusuri keadaan sekitar Pantai. Tetapi yang ingin menggunakan Kapal kecil ini akan dikenakan biaya sekitar 20.000-30.000 tiap orang. selain itu untuk harga tiket masuknya sendiri dikawasan Pantai MArina dikenakan biaya sebesar Rp. 5.000,-.', -6.94887497768481, 110.389326810837, 'Unnamed Road, Kota Semarang, Jawa Tengah, Indonesia', 'pantai-marina.jpg'),
(23, 49, 'Museum Ronggowarsito', 'Museum Ronggowarsito adalah sebuah tempat wisata yang terletak di jalan Abdurrahman Saleh yang merupakan Museum terlengkap di Semarang dengan memiliki koleksi sejarah, alam, arkeologi, kebudayaan, era pembangunan dan wawasan nusantara.\r\nMuseum Ronggowarsito menempati lahan seluas 1,8 hektar. Nama museum ini diambil dari nama salah satu pujangga Indonesia, Ranggawarsita, yang terkenal dengan hasil karyanya dalam bidang filsafat dan kebudayaan.\r\nMuseum Ronggowarsito di buka setiap hari dari pukul 08.00 sampai 15.00 WIB. Dari Tugu Muda Semarang, Museum ini hanya berjarak sekitar 3 KM dan dapat dijangkau dengan mudah menggunakan Transportasi umum maupun pribadi.\r\nHarga Tiket WIsata Museum Ronggowarsito:\r\n Wisatawan Lokal\r\n- Dewasa : Rp 5.000 /orang\r\n- Anak-anak : Rp 2.000 /anak\r\n\r\n• Wisatawan Asing\r\n- Rp 10.000 /orang\r\n\r\nNB: *Harga diatas bisa berubah sewaktu waktu\r\n', -6.98600416366531, 110.383922159672, 'SD Al Azhar, Gisikdrono, Kec. Semarang Bar., Kota Semarang, Jawa Tengah, Indonesia', 'museum ranggawarsito.jpg'),
(22, 47, 'Sam Poo Kong Temple', 'Kelenteng Sam Po Kong merupakan bekas tempat persinggahan dan pendaratan pertama seorang Laksamana Tiongkok yang bernama Zheng He / Cheng Ho. Tempat ini biasa disebut Gedung Batu, karena bentuknya merupakan sebuah Gua Batu besar yang terletak pada sebuah bukit batu. Terletak di daerah Simongan, sebelah barat daya Kota Semarang.\r\nHampir di keseluruhan bangunan bernuansa merah khas bangunan China. Sekarang tempat tersebut dijadikan tempat peringatan dan tempat pemujaan atau bersembahyang serta tempat untuk berziarah. \r\nUntuk Harga tiket masuk di wisata Sam Poo Kong adalah sebesar  Rp 8.000,- dan apabila untuk mengeksplor lebih jauh lagi akan dikenakan biaya sebesar Rp 28.000,-. Untuk waktu kunjungan wisata ini adalah mulai pukul 08.00-22.00 WIB', -6.99598567036833, 110.398371219635, 'Jl. Simongan No.129, Bongsari, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50148, Indonesia', 'klenteng sam poo kong.jpg'),
(21, 45, 'Kampung Pelangi', 'Kampung Gunung Brintik beberapa bulan yang lalu adalah kampung kumuh yang tak tertata dengan rimbunan tanaman liar dan tembok-tembok merah tak berplester. Letaknya persis di pinggir Kali Semarang dengan kurang lebih 325 rumah. Namun beberapa pekan terakhir, kampung ini berubah rupa, dan juga berganti nama: menjadi Kampung Pelangi yang penuhi warna-warni.\r\nKampung Pelangi yang ada di Semarang ini terletak di Jalan dr. Sutomo, Kelurahan Randusari, Semarang Selatan. Sebelum masuk ke area kampung ini, kamu bisa menemukan Pasar Bunga Kalisari yang sudah direnovasi dan terlihat jauh lebih menarik dan tertata. Lokasi kampung ini tak jauh dari Tugu Muda dan terletak di area perbukitan sehingga terlihat dari jarak jauh.', -6.98887743779835, 110.408375859261, 'Jl. DR. Sutomo No.89, Randusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50244, Indonesia', 'kampung-pelangi.jpg'),
(19, 49, 'Lawang Sewu', 'Semarang – Lawang Sewu merupakan sebuah bangunan kuno peninggalan jaman belanda yang dibangun pada 1904. Semula gedung ini untuk kantor pusat perusahaan kereta api (trem) penjajah Belanda atau Nederlandsch Indishe Spoorweg Naatschappij (NIS). Gedung tiga lantai bergaya art deco (1850-1940) ini karya arsitek Belanda ternama, Prof Jacob F Klinkhamer dan BJ Queendag. Lawang Sewu terletak di sisi timur Tugu Muda Semarang, atau di sudut jalan Pandanaran dan jalan Pemuda.\r\nHarga Tiket: \r\n1. Dewasa : Rp. 10.000,-\r\n2. Anak-anak : Rp 5.000,-\r\n3. Pelajar : Rp 5.000,-', -6.98393622067173, 110.41036605835, 'Lawang Sewu, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah, Indonesia', 'lawangsewu.jpg'),
(20, 49, 'Museum Mandala Bhakti', 'Bangunan ini sudah ada sejak zaman Belanda, jadi wajar jika gedung ini menyimpan banyak sejarah. Museum ini dibangun oleh insinyur Kuhr E pada tahun 1930. Pada awalnya bangunan ini digunakan untuk gedung peradilan bangsa Eropa. Itu sebabnya bangunan ini dirancang kaku, agar terkesan tegas. Setelah Jepang berhasil menduduki Indonesia, bangunan ini dijadikan markas militer tentara Jepang. Namun setelah Jepang menyerah dan Indonesia merdeka, bangunan ini dijadikan markas pertahanan II. Fungsi bangunan museum ini sangat penting pada zaman dahulu. Bahkan karena penting, bangunan ini selalu dijaga dari serangan musuh. Sampai saat ini bangunan museum ini tetap kokoh berdiri.\r\nUntuk masuk ke dalam museum ini, kamu tidak perlu membayar alias gratis. Hal inilah yang menyebabkan banyak pengunjung datang, karena mereka tidak perlu membayar. Untuk jam buka, museum ini buka pada jam 8 pagi dan tutup pada jam 2 siang. Museum ini buka setiap hari. Jika kamu ingin kemari pastikan kamu berkunjung pada jam yang telah ditentukan.', -6.98482543062385, 110.408869385719, 'Bangunharjo, Jl. Mgr Sugiyopranoto, Barusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50245, Indonesia', 'museum Mandala Bhakti.jpg'),
(28, 45, 'Goa Kreo dan Waduk Jatibarang', 'Goa Kreo Semarang merupakan sebuah goa yang dipercaya sebagai petilasan Sunan Kalijaga saat mencari kayu jati untuk membangun Mesjid Agung Demak . Ketika itu menurut legenda Sunan Kalijaga bertemu dengan sekawanan kera yang kemudian disuruh menjaga kayu jati tersebut. Kata “Kreo” berasal dari kata Mangreho yang berarti peliharalah atau jagalah. Kata inilah yang kemudian menjadikan goa ini disebut Goa Kreo dan sejak itu kawanan kera yang menghuni kawasan ini dianggap sebagai penunggu.\r\n\r\nKawasan Wisata Goa Kreo Semarang ini berada di Dukuh Talun Kacang, Desa Kandri, Kecamatan Gunungpati, Semarang. Monyet monyet yang ada di Goa Kreo ini adalah monyet ekor panjang (Macaca fascicularis), monyet yang ada di sini termasuk monyet yang cukup jinak, dan bisa bergaul dengan warga di sekitar Goa Kreo.\r\n\r\nGoa Kreo ini berada di tengah-tengah bendungan. Hal ini membuat pengunjung harus menyeberangi bendungan untuk sampai ke Goa Kreo. Untuk menyeberangi bendungan, ada jembatan melintang yang kokoh dan eksotis.\r\n\r\nSebelum melintasi jembatan merah yang kokoh tersebut, pengunjung harus menuruni beberapa anak tangga. Tak hanya sebagai penghubung untuk sampai ke goa, jembatan ini memiliki fungsi lain. Apalagi kalau bukan spot foto, karena memang keren bisa berfoto di jembatan ini.\r\n\r\nHarga Tiket Masuk Kawasan Goa Kreo dan Waduk Jatibarang sebesar Rp 5.000,- dan u tuk jam operasionalnya adalah setiap hari dari jam 07.00-17.00', -7.03721128188131, 110.347613096237, 'Jl. Moch Ihsan, Kedungpane, Mijen, Kota Semarang, Jawa Tengah 50211, Indonesia', 'goa-kreo.jpg'),
(29, 47, 'Pagoda Avalokitesvara', 'Pagoda Avalokitesvara Buddhagaya Watugong Semarang ini memiliki tinggi 45 meter yang terdiri dari 7 tingkat seperti Pagoda pada umumnya. Tiap tingkat memiliki empat buah patung Dewi Kwan Im yang menghadap ke empat penjuru. Bahan bangunan dari mulai genteng, aksesori, relief tangga dari batu, kolam, lampu dan air mancur naga, sampai patung burung Hong dan Kilin seluruhnya diimpor dari China.\r\n\r\nMenurut sejarah, vihara Buddhagaya Watugong didirikan pada tahun 1957, dan merupakan vihara pertama di Indonesia setelah keruntuhan kerajaan Majapahit. Saat itu berupa vihara kecil, dan sempat terlantar selama beberapa tahun. Hingga akhirnya Sangha Theravada Indonesia memprakarsai renovasi vihara Watugong menjadi sebuah vihara yang besar, indah, megah. Pada tahun 2006 vihara ini diresmikan kembali.\r\n\r\nKeunikan bentuk bangunan dan warna yang mencolok yang dimiliki Padoga ini menjadi magnet tersendiri bagi wisatawan yang berkunjung dari berbagai daerah, baik dalam maupun luar kota. Jadi jika Anda berencana untuk datang berkunjung ke kota Semarang, tentu akan sayang jika Anda melewatkan tempat yang satu ini.\r\n\r\nVihara Budhagaya ini dibuka mulai pukul 07.00 hingga 21.00 wib. Sedangkan untuk tiket masuknya, pengurus Vihara tidak mematok tarif retribusinya secara pasti, Anda hanya akan diminta untuk membayar tiket parkir kendaraan seiklasnya saja', -7.08681106528236, 110.409196615219, 'Vihara Buddhagaya, Pudakpayung, Kec. Banyumanik, Kota Semarang, Jawa Tengah, Indonesia', 'pagoda-avalokitesvara.jpg'),
(30, 48, 'water blaster semarang', 'Sesuai dengan namanya water park ini mengusung konsep waterpark dengan beragam kegiatan yang berhubungan dengan permainan air. Wahana-wahana dengan banyak pilihan disajikan untuk kecerian setiap pengunjung yang datang ke waterpark ini. Beberapa wahana yang layak untuk dicoba antara lain:\r\nSlider : Wahana yang memiliki 2 seluncuran, dengan ketinggian dan panjang lintasan yang akan menguji andrenalin. Salah satu seluncuran merupakan yang terpanjang dan tertinggi di Water Blaster Semarang.\r\n\r\nSlide Race : Wahana yang sangat cocok buat kamu yang suka peluncuran dengan kecepatan tinggi. Meluncur dari ketinggian 12 meter meluncur dilintasan sepanjang 60 meter pasti akan seru sekali. Kamu juga bisa balapan dengan pengunjung lain untuk menguji jiwa kompetitif kamu.\r\n\r\nFamily Slide : Sangat cocok dimainkan keluarga yang membawa anak-anak. Seluncuran air yang tidak terlalu tinggi hanya 3,5 meter serta panjang 18 meter pasti akan membuat anak-anak akan ceria ketika memainkan wahana ini.\r\n\r\nBeach : Lazy River sepanjang 250 meter, kamu bisa mengarungi sugai buatan ini dengan beberapa kejutan menarik tentunya. Atau kalau kamu sudah terlalu lelah bermain di berbagai wahana kamu juga bisa bersantai di sungai buatan.\r\n\r\nJam Operasional Water Blaster:\r\nSenin : Libur\r\nSelasa - Jumat: 10.00 - 17.30 WIB\r\nSabtu-Minggu : 07.00-17.30 WIB\r\n\r\nHarga Tiket:\r\nSelasa-Jumsat: Rp 60.000\r\nSabtu-Minggu : Rp 80.000\r\n*Pada musim liburan seperti Desember dan Juli, biasanya harga tiket masuk tempat wisata mengalami penyesuaian, ada baiknya langsung menghubungi waterpark untuk kepastian harga tiket masuk.', -7.02188853769305, 110.438333451748, 'Jl. Bukit Golf No.1, Jangli, Kec. Tembalang, Kota Semarang, Jawa Tengah 50255, Indonesia', 'water-blaster-semarang.png'),
(31, 45, 'Lapangan Simpang Lima Semarang', 'Selain mampir ke objek wisata populer seperti Lawang Sewu, kamu juga bisa mampir ke Simpang Lima Semarang. Alun-alun kebanggaan warga Kota Atlas ini terletak di pusat kota dan mudah diakses dari mana saja.Sebutan Simpang Lima muncul karena lokasinya yang berada di tengah-tengah lima persimpangan. Yakni Jl. Pahlawan, Jl. Pandanaran, Jl. Ahmad Yani, Jl. Gajah Mada, dan Jl. A. Dahlan.\r\n\r\nLapangan Pancasila pertama kali diresmikan tahun 1969. Namun, pembangunannya sudah dimulai sejak pemerintahan Presiden Soekarno.\r\n\r\nSaat itu, Presiden Soekarno ingin alun-alun Semarang dipindah dari posisinya semula di Kawasan Kauman. Pasalnya, sejak tahun 1938, alun-alun Kauman terkikis dan berubah fungsi menjadi kawasan perdagangan.\r\n\r\nPembangunan Pasar Johar dan pertokoan semakin mempersempit alun-alun lama ini. Hingga akhirnya, hanya tersisa Masjid Agung Kauman yang kini dilestarikan menjadi cagar budaya yang harus dilindungi.\r\n\r\nSejak diresmikan untuk umum, Lapangan Pancasila semakin ramai dikunjungi masyarakat. Berbagai event besar nasional dan festival rakyat seringkali diadakan di tempat ini.', -6.99028311933483, 110.422929525375, 'Lapangan "Pancasila" Simpang Lima, Jl. Simpang Lima, Pleburan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50241, Indonesia', 'simpang lima.jpg'),
(32, 49, 'Kota Lama ', 'Kota Lama adalah potongan sejarah, karena dari sinilah ibukota Jawa Tengah ini berasal. Semarang dan Kota Lama seperti dua sisi mata uang yang tak bisa dipisahkan begitu saja. Dan tentu saja ini menghadirkan keunikan tersendiri. Sebuah gradasi yang bisa dibilang jarang ada ketika dua generasi disatukan hingga menciptakan gradasi yang cantik sebenarnya.\r\n\r\nSecara umum karakter bangunan di wilayah ini mengikuti bangunan-bangunan di benua Eropa sekitar tahun 1700-an. Hal ini bisa dilihat dari detail bangunan yang khas dan ornamen-ornamen yang identik dengan gaya Eropa. Seperti ukuran pintu dan jendela yang luar biasa besar, penggunaan kaca-kaca berwarna, bentuk atap yang unik, sampai adanya ruang bawah tanah. Hal ini tentunya bisa dibilang wajar karena faktanya wilayah ini dibangun saat Belanda datang. Tentunya mereka membawa sebuah konsep dari negara asal mereka untuk dibangun di Semarang yang nota bene tempat baru mereka. ', -6.96821236684317, 110.427457094193, 'Jl. Letjen Suprapto No.32, Tj. Mas, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50174, Indonesia', 'Kota LAma.jpg'),
(33, 47, 'Masjid Agung Jawa Tedngah', 'merupakan salah satu masjid termegah di Indonesia. Masjid dengan arsitektur indah ini mulai dibangun pada tahun 2001 dan selesai pada tahun 2006. Kompleks masjid terdiri dari bangunan utama seluas 7.669 m2 dan halaman seluas 7.500 m2. \r\n\r\nMasjid Agung Jawa Tengah terletak di jalan Gajah Raya, tepatnya di Desa Sambirejo, Kecamatan Gayamsari, Kota Semarang.Masjid yang mampu menampung jamaah tak kurang dari 15.000 ini diresmikan oleh Presiden Republik Indonesia, Susilo Bambang Yudhoyono, pada tahun 2006. Upacara peresmian ditandai dengan penandatanganan batu prasasti setinggi 3,2 m dan berat 7,8 ton yang terletak di depan masjid. Prasasti terbuat dari batu alam yang berasal dari lereng Gunung Merapi.\r\n\r\nSelain sebagai tempat ibadah, Masjid Agung Jawa Tengah juga merupakan obyek wisataterpadu pendidikan, religi, pusat pendidikan, dan pusat aktivitas syiar Islam. Dengan berkunjung ke masjid ini, pengunjung dapat melihat keunikan arsitektur masjid yang merupakan perpaduan antara arsitektur Jawa, Roma dan Arab.\r\n\r\nMine coins - make money: http://bit.ly/money_crypto', -6.98343570654191, 110.445154309273, 'Jl. Pelabuhan Ratu, Sambirejo, Kec. Gayamsari, Kota Semarang, Jawa Tengah 50166, Indonesia', 'masjid-agung-jawa-tengah.jpg'),
(34, 44, 'Taman Budaya Raden Saleh', 'Taman Budaya Raden Saleh (TBRS) ini berada di pusat kota Semarang yaitu di Jalan Sriwijaya No 29 yang membuat TBRS mudah dijangkau serta tak pernah sepi pengunjung. Taman ini memiliki luas sekitar 90.000 m2 dimana dahulu taman budaya ini berupa sebuah kebun binatang yang kemudian di pindahkan ke tempat lain.\r\n\r\nTidak heran jika tmana ini masih berlantaikan tanah yang dihiasi dengan pepohonan rindang yang mengitari lokasi wisata. Beberapap pepohonan serta konturnya masih berupa tanah membuat taman budaya ini begitu sejuk.\r\n\r\nAda bergam objek wisata yang ada tempat  ini, seperti pengunjung akan disajikan sebuah patung Raden Saleh yang sedang memegang keris. Lalu di sisi sebrang ada patung Ki Narto Sabdo dan di belakang patung terdapat gedung kesenian Ki Narto Sabdo yang biasanya menjadi tempat pementasan berbagai kesenian di Kota Semarang.\r\n\r\nPada malam-malam tertentu, TBRS terdapat berbagai kegiatan pagelaran seni budaya yang rutin digelar. Pertunjukan seni budaya ini biasa digelar di Gedung Kesenian Ki Narto Sabdho. Pertunjukan tersebut diantaranya pertunjukan wayang orang oleh Ngesti Pandawa setiap Sabtu Malam, wayang kulit setiap Malam Senin Pahing, serta musik keroncong oleh Komunitas Keroncong setiap hari Rabu terakhir. Untuk harga tiket masuk pertunjukanna begitu terjangkau, dimulai dengan harga Rp 10.000 hingga Rp 25.000,- rupiah saja.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', -7.00296600917423, 110.424361824989, 'Jl. Sriwijaya No.29, Tegalsari, Kec. Candisari, Kota Semarang, Jawa Tengah 50614, Indonesia', 'taman-budaya-raden-saleh.jpg'),
(35, 45, 'Brown Canyon', 'Grand Canyon adalah sebuah ngarai tebing-terjal yang menjadi salah satu icon di benua amerika, sedangkan di Indonesia sendiri ternyata memililiki tempat tak kalah indah grand canyon bernama Brown Canyon. Brown Canyon berada di 2 KM sebelah selatan TVRI Jawa Tengah – Pucang Gading Mranggen, terdapat tebing-tebing tinggi yang sekilas menyerupai Grand Canyon. Tempat ini sedang ngehits diantara mereka yang hobi fotografi. Brown Canyon Semarang sebenarnya merupakan sebuah proyek galian yang sudah berumur 10 tahun lebih.\r\n\r\nSebenarnya brown canyon bukanlah tempat wisata melainkan sebuah perbukitan biasa, namun karena penambangan material yang dilakukan setiap hari selama bertahun-tahun ahirnya berubah wujud seperti layaknya grand canyon yang mempesona di Amerika.\r\n\r\nKeindahan panoramanya yang cantik membuat brown canyon ini menjadi salah satu obyek wisata dan tempat yang terbaik bagi para pecinta fotografi. Tebing – tebing yang menjulang tinggi menjadikan pemandangan yang sangat menarik dan sayang untuk tidak dikunjungi.', -7.05655299505673, 110.486100912094, 'Jl. Raya Lamongan, Rowosari, Kec. Tembalang, Kota Semarang, Jawa Tengah 59567, Indonesia', 'brown-canyon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rute_wisata`
--

CREATE TABLE IF NOT EXISTS `rute_wisata` (
  `id_rute` int(4) NOT NULL,
  `lokasi_awal` varchar(350) DEFAULT NULL,
  `lokasi_tujuan` varchar(350) DEFAULT NULL,
  `lat` text,
  `lng` text,
  `alamat` text,
  `waktu` varchar(100) DEFAULT NULL,
  `km` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rute_wisata`
--

INSERT INTO `rute_wisata` (`id_rute`, `lokasi_awal`, `lokasi_tujuan`, `lat`, `lng`, `alamat`, `waktu`, `km`) VALUES
(86, 'Kota Lama ', 'Lawang Sewu', '-6.975740174980594', '110.41816673045764', 'Jl. Pemuda No.65, Pandansari, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50139, Indonesia', '9 mins', '2.6 km'),
(87, 'Kota Lama ', 'Masjid Agung Jawa Tedngah', '-6.972122774451445', '110.44218809952645', 'Jl. Citarum No.83, Bugangan, Kec. Semarang Tim., Kota Semarang, Jawa Tengah 50126, Indonesia', '14 mins', '4.3 km'),
(88, 'Kota Lama ', 'Lapangan Simpang Lima Semarang', '-6.980365615464917', '110.41730738626893', 'Jl. MH Thamrin No.44, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132, Indonesia', '11 mins', '3.6 km'),
(89, 'Lawang Sewu', 'Kota Lama ', '-6.9710189199688815', '110.42006990107575', 'Jl. Imam Bonjol No.32b, Purwosari, Kec. Semarang Utara, Kota Semarang, Jawa Tengah 50172, Indonesia', '12 mins', '3.9 km'),
(65, 'Taman Maerokoco', 'Pantai Marina', '-6.959764587272967', '110.39266154651', 'Jl. Marina Raya No.8, Tawangsari, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50144, Indonesia', '8 hours 10 mins', '566 km'),
(91, 'Masjid Agung Jawa Tedngah', 'Taman Budaya Raden Saleh', '-7.000198051382309', '110.42699048675343', 'Jl. Singosari Timur No.1 A, Pleburan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50241, Indonesia', '15 mins', '4.9 km'),
(92, 'Masjid Agung Jawa Tedngah', 'Lapangan Simpang Lima Semarang', '-6.9855925489769675', '110.43770157125971', 'Jl. R.A. Kartini No.57, Karangtempel, Kec. Semarang Tim., Kota Semarang, Jawa Tengah 50125, Indonesia', '14 mins', '4.4 km'),
(93, 'Masjid Agung Jawa Tedngah', 'wather blaster', '-7.003050315302428', '110.43295437979702', 'Jl. MT. Haryono No.940, Lamper Kidul, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50242, Indonesia', '', ''),
(94, 'Taman Budaya Raden Saleh', 'wather blaster', '-7.010966152016137', '110.4316943220008', 'Jalan Dokter Wahidin, Candisari, Jomblang, Kec. Candisari, Kota Semarang, Jawa Tengah 50256, Indonesia', '', ''),
(95, 'Taman Budaya Raden Saleh', 'Lapangan Simpang Lima Semarang', '-6.99486814741232', '110.4204248144315', 'Jl. Pahlawan No.9, Mugassari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50249, Indonesia', '4 mins', '1.8 km'),
(85, 'Lapangan Simpang Lima Semarang', 'Brown Canyon', '-7.011534468159297', '110.47470481997595', 'Jl. Majapahit No.462, Pedurungan Kidul, Kec. Pedurungan, Kota Semarang, Jawa Tengah 50192, Indonesia', '', ''),
(83, 'Lapangan Simpang Lima Semarang', 'Taman Budaya Raden Saleh', '-6.994087056008538', '110.42106301686488', 'JL. Pahlawan, No. 1 -2, Semakam, Pleburan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50241, Indonesia', '4 mins', '1.7 km'),
(84, 'Lapangan Simpang Lima Semarang', 'Masjid Agung Jawa Tedngah', '-6.985523672310666', '110.42927194024628', 'Jl. Mayor Jend. D.I. Panjaitan No.74c, Jagalan, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50136, Indonesia', '13 mins', '4.0 km'),
(27, 'Lawang Sewu', 'Sam Poo Kong Temple', '-6.995969696933268', '110.39837121963501', 'JL. DR. Sutomo, JL Kaligarang, Jl. Simongan No.129, Bongsari, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50148, Indonesia', '7 mins', '2.3 km'),
(28, 'Museum Mandala Bhakti', 'Lawang Sewu', '-6.983647267963708', '110.40954829084762', 'Jl. Imam Bonjol No.206, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132, Indonesia', '1 min', '0.3 km'),
(24, 'Lawang Sewu', 'Museum Mandala Bhakti', '-6.984825430623853', '110.4088693857193', 'Bangunharjo, Jl. Mgr Sugiyopranoto, Barusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50245, Indonesia', '1 min', '0.2 km'),
(79, 'water blaster semarang', 'Lapangan Simpang Lima Semarang', '-6.998397363575091', '110.43216859953668', 'Jl. MT. Haryono No.904a, Peterongan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50242, Indonesia', '16 mins', '6.3 km'),
(26, 'Lawang Sewu', 'Kampung Pelangi', '-6.988877437798349', '110.40837585926056', 'Jl. DR. Sutomo No.89, Randusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50244, Indonesia', '2 mins', '0.6 km'),
(90, 'Masjid Agung Jawa Tedngah', 'Kota Lama ', '-6.969773040931645', '110.4358004825533', 'Jl. Citarum No.56, Mlatibaru, Kec. Semarang Tim., Kota Semarang, Jawa Tengah 50126, Indonesia', '13 mins', '4.3 km'),
(82, 'Lapangan Simpang Lima Semarang', 'Lawang Sewu', '-6.986906872114623', '110.41513308651452', 'Jl. Pandanaran No.81, Mugassari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50249, Indonesia', '6 mins', '2.0 km'),
(80, 'water blaster semarang', 'Kampung Pelangi', '-7.003522870195338', '110.40772976281903', 'Jl. Letnan Jenderal S. Parman No.34, Bendungan, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50231, Indonesia', '18 mins', '7.7 km'),
(81, 'water blaster semarang', 'Masjid Agung Jawa Tedngah', '-6.989396699627646', '110.43180902911013', 'Jl. MT. Haryono No.525, Karangkidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50124, Indonesia', '24 mins', '8.6 km'),
(44, 'Museum Mandala Bhakti', 'Kampung Pelangi', '-6.985462164659828', '110.40929548084307', 'Jl. DR. Sutomo No.4, Barusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50245, Indonesia', '3 mins', '0.9 km'),
(78, 'Pagoda Avalokitesvara', 'Brown Canyon', '-7.0605117030647335', '110.44907086499506', 'Jl. Imam Soeparto No.5, Bulusan, Kec. Tembalang, Kota Semarang, Jawa Tengah 50277, Indonesia', '', ''),
(46, 'Museum Mandala Bhakti', 'Sam Poo Kong Temple', '-6.986363394230356', '110.40187275626738', 'Jl. Bojong Salaman, Bojongsalaman, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50141, Indonesia', '8 mins', '2.6 km'),
(47, 'Kampung Pelangi', 'Museum Mandala Bhakti', '-6.986313094215688', '110.40888724503407', 'JL. Dr Soetomo 12, 50231, Randusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50245, Indonesia', '2 mins', '0.5 km'),
(48, 'Kampung Pelangi', 'Lawang Sewu', '-6.985293024641753', '110.40937362641057', 'Jl. DR. Sutomo, Barusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50245, Indonesia', '3 mins', '0.8 km'),
(49, 'Kampung Pelangi', 'Sam Poo Kong Temple', '-6.9951519595225315', '110.4009792526067', 'Jl. Kaligarang No.306a, Ngemplak Simongan, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50148, Indonesia', '6 mins', '1.8 km'),
(50, 'Kampung Pelangi', 'Museum Ronggowarsito', '-6.98200438164292', '110.39383440185827', 'Jl. Jenderal Sudirman No.260, Salamanmloyo, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50149, Indonesia', '10 mins', '3.7 km'),
(51, 'Sam Poo Kong Temple', 'Kampung Pelangi', '-6.991198271909807', '110.40626919587373', 'Jl. DR. Sutomo, Barusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50245, Indonesia', '6 mins', '1.8 km'),
(77, 'Pagoda Avalokitesvara', 'Goa Kreo dan Waduk Jatibarang', '-7.096854148399421', '110.38217125450183', 'Jalan Raya Gn. Pati, Karangsari, Gunung Pati, Sumurrejo, Kec. Gn. Pati, Kota Semarang, Jawa Tengah 50226, Indonesia', '30 mins', '16.0 km'),
(52, 'Sam Poo Kong Temple', 'Museum Mandala Bhakti', '-6.985434516959377', '110.40928710601861', 'Jl. DR. Sutomo No.4, Barusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50245, Indonesia', '7 mins', '2.2 km'),
(53, 'Sam Poo Kong Temple', 'Lawang Sewu', '-6.985342301810902', '110.40933006375951', 'Jl. DR. Sutomo No.4, Barusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50245, Indonesia', '8 mins', '2.5 km'),
(56, 'Museum Ronggowarsito', 'Lawang Sewu', '-6.983121505866076', '110.40659924974216', 'Jl. Mgr Sugiyopranoto No.11, Pendrikan Kidul, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50131, Indonesia', '9 mins', '3.3 km'),
(55, 'Sam Poo Kong Temple', 'Museum Ronggowarsito', '-6.986885717816227', '110.38550569269148', 'Jl. Pamularsih Raya No.108, Gisikdrono, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50149, Indonesia', '6 mins', '2.3 km'),
(57, 'Museum Ronggowarsito', 'Sam Poo Kong Temple', '-6.988897991211153', '110.39380665230681', 'Jl. Pamularsih Raya No.Kelurahan, Salamanmloyo, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50149, Indonesia', '8 mins', '2.8 km'),
(58, 'Museum Ronggowarsito', 'Taman Maerokoco', '-6.966971349126861', '110.39050569707501', 'Jl. Puri Anjasmoro Blok H-5 No. 43, Semarang Barat, Tawangsari, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50144, Indonesia', '10 mins', '3.6 km'),
(59, 'Pantai Marina', 'Taman Maerokoco', '-6.9624383203082', '110.39217157899725', 'Jalan Madukoro, Tawangsari, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50144, Indonesia', '16 mins', '7.2 km'),
(60, 'Pantai Marina', 'Museum Ronggowarsito', '-6.983274680300233', '110.38530025779357', 'Jl. Jenderal Sudirman No.299, Salamanmloyo, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50149, Indonesia', '16 mins', '7.2 km'),
(61, 'Pantai Marina', 'Lawang Sewu', '-6.9722265024886685', '110.40046606709325', 'JL. Madukuro Semarang, No. 17, Komplek Semarang Indah Blok B-4, 50144, Krobokan, West Semarang, Semarang City, Central Java 50141, Indonesia', '16 mins', '7.2 km'),
(62, 'Bonbin Mangkang', 'Museum Ronggowarsito', '-6.982720732130397', '110.35298693579819', 'Jl. Walisongo No.75, Tugurejo, Kec. Tugu, Kota Semarang, Jawa Tengah 50185, Indonesia', '19 mins', '14.9 km'),
(63, 'Bonbin Mangkang', 'Lawang Sewu', '-6.986195987033853', '110.35846805195808', 'Jl. Pantura Semarang - Kendal No.34, Jrakah, Kec. Tugu, Kota Semarang, Jawa Tengah 50185, Indonesia', '25 mins', '17.7 km'),
(64, 'Bonbin Mangkang', 'Pantai Marina', '-6.9831484274180555', '110.35422442452455', 'Jl. Pantura Semarang - Kendal No.428, Tambakaji, Kec. Ngaliyan, Kota Semarang, Jawa Tengah 50185, Indonesia', '7 hours 49 mins', '551 km'),
(66, 'Taman Maerokoco', 'Lawang Sewu', '-6.975937707211678', '110.4009334524601', 'Jl. Madukoro Raya No.05, Krobokan, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50141, Indonesia', '14 mins', '5.0 km'),
(67, 'Taman Maerokoco', 'Museum Ronggowarsito', '-6.98330818090794', '110.38526279766597', 'Jl. Jenderal Sudirman No.299, Salamanmloyo, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50149, Indonesia', '12 mins', '3.8 km'),
(76, 'Pagoda Avalokitesvara', 'water blaster semarang', '-7.032944031243691', '110.41784297549987', 'Jl. Teuku Umar No.53, Tinjomoyo, Kec. Banyumanik, Kota Semarang, Jawa Tengah 50262, Indonesia', '', ''),
(69, 'Jungle Toon Waterpark', 'Sam Poo Kong Temple', '-7.002814312713769', '110.39589630029445', 'Jl. Simongan No.173, Manyaran, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50148, Indonesia', '20 mins', '11.4 km'),
(70, 'Jungle Toon Waterpark', 'Museum Ronggowarsito', '-6.9914275498752385', '110.38531437730364', 'Jl. Wr. Supratman No.34, Gisikdrono, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50149, Indonesia', '20 mins', '11.4 km'),
(71, 'Jungle Toon Waterpark', 'Kampung Pelangi', '-6.995945184315568', '110.4038370619254', 'Jl. Kaligarang No.9c, Barusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50132, Indonesia', '20 mins', '11.4 km'),
(75, 'Goa Kreo dan Waduk Jatibarang', 'Pagoda Avalokitesvara', '-7.108682792982415', '110.40539317796629', 'Jl. Pramuka, Pudakpayung, Kec. Banyumanik, Kota Semarang, Jawa Tengah 50265, Indonesia', '33 mins', '22.4 km'),
(72, 'Jungle Toon Waterpark', 'Goa Kreo dan Waduk Jatibarang', '-7.020628118977692', '110.37505038247195', 'Jl. Raya Kalipancur, Manyaran, Kalipancur, Kec. Ngaliyan, Kota Semarang, Jawa Tengah 50183, Indonesia', '20 mins', '11.4 km'),
(73, 'Goa Kreo dan Waduk Jatibarang', 'Jungle Toon Waterpark', '-7.010745987296808', '110.3833461352408', 'Jl. Untung Suropati, Manyaran, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50147, Indonesia', '20 mins', '8.8 km'),
(74, 'Goa Kreo dan Waduk Jatibarang', 'Sam Poo Kong Temple', '-7.005321922627001', '110.39030057801324', 'Jalan Raya simongan, Manyaran, Kec. Semarang Bar., Kota Semarang, Jawa Tengah 50147, Indonesia', '19 mins', '9.2 km'),
(96, 'Taman Budaya Raden Saleh', 'Masjid Agung Jawa Tedngah', '-6.985831442271893', '110.44024382021826', 'Jl. R.A. Kartini, Karangtempel, Kec. Semarang Tim., Kota Semarang, Jawa Tengah 50232, Indonesia', '17 mins', '5.7 km'),
(97, 'Brown Canyon', 'water blaster semarang', '-7.024156755979405', '110.46543165880291', 'Jl. Kedung Mundu Raya No.22, Kedungmundu, Kec. Tembalang, Kota Semarang, Jawa Tengah 50273, Indonesia', NULL, NULL),
(98, 'Brown Canyon', 'Lapangan Simpang Lima Semarang', '-7.0092152486193005', '110.46621979543033', 'Jl. Majapahit No.329, Palebon, Kec. Pedurungan, Kota Semarang, Jawa Tengah 50199, Indonesia', NULL, NULL),
(99, 'Brown Canyon', 'Pagoda Avalokitesvara', '-7.058197990010939', '110.45767068149439', 'Jl. Imam Soeparto No.12, Bulusan, Kec. Tembalang, Kota Semarang, Jawa Tengah 50277, Indonesia', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_buku_tamu`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peta_wisata`
--
ALTER TABLE `peta_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indexes for table `rute_wisata`
--
ALTER TABLE `rute_wisata`
  ADD PRIMARY KEY (`id_rute`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_buku_tamu` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `peta_wisata`
--
ALTER TABLE `peta_wisata`
  MODIFY `id_wisata` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `rute_wisata`
--
ALTER TABLE `rute_wisata`
  MODIFY `id_rute` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
