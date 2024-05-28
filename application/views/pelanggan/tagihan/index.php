<div class="row">
    <div class="table-responsive table-bordered col-sm-11 ml-auto mr-auto mt-2">


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
                    <th>Bulan</th>
                    <th>Jumlah Meter</th>
                    <th>Tarif Kwh</th>
                    <th>Jumlah Tagihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($tagihan as $a) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $a['id_pelanggan']; ?></td>
                        <td><?= bulan($a['bulan']) ?> <?= $a['tahun']; ?></td>
                        <td><?= $a['jumlah_meter']; ?></td>
                        <td><?= 'Rp.' . $a['tarifperkwh']; ?></td>
                        <td><?= 'Rp.' . $a['jumlah_bayar']; ?></td>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


</div>