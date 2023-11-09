<?php
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Hola, Mundo!' . $id . $nom . $cognom . $email . $preu);
$pdf->Output();
?>