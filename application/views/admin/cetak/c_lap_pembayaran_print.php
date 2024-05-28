<!DOCTYPE html>
<html>


<head>
    <title></title>
</head>

<body>
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

    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>Laporan Data Pembayaran</center>
    </h3> <br>
    <p><?php
        echo date("d M Y", strtotime($tgl_awal)) . ' sampai ' . date("d M Y", strtotime($tgl_akhir));
        ?></p>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pelanggan</th>
                <th>ID Pembayaran</th>
                <th>Nama</th>
                <th>Bulan</th>
                <th>Total</th>
                <th>Petugas</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody> <?php $no = 1;
                foreach ($data as $b) {
                ?> <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $b->id_pelanggan; ?></td>
                    <td><?= $b->id_pembayaran; ?></td>
                    <td><?= $b->nama_p; ?></td>
                    <td><?= bulan($b->bulan_bayar) . ' ' . $b->tahun_bayar; ?></td>
                    <td><?= $b->total_bayar; ?></td>
                    <td><?= $b->nama; ?></td>
                    <td><?= date("d M Y", strtotime($b->date_created)); ?></td>
                </tr> <?php } ?> </tbody>
    </table>
    <?php
    $tglcetak = date('Y-m-d H:i:s');
    echo "<div align='right'> Tanggal cetak : $tglcetak </div>";
    ?>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>