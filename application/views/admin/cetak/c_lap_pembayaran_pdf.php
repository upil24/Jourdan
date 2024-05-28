<?php

// var_dump($data);
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
$pdf = new FPDF('L', 'mm', 'Letter');
$image1 = base_url() . "assets/img/logo.png";
$tglcetak = date('d-m-Y H:i:s');


$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$pdf->SetTitle('Cetak Laporan Pembayaran');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Laporan Pembayaran', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'PT PLN (Persero)', 0, 1, 'C');
$pdf->Cell(0, 7, 'Jl.Caman raya jatibening blok n/11', 0, 1, 'C');
$pdf->Cell(0, 7, 'Kota Bekasi', 0, 1, 'C');
$pdf->Cell(0, 7, '', 0, 1);
$pdf->Ln(-2);
$pdf->SetLineWidth(0);
$pdf->Line(12, 40, 270, 40);
$pdf->SetLineWidth(1);
$pdf->Line(12, 41, 270, 41);
$pdf->SetLineWidth(0);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(2, 6, '', 0, 0, 'C');
$pdf->Cell(12, 6, 'No', 1, 0, 'C');
$pdf->Cell(35, 6, 'ID Pelanggan', 1, 0, 'C');
$pdf->Cell(35, 6, 'ID Pembayaran', 1, 0, 'C');
$pdf->Cell(50, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(30, 6, 'Bulan', 1, 0, 'C');
$pdf->Cell(35, 6, 'Total', 1, 0, 'C');
$pdf->Cell(30, 6, 'Petugas', 1, 0, 'C');
$pdf->Cell(30, 6, 'Tanggal', 1, 1, 'C');



$pdf->SetFont('Arial', '', 10);
$no = 1;
foreach ($data as $row) {
    $pdf->Cell(2, 6, '', 0, 0, 'C');
    $pdf->Cell(12, 6, $no, 1, 0, 'C');
    $pdf->Cell(35, 6, $row['id_pelanggan'], 1, 0, 'C');
    $pdf->Cell(35, 6, $row['id_pembayaran'], 1, 0, 'C');
    $pdf->Cell(50, 6, $row['nama_p'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['bulan_bayar'] . ' ' . $row['tahun_bayar'], 1, 0, 'C');
    $pdf->Cell(35, 6, 'Rp.' . $row['total_bayar'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nama'], 1, 0, 'C');
    $pdf->Cell(30, 6, date("d-m-Y", strtotime($row['date_created'])), 1, 1, 'C');
    $no++;
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(474, 6, 'Tanggal Cetak ' . $tglcetak, 0, 1, 'C');

$pdf->Output();
