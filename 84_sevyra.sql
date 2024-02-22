-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2023 pada 04.27
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `84_sevyra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activity_title` varchar(255) NOT NULL,
  `activity_description` text DEFAULT NULL,
  `activity_image` varchar(255) NOT NULL,
  `activity_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`id`, `activity_title`, `activity_description`, `activity_image`, `activity_date`) VALUES
(5, 'BPSDMP Kominfo Surabaya bersama Dinas Kominfo Pamekasan Resmi Buka Pelatihan dan Sertifikasi Kompetensi berbasis SKKNI', 'Balai Pengembangan Sumber Daya Manusia dan Penelitian (BPSDMP) Kominfo Surabaya, Selasa 9/3/2021 membuka secara resmi pelaksanaan kegiatan Pelatihan dan Sertifikasi Kompetensi berbasis SKKNI bidang TIK bagi Angkatan Kerja Muda. Kegiatan yang dilaksanakan di FrontOne Hotel Pamekasan ini di dahului dengan pelaksanaan Kegiatan Rapid Test, Senin 8/3/2021, yang diikuti oleh sekitar 40 peserta angkatan kerja muda baru di wilayah Kabupaten Pamekasan dan Sumenep.\r\nKepala BPSDMP Kominfo Surabaya Ibu Eka Handayani dalam sambutannya mengatakan bahwa Indonesia saat ini mengalami permasalahan ketenagakerjaan terutama dalam hal skill gaps, dimana kebutuhan tenaga kerja ahli dalam biang teknologi masih belum tercukupi.\r\n“Laporan World Bank Tahun 2016 bahwa saat ini Indonesia mengalami kekurangan tenaga kerja semi terampil sebesar 9 juta tahun 2015-2030, sementara di sisi lain Indonesia justru diproyeksikan menjadi Negara ekonom terbesar ke 7 tahun 2030., Ucapnya dihadapan peserta pelatihan. “\r\nKemenkominfo RI masih menurut Kepala BPSDMP-Kominfo Surabaya ini mempunyai program strategis lainnya seperti, Vocational School Graduate Academy (VSGA), Fresh Graduate Academy (FGA), Thematic Academy (TA), Digital Enterpreneurship Academy (DEA), Profesional Academy (PRO) dan Government Transformation Academy (GTA), informasi lengkapnya bisa dibuka di laman website digitalent.kominfo.go.id.\r\nSementara itu Kepala Dinas Komunikasi dan Informatika Pemkab Pamekasan dalam sambutannya yang juga sekaligus membuka acara pelatihan dan jadi Narasumber kegiatan ini menekankan kepada peserta untuk benar benar dimanfaatkan dan digunakan dengan sebaik baiknya, karena pelatihan ini adalah Gratis untuk peserta sebagai angkatan kerja muda di wilayah Pamekasan dan Sumenep.\r\nDirinya juga memberikan mensosialisasikan terkait dengan Program dari Kemenkominfo RI yakni Program Digital Talent Scholarship (DTS) yaitu pelatihan intensif kepada ASN, pelaku industry, lulusan SMK/Diploma/Sarjana dengan tema tema yang menjadi inti pengembangan indsutri 4.0', 'uploads/GAMBAR KEGIATAN 1.jpg', '2023-08-07'),
(6, 'Pelatihan dan Sertifikasi Kompetensi Berbasis SKKNI Hadir di Mojokerto', 'BPSDMP Kominfo Surabaya dan Dinas Komunikasi dan Informatika Kota Mojokerto menyelenggarakan kegiatan Pelatihan dan Sertifikasi Kompetensi berbasis SKKNI bidang TIK bagi Angkatan Kerja Muda. Kegiatan yang diadakan di Hotel Ayola Sunrise Mojokerto dibuka oleh Walikota Mojokerto (Ibu Hj. Ika Puspitasari, SE) dan turut pula dihadiri oleh Bapak Gaguk Tri Prasetyo, AMT, MM selaku Kepala Dinas Kominfo Kota Mojokerto, Ibu Dra. Ec. Nirmala Dewi, MM selaku perwakilan Kepala Dinas Kominfo Jawa Timur serta didampingi oleh Kepala BPSDMP Kominfo Surabaya, Ibu Eka Handayani, SE., MM\r\nKegiatan ini diikuti oleh 70 orang peserta yang telah melalui proses seleksi administrasi dan protokol kesehatan yang ketat, seluruh peserta sebelum mengikuti pelatihan diwajibkan untuk mengikuti Rapid Test Antigen yang telah disediakan panitia penyelenggara dan menerapkan 5M. Pelatihan ini terbagi menjadi 3 skema yaitu; skema junior graphic design, skema staf manajemen data dan terampil menggunakan teknologi digital bagi perempuan dan ibu rumah tangga, yang bertujuan untuk meningkatkan keterampilan khususnya bagi angkatan kerja muda Indonesia dibidang TIK.\r\n“Kemampuan dibidang TIK seperti halnya pelatihan ini sangat penting di era digital (Industri 4.0). Saat ini tidak ada lagi masyarakat yang tidak melek teknologi. Usia berapa pun harus mengenal teknologi, apalagi usia angkatan muda, teknologi digital adalah hal yang wajib diketahui dan dipahami. Karena saat ini dibidang apapun tidak ada yang tidak menggunakan TIK,” ujar Ning Ita sapaan akrab Wali Kota Mojokerto dalam sambutannya\r\nKepala BPSDMP Kominfo Surabaya Ibu Eka Handayani memaparkan dalam sambutannya bahwa, “saat ini Indonesia masih mengalami permasalahan ketenagakerjaan khususnya dalam skills gap dimana kebutuhan tenaga kerja ahli dalam bidang teknologi belum tercukupi. Salah satu faktor yang berkontribusi dalam kurang terserapnya tenaga kerja adalah minimnya tenaga kerja terampil terutama SDM yang dapat mengembangkan teknologi digital. Padahal perkembangan teknologi digital saat ini semakin pesat dan kebutuhan tenaga ahli digital semakin meningkat.”\r\nOleh karena itu, peran Kominfo sangat penting dalam mengembangkan talenta masyarakat khususnya dibidang digital. Salah satu upaya Kementerian Kominfo adalah dengan mengadakan kegiatan pelatihan dan sertifikasi kompetensi bidang SKKNI ini. Ibu Eka Handayani dalam sambutannya berharap, peserta pelatihan dapat meningkatkan keterampilannya dan bisa lulus dalam uji sertifikasi kompetensi.', 'uploads/GAMBAR KEGIATAN 2.jpg', '2023-08-01'),
(8, 'Pembukaan Government Transformation Academy Tahun 2021 dan Penandatangan MOU dengan Gubernur NTB', 'Senin, 25 Oktober 2021. Kementerian Komunikasi dan Informatika melalui Badan Penelitian dan Pengembangan Sumber Daya Manusia (Balitbang SDM) menyelenggarakan kegiatan Pembukaan Pelatihan Government Transformation Academy (GTA) Tahun 2021. Kegiatan pembukaan dan orientasi ini diselenggarakan secara tatap muka (langsung) di Kota Mataram NTB dan online via aplikasi video conference di berberapa daerah diantaranya Palangkaraya, Jember dan Mamuju.\r\nKegiatan yang diadakan di Kantor BPSDMD Provinsi NTB ini dibuka secara resmi oleh Wakil Gubernur NTB, Ibu Dr. Ir. Hj. Sitti Rohmi Djalilah, M.Pd. Dihadiri oleh Kepala Badan Litbang SDM Kemenkominfo Bapak Harry Budiarto, Sekretaris Balitbang SDM, Kepala BPSDMP Kominfo Surabaya, Kapokja GTA, dan beberapa Kepala OPD Provinsi NTB.\r\nDalam sambutan Wakil Gubernur NTB, beliau menyampaikan bahwa NTB sangat menyambut baik kegiatan DTS GTA di NTB karena pelatihan ini merupakan suatu kebutuhan. Khususnya di masa pandemi kemampuan digitalisasi sangat membantu pekerjaan pemerintah. Pelatihan ini diharapkan dapat dimanfaatkan untuk meningkatkan kemampuan para ASN dalam menghadapi perkembangan teknologi.\r\nSkema pelatihan pada program GTA dirancang mulai dari tingkat basic skill yang berkaitan dengan literasi digital, intermediate skill yang menekankan peningkatan kompetensi teknis, hingga advance skill yang menyasar ke para pengambil keputusan. Pelatihan GTA ini berlangsung secara online dan blended yang memadukan metode online dan offline. Durasi pelatihan berbeda-beda sesuai dengan tema pelatihan. Pada pelatihan online, peserta dapat mengatur sendiri waktu belajar secara mandiri dalam batas waktu pelatihan.\r\nSebagai informasi tambahan, Pelatihan GTA tahun 2021 berfokus pada 13 (tiga belas) skema pelatihan yakni Get Connected, IT Essential, Cybersecurity Essentials, WI-lenial, IT Business Analyst, IT Project Management, Digital Public Relations, Social Media Analyst, Business Process Engineer, Network Administrator, Junior Graphic Designer, Data Mining Fundamental, dan Analis Kota Cerdas SNI ISO 37122:2019', 'uploads/GAMBAR KEGIATAN 4.png', '2023-08-14'),
(9, 'BPSDMP Kominfo Surabaya Resmi Tutup Pelatihan Sertifikasi Kompetensi 2021 di Pamekasan', 'Setelah berlangsung hampir selama 5 hari pelaksanaan pelatihan sertfikasi kompetensi sejak selasa hingga sabtu, 9 sampai dengan 13 Maret 2021, Balai Pengembangan Sumber Daya Manusia dan Penelitian (BPSDMP) Kominfo Surabaya, akhirnya resmi tutup pelatihan sertifikasi kompetensi tahun 2021 di Pamekasan, Sabtu 13/3/2021.\r\nBPSDMP-Kominfo Surabaya 2 tahun ini sudah menjalin kemitraan dengan Kabupaten Pamekasan khususnya dengan Dinas Kominfo Pamekasan dan beberapa kali melaksanakan pelatihan yang berbeda, ini semata mata karena memang program pusat juga diplihnya Pamekasan karena masyarakat di Pamekasan Dinamis sekali, Ucap Bagus Winarko dari BPSDMP Kominfo Surabaya.’’\r\n“Dipilihnya Kabupaten Pamekasan, selain memang Kabupaten dengan sebutan Gerbang Salam ini sudah menjadi prioritas dari Kementerian Kominfo Pusat, juga karena proses perizinan di daerah ini simple dan tidak berberlit belit, terbukti kami dari BPSDMP-Kominfo Surabaya sudah beberapa kali melaksanakan kegiatan pelatihan, selain memang faktor utama dipilihnya Kabupaten Pamekasan memang memiliki masyarakat yang antusias terhadap perkembangan Dunia Digital, termasuk ibu ibu rumah tangganya yang kami juga bidik dalam skema terampil menggunakan teknologi, para pelaku UMKM juga pernah kita laksanakan di Pamekasan ini, Ucap pria Low Profile ini.’’\r\nBagus sapaan akrabnya, juga mengatakan bahwa pelatihan yang sekarang ini (dengan 2 skema yakni Junior Grpahic Designer dan Staf Manajemen Data) semua proses pendaftaran termasuk verifikasi administrasi dari calon peserta ini murni Pusat yang memilih, kami dan Dinas Kominfo Pamekasan menerima semua konsep terkait dengan kepesertaan pelatihan kali ini, dirinya juga mengatakan sangat berterima kasih sekali kepada Jajaran Pemerintah Kabupaten Pamekasan lebih lebih kepada Dinas Kominfo Pamekasan.\r\nPelatihan sertifikasi dan Kompetensi ini, sebelumnya di dahului dengan pelaksanaan Rapid Test oleh Panitia BPSDMP Kominfo Surabaya dengan Dinas Kominfo Pamekasan kepada Peserta yang sudah dinyatakan lolos, dengan pelaksanaan Rapid Test Antigen, yang dilaksanakan Senin 8/3/2021 dihalaman Parkir Timur FrontOne Hotel.', 'uploads/GAMBAR KEGIATAN 5.png', '2023-08-02'),
(10, 'BPSDMP Kominfo Surabaya Resmi Tutup Pelatihan Sertifikasi Kompetensi 2021 di Pamekasan', 'Setelah berlangsung hampir selama 5 hari pelaksanaan pelatihan sertfikasi kompetensi sejak selasa hingga sabtu, 9 sampai dengan 13 Maret 2021, Balai Pengembangan Sumber Daya Manusia dan Penelitian (BPSDMP) Kominfo Surabaya, akhirnya resmi tutup pelatihan sertifikasi kompetensi tahun 2021 di Pamekasan, Sabtu 13/3/2021.\r\nBPSDMP-Kominfo Surabaya 2 tahun ini sudah menjalin kemitraan dengan Kabupaten Pamekasan khususnya dengan Dinas Kominfo Pamekasan dan beberapa kali melaksanakan pelatihan yang berbeda, ini semata mata karena memang program pusat juga diplihnya Pamekasan karena masyarakat di Pamekasan Dinamis sekali, Ucap Bagus Winarko dari BPSDMP Kominfo Surabaya.’’\r\n“Dipilihnya Kabupaten Pamekasan, selain memang Kabupaten dengan sebutan Gerbang Salam ini sudah menjadi prioritas dari Kementerian Kominfo Pusat, juga karena proses perizinan di daerah ini simple dan tidak berberlit belit, terbukti kami dari BPSDMP-Kominfo Surabaya sudah beberapa kali melaksanakan kegiatan pelatihan, selain memang faktor utama dipilihnya Kabupaten Pamekasan memang memiliki masyarakat yang antusias terhadap perkembangan Dunia Digital, termasuk ibu ibu rumah tangganya yang kami juga bidik dalam skema terampil menggunakan teknologi, para pelaku UMKM juga pernah kita laksanakan di Pamekasan ini, Ucap pria Low Profile ini.’’\r\nBagus sapaan akrabnya, juga mengatakan bahwa pelatihan yang sekarang ini (dengan 2 skema yakni Junior Grpahic Designer dan Staf Manajemen Data) semua proses pendaftaran termasuk verifikasi administrasi dari calon peserta ini murni Pusat yang memilih, kami dan Dinas Kominfo Pamekasan menerima semua konsep terkait dengan kepesertaan pelatihan kali ini, dirinya juga mengatakan sangat berterima kasih sekali kepada Jajaran Pemerintah Kabupaten Pamekasan lebih lebih kepada Dinas Kominfo Pamekasan.\r\nPelatihan sertifikasi dan Kompetensi ini, sebelumnya di dahului dengan pelaksanaan Rapid Test oleh Panitia BPSDMP Kominfo Surabaya dengan Dinas Kominfo Pamekasan kepada Peserta yang sudah dinyatakan lolos, dengan pelaksanaan Rapid Test Antigen, yang dilaksanakan Senin 8/3/2021 dihalaman Parkir Timur FrontOne Hotel.', 'uploads/GAMBAR KEGIATAN 5.png', '2023-08-14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
