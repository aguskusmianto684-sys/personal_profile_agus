-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2025 at 02:24 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal_profile_agus`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `born` date NOT NULL,
  `address` text NOT NULL,
  `zip_code` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `total_project` int NOT NULL,
  `work` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `born`, `address`, `zip_code`, `email`, `phone`, `total_project`, `work`, `image`, `description`) VALUES
(6, 'Agus kusmianto', '2007-08-24', 'Jl. Pengairan No.rt15/03, Cintajaya, Kec. Lakbok, Kabupaten Ciamis, Jawa Barat 46385', 23232, 'aguskusmianto684@gmail.com', '085950898193', 1, 'Pelajar', '1755444764.png', 'Saya adalah pelajar SMK jurusan Pengembangan Perangkat Lunak dan Gim, (PPLG) yang memiliki minat tinggi di bidang teknologi dan pemrograman. Saya senang belajar hal baru, khususnya dalam mengasah keterampilan coding dan logika pemrograman untuk siap menghadapi dunia kerja di industri digital.');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `date`, `author`, `title`, `description`) VALUES
(30, '1755444241.png', '2022-07-12', 'Agus kusmianto', 'Mengikuti lomba tradisionali Porprov sumedang 2022', 'Saya pernah mengikuti Porprov lomba tradisional lari balok di sumedang, dan saya mendapatkan juara 1 bersama rekan-rekan saya dan melaju ke Fornas palembang sebagai perwakilan jawa barat.'),
(31, '1755444218.png', '2024-05-21', 'Agus kusmianto', 'Penghargaan juara 3 lari balok pada HUT kodam 3 siliwangi 2023', 'Saya pernah mengikuti lomba tradisional lari balok, dalam memeriahkan HUT kodam 3 siliwangi ke 78 di bandung dan mendapatkan juara 3 bersama rekan\" saya.'),
(32, '1755444203.png', '2023-07-06', 'Agus kusmianto', 'Penghargaan juara 2 lari balok fornas ke 7 Bandung 2023', 'Saya pernah mengikuti lomba tradisional lari balok pada Fornas ke 7 di Bandung, dan mendapat juara 2 serta diberikan penghargaan oleh kelurahan daerah saya tinggal.');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `phone`, `massage`) VALUES
(18, 'suga', 'suga@gmail.com', 'agus', '323423433534', 'hahha');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `image`, `title`, `job`, `category`, `description`) VALUES
(12, '1755003774.png', 'Personal profile', 'Pekerjaan pkl', 'programming', 'Saya pernah membuat web personal profile menggunakan template user dan admin menggunakan crud yang datanya sesuai di backend dan datanya ditampilkan di frontend, sebagai latihan bersama di pkl, di pt lauwba tecno indonesia.'),
(13, '1755004058.png', 'web undangan pernikahan', 'Pekerjaan mandiri', 'programming', 'Saya pernah membuat undangan pernikahan digital menggunakan laravel sebagai bahan latihan saya, terdapat fitur seperti hitung mundur otomatis yangbisa dilihat sisa hari jam, menit, detik sampai hari-H. tamu juga bisa buka info acara lengkap lewat sini.'),
(18, '1755572167.png', 'Katalog produk', 'Pekerjaan pkl', 'programming', 'Saya pernah membuat kataalog produk pada saat pkl. dan sudah menggunakan crud dan hyperlink. ');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint NOT NULL,
  `date` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `sumary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `date`, `job`, `place`, `sumary`, `description`) VALUES
(4, '2023-2026', 'pelajar', 'SMK N 3 BANJAR', 'Saya siswa smkn 3 banjar jurusan pplg, dan selama di sekolah banyak yang telah saya pelajari, seperti belajar tentang coding, dan bahasa pemrograman yang saya pahami, seperti html, css, js, dan php.', 'Selama belajar di sekolah, saya sudah mulai memehai dan mencoba berbagai bahasa pemrograman, seperti html,  css , php, dan js. '),
(9, '2025-Sekarang', 'Web developer', 'PT  LAUWBA TECHNO INDONESIA', 'Selama pkl di pt lauwba techno indonesia banyak yang telah dipelajari salah satunya crud dan perulangan, hyperlink dan pengelolaan database.', 'Saya sedang melaksanakan pkl di pt lauwba techno indonesia sampai 7 bulan kedepan, dan disini sedang mempelajari crud dan perulangan php.');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint NOT NULL,
  `icon` text NOT NULL,
  `job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `job`) VALUES
(11, 'bi bi-youtube', 'content creator'),
(14, 'bi bi-code-slash', 'web developer'),
(15, 'bi bi-tiktok', 'afiliate');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint NOT NULL,
  `skill` varchar(255) NOT NULL,
  `percent` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `percent`, `description`) VALUES
(1, 'HTML', 70, 'Dapat membut CRUD sederhana untuk mengelola data secara dinamis.'),
(2, 'CSS', 55, 'Mulai bisa mengatur style dasar website dengan CSS, termasuk teks, warna, dan layout sederhana.\r\n'),
(3, 'JS', 30, 'Mulai memahami dasar JavaScript untuk interaktivitas sederhana pada website.'),
(5, 'LARAVEL', 45, 'Mulai terbiasa mengelola proyek dengan Laravel, termasuk routing, blade template, dan dasar database.'),
(9, 'CANVA', 40, 'Dapat menguasai atau menggunakan berbagai fitur canva, dan berbagai  template lainya yang tersedia\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `socmeds`
--

CREATE TABLE `socmeds` (
  `id` bigint NOT NULL,
  `icon` varchar(255) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `socmeds`
--

INSERT INTO `socmeds` (`id`, `icon`, `link`) VALUES
(1, 'bi bi-tiktok', 'https://www.tiktok.com/@4gushao'),
(5, 'bi  bi-instagram', 'https://www.instagram.com/4guzhao/?next=%2F4guzhao%2F'),
(6, 'bi bi-facebook', 'https://www.facebook.com/profile.php?id=100066326298873'),
(7, 'bi bi-twitter-x', 'https://x.com/Guzha0'),
(8, 'bi bi-github', 'https://github.com/aguskusmianto684-sys');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'agus@gmail.com', '123'),
(2, 'asu', 'put@gmail.com', '$2y$10$zRn8YI1rniZ90YUWGilCV.7dQtCh/fBroo1U8iO4WGYtrfO1PPl3W'),
(3, 'sdfd', 'aguskusmianto686@gmail.com', '$2y$10$ojzSOIdfX/EdENk3N9WCB.1wmulqyScPH9J.ifPJiGCi8CW2un7a2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socmeds`
--
ALTER TABLE `socmeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `socmeds`
--
ALTER TABLE `socmeds`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
