-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 11:28 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flobamora`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Ritaliamanis', '45c1428dbdf63826b7b1a999e012df3b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `username` varchar(30) NOT NULL,
  `password` text,
  `nama_anggota` varchar(30) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`username`, `password`, `nama_anggota`, `alamat`, `telp`, `email`, `tgl_daftar`) VALUES
('Margaretha', '23b05c5131ae69558a0714d47ae908a1', 'margaretha', 'Bumi Kepuh Permai Blok B/8, Sukun kota Malang', '123456789101', 'ritaliamaniz@gmail.com', '2020-08-05 15:27:29'),
('Charlie', '4f845dc6600bf628c0a1bb0576f2139a', 'Charlie', 'Flores, Manggarai', '082144897263', 'ritaliamaniz@yahoo.com', '2020-06-12 11:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `id_kategori` int(10) DEFAULT NULL,
  `harga_barang` varchar(11) DEFAULT NULL,
  `jumlah_barang` int(4) DEFAULT NULL,
  `deskripsi` text,
  `foto` text,
  `dilihat` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga_barang`, `jumlah_barang`, `deskripsi`, `foto`, `dilihat`) VALUES
(9, 'Acer a34', 4, '4500000', 11, 'Memiliki antena kuat untuk Wireless 802.11ac, dan juga jaga mata Anda dari blue light dengan teknologi BlueLightShield.\r\nCeleron Dual Core, 1.1 GHz\r\nDDR3L, DDR3, 4GB, HDD, 500GB, ukuran layar 14 inc', 'img/barang/acer.jpg', 4),
(8, 'Toshiba c640', 3, '3000000', 3, 'Deskripsi Laptop toshiba C640\r\nLaptop toshiba C640\r\nspesifikasi :\r\n\r\n- procesor intel Core i3\r\n- Ram 2gb\r\n- Harddisk 320gb\r\n- Baterai awet 3 jam', 'img/barang/tosiba.jpg', 15),
(7, 'laptop asus 2300', 2, '3400000', 9, 'Deskripsi LAPTOP Asus A409UJ-BR351T/BR352T Core i3-7020U-4GB-512GB-MX230 WIN10\r\nLAPTOP A409UJ-BV351T SILVER\r\nLAPTOP A409UJ-BV352T GRAY\r\n\r\nSpecification:\r\nProcessor: Intel Core i3-7020U\r\nRAM: 4 GB DDR4\r\nSSD: 512 GB SSD\r\nNVIDIA MX230 2GB\r\nUkuran Layar: 14 Inch\r\nSistem Operasi: Windows 10 home', 'img/barang/asus.jpg', 6),
(10, 'Lenovo ideapad 330', 5, '3700000', 1, 'Lenovo Ideapad 330-14IGM Intel N4000 4GB 500GB 14 Inch Windows 10 - Black\r\n', 'img/barang/lenovo-ideapad-330.jpg', 0),
(11, 'Lenovo Ideapad 130 15', 5, '3245000', 1, 'The IdeaPad 130 15 adalah laptop dengan harga terjangkau yang mempunyai beberapa pilihan prosesor yaitu, Intel Core i7-8550U, Intel Core i5-8250U, Intel Core i3-6006U, AMD A4-9125, AMD A9-9425, koneksi HDMI, USB 3.0 dan card reader.', 'img/barang/Lenovo_IdeaPad_130_15_L_1.jpg', 1),
(12, 'Lenovo Ideapad S130', 5, '4000000', 5, 'Harga lenovo ideapad 130 14ast lenovo ideapad 130 14ast merupakan sebuah laptop murah terbaru yang cocok untuk pelajar dan pekerja kantoran ntuk kamputasi sehari hari. Learn more about the ideapad s130 11 a durable ultraslim 11 laptop with long battery life intel processing usb type c connectivity and a stylish thin and light design.', 'img/barang/LENOVO-Ideapad-S130.jpg', 0),
(13, 'Laptop HP 14-BS007TX', 6, '6500000', 3, 'Laptop ini dipersenjatai dengan prosesor Intel Core i5-7200U (2.5 GHz up to 3.10 GHz, 3M Cache), kapasitas memori RAM DDR4 ukuran 4GB dan Hard disk bermuatan 1TB.', 'img/barang/HP_14-BS007TX.jpg', 1),
(14, 'HP 14-BS016TU', 6, '6100000', 3, 'HP 14-BS016TU Notebook Core i3-6006U 4GB 500GB Win10SL Gold\r\nIntel® Core™ i3-6006U, 4 GB DDR4-2133 SDRAM, 500 GB 5400 rpm SATA, DVD-Writer, Windows 10 SL\r\n\r\nKondisi Barang : Barang Baru', 'img/barang/HP_14-BS016TU.jpg', 0),
(15, 'Acer Aspire Z1402-308T', 4, '4250000', 3, 'Laptop yang satu ini dilengkapi dengan layar berukuran 14 inch, laptop Acer spek tinggi ini pun turut memasang kartu grafis dari Intel HD Graphics 4400, dilengkapi RAM 2GB, HDD berkapasitas 500GB, serta punya bobot yang hanya seberat 1,77 kilogram saja, serta memiliki USB 3.0 2 Port(s).', 'img/barang/Acer_Aspire_Z1402-308T.jpg', 1),
(16, ' Acer E5-473G', 4, '5399000', 4, ' Acer E5-473G yang memiliki kinerja hardware lebih tinggi berkat penggunaan prosesor Intel Core i3 5005U. Prosesor yang disematkannya ini merupakan generasi Broadwell yang menawarkan peningkatan performa prosesor hingga 10% dan peningkatan performa grafis hingga 24% ketimbang generasi sebelumnya. Selain dukungan prosesor andal, laptop Acer spek tinggi ini pun didukung dengan layar HD seluas 14 inch, VGA dari NVIDIA GeForce GT920M, RAM 2GB dan HDD berkapasitas 500GB.', 'img/barang/Acer_E5-473G.png', 0),
(17, 'ASUS Vivobook 15 X505ZA', 2, '5610000', 6, 'Jenis laptop asus yang satu ini hadir dengan spesifikasi yang sangat bagus yaitu memiliki : \r\nAMD Dual Core Ryzen 3 2200U 2.5-3.4 GHz, 4GB DDR4 Memory RAM, 1TB Harddisk, 15.6\" HD 1366 x 768\r\nIntegrated Radeon Vega3 (shared), Microsoft Windows 10 Home Original, Free ASUS Backpack, 2 tahun garansi hardware ASUS Global.', 'img/barang/ASUS_Vivobook_15_X505ZA.jpg', 6),
(18, 'ASUS Laptop E402WA ', 2, '3499000', 11, 'Laptop ASUS terbaru adalah notebook yang kompak dan ringan 14-inci yang terjangkau, memiliki dimensi yang ringkas dengan lekukan yang ramping, Laptop ASUS E402 menggunakan desain yang sederhana namun elegan, ASUS Laptop E402 menawarkan ruang penyimpanan yang lebih besar, dengan kombinasi hingga 500GB HDD, dan Untuk menjaga masalah pemanasan di dalam notebook, ASUS IceCool Technology memberikan ASUS Laptop E402 tata letak internal yang unik yang menjaga suhu permukaan palm rest antara 28?C dan 35?C. ', 'img/barang/ASUS_Laptop_E402WA.png', 1),
(19, 'ASUS X441BA-GA621T', 2, '4250000', 7, 'Laptop ini memiliki keunggulan pada prosesor dan kartu grafisnya. Prosesor AMD A6 yang ada pada laptop ini membuat kamu dapat melakukan gaming dengan kualitas video medium serta menjalankan program desain grafis seperti corel dan lainnya. Laptop ini memiliki ukuran Layar: 14 inci, resolusi 1366 x 768 piksel, Prosesor: AMD Dual-core A6-9225 (2.6 GHz Up to 3.0 GHz), Grafis: AMD Radeon R4, RAM: 4GB DDR4, Penyimpanan: 1TB HDD', 'img/barang/ASUS-X441BA-GA621T-Yatekno-1.jpg', 4),
(20, 'Toshiba Tecra A40', 3, '4200000', 8, 'Toshiba Tecra A40 memiliki ukuran layar 14 inci dengan dua varian resolusi, yaitu 1.366 x 768 dan 1.920 x 1.080. Laptop ini masih dilengkapi dengan sebuah pemutar DVD yang memiliki kemampuan membakar DVD. Keyboard Toshiba Tecra A40 dilengkapi dengan backlight sehingga relatif nyaman digunakan saat kondisi agak remang-remang.', 'img/barang/Toshiba_Tecra_A40.jpg', 0),
(21, 'Toshiba Satellite C655-S5333', 3, '4590000', 6, 'Laptop Toshiba Satellite C655-S5333: Processor	Intel® Core™ i3-2330M, Sistem Operasi  Genuine Windows 7 Home Premium (64-bit), RAM  4GB DDR3 1333MHz, VGA	Mobile Intel® HD Graphics dengan 64MB-1696MB dynamically allocated shared graphics memory', 'img/barang/Toshiba-Satellite-C655-S5333.jpg', 0),
(22, 'Laptop HP 14-AM507TU', 6, '5200000', 2, 'Laptop HP 14-AM507TU memiliki  layar 14? diagonal HD SVA BrightView WLED-backlit (1366 x 768), Laptop merek HP yang memiliki prosesor Intel Core i3-6006U (2 GHz, 3 MB cache, 2 cores), RAM DDR4 sebesar 4GB, grafis Intel HD Graphics 520, berkapasitas 500 GB 5400 rpm SATA HDD, dan berdimensi 34.54 x 24.15 x 2.39 cm.\r\n\r\n \r\n\r\n', 'img/barang/Laptop_HP_14-AM507TU.jpg', 2),
(23, 'HP 14-BS743TU', 6, '5200000', 5, 'Laptop ang satu ini memiliki layar sebesar 14 inci resolusi HD, laptop ini diperlengkapi dengan layar SVA BrightView WLED-backlit, prosesor Intel Core i3-6006U yang berkolaborasi dengan tipe grafis Intel HD Graphics 520, RAM 4GB DDR4 dan kapasitas penyimpanan 1TB HDD, dilengkapi dengan fitur seperti WiFi, Bluetooth, Optical Drive, dan dual speaker dengan sistem operasi Windows 10.', 'img/barang/HP_14-BS743TU.jpg', 2),
(24, 'Samsung AtivBook 2', 7, '4300000', 2, 'Display 14 inch Hd Led, Prosessor AMD  Dual Core E1, VGA Ati Redeon 7310, Ram 2GB, Hardisk 500 GB, USB 3.0, HDMI,\r\nwifi, bluetooth,  LAN, audioport.', 'img/barang/Samsung_AtivBook_2.jpg', 5),
(25, 'Dell Inspiron 14 3000', 9, '2950000', 5, 'Processor Haswell Core i3 4005U 1700 Mhz\r\nMemori : 2 Giga - Harddisk : 500 Giga\r\nLayar 14 - Intel HD Graphic\r\nWireless - Ethernet - Webcam - Cardreader - USB 3 - DVDRW\r\nFisik : 95% - Baterai Tahan 3 Jam an\r\nKelengkapan : Laptop dan Adaptor Dell', 'img/barang/dell_inspiron_14_bekas.jpg', 0),
(26, 'DELL Inspiron N5110 ', 9, '3350000', 4, 'Spesifikasi :\r\n*Processor Intel Core i5-2430M (4 CPUs) - 2.4GHz\r\n*VGA Intel HD Graphics 3000\r\n*LED 15.6 Inchi\r\n*RAM 4GB DDR3\r\n*Hardisk 500GB SATA\r\n*Windows Original\r\n*DVDRW\r\n*HDMI\r\n*USB 3.0\r\n*CR\r\n*Wi-Fi\r\n*Camera\r\n*Lan\r\n*Fisik : 94 Persen an\r\n*Baterai : 2 Jam an\r\nKelengkapan : Unit Laptop + Charger DELL', 'img/barang/Jual_Laptop_DELL_Inspiron_N5110_Core_i5_Bekas.JPG', 4),
(27, 'Dell Inspiron 14-3467', 9, '3450000', 2, 'Spesifikasi :\r\nProcessor Intel Core i3 - 2.006GHz (4CPUs)~2.0 GHz\r\nDauble VGA\r\nIntel HD GRAPHICS 520 - LED 14 Inchi\r\nRADEON R5 M430\r\nRAM 8GB - HARDISK 500GB\r\nDVDRW - HDMI - USB 3.0\r\nBluetooth - Cardreader\r\nWi-Fi - Camera - Lan\r\nFisik : 95 Persen an\r\nBaterai : 2,5 Jam an\r\nKelengkapan : Fullse', 'img/barang/laptop_dell_inspiron_14-3467.JPG', 2),
(28, 'Lenovo IdeaPad 320-14AST', 5, '3789000', 8, 'laptop Lenovo IdeaPad 320-14AST memiliki ukuran layar 14 inc, prosesor AMD APU A4-9120 dengan clock-speed 2.2 GHz dan memiliki sektor grafis VGA AMD Radeon R3.', 'img/barang/Lenovo-IdeaPad-320-14AST-YaTekno-768x552.jpg', 2),
(29, 'Laptop Samsung Ativ Book 2', 7, '4400000', 10, 'Laptop Samsung Ativ Book 2 ini memiliki Processor Intel Celeron Processor 1007U 1.50 GHz, RAM	2GB DDR3 PC-12800, Graphics	NVIDIA GeForce 710M 1GB, Display 14? WXGA, Resolution 1366 x 768, Teknologi visual	HD LED Display dan Anti-Reflective, Sound	Stereo Speakers  Sound Alive, Hardisk 500GB Serial ATA 5400 RPM, Optic DVD multi, Network Ethernet,Bluetooth, IEEE 802.11a, Keyboard	Standard Webcam	Integrated, Input DeviceTouch Pad, Interfece	USB,VGA ,HDMI ,Audio,Lan,DC in, Sistem operasi	DOS, Batteri 6 Cell, Dimensions 339.0 x 234.5 x 25.2 mm.', 'img/barang/smsng.jpg', 0),
(30, 'Samsung NP300E4Z-A06ID', 7, '4949000', 4, 'Tipe Laptop: Notebook, CPU: Core i3, Model Prosesor: Core i3 2350M, Kecepatan Prosesor: 2.30GHz, Model GPU : Intel® HD Graphics 3000, RAM : 2GB, Tipe Memori : DDR3, Slot Memori : 2 DIMM Slots, Tipe Penyimpanan : HDD, HDD : 500GB, Kecepatan Rotasi : 5400 rpm, Drive Optikal : DVD Writer (Dual Layer Support).', 'img/barang/Smsng1.jpg', 3),
(32, 'DELL Inspiron 14-3473', 9, '4799000', 9, '? Intel Celeron DualCore N4000-1.10Ghz up 2.60Ghz\r\n? RAM 4GB\r\n? HDD 500GB\r\n? Intel UHD 600 Graphics\r\n? Screen 14\"\r\n? Windows 10', 'img/barang/dell-inspiron.jpg', 3),
(33, 'Notebook 9 Pro', 7, '6500000', 3, 'Notebook 9 Pro dilengkapi dengan Intel Core i5-7200U/i7-7500U/i7-8550U, Radeon 540, RAM 8/16GB dan penyimpanan internal SSD 128/256GB berbasis SATA. Konektivitas satu port USB-C, dua port USB-A, satu port HDMI, satu port Combo Audio Jack 3,5mm dan satu slot MicroSD', 'img/barang/Samsung_9_Pro.jpg', 2),
(34, 'Samsung the Notebook 5', 7, '4000000', 9, 'Samsung Notebook 5: full HD wide, shared and NVIDIA GeForce MX150 with 2 GB video memory, 14.86 x 9.79 x 0.78 inches, 4.34 pounds.', 'img/barang/csm_Notebook_3_Front_2_7366e5b9c1.jpg', 2),
(35, 'Toshiba Portege Z20T', 3, '4200000', 13, 'Toshiba Portege Z20T atau Dynabook seri T memiliki fitur berupa layar LCD HD dengan kemampuan pemrosesan gambar berteknologi tinggi sehingga mampu menghasilkan gambar yang tajam.', 'img/barang/Toshiba_Portege_Z20T.jpg', 0),
(36, 'Notebook Toshiba L50T B1779', 3, '5550000', 4, 'Notebook Toshiba L50T B1779 Ukuran layar yang cukup lebar, yakni 15,6 inci dengan VGA Intel HD Graphics 5500 plus AMD Radeon R7 M260 sebesar 2 GB. Fitur yang lebih menarik lagi adalah 10 point touchscreen sehingga Anda bisa menyentuh layar notebook dengan 10 jari yang responsif.', 'img/barang/09f5f4a7b3f241ed10ebfc77777b8cf3.jpg', 0),
(37, ' Acer One 10', 4, '3650000', 14, 'Tipe Prosesor	Intel Atom\r\nKecepatan Prosesor 1.4GHz, Sistem Operasi Windows 10, CPU	32bit,Graphic Card	Intel, RAM 2GB,Resolusi Layar 1280 x 800pixels, Ukuran Layar	10.1\", Tipe Penyimpanan SSD, Kapasitas Penyimpanan 0.06TB.', 'img/barang/f7ed4741ee6acb31a9769b2ae8d17cce38edb266_0.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Asus'),
(3, 'Toshiba'),
(4, 'Acer'),
(5, 'Lenovo'),
(6, 'HP'),
(7, 'Samsung'),
(9, 'DELL Inspiron');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_keranjang` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `id_barang` int(10) DEFAULT NULL,
  `jumlah_dipesan` int(10) DEFAULT NULL,
  `tgl_keranjang` date DEFAULT NULL,
  `kd_pemesanan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`id_keranjang`, `username`, `id_barang`, `jumlah_dipesan`, `tgl_keranjang`, `kd_pemesanan`) VALUES
