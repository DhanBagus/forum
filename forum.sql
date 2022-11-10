-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2022 pada 04.15
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categori`
--

CREATE TABLE `categori` (
  `id_categori` int(11) NOT NULL,
  `categori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `categori`
--

INSERT INTO `categori` (`id_categori`, `categori`) VALUES
(1, 'Programming'),
(2, 'Sport'),
(3, 'Politic'),
(4, 'Art'),
(5, 'Technology'),
(6, 'Automotive'),
(7, 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id_comment`, `comment`, `post_id`, `user_id`, `date`) VALUES
(17, 'Nomor 3 bener-bener gapernah denger dan gapernah tau', 18, 15, 1641528439),
(18, 'waw...ketinggalan dua generasi ane gan', 19, 15, 1641535185),
(19, 'hheemmppttt... waduh... Thread kali ini lebih berat Bapak.. Hihihi... .... Ga suka nonton bla..bla..bla..itu Pak.. Tapi ya ga golput juga... .... Tetep memilih... Tipe apa aku ya?...', 22, 15, 1641535610),
(20, 'Sebagai salah satu produsen roda dua yang cukup laku mendingan AHM kolaborasi sama polri... buat bikin tempat khusus seperti ini, semacam edukasi sebelum para pemohon SIM ikutan tes ujian mengemudi.  Kan lebih mengena. ', 24, 15, 1641536391),
(21, 'Sebelum menginstall After Effect CC 2021, pastikan terlebih dahulu RAM yg terinstall paling tidak minimal harus 16GB. Kalau tidak pasti bakalan berat banget.', 16, 12, 1641543150),
(22, 'One of the main selling points of modules is to give your code an explicit dependency chain, and to avoid global variables. For variables that you want to be able to access in other modules, you should export them, and import them where they\'re needed.', 17, 12, 1641605287),
(23, 'A good source on Oberon-07 -> http://oberon07.com/', 28, 16, 1641615847),
(24, 'info yg bagus..', 41, 15, 1641800856);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `id_inbox` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`id_inbox`, `message`, `user_id_from`, `user_id_to`, `date`) VALUES
(1, 'Hai', 6, 12, 1641617770),
(2, 'hai', 6, 13, 1641617800),
(3, 'Syahda?', 6, 13, 1641617811),
(4, 'test', 6, 13, 1641618083),
(5, 'Hai Mamber', 12, 6, 1641619171),
(6, 'riko to mamber', 12, 6, 1641619644),
(7, 'mamber to riko', 6, 12, 1641619664),
(8, 'Riko ke mamber ', 12, 6, 1641804210),
(9, 'yo i', 6, 12, 1641804387),
(10, 'Oyi', 12, 6, 1641804431),
(12, 'asasa', 5, 14, 1655953948);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id_post` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `image` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_post`
--

INSERT INTO `tbl_post` (`id_post`, `title`, `content`, `image`, `category_id`, `time`, `id_user`) VALUES
(16, 'After Effect CC 2021', 'After Effect CC 2021 kok berat ya? Ada yang tau solusinya?', 'Screenshot_2021-12-27_134822.png', 7, 1641523078, 13),
(17, 'How to use a variable across two function in webpa', 'I have to migrate old, plain HTML with plain JS files to webpack but I have troubles when I have a variable declared outside functions and used between multiple functions below them.', 'Js.PNG', 1, 1641526130, 6),
(18, '3 Pemain Aktif Yang Bisa Memainkan Lebih Dari 5 Posisi', 'Pemain yang mampu bermain di sejumlah posisi disebut sebagai pemain versatile, artinya ia mampu tampil sama baiknya di posisi lain yang bukan posisi naturalnya.  Duhulu pemain dengan kemampuan versatile mungkin tak terlalu diidam-idamkan, namun di era sep', 'bola.jpg', 2, 1641527826, 14),
(19, 'Wow, India Mulai Bentuk Satgas Pengembangan Teknologi Jaringan 6G', 'Departemen Telekomunikasi India pada pengujung 2021 resmi membentuk enam gugus tugas berbasis akademi di bawah Technology Innovation Group (TIG) untuk menangani urusan teknologi jaringan generasi keenam atau 6G. Dilansir dari Gadgets Now, Sabtu (1/1) departemen tersebut mengamanatkan tugas spesifik kepada satgas hingga 31 Maret 2022 mendatang, yang mencakup pemetaan aktivitas dan kemampuan teknologi jaringan 6G di seluruh dunia.   Selain itu, departemen juga meminta gugus tugas tersebut untuk me', 'teknologi.jpg', 5, 1641534832, 14),
(22, 'Tipe - Tipe Pemilih Dalam Pilkada', 'Tahun 2019 ini adalah tahun politik. Seluruh masyarakat menyambutnya dengan sukacita, demikian pula dengan saya. Pesta Demokrasi yang kali ini dilaksanakan serentak di segenap penjuru nusantara. Masyarakat yang memiliki hak pilih, diminta untuk ikut berpartisipasi menentukan arah dan tujuan bangsa dalam lima tahun ke depan. Pemilu yang rencananya akan diselenggarakan pada tanggal 17 April 2019 ini akan memilih Presiden dan Wakil Presiden, Memilih Anggota Dewan Perwakilan Daerah serta memilih Anggota Legislatif Baik Tingkat Kabupaten/Kota, Tingkat Propinsi hingga Tingkat Pusat. Total ada lima kertas suara yang akan dicoblos nantinya.  Sehubungan dengan Pemilu ini, saya coba untuk mengingat pada pemilihan umum yang sudah terselenggara sebelumnya yaitu Pemilihan Kepala Daerah (Pilkada). Pada pemilihan Kepala Daerah beberapa waktu lalu saya juga ikut serta, tak ingin ketinggalan dalam memberikan suara. Bukan hanya sebagai pemilih saja, akan tetapi juga secara kebetulan belaka saya tergabun', 'politik.jpg', 3, 1641535454, 14),
(24, 'AHM Dukung Keselamatan Berkendara Dengan Safety Riding Lab', 'KabarOto.com - Yayasan Astra Honda Motor selalu mendukung kampanye keselamtkan berkenfata di Indonesia. Salah satu kepedulian, dengan meresmikan Safety Riding Lab Astra Honda keempat di salah satu sekolah binaannya, SMK Muhammadiyah 1 Kepanjen Kabupaten Malang. Fasilitasini bisa dimanfaatkan untuk menjadi sarana edukasi keselamatan berkendara aman dan nyaman untuk kalangan millenial di wilayah Jawa Timur. Maryanto kepala sekolah SMK Muhammadiyah 1 Kepanjen mengatakan, rasa senangnya dengan kehadiran Safety Riding Lab di sekolah yang dipimpinnya. \"Siswa sekolah bisa semakin optimal mempraktikkan cara berkendara yang aman dan nyaman,\" jelasnya. Sekaligus dapat menginspirasi rekan-rekannya dalam memgkampanyekan keselamatan berkendara di jalan raya. Safety Riding Lab Astra Honda, memiliki tiga zona utama yaitu zona Audio-Visual, zona Simulasi dan zona Praktik. Zona Audio-Visual dapat digunakan untuk penyampaian materi, juga berdiskusi teknik dan etika berlalu lintas, melalui video kreatif.', 'otomotif.jpg', 6, 1641536338, 14),
(28, 'Check out OBERON.ORG!', 'OBERON.ORG project unites projects related to programming languages Oberon, Oberon-2, Active Oberon, Modula-2/3, Oberon-07 and Component Pascal (Blackbox Oberon).[\"Catalog of resources related with Oberon programming language\",OBERON.org]', NULL, 1, 1641615682, 16),
(29, 'Features of the Haskell programming language(\"Haskell Language\", haskell.org)', 'Features  Statically typed  Every expression in Haskell has a type which is determined at compile time. All the types composed together by function application have to match up. If they don\'t, the program will be rejected by the compiler. Types become not only a form of guarantee, but a language for expressing the construction of programs.  Click to expand  Purely functional  Every function in Haskell is a function in the mathematical sense (i.e., \"pure\"). Even side-effecting IO operations are but a description of what to do, produced by pure code. There are no statements or instructions, only expressions which cannot mutate variables (local or global) nor access state like time or random numbers.  Click to expand  Type inference  You don\'t have to explicitly write out every type in a Haskell program. Types will be inferred by unifying every type bidirectionally. However, you can write out types if you choose, or ask the compiler to write them for you for handy documentation.  Click to expand  Concurrent  Haskell lends itself well to concurrent programming due to its explicit handling of effects. Its flagship compiler, GHC, comes with a high-performance parallel garbage collector and light-weight concurrency library containing a number of useful concurrency primitives and abstractions.  Click to expand  Lazy  Functions don\'t evaluate their arguments. This means that programs can compose together very well, with the ability to write control constructs (such as if/else) just by writing normal functions. The purity of Haskell code makes it easy to fuse chains of functions together, allowing for performance benefits.  Click to expand  Packages  Open source contribution to Haskell is very active with a wide range of packages available on the public package servers.', NULL, 1, 1641616219, 16),
(30, 'Recent happening in Russian politics', 'Moscow hits back at Blinken’s ‘history lesson’  The US secretary of state has claimed that ‘once Russians are in your house, it’s sometimes very difficult to get them to leave’ Read more at https://www.rt.com/russia/545422-russia-blinken-kazakhstan-lesson/?utm_referrer=https%3A%2F%2Fzen.yandex.com%2F%3Ffromzen%3Dabro', NULL, 3, 1641616426, 16),
(31, 'In Kazakhstan', 'Internet switched off in Kazakhstan amid unrest – reports  TV broadcasting has also been disrupted in the Central Asian country faced with a wave of protests over a spike in fuel prices Read more at https://www.rt.com/russia/545224-kazakhstan-internet-tv-riots/?utm_referrer=https%3A%2F%2Fzen.yandex.com%2F%3Ffromzen%3Dabro', NULL, 3, 1641618694, 16),
(32, 'Taliban beheads.....mannequins', 'Taliban reportedly orders beheading of shop mannequins  Afghanistan’s new rulers apparently deem dummies to be ‘idols’ that are offensive to Islam Read more at https://www.rt.com/news/545192-taliban-orders-mannequins-beheaded/?utm_referrer=https%3A%2F%2Fzen.yandex.com%2F%3Ffromzen%3Dabro', NULL, 3, 1641618890, 16),
(33, 'North Korean Missile Launch in 2022', 'North Korea fires unidentified missile  Pyongyang appears to have carried out its first ballistic missile test of 2022 Read more at https://www.rt.com/news/545182-north-korea-missile-launch/?utm_referrer=https%3A%2F%2Fzen.yandex.com%2F%3Ffromzen%3Dabro', NULL, 3, 1641619071, 16),
(34, 'RT article on Manchester United', 'Manchester United atmosphere ‘oppressive’ as Rangnick battles rifts  Rifts are forming at Old Trafford, according to reports Read more at https://www.rt.com/sport/545213-rangnick-manchester-united-rifts/?utm_referrer=https%3A%2F%2Fzen.yandex.com%2F%3Ffromzen%3Dabro', NULL, 2, 1641619324, 16),
(35, 'NYC\'s new policy: Do the crime, do no time(RT Article)', 'Officials in New York City may follow in the footsteps of California’s major cities with a controversial approach to the unfolding crime epidemic, which has included a disturbing surge in smash-and-grab theft and home invasions. Manhattan DA Bragg is advocating for a de facto decriminalization of certain offenses so that scarce police and prosecutorial resources can be used to tackle more serious and violent crimes. Critics of the proposal, such as the powerful Police Benevolent Association of the City of New York, say the move encourages an already-rampant disregard for law and order and erodes credibility in law enforcement and its officers’ effectiveness. RT America’s John Huddy reports. Then Democratic commentator and attorney Jeffrey Katz weighs in.......Read more at https://www.rt.com/shows/news-views-hughes/545264-nycs-new-policy-do-crime/', NULL, 3, 1641619556, 16),
(36, '\"Learn You A Haskell For A Great Good\"', '\"Learn You A Haskell For A Great Good\" is a tutorial on Haskell programming available online at http://learnyouahaskell.com', NULL, 1, 1641619826, 16),
(37, 'On Katsushika Hokusai(Content from https://www.katsushikahokusai.org/)', '[Taken from https://www.katsushikahokusai.org/] KATSUSHIKA HOKUSAI  (1760 – May 10, 1849)  Katsushika Hokusai (葛飾北斎, Katsushika Hokusai? 1760–May 10, 1849) was a Japanese artist, ukiyo-e painter and printmaker of the Edo period. In his time he was Japan\'s leading expert on Chinese painting. Born in Edo (now Tokyo), Hokusai is best-known as author of the woodblock print series Thirty-six Views of Mount Fuji (c. 1831) which includes the iconic and internationally recognized print, The Great Wave off Kanagawa, created during the 1820s. Hokusai created the \"Thirty-Six Views\" both as a response to a domestic travel boom and as part of a personal obsession with Mount Fuji. It was this series, specifically The Great Wave print and Fuji in Clear Weather, that secured Hokusai’s fame both within Japan and overseas. As historian Richard Lane concludes, “Indeed, if there is one work that made Hokusai\'s name, both in Japan and abroad, it must be this monumental print-series...” While Hokusai\'s work prior to this series is certainly important, it was not until this series that he gained broad recognition and left a lasting impact on the art world. It was The Great Wave print that initially received, and continues to receive, acclaim and popularity in the Western world.', 'The_Great_Wave_Off_Kanagawa_1823.jpg', 4, 1641620304, 16),
(38, 'Fishing by Torchlight in Kai Province (Koshu hiburi) by Katsushika Hokusai', 'Another of Hokusai\'s works. The image was obtained from https://www.katsushikahokusai.org/', 'Fishing_by_Torchlight_in_Kai_Province_(Koshu_hiburi).jpg', 4, 1641620428, 16),
(40, 'PRILAKU BERKENDARA YANG MEMBAHAYAKAN NAMUN DIANGGAP HAL YANG WAJAR', 'Kali ini kita membahas tentang prilaku pengendara berdasarkan kebiasaan masyarakat pada umumnya.\r\nJadi bukan hanya membahas prilaku berkendara emak emak yang memang sudah menjadi raja jalanan, tapi prilaku yang banyak dilakukan oleh masyarakat Indonesia.\r\n\r\nPrilaku yang paling sering dilakukan sehingga menjadi pembenaran, saya sebut pembenaran dikarenakan bila ada pengendara yang tidak melakukan maka dianggap mengganggu lalulintas jalan, bahkan prilaku tersebut sudah tidak memperhatikan aspek keamanan baik untuk diri sendiri maupun orang lain.\r\n\r\n1. Menyalip atau mendahului dari kiri.\r\nPerilaku ini sudah lajim dilakukan oleh masyarakat, terutama pengendara motor dan angkot.\r\n2. Berbelok dipersimpangan \r\n\r\nMasih sering dijumpai dan bahkan sudah menjadi kebiasaan umum saat berbelok justru pengendara tersebut mengambil jalur kendaraan dari arah berlawanan, baik sebelum persimpangan maupun saat dipersimpangan tersebut.\r\n\r\nHal ini sangat membahayakan bahkan sangat rentan untuk mengalami kecelakaan baik si pengendara maupun orang lain, dan juga menjadi salah satu penyebab terjadinya kemacetan, dalam pandangan saya sering kemacetan yang terjadi diakibatkan oleh kekacauan yang ditimbulkan oleh pengendara saat akan berbelok (mengambil jalur kendaraan arah sebaliknya -pen)pada persimpangan jalan.', NULL, 6, 1641791099, 14),
(41, 'Langkah Mudah Cara Ganti Aki Mobil Supaya Tidak Eror', 'Mengganti aki mobil umumnya memang dikerjakan di bengkel oleh montir, namun rupanya bisa dilakukan sendiri dengan cara yang cukup mudah.\r\n\r\nBagi pemilik mobil baru sepertinya bisa melewati ulasan terkait cara mengganti aki ini, karena biasanya aki diganti karena bermasalah dan terjadi pada kendaraan usia 2-5 tahun ke atas.\r\n\r\nLebih banyaknya lagi, ganti aki biasanya dialami oleh mereka yang baru membeli mobil bekas.\r\n\r\nAki pada kendaraan punya peranan yang sangat penting untuk mengalirkan arus listrik. Jika aki mulai lemah, maka kendaraan biasanya memiliki tanda-tanda sebelum aki tersebut benar-benar mati total.\r\n\r\nTapi harus diketahui, cara ganti aki untuk mobil modern sebenarnya cukup berbeda dibanding mobil lawas. Terlebih mobil baru saat ini rata-rata sudah mengadopsi sistem injeksi.\r\n\r\nSalah-salah, jika tidak hati-hati memperhatikan proses ganti aki mobil, ECU akan bermasalah.\r\n\r\nIni berpengaruh pada saat hendak mengganti aki yang dibutuhkan beberapa langkah khusus. Nah, langkah inilah yang sebenarnya belum banyak diketahui oleh para pemilik mobil.\r\n\r\nSupaya Carmudian bisa lebih paham, yuk, langsung saja kita bahas tentang cara ganti aki mobil injeksi dan non-injeksi!', NULL, 6, 1641800662, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `status`) VALUES
(5, 'Admin', 'admin@admin.com', 'cat.jpg', '$2y$10$79UttmNcsZRFVdB/Fx2PjOVtNY3lINaaaQXMh/5f5FqGFG1SsA4E2', 1, 1, 1640222352, 0),
(6, 'Lorem', 'mamber@mamber.com', 'default.png', '$2y$10$algg5F8IjzQlRlOkNIDrDurJT0wpd0UMTcx/5eMFgcd10I11ewAay', 2, 1, 1640224466, 1),
(12, 'Riko', 'hhuru41@gmail.com', 'default.png', '$2y$10$8VB66iqto2mXB9fuUJ8reOhyAzJ6w0h576puBBcBfMyTDgN1dfTne', 2, 1, 1640590346, 0),
(13, 'syahda', 'syahda@emm.local', 'default.png', '$2y$10$gYGkNZ5PZWj./B5nP5vTbuYLBQ3URHgGE9FHeNkCeLo/j34AtL9g.', 2, 1, 1641522675, 0),
(14, 'syifink', 'syifink2019@gmail.com', 'default.png', '$2y$10$j5bMzRRCrhoLg5GnejvXWeWshmWcOvdAtJ0H4D7tO1Faj2jMsb2t2', 2, 1, 1641523917, 1),
(15, 'IPIN', 'ipin@gmail.com', 'default.png', '$2y$10$W8E1KwzSos.zVWjhSfCms.x2h0RtYWcANc6tmi209mdQeObWxiCKK', 2, 1, 1641528401, 1),
(16, '&quot;Anonymous&quot;', 'ddhrhyh1@sharklasers.com', 'default.png', '$2y$10$AP7a5JXabTQyuO4Md8NTder9QGt2i5Sw/G0AHXIqWciu/WDpxiVs.', 2, 1, 1641612694, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(5, 1, 4),
(6, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Forum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, '1', 'Report', 'admin', 'fas fa-fw fa-clipboard-list', 1),
(2, '2', 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, '2', 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, '3', 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, '3', 'Submenu Management', 'menu/submenu', 'far fa-fw fa-folder-open', 1),
(7, '1', 'Role', 'admin/role', 'fas fa-fw fa-user-tag', 0),
(8, '2', 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, '4', 'My Post', 'forum/mypost', 'fas fa-paper-plane', 1),
(10, '4', 'My Comment', 'forum/mycomment', 'fas fa-comments', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`id_categori`);

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id_inbox`),
  ADD KEY `user_id_from` (`user_id_from`),
  ADD KEY `user_id_to` (`user_id_to`);

--
-- Indeks untuk tabel `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categori`
--
ALTER TABLE `categori`
  MODIFY `id_categori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id_inbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id_post`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `inbox_ibfk_1` FOREIGN KEY (`user_id_from`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inbox_ibfk_2` FOREIGN KEY (`user_id_to`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categori` (`id_categori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
