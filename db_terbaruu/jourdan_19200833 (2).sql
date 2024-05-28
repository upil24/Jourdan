-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2023 pada 00.11
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jourdan_19200833`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `user` varchar(40) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `foto`, `user`, `keterangan`, `date_created`) VALUES
(149, 'gal1689066263.jpg', 'Super', 'jourdan', 1689066263),
(150, 'gal1689400086.jpg', 'Super', 'tesss', 1689400086),
(151, 'gal1689400147.jpg', 'Super', 'asdf', 1689400147),
(152, 'gal1689400540.jpg', 'Super', 'listrik pintar', 1689400540),
(153, 'gal1689400563.jpg', 'Super', 'no suap', 1689400563),
(154, 'gal1689400581.jpg', 'Super', 'asas', 1689400581),
(155, 'gal1689400596.jpg', 'Super', 'sds', 1689400596),
(156, 'gal1689400604.jpg', 'Super', 'dsd', 1689400604);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(16) NOT NULL,
  `nama_p` varchar(100) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `jen_kel` enum('PRIA','WANITA') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `no_kwh` varchar(12) NOT NULL,
  `id_tarif` varchar(16) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_p`, `kontak`, `jen_kel`, `email`, `no_ktp`, `alamat`, `image`, `password`, `is_active`, `no_kwh`, `id_tarif`, `id_user`, `date_created`) VALUES
('PLG130723001', 'Jourdan', '081210309267', 'PRIA', 'bikinnamaajaribet@gmail.com', '567658658946456', 'jl.mutiara raya blok c/5 perumahan mutiara baru kota bekasi 17114', 'default.jpg', '$2y$10$LGxTutU6cZcq.01DzsM8OeWEjfFtjb3tfg/5BUEb7TISD7IuYM1Pe', 1, '07202313001', 'TRF0003', 50, '2023-07-12 18:34:04'),
('PLG130723002', 'kiki', '45345345546456', 'WANITA', 'bikinnssamaajaribet@gmail.com', '1346548454546', 'indonesia pokoknyaaaaaaa', 'default.jpg', '$2y$10$S0.Ib6sI32BlzS2tZZKyduaa9N3GS2iPCyMt3sa4QNfp5E7HU/mtu', 1, '07202313002', 'TRF0001', 43, '2023-07-12 18:34:40'),
('PLG130723003', 'Monalisa', '123123', 'WANITA', 'Monalisa@gmail.com', '234234', 'jl.garuda timur bla bla jakarta selatan', 'default.jpg', '$2y$10$yfAdp2Dilu/xfsv2bmutjOOnIBzm/AWpX/IyyBze3c81Yduw2exLK', 1, '07202313003', 'TRF0002', 43, '2023-07-13 06:44:06'),
('PLG130723004', 'Sinta', '08123456789', 'WANITA', 'iniemail@gmail.com', '323234234234', 'Jauh pokoknyaaaaaaa', 'default.jpg', '$2y$10$XuYbuZSYqoG1SZzNsLZM2O6ZurNm0hVm94Bl0uI.n98gskyvyCF/6', 1, '07202313004', 'TRF0001', 43, '2023-07-13 12:15:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(16) NOT NULL,
  `id_tagihan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(16) NOT NULL,
  `bulan_bayar` int(2) NOT NULL,
  `tahun_bayar` year(4) NOT NULL,
  `total_bayar` double NOT NULL,
  `id_user` varchar(16) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `id_pelanggan`, `bulan_bayar`, `tahun_bayar`, `total_bayar`, `id_user`, `date_created`) VALUES
('23071423001', 'TGH132307001', 'PLG130723001', 1, 2023, 184500, '50', '2023-07-14 13:06:36'),
('23071523001', 'TGH132307005', 'PLG130723001', 2, 2023, 115500, '50', '2023-07-15 15:46:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(16) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `meter_awal` int(11) NOT NULL,
  `meter_akhir` int(11) NOT NULL,
  `tgl_cek` varchar(16) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `id_user`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`, `tgl_cek`, `date_created`) VALUES
('PGN230713001', 'PLG130723001', 50, '01', 2023, 0, 123, '15-01-2023', '2023-07-13 09:30:48'),
('PGN230713002', 'PLG130723002', 50, '02', 2023, 0, 200, '15-02-2023', '2023-07-13 09:31:11'),
('PGN230713003', 'PLG130723003', 50, '02', 2023, 0, 133, '15-02-2023', '2023-07-13 09:31:35'),
('PGN230713004', 'PLG130723004', 50, '01', 2023, 0, 100, '13-07-2023', '2023-07-13 12:16:00'),
('PGN230713005', 'PLG130723001', 50, '02', 2023, 123, 200, '14-02-2023', '2023-07-13 16:41:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` varchar(16) NOT NULL,
  `id_penggunaan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(16) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_meter` int(11) NOT NULL,
  `tarifperkwh` double NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `status` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `jumlah_meter`, `tarifperkwh`, `jumlah_bayar`, `status`, `id_user`, `date_created`) VALUES
('TGH132307001', 'PGN230713001', 'PLG130723001', '01', 2023, 123, 1500, 184500, 'Lunas', 50, '2023-07-13 09:30:48'),
('TGH132307002', 'PGN230713002', 'PLG130723002', '02', 2023, 200, 1000, 200000, 'Belum Bayar', 50, '2023-07-13 09:31:11'),
('TGH132307003', 'PGN230713003', 'PLG130723003', '02', 2023, 133, 1200, 159600, 'Belum Bayar', 50, '2023-07-13 09:31:35'),
('TGH132307004', 'PGN230713004', 'PLG130723004', '01', 2023, 100, 1000, 100000, 'Belum Bayar', 50, '2023-07-13 12:16:00'),
('TGH132307005', 'PGN230713005', 'PLG130723001', '02', 2023, 77, 1500, 115500, 'Lunas', 50, '2023-07-13 16:41:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` varchar(16) NOT NULL,
  `daya` varchar(8) NOT NULL,
  `tarifperkwh` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `daya`, `tarifperkwh`) VALUES
('TRF0001', '900 VA', 1000),
('TRF0002', '1200 VA', 1200),
('TRF0003', '2200 VA', 1500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `image`, `password`, `is_active`, `date_created`) VALUES
(43, 'Nining', 'admin@gmail.com', 'pro1648541783.jpg', '$2y$10$pgXE0i/e24177oWxfk7QS.GO8USIX7DFNr/sZi3ezsMB8bMhK51iS', 1, 1633516693),
(50, 'Super', 'super@gmail.com', 'pro1689050894.jpg', '$2y$10$kmA/nNYxvxS8RMnri1xrC.DTMLFShip6zE3EfBOra3RCu.53iMOSK', 1, 1638212193);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_tarif` (`id_tarif`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_tagihan` (`id_tagihan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_penggunaan` (`id_penggunaan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
