-- SQL Schema for Animedesu
-- CodeIgniter 4 Application

CREATE DATABASE IF NOT EXISTS `animedesu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `animedesu`;

-- --------------------------------------------------------
-- Table structure for table `users` (Admin Authentication)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'admin',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Initial default admin user:
-- Username: admin
-- Password: admin123 (bcrypt encrypted)
INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`)
VALUES
  (1, 'admin', 'admin@animedesu.com', '$2y$10$kCmSqn2ya8q1cNPond8I5eLXSzZhCwy3iDUueVXG7H8TM1l3fYA7C', 'admin', NOW(), NOW())
ON DUPLICATE KEY UPDATE `username`=VALUES(`username`);

-- --------------------------------------------------------
-- Table structure for table `web`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `web` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_situs` varchar(255) NOT NULL DEFAULT 'Animedesu',
  `logo` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT 'animedesu',
  `deskripsi` text DEFAULT 'Nonton & Download Anime Subtitle Indonesia',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Initial default data for web table
INSERT INTO `web` (`id`, `nama_situs`, `logo`, `slug`, `deskripsi`, `created_at`, `updated_at`)
VALUES
  (1, 'Animedesu', 'img/logo.png', 'animedesu', 'Nonton Anime Subtitle Indonesia Terlengkap', NOW(), NOW())
ON DUPLICATE KEY UPDATE `nama_situs`=VALUES(`nama_situs`);

-- --------------------------------------------------------
-- Table structure for table `anime`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `anime` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `japan` varchar(255) DEFAULT NULL,
  `skor` varchar(50) DEFAULT NULL,
  `produser` varchar(255) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT 'TV',
  `status` varchar(50) DEFAULT 'Ongoing',
  `total_episode` varchar(50) DEFAULT '?',
  `durasi` varchar(100) DEFAULT NULL,
  `studio` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `musim` varchar(100) DEFAULT NULL,
  `rilis` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `episode`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `episode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_anime` int(11) unsigned NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `episode_ke` int(11) NOT NULL DEFAULT 1,
  `use_player` tinyint(1) NOT NULL DEFAULT 0,
  `embed_player` text DEFAULT NULL,
  `judul_player` varchar(255) DEFAULT NULL,
  `use_download` tinyint(1) NOT NULL DEFAULT 0,
  `link_download` text DEFAULT NULL,
  `judul_download` varchar(255) DEFAULT NULL,
  `kualitas` varchar(50) DEFAULT '720p',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anime` (`id_anime`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `halaman`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `halaman` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `post` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
