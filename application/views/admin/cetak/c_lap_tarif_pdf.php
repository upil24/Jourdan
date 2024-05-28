<?php
// var_dump($data);
// die;
$pdf = new FPDF('P', 'mm', 'Letter');
$image1 = base_url() . "assets/img/logo.png";
$tglcetak = date('d-m-Y H:i:s');


$pdf->AddPage();
$gambar1 = $pdf->Image($image1, 15, 10, 35);
$pdf->SetTitle('Cetak Laporan Data Tarif');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Laporan Data Tarif', 0, 1, 'C');
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
$pdf->Cell(15, 6, 'No', 1, 0, 'C');
$pdf->Cell(60, 6, 'ID Tarif', 1, 0, 'C');
$pdf->Cell(70, 6, 'Daya', 1, 0, 'C');
$pdf->Cell(50, 6, 'Tarif /Kwh', 1, 1, 'C');


$pdf->SetFont('Arial', '', 10);
$no = 1;
foreach ($data as $row) {
    $pdf->Cell(2, 6, '', 0, 0, 'C');
    $pdf->Cell(15, 6, $no, 1, 0, 'C');
    $pdf->Cell(60, 6, $row['id_tarif'], 1, 0, 'C');
    $pdf->Cell(70, 6, $row['daya'], 1, 0, 'C');
    $pdf->Cell(50, 6, $row['tarifperkwh'], 1, 1, 'C');
    $no++;
}

$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(345, 6, 'Tanggal Cetak ' . $tglcetak, 0, 1, 'C');

$pdf->Output();
