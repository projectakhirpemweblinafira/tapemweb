-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2019 pada 22.30
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carimakan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_post` int(5) NOT NULL,
  `nama_gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int(10) NOT NULL,
  `id_postingan` int(10) DEFAULT NULL,
  `komentar` varchar(255) NOT NULL,
  `username_komen` varchar(20) NOT NULL,
  `waktu_komentar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komen`, `id_postingan`, `komentar`, `username_komen`, `waktu_komentar`) VALUES
(1, 9, 'lalalala', 'firasukmanisa', '2019-04-29 09:36:48'),
(5, 9, 'aaaaaa', 'firasukmanisa', '2019-04-29 10:27:59'),
(6, 10, 'testing', 'firasukmanisa', '2019-04-29 10:30:29'),
(7, 10, 'firararararara', 'firasukmanisa', '2019-04-29 10:31:23'),
(9, NULL, 'mamaisa', 'firasukmanisa', '2019-04-29 10:56:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(5) NOT NULL,
  `nama_kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Kota Malang'),
(2, 'Kab. Malang'),
(3, 'Kota Batu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting`
--

CREATE TABLE `posting` (
  `nama_restoran` varchar(50) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `id_lokasi_alamat` int(5) NOT NULL,
  `kisaran_harga` varchar(20) NOT NULL,
  `hari_buka` varchar(10) NOT NULL,
  `hari_tutup` varchar(10) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `waktu_posting` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username_posting` varchar(20) NOT NULL,
  `id_post` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posting`
--

INSERT INTO `posting` (`nama_restoran`, `alamat`, `id_lokasi_alamat`, `kisaran_harga`, `hari_buka`, `hari_tutup`, `jam_buka`, `jam_tutup`, `kontak`, `deskripsi`, `foto`, `waktu_posting`, `username_posting`, `id_post`) VALUES
('apaini', 'jalan', 1, '5.400 - 35.000', 'Senin', 'Minggu', '01:00:00', '01:00:00', '00000', 'oyi', '1556304266048.png', '2019-04-26 18:44:26', 'awalinaa', 9),
('chips', 'jl. suhat', 1, '2222', 'senin', 'minggu', '11:11:00', '12:12:00', '0822', 'aaaaaaaaaa', '1556533804970', '2019-04-29 10:30:05', 'firasukmanisa', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `jumah_rate` int(20) NOT NULL,
  `id_post` int(10) NOT NULL,
  `username_rate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `foto_profil` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `full_name`, `foto_profil`) VALUES
('awalinaa', '$2y$10$LoaZ5D1Er0IIJalAcuYix.P.VNeaFt5aKQ9nzmsaSZyJc7ncSD5hi', 'alboemlina@gmail.com', 'Aisyah Awalina', 0x64656661756c742e6a7067),
('firasukmanisa', '$2y$10$TZXjWybeStMIEk1yYzSE1uDQXEET1XstQfvr1SEKfJwvQjS014Vk.', 'firaayui26@gmail.com', 'Fira Sukmanisa', 0x64656661756c742e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `index_post` (`id_post`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`),
  ADD KEY `id_postingan` (`id_postingan`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD UNIQUE KEY `id_kota` (`id_kota`);

--
-- Indeks untuk tabel `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `username_posting` (`username_posting`),
  ADD KEY `id_lokasi_alamat` (`id_lokasi_alamat`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD KEY `id_post` (`id_post`),
  ADD KEY `username_rate` (`username_rate`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `posting`
--
ALTER TABLE `posting`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `fk_idpost` FOREIGN KEY (`id_post`) REFERENCES `posting` (`id_post`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_postingan`) REFERENCES `posting` (`id_post`);

--
-- Ketidakleluasaan untuk tabel `posting`
--
ALTER TABLE `posting`
  ADD CONSTRAINT `posting_ibfk_1` FOREIGN KEY (`username_posting`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `posting_ibfk_2` FOREIGN KEY (`id_lokasi_alamat`) REFERENCES `kota` (`id_kota`);

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posting` (`id_post`),
  ADD CONSTRAINT `rating_ibfk_4` FOREIGN KEY (`username_rate`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
