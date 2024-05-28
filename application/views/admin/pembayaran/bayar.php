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

<div class="m-5">
    <div class="card ">
        <div class="card-header bg-primary text-white">
            Data Pelanggan
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <tr>
                    <th>ID Pelanggan</th>
                    <td>:</td>
                    <td><?= $detail_bayar['id_pelanggan']; ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td><?= $detail_bayar['nama_p']; ?></td>
                </tr>
                <tr>
                    <th>No Kwh</th>
                    <td>:</td>
                    <td><?= $detail_bayar['no_kwh']; ?></td>
                </tr>
                <tr>
                    <th>Daya</th>
                    <td>:</td>
                    <td><?= $detail_bayar['daya']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><?= $detail_bayar['alamat']; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <table id="" class="table mt-3">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Meter Awal</th>
                <th>Meter Akhir</th>
                <th>Jumlah Meter</th>
                <th>Tarif Perkwh</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><?= bulan($detail_bayar['bulan']) ?> <?= $detail_bayar['tahun']; ?></td>
                <td><?= $detail_bayar['meter_awal']; ?></td>
                <td><?= $detail_bayar['meter_akhir']; ?></td>
                <td><?= $detail_bayar['jumlah_meter']; ?></td>
                <td><?= $detail_bayar['tarifperkwh']; ?></td>
                <td><?= $detail_bayar['jumlah_bayar']; ?></td>
            </tr>
        </tbody>
    </table>


    <form method="post" class="mb-5" action="<?= base_url(); ?>admin/pembayaran/simpanBayar">
        <input type="hidden" name="id_pembayaran" value="<?= $id_pembayaran; ?>">
        <input type="hidden" name="id_tagihan" value="<?= $detail_bayar['id_tagihan']; ?>">
        <input type="hidden" name="id_pelanggan" value="<?= $detail_bayar['id_pelanggan']; ?>">
        <input type="hidden" name="bulan_bayar" value="<?= $detail_bayar['bulan']; ?>">
        <input type="hidden" name="tahun_bayar" value="<?= $detail_bayar['tahun']; ?>">
        <input type="hidden" name="total_bayar" value="<?= $detail_bayar['jumlah_bayar']; ?>">
        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
        <div class="float-right">
            <div class=" ">
                <div class="">
                    <div class="">
                        <button type="submit" class="btn btn-danger btn-md ">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>