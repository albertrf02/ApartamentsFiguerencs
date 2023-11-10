<?php
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Informacio de la reserva', 0, 1, 'C'); // Title with centered alignment

$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Line separator

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Nom: ' . $nom);
$pdf->Ln();
$pdf->Cell(40, 10, 'Cognom: ' . $cognom);
$pdf->Ln();
$pdf->Cell(40, 10, 'Email: ' . $email);

$pdf->Output();
?>