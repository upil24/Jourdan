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
    <center>LAPORAN DATA PELANGGAN</center>
</h3> <br />
<table class="table-data" border=1>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Pelanggan</th>
            <th>Nama</th>
            <th>No Kwh</th>
            <th>Daya</th>
            <th>Alamat</th>
            <th>Tanggal Daftar</th>
        </tr>
    </thead>
    <tbody> <?php $no = 1;
            foreach ($pelanggan as $b) { ?> <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $b['id_pelanggan']; ?></td>
                <td><?= $b['nama_p']; ?></td>
                <td><?= $b['no_kwh']; ?></td>
                <td><?= $b['daya']; ?></td>
                <td><?= $b['alamat']; ?></td>
                <td><?= date("d M Y", strtotime($b['date_created'])); ?></td>
            </tr> <?php }
                    ?> </tbody>
</table>