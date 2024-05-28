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
        <center>Laporan Data User</center>
    </h3> <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Tanggal Join</th>
            </tr>
        </thead>
        <tbody> <?php $no = 1;
                foreach ($data as $b) {
                ?> <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $b['nama']; ?></td>
                    <td><?= $b['email']; ?></td>
                    <td><?= date("d M Y", $b['date_created']); ?></td>
                </tr> <?php } ?> </tbody>
    </table>
    <?php
    $tglcetak = date('d-m-Y H:i:s');
    echo "<div align='right'> Tanggal cetak : $tglcetak </div>";
    ?>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>