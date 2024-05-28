-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2023 pada 01.36
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
-- Struktur dari tabel `billing_obat`
--

CREATE TABLE `billing_obat` (
  `kd_billing_obat` varchar(16) NOT NULL,
  `kd_pasien` varchar(16) NOT NULL,
  `kd_rm` varchar(16) NOT NULL,
  `tgl_bayar` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `billing_obat`
--

INSERT INTO `billing_obat` (`kd_billing_obat`, `kd_pasien`, `kd_rm`, `tgl_bayar`, `total`, `status`, `date_created`) VALUES
('020322001', 'PSN251121001', 'RM020322001', 20220302, 19000, 'Selesai', '2022-03-02 07:03:10'),
('020322002', 'PSN231121001', 'RM020322002', 20220302, 65000, 'Selesai', '2022-03-02 07:03:18'),
('020322003', 'PSN211121002', 'RM020322003', 20220302, 20000, 'Selesai', '2022-03-02 12:03:21'),
('020322004', 'PSN211121001', 'RM020322004', 20220302, 25000, 'Selesai', '2022-03-02 14:26:44'),
('100322001', 'PSN231121001', 'RM090322001', 20220309, 14000, 'Selesai', '2022-03-09 17:03:03'),
('100322002', 'PSN251121001', 'RM100322001', 20220309, 10000, 'Selesai', '2022-03-09 17:36:12'),
('230422001', 'PSN231121001', 'RM230422001', 20220422, 45000, 'Selesai', '2022-04-22 19:47:34'),
('260622001', 'PSN160622001', 'RM160622001', 20220626, 22000, 'Selesai', '2022-06-26 12:29:36');

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
(137, 'gal1660292692.jpg', 'jourdan', 'asasd', 1660292692),
(139, 'gal1660292704.jpg', 'jourdan', 'asdsad', 1660292704),
(141, 'gal1660292725.jpg', 'jourdan', 'asdasd', 1660292725),
(142, 'gal1660292742.jpg', 'jourdan', 'asdsads', 1660292742),
(143, 'gal1660292757.jpg', 'jourdan', 'asdsds', 1660292757),
(147, 'gal1683380423.jpg', 'Superrrrr', 'ljhkl', 1683380423),
(148, 'gal1683380429.jpg', 'Superrrrr', 'jl,jkjk', 1683380429),
(149, 'gal1689066263.jpg', 'Super', 'jourdan', 1689066263);

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
('PLG130723002', 'kiki', '45345345546456', 'WANITA', 'bikinnssamaajaribet@gmail.com', '1346548454546', 'safdfdsf sgdgdfgdfg dgfdgfgfg', 'default.jpg', '$2y$10$S0.Ib6sI32BlzS2tZZKyduaa9N3GS2iPCyMt3sa4QNfp5E7HU/mtu', 1, '07202313002', 'TRF0001', 50, '2023-07-12 18:34:40');

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
('1320230713001', 'PLG130723001', 50, '01', 2023, 0, 100, '25-06-2023', '2013-07-22 18:35:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(16) NOT NULL,
  `id_penggunaan` varchar(16) NOT NULL,
  `id_pelanggan` varchar(16) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_meter` int(11) NOT NULL,
  `tarifperkwh` double NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `status` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `jumlah_meter`, `tarifperkwh`, `jumlah_bayar`, `status`, `id_user`, `date_created`) VALUES
(2147483647, '1320230713001', 'PLG130723001', '01', 2023, 100, 1500, 150000, 'Belum Bayar', 50, '2013-07-23');

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
('TRF0001', '900Watt', 1000),
('TRF0002', '1200Watt', 1200),
('TRF0003', '2200Watt', 1500);

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
(43, 'administratorr', 'admin@gmail.com', 'pro1648541783.jpg', '$2y$10$pgXE0i/e24177oWxfk7QS.GO8USIX7DFNr/sZi3ezsMB8bMhK51iS', 1, 1633516693),
(50, 'Super', 'super@gmail.com', 'pro1689050894.jpg', '$2y$10$8s/k.K370JPkJn1ygiZbXu30/eKJp8W4v0F/znmg2BvruEwOjt4e6', 1, 1638212193);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `billing_obat`
--
ALTER TABLE `billing_obat`
  ADD PRIMARY KEY (`kd_billing_obat`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
