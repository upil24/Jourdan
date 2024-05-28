<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">

        <?php

        function cek($id)
        {
            $conn = new mysqli("localhost", "root", "", "jourdan_19200833");
            $sql = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tagihan WHERE id_tagihan='$id' AND status='Lunas'"));
            return $sql;
        }
        ?>

        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php } ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

        <?php
        function bulan($bulan)
        {
            switch ($bulan) {
                case '01':
                    $bln = "Januari";
                    break;
                case '02':
                    $bln = "Februari";
                    break;
                case '03':
                    $bln = "Maret";
                    break;
                case '04':
                    $bln = "April";
                    break;
                case '05':
                    $bln = "Mei";
                    break;
                case '06':
                    $bln = "Juni";
                    break;
                case '07':
                    $bln = "Juli";
                    break;
                case '08':
                    $bln = "Agustus";
                    break;
                case '09':
                    $bln = "September";
                    break;
                case '10':
                    $bln = "Oktober";
                    break;
                case '11':
                    $bln = "November";
                    break;
                case '12':
                    $bln = "Desember";
                    break;
                default:
                    $bln = "";
                    break;
            }
            echo $bln;
        }
        ?>


        <table id="tabel-data" class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Nama</th>
                    <th>Bulan</th>
                    <th>Jumlah Meter</th>
                    <th>Tarif Kwh</th>
                    <th>Jumlah Tagihan</th>
                    <th>Nama Petugas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($tagihan as $a) {
                    $cek = cek($a['id_tagihan']); ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['id_pelanggan']; ?></td>
                        <td><?= $a['nama_p']; ?></td>
                        <td><?= bulan($a['bulan']) ?> <?= $a['tahun']; ?></td>
                        <td><?= $a['jumlah_meter']; ?></td>
                        <td><?= 'Rp.' . $a['tarifperkwh']; ?></td>
                        <td><?= 'Rp.' . $a['jumlah_bayar']; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= $a['status'];  ?></td>
                        <td><?php
                            if ($cek > 0) { ?>
                                <a href="<?= base_url('admin/tagihan/hapus/') . $a['id_tagihan']; ?>" class="badge badge-danger tombol-hapus">Batal</a>
                            <?php } else { ?>
                                &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</div>