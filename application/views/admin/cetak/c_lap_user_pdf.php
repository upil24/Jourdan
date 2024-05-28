<?php
$pdf = new FPDF('P', 'mm', 'A4');
$image1 = base_url() . "assets/img/logo.png";
$tglcetak = date('d-m-Y H:i:s');


$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$pdf->SetTitle('Cetak Laporan Data User');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Laporan Data User', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 7, 'PT PLN (Persero)', 0, 1, 'C');
$pdf->Cell(0, 7, 'Jl.Caman raya jatibening blok n/11', 0, 1, 'C');
$pdf->Cell(0, 7, 'Kota Bekasi', 0, 1, 'C');
$pdf->Cell(0, 7, '', 0, 1);
$pdf->Ln(-2);
$pdf->SetLineWidth(0);
$pdf->Line(12, 40, 200, 40);
$pdf->SetLineWidth(1);
$pdf->Line(12, 41, 200, 41);
$pdf->SetLineWidth(0);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(1, 6, '', 0, 0, 'C');
$pdf->Cell(20, 6, 'No', 1, 0, 'C');
$pdf->Cell(60, 6, 'Nama User', 1, 0, 'C');
$pdf->Cell(60, 6, 'Email', 1, 0, 'C');
$pdf->Cell(50, 6, 'Tanggal Join', 1, 1, 'C');



$pdf->SetFont('Arial', '', 10);
$no = 1;
foreach ($data as $row) {
    $pdf->Cell(1, 6, '', 0, 0, 'C');
    $pdf->Cell(20, 6, $no, 1, 0, 'C');
    $pdf->Cell(60, 6, $row['nama'], 1, 0, 'C');
    $pdf->Cell(60, 6, $row['email'], 1, 0, 'C');
    $pdf->Cell(50, 6, date("d M Y", $row['date_created']), 1, 1, 'C');
    $no++;
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(349, 6, 'Tanggal Cetak ' . $tglcetak, 0, 1, 'C');

$pdf->Output();
