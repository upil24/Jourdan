<?php header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0"); ?> <style type="text/css">
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

    .table-data th {
        background-color: grey;
    }

    h3 {
        font-family: Verdana;
    }
</style>
<h3>
    <center>LAPORAN DATA TAGIHAN</center>
</h3> <br />
<table class="table-data" border=1>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Tagihan</th>
            <th>ID Pelanggan</th>
            <th>Nama</th>
            <th>Bulan</th>
            <th>Meter</th>
            <th>Tarif perkwh</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody> <?php $no = 1;
            foreach ($tagihan as $b) { ?> <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $b['id_tagihan'] ?></td>
                <td><?= $b['id_pelanggan'] ?></td>
                <td><?= $b['nama_p'] ?></td>
                <td><?= bulan($b['bulan']) . ' ' . $b['tahun'] ?></td>
                <td><?= $b['jumlah_meter'] ?></td>
                <td><?= $b['tarifperkwh'] ?></td>
                <td><?= $b['jumlah_bayar'] ?></td>
                <td><?= $b['status'] ?></td>
            </tr> <?php }
                    ?> </tbody>
</table>