(2, 'Ritalia', 9, 1, '2020-06-09', '20200609063942RITALIA'),
(3, 'Ritalia', 8, 2, '2020-06-10', '20200610090900RITALIA'),
(4, 'Ritalia', 7, 1, '2020-06-12', ''),
(5, 'Charlie', 17, 1, '2020-06-12', '20200612064708CHARLIE'),
(6, 'Charlie', 8, 1, '2020-06-20', ''),
(8, 'Margaretha', 37, 1, '2020-08-25', '20200825061336MARGARETHA'),
(10, 'Margaretha', 32, 1, '2020-09-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`) VALUES
(74, 124, 'Rizal Faizal', '', ' terima  kasih  atas  perhatiannya   ', '2011-02-22', '20:38:30', 'Y'),
(76, 54, 'Rizal Faizal', '', ' gawatttttttttt   ', '2011-02-23', '23:36:53', 'Y'),
(77, 54, 'Rizal Faizal', '', ' fewfg   ', '2011-02-23', '23:39:46', 'Y'),
(78, 54, 'fff', '', ' ffffffffffff   ', '2011-02-23', '23:41:36', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `alamat` text,
  `kd_pemesanan` text,
  `jumlah_dipesan` int(10) DEFAULT NULL,
  `harga_barang` varchar(11) DEFAULT NULL,
  `jumlah_harga` varchar(11) DEFAULT NULL,
  `ongkir` varchar(11) DEFAULT NULL,
  `total` varchar(11) DEFAULT NULL,
  `tgl_pemesanan` datetime DEFAULT NULL,
  `foto` text,
  `konfirmasi` enum('sudah','belum') DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `username`, `alamat`, `kd_pemesanan`, `jumlah_dipesan`, `harga_barang`, `jumlah_harga`, `ongkir`, `total`, `tgl_pemesanan`, `foto`, `konfirmasi`, `status`) VALUES
(2, 'Ritalia', 'Malang', '20200609063942RITALIA', 1, '4500000', '4500000', '22000', '4522000', '2020-06-09 23:40:02', 'img/bukti/D.jpg', 'sudah', 'sukses'),
(3, 'Ritalia', 'Malang', '20200610090900RITALIA', 1, '3000000', '3000000', '22000', '3022000', '2020-06-10 14:09:37', 'img/bukti/Capture.PNG', 'belum', ''),
(4, 'Charlie', 'Flores, Manggarai', '20200612064708CHARLIE', 1, '5610000', '5610000', '22000', '5632000', '2020-06-12 11:47:56', 'img/bukti/Capture1.PNG', 'sudah', 'sukses'),
(6, 'Margaretha', 'kepuh', '20200825061336MARGARETHA', 1, '3650000', '3650000', '22000', '3672000', '2020-08-25 23:15:18', NULL, 'belum', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `tgl_penjualan` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id_penjualan`, `id_anggota`, `total`, `tgl_penjualan`) VALUES
(2, 2, 4750000, '2020-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `id_slide` int(11) NOT NULL,
  `foto` text,
  `judul` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slide`
--

INSERT INTO `tbl_slide` (`id_slide`, `foto`, `judul`) VALUES
(1, 'img/slide/bnr1.jpg', 'Gambar 1'),
(2, 'img/slide/bnr2.jpg', 'Gambar 2'),
(3, 'img/slide/bnr3.jpg', 'Gambar 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statistik`
--

CREATE TABLE `tbl_statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_statistik`
--

INSERT INTO `tbl_statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.1', '2011-01-23', 406, '1295797934'),
('127.0.0.1', '2011-01-22', 199, '1295712739'),
('127.0.0.1', '2011-01-20', 18, '1295484485'),
('127.0.0.1', '2011-01-19', 10, '1295452438'),
('127.0.0.1', '2011-01-25', 2, '1295961873'),
('127.0.0.1', '2011-01-26', 4, '1296050267'),
('127.0.0.1', '2011-01-27', 7, '1296110326'),
('127.0.0.1', '2011-01-28', 7, '1296233314'),
('127.0.0.1', '2011-01-29', 574, '1296320383'),
('127.0.0.1', '2011-01-30', 290, '1296393287'),
('127.0.0.1', '2011-01-31', 133, '1296493024'),
('127.0.0.1', '2011-02-01', 79, '1296521132'),
('110.138.43.143', '2011-02-01', 31, '1296540211'),
('66.249.71.118', '2011-02-01', 1, '1296528448'),
('67.195.115.24', '2011-02-01', 6, '1296538036'),
('125.161.211.231', '2011-02-01', 1, '1296529398'),
('222.124.98.187', '2011-02-01', 3, '1296531520'),
('66.249.71.77', '2011-02-01', 1, '1296532249'),
('66.249.71.20', '2011-02-01', 1, '1296534199'),
('117.20.62.233', '2011-02-01', 13, '1296537677'),
('110.137.200.121', '2011-02-01', 24, '1296540049'),
('127.0.0.1', '2011-02-16', 179, '1297875502'),
('127.0.0.1', '2011-02-17', 301, '1297961988'),
('127.0.0.1', '2011-02-18', 54, '1297990124'),
('127.0.0.1', '2011-02-22', 118, '1298393910'),
('127.0.0.1', '2011-02-23', 77, '1298479971'),
('127.0.0.1', '2011-02-24', 1, '1298510525'),
('127.0.0.1', '2011-03-13', 225, '1300027455'),
('127.0.0.1', '2011-03-14', 44, '1300115678'),
('127.0.0.1', '2011-03-15', 121, '1300195187'),
('127.0.0.1', '2011-03-16', 116, '1300292361'),
('127.0.0.1', '2011-03-17', 4, '1300331607'),
('127.0.0.1', '2011-03-18', 52, '1300422211'),
('127.0.0.1', '2011-03-27', 75, '1301234016'),
('127.0.0.1', '2011-03-28', 16, '1301307056'),
('127.0.0.1', '2011-03-29', 77, '1301409884'),
('127.0.0.1', '2012-10-11', 8, '1349939081'),
('127.0.0.1', '2012-10-18', 13, '1350574484'),
('127.0.0.1', '2012-10-21', 1, '1350796772'),
('127.0.0.1', '2012-10-22', 1, '1350878719'),
('127.0.0.1', '2012-10-23', 6, '1350984577'),
('127.0.0.1', '2012-10-25', 1, '1351146419'),
('127.0.0.1', '2012-10-28', 2, '1351441921'),
('127.0.0.1', '2012-11-02', 1, '1351875551'),
('127.0.0.1', '2012-11-03', 5, '1351876314'),
('127.0.0.1', '2012-12-10', 13, '1355156413'),
('127.0.0.1', '2012-12-11', 1, '1355173951'),
('127.0.0.1', '2012-12-14', 2, '1355431434'),
('127.0.0.1', '2013-01-08', 108, '1357627283'),
('127.0.0.1', '2013-01-11', 1, '1357879761'),
('127.0.0.1', '2013-01-13', 16, '1358090797'),
('127.0.0.1', '2013-02-23', 1, '1361582818'),
('127.0.0.1', '2013-03-10', 1, '1362920556'),
('127.0.0.1', '2013-03-18', 4, '1363581022'),
('127.0.0.1', '2013-03-19', 5, '1363666788'),
('127.0.0.1', '2013-04-26', 1, '1366985043'),
('127.0.0.1', '2013-04-29', 3, '1367201227'),
('127.0.0.1', '2013-05-07', 2, '1367943522'),
('127.0.0.1', '2013-05-15', 1, '1368596741'),
('127.0.0.1', '2013-05-19', 2, '1368974386'),
('127.0.0.1', '2013-06-05', 2, '1370438052'),
('127.0.0.1', '2013-06-10', 4, '1370833789'),
('127.0.0.1', '2013-06-13', 3, '1371094792'),
('127.0.0.1', '2013-06-16', 2, '1371399095'),
('127.0.0.1', '2013-07-28', 40, '1375030405'),
('127.0.0.1', '2013-07-29', 1, '1375031690'),
('127.0.0.1', '2013-10-04', 1, '1380895135'),
('127.0.0.1', '2013-10-30', 1, '1383069939'),
('127.0.0.1', '2013-11-29', 237, '1385709004'),
('127.0.0.1', '2013-11-30', 17, '1385783344'),
('127.0.0.1', '2013-12-01', 102, '1385882699'),
('127.0.0.1', '2013-12-02', 153, '1385999681'),
('127.0.0.1', '2013-12-03', 53, '1386027048'),
('::1', '2013-12-03', 54, '1386056497'),
('::1', '2013-12-04', 23, '1386132745'),
('127.0.0.1', '2013-12-04', 1, '1386125365'),
('::1', '2013-12-05', 68, '1386262659'),
('::1', '2013-12-06', 187, '1386301411'),
('::1', '2013-12-07', 84, '1386432534'),
('::1', '2013-12-09', 8, '1386607106'),
('::1', '2013-12-10', 4, '1386611074'),
('::1', '2020-06-10', 54, '1591736595'),
('::1', '2020-06-12', 36, '1591945295');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_keranjang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id_pemesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
