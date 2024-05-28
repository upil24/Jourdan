<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
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
        <center>Laporan Data Pelanggan</center>
    </h3> <br />
    <table class="table-data">
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
                foreach ($pelanggan as $b) {
                ?> <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $b['id_pelanggan']; ?></td>
                    <td><?= $b['nama_p']; ?></td>
                    <td><?= $b['no_kwh']; ?></td>
                    <td><?= $b['daya']; ?></td>
                    <td><?= $b['alamat']; ?></td>
                    <td><?= date("d M Y", strtotime($b['date_created'])); ?></td>
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