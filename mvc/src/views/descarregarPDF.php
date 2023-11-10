<?php
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Informacio de la reserva', 0, 1, 'C'); // Title with centered alignment

$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Line separator

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'ID: ' . $id);
$pdf->Ln(); // Line break
$pdf->Cell(40, 10, 'Nombre: ' . $nom);
$pdf->Ln();
$pdf->Cell(40, 10, 'Apellido: ' . $cognom);
$pdf->Ln();
$pdf->Cell(40, 10, 'Email: ' . $email);

$pdf->Output();
?>