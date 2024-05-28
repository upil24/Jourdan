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

<section class="konten mt-2">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        DATA PELANGGAN
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <tr>
                                <th>ID Pelanggan</th>
                                <td>:</td>
                                <td><?= $pelanggan['id_pelanggan']; ?></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td><?= $pelanggan['nama_p']; ?></td>
                            </tr>
                            <tr>
                                <th>No Kwh</th>
                                <td>:</td>
                                <td><?= $pelanggan['no_kwh']; ?></td>
                            </tr>
                            <tr>
                                <th>Daya</th>
                                <td>:</td>
                                <td><?= $pelanggan['daya']; ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td><?= $pelanggan['alamat']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Daftar</th>
                                <td>:</td>
                                <td><?= date("d M Y", strtotime($pelanggan['date_created'])); ?> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        Riwayat Pembayaran / Tagihan
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Tagihan</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($tagihan as $r) { ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $r['id_tagihan']; ?></td>
                                        <td><?= bulan($r['bulan']) ?></td>
                                        <td><?= $r['tahun']; ?></td>
                                        <td><?= $r['status']; ?></td>
                                        <?php if ($r['status'] == 'Belum Bayar') { ?>
                                            <td><a href="<?= base_url('admin/pembayaran/bayar/') . $r['id_tagihan']; ?>" class="badge badge-danger" target="_blank">Bayar</a></td>
                                        <?php } else { ?>
                                            <td><a href="<?= base_url('admin/pembayaran/cetak/') . $r['id_tagihan']; ?>" class="badge badge-primary" target="_blank">Cetak</a></td>
                                        <?php } ?>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div><a href="<?= base_url('admin/pembayaran/') ?>" class="btn btn-outline-primary mt-2 float-right" role="button">Kembali</a>
            </div>

        </div>
</section>