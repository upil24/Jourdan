<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">

        <?php function bulan($bulan)
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
        } ?>

        <table id="tabel-data" class="table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Pembayaran</th>
                    <th>Bulan</th>
                    <th>Total</th>
                    <th>Petugas</th>
                    <th>Tanggal Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($riwayat as $a) {
                ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['id_pembayaran']; ?></td>
                        <td><?= bulan($a['bulan_bayar']) ?> <?= $a['tahun_bayar']; ?></td>
                        <td><?= 'Rp.' . $a['total_bayar']; ?></td>
                        <td><?= $a['nama']; ?></td>
                        <td><?= date("d M Y H:i:s", strtotime($a['date_created'])) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>