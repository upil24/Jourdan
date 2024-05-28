<?php
// var_dump($hasil);
// die;
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

<!DOCTYPE html>
<html>

<head>
    <title>CETAK STRUK <?php echo $hasil[0]['id_pembayaran']; ?></title>

</head>

<body onload="window.print()" style="font-family:monospace;">
    <table center no-repeat; background-size: 50%;">
        <tr>
            <td colspan="6" align="center">
                <center>STRUK PEMBAYARAN TAGIHAN LISTRIK</center>
                &nbsp;&nbsp;
            </td>
        </tr>
        <br>
        <tr>
            <td align="left">IDPEL</td>
            <td align="left">:</td>
            <td align="left"><?php echo $hasil[0]['id_pelanggan']; ?></td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td align="left">BL/TH</td>
            <td align="left">:</td>
            <td align="left"><?php echo bulan($hasil[0]['bulan']) . ' ' . $hasil[0]['tahun'] ?></td>
        </tr>
        <tr>
            <td align="left">NAMA</td>
            <td align="left">:</td>
            <td align="left"><?php echo $hasil[0]['nama_p']; ?></td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td align="left">STAND METER</td>
            <td align="left">:</td>
            <td align="left"><?php echo $hasil[0]['jumlah_meter']; ?></td>
        </tr>
        <tr>
            <td align="left">TARIF/DAYA</td>
            <td align="left">:</td>
            <td align="left"><?php echo 'Rp.' . $hasil[0]['tarifperkwh']; ?></td>
        </tr>
        <tr>
            <td align="left">Total Bayar</td>
            <td align="left">:</td>
            <td align="left"><?php echo 'Rp.' . $hasil[0]['jumlah_bayar']; ?></td>
        </tr>
        <tr>
            <td align="left">JFA REF</td>
            <td align="left">:</td>
            <td align="left"><?php echo strtoupper(sha1($hasil[0]['id_pembayaran'] . $hasil[0]['id_pelanggan'])); ?></td>
        </tr>
        <tr>
            <td colspan="6" align="center">&nbsp;
                <center>PLN Menyatakan struk ini sebagai bukti pembayaran yang sah</center>
            </td>
        </tr>


        <tr>
            <td colspan="6" align="center">TERIMA KASIH
            <td>
        </tr>
        <tr>
            <td colspan="6" align="center">Rincian Tagihan dapat diakses di www.pln.co.id, Informasi Hubungi Call Center:123</td>
        </tr>
        <tr>
            <td colspan="6" align="center"><?php echo $user['nama'] . "/" . $hasil[0]['date_created']; ?></td>
        </tr>
    </table>
</body>

</html>