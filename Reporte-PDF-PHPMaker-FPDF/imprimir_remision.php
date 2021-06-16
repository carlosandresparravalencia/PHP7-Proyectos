<?php
declare (strict_types = 1);
require_once('Remision.php');
require_once('fpdf/fpdf.php');
$pdf = new FPDF();
$fila = new Remision();
$pdf->AddPage('PORTRAIT','LETTER');
    
// Agregar logotipo
$pdf->Image('logo.png', 20, 15, 25, 27, 'PNG');

// Encabezado proveedor
$pdf->SetX(11);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(180, 7, 'REMISIÓN CONCRETO', 0, 0, 'C', 0);
$pdf->Ln();
$pdf->SetX(160);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 6, 'No.', 0, 0, 'R', 0);
$pdf->Cell(15, 6, $fila->darIdRemision(), 0, 0, 'R', 0);
$pdf->Ln();
$pdf->SetX(160);
$pdf->Cell(15, 6, 'FECHA:', 0, 0, 'R', 0);
$pdf->Cell(15, 6, $fila->extraerDatos($fila->darIdRemision(), 'Fecha'), 0, 0, 'R', 0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(11);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 4, 'PROVEEDOR:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(11);
$pdf->Cell(20, 4, 'DIRECCIÓN:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(11);
$pdf->Cell(20, 4, 'TELÉFONO:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(11);
$pdf->Cell(20, 4, 'NIT:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(11);
$pdf->Cell(20, 4, 'CIUDAD:', 0, 0, 'L', 0);

// Agregar datos proveedor
$pdf->SetXY(35, 47);
$pdf->SetFont('Helvetica', '', 7);
$pdf->Cell(65, 4, 'Empresa S.A.S', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(35);
$pdf->Cell(65, 4, 'Dirección', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(35);
$pdf->Cell(65, 4, 'Teléfono', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(35);
$pdf->Cell(65, 4, 'NIT', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(35);
$pdf->Cell(65, 4, 'Ciudad', 0, 0, 'L', 0);

// Encabezado cliente
$pdf->SetXY(105, 47);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 4, 'FACTURAR A:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(105);
$pdf->Cell(20, 4, 'NIT:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(105);
$pdf->Cell(20, 4, 'DIRECCIÓN:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(105);
$pdf->Cell(20, 4, 'TELÉFONO:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(105);
//$pdf->Cell(20, 4, 'CIUDAD:', 0, 0, 'L', 0);


// Agregar datos cliente 
$pdf->SetXY(129, 47);
$pdf->SetFont('Helvetica', '', 7);
$pdf->Cell(62, 4, $fila->extraerDatos($fila->darIdRemision(), 'Nombre_Cliente'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(129);
$pdf->Cell(62, 4, $fila->extraerDatos($fila->darIdRemision(), 'Documento_Cliente'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(129);
$pdf->Cell(62, 4, $fila->extraerDatos($fila->darIdRemision(), 'Obra'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(129);
$pdf->Cell(62, 4, $fila->extraerDatos($fila->darIdRemision(), 'Teléfono_Cliente'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(129);
//$pdf->Cell(62, 4, 'DOSQUEBRADAS', 0, 0, 'L', 0);


    // Agregar encabezado producto
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetXY(11, 70);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(15, 4, 'ÍTEM', 1, 0, 'C', 1);
    $pdf->Cell(15, 4, 'CANTIDAD', 1, 0, 'C', 1);
    $pdf->Cell(15, 4, 'UNIDAD', 1, 0, 'C', 1);
    $pdf->Cell(135, 4, 'REFERENCIA', 1, 0, 'C', 1);
    
    // Agregar referencia
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell(15, 4, '1', 1, 0, 'C', 1);
    $pdf->Cell(15, 4, $fila->extraerDatos($fila->darIdRemision(), 'Cantidad'), 1, 0, 'C', 1);
    $pdf->Cell(15, 4, 'M3', 1, 0, 'C', 1);
    $pdf->Cell(135, 4, 'CONCRETO DE ' . $fila->extraerDatos($fila->darIdRemision(), 'Resistencia'), 1, 0, 'L', 1);
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->Cell(15, 4, '', 1, 0, 'C', 1);
    $pdf->Cell(15, 4, '', 1, 0, 'C', 1);
    $pdf->Cell(15, 4, '', 1, 0, 'C', 1);
    $pdf->Cell(135, 4, '', 1, 0, 'L', 1);
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(50, 4, 'HORA DE SALIDA DE PLANTA:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell(40, 4, $fila->extraerDatos($fila->darIdRemision(), 'Hr_salida'), 1, 0, 'C', 1);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(30, 4, 'ASENTAMIENTO:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell(60, 4, $fila->extraerDatos($fila->darIdRemision(), 'Asentamiento'), 1, 0, 'C', 1);
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(50, 4, 'HORA DE LLEGADA A OBRA:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell(40, 4, '', 1, 0, 'C', 1);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(30, 4, 'CONDUCTOR:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell(60, 4, $fila->extraerDatos($fila->darIdRemision(), 'nombre_conductor'), 1, 0, 'C', 1);
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(50, 4, 'HORA TOMA DE MUESTRA:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell(40, 4, '', 1, 0, 'C', 1);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(30, 4, 'VEHÍCULO:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell(60, 4, $fila->extraerDatos($fila->darIdRemision(), 'Placa'), 1, 0, 'C', 1);
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(50, 4, 'HORA SALIDA DE OBRA:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell(40, 4, '', 1, 0, 'C', 1);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(30, 4, 'DIRECCIÓN OBRA:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 7);
    $pdf->Cell(60, 4, $fila->extraerDatos($fila->darIdRemision(), 'Dirección_Cliente'), 1, 0, 'C', 1);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->Cell(80, 4, '___________________________________________', 0, 0, 'C', 1);
    $pdf->Cell(20, 4, '', 0, 0, 'C', 1);
    $pdf->Cell(80, 4, '___________________________________________', 0, 0, 'C', 1);
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell(80, 4, 'CONDUCTOR', 0, 0, 'C', 1);
    $pdf->Cell(20, 4, '', 0, 0, 'C', 1);
    $pdf->Cell(80, 4, 'RECIBIDO A CONFORMIDAD', 0, 0, 'C', 1);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->Cell(180, 4, 'NOTA: SI EL CONTRATANTE AGREGA AL PREMEZCLADO UN COMPONENTE ADICIONAL TAL COMO ADITIVO, AGUA O', 0, 0, 'C', 1);
    $pdf->Ln();
    $pdf->SetX(20);
    $pdf->Cell(170, 4, 'CUALQUIER SUSTANCIA AJENA AL DISEÑO INICIAL DE MEZCLA, NO GARANTIZAMOS LA RESISTENCIA.', 0, 0, 'C', 1);
    
    $pdf->Close();
    $pdf->Output('', "algo.pdf", 'UTF8');
    
?>
