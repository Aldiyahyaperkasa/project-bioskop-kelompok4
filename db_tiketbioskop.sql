-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2023 pada 05.02
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiketbioskop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2022-07-05-160805', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1657038131, 1),
(2, '2022-07-05-160814', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1657038167, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_film`
--

CREATE TABLE `tb_film` (
  `filmkode` char(10) NOT NULL,
  `filmjadwal` varchar(30) NOT NULL,
  `filmKategId` int(10) UNSIGNED NOT NULL,
  `filmharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_film`
--

INSERT INTO `tb_film` (`filmkode`, `filmjadwal`, `filmKategId`, `filmharga`) VALUES
('AV22', '21 Juli  2022 | 14.00 WIB', 3, 55000),
('KKN2122', '21 Juli 2022 | 19.00 WIB', 6, 45000),
('NNS722', '29 Juli 2022 | 14.00 WIB', 7, 45000),
('THOR0722', '30 Juli 2022 | 14.00 WIB', 8, 55000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kategId` int(10) UNSIGNED NOT NULL,
  `film` varchar(50) NOT NULL,
  `kategNama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategId`, `film`, `kategNama`) VALUES
(3, 'Avengers : End Game', 'Action'),
(6, 'KKN Desa Penari', 'Horror'),
(7, 'Ngeri Ngeri Sedap', 'Komedi'),
(8, 'Thor : Love and Thunder', 'Action'),
(9, 'Cars', 'animation, action');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`username`, `password`, `name`) VALUES
('kelompok4', '$2y$10$W9rL7AmIEOI1Au1eaFeYO.gfLbVmL7wBMcIBuQyvAxQZTjyfel2Rm', 'Kelompok 4 Pagi 1'),
('aldiyahya', '$2y$10$RPrOlykhsPE1SiDmINl3t.C0EM/jnYo7mCyTjvRA4Tdb8NhzY0lYy', 'aldi yahya 202012046'),
('yahyaaldi', '$2y$10$YG.dssyxsjwGJiS7qhvNE.SKm.7B3wWPjMIxQTvhi1StrShgfE21.', 'yahyaaldi'),
('cobaaja', '$2y$10$fFtWKQMoHIl4M63ZyXW9gejQ6UMZJ5Gav3N1ISHE9ruzLjoY0msPS', 'coba');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_film`
--
ALTER TABLE `tb_film`
  ADD PRIMARY KEY (`filmkode`),
  ADD KEY `tb_obat_obatKategId_foreign` (`filmKategId`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD KEY `kategId` (`kategId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_film`
--
ALTER TABLE `tb_film`
  ADD CONSTRAINT `tb_obat_obatKategId_foreign` FOREIGN KEY (`filmKategId`) REFERENCES `tb_kategori` (`kategId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
