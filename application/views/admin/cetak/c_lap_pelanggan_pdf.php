<?php
$pdf = new FPDF('P', 'mm', 'Letter');
$tglcetak = date('d-m-Y H:i:s');
$image1 = base_url() . "assets/img/logo.png";


$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$pdf->SetTitle('Cetak Laporan Pelanggan');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Laporan Data Pelanggan', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'PT PLN (Persero)', 0, 1, 'C');
$pdf->Cell(0, 7, 'Jl.Caman raya jatibening blok n/11', 0, 1, 'C');
$pdf->Cell(0, 7, 'Kota Bekasi', 0, 1, 'C');
$pdf->Cell(0, 7, '', 0, 1);
$pdf->Ln(-2);
$pdf->SetLineWidth(0);
$pdf->Line(12, 40, 207, 40);
$pdf->SetLineWidth(1);
$pdf->Line(12, 41, 207, 41);
$pdf->SetLineWidth(0);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(2, 6, '', 0, 0, 'C');
$pdf->Cell(8, 6, 'No', 1, 0, 'C');
$pdf->Cell(30, 6, 'ID Pelanggan', 1, 0, 'C');
$pdf->Cell(55, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(30, 6, 'No Kwh', 1, 0, 'C');
$pdf->Cell(30, 6, 'Daya', 1, 0, 'C');
$pdf->Cell(40, 6, 'Tanggal Daftar', 1, 1, 'C');



$pdf->SetFont('Arial', '', 10);
$no = 1;
foreach ($pelanggan as $row) {
    $pdf->Cell(2, 6, '', 0, 0, 'C');
    $pdf->Cell(8, 6, $no, 1, 0, 'C');
    $pdf->Cell(30, 6, $row['id_pelanggan'], 1, 0, 'L');
    $pdf->Cell(55, 6, $row['nama_p'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['no_kwh'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['daya'], 1, 0, 'C');
    $pdf->Cell(40, 6, date("d M Y ", strtotime($row['date_created'])), 1, 1, 'C');
    $no++;
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(350, 5, 'Tanggal Cetak ' . $tglcetak, 0, 1, 'C');


$pdf->Output();
