<?php
require_once('Orden.php');
require_once('fpdf/fpdf.php');
$pdf = new FPDF();
$fila = new Orden();
$pdf->AddPage('PORTRAIT','LETTER');
// Agregar logotipo
//$pdf->Image('logo2.png', 20, 15, 30, 22, 'PNG');

// Encabezado proveedor
$pdf->SetX(11);
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(180, 7, 'ORDEN DE DESPACHO', 0, 0, 'C', 0);
$pdf->Ln();
$pdf->SetX(145);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 6, 'No.', 0, 0, 'R', 0);
$pdf->Cell(25, 6, $fila->darIdOrden(), 0, 0, 'R', 0);
$pdf->Ln();
$pdf->SetX(145);
$pdf->Cell(20, 6, 'FECHA:', 0, 0, 'R', 0);
$pdf->Cell(25, 6, date_format(date_create($fila->extraerDatos($fila->darIdOrden(), 'fecha_elaboracion')), 'd/M/Y'), 0, 0, 'R', 0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(11);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(24, 4, 'PROVEEDOR:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(11);
$pdf->Cell(24, 4, 'DIRECCIÓN:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(11);
$pdf->Cell(24, 4, 'TELÉFONO:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(11);
$pdf->Cell(24, 4, 'NIT:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(11);
$pdf->Cell(24, 4, 'CIUDAD:', 0, 0, 'L', 0);

// Agregar datos proveedor
$pdf->SetXY(35, 47);
$pdf->SetFont('Helvetica', '', 7);
$pdf->Cell(65, 4, $fila->extraerDatos($fila->darIdOrden(), 'nombre_empresa'), 0, 0, 'L', 0);
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
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(24, 4, 'VENDEDOR:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(105);
$pdf->Cell(24, 4, 'FACTURAR A:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(105);
$pdf->Cell(24, 4, 'NIT:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(105);
$pdf->Cell(24, 4, 'DIRECCIÓN:', 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(105);
$pdf->Cell(24, 4, 'TELÉFONO:', 0, 0, 'L', 0);


// Agregar datos cliente 
$pdf->SetXY(129, 47);
$pdf->SetFont('Helvetica', '', 7);
$pdf->Cell(62, 4, $fila->extraerDatos($fila->darIdOrden(), 'nombre_vendedor'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(129);
$pdf->Cell(62, 4, $fila->extraerDatos($fila->darIdOrden(), 'nombre_cliente'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(129);
$pdf->Cell(62, 4, $fila->extraerDatos($fila->darIdOrden(), 'nit'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(129);
$pdf->Cell(62, 4, $fila->extraerDatos($fila->darIdOrden(), 'direccion_cliente'), 0, 0, 'L', 0);
$pdf->Ln();
$pdf->SetX(129);
$pdf->Cell(62, 4, $fila->extraerDatos($fila->darIdOrden(), 'telefono_cliente'), 0, 0, 'L', 0);


    // Agregar encabezado producto
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetXY(11, 70);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->Cell(25, 4, 'PRESENTACIÓN', 1, 0, 'C', 1);
    $pdf->Cell(20, 4, 'CANTIDAD', 1, 0, 'C', 1);
    $pdf->Cell(135, 4, 'REFERENCIA', 1, 0, 'C', 1);
    
    // Agregar referencia
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->Cell(25, 4, $fila->extraerDatos($fila->darIdOrden(), 'presentacion'), 1, 0, 'C', 1);
    $pdf->Cell(20, 4, $fila->extraerDatos($fila->darIdOrden(), 'cantidad'), 1, 0, 'C', 1);
    $pdf->Cell(135, 4, $fila->extraerDatos($fila->darIdOrden(), 'referencia'), 1, 0, 'L', 1);
    // Referencia en blanco
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->Cell(25, 4, '', 1, 0, 'C', 1);
    $pdf->Cell(20, 4, '', 1, 0, 'C', 1);
    $pdf->Cell(135, 4, '', 1, 0, 'L', 1);
    
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->Cell(50, 4, 'HORA DE DESPACHO:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->Cell(40, 4, date_format(date_create($fila->extraerDatos($fila->darIdOrden(), 'fecha_elaboracion')), 'g:i A'), 1, 0, 'C', 1);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->Cell(30, 4, 'CONDUCTOR:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->Cell(60, 4, $fila->extraerDatos($fila->darIdOrden(), 'nombre_conductor'), 1, 0, 'C', 1);
    
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->Cell(50, 4, 'PLACA VEHÍCULO:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->Cell(40, 4, $fila->extraerDatos($fila->darIdOrden(), 'placa'), 1, 0, 'C', 1);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->Cell(30, 4, 'N° DOCUMENTO:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->Cell(60, 4, $fila->extraerDatos($fila->darIdOrden(), 'documento_conductor'), 1, 0, 'C', 1);
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->Cell(50, 4, '', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->Cell(40, 4, '', 1, 0, 'C', 1);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->Cell(30, 4, 'TELÉFONO:', 1, 0, 'L', 1);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->Cell(60, 4, $fila->extraerDatos($fila->darIdOrden(), 'telefono_conductor'), 1, 0, 'C', 1);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->Cell(80, 2, $fila->extraerDatosElaboradoPor($fila->darIdOrden(), 'nombre_vendedor'), 0, 0, 'C', 1);
    $pdf->Ln();
    $pdf->Cell(80, 4, '___________________________________________', 0, 0, 'C', 1);
    $pdf->Cell(20, 4, '', 0, 0, 'C', 1);
    $pdf->Cell(80, 4, '___________________________________________', 0, 0, 'C', 1);
    $pdf->Ln();
    $pdf->SetX(11);
    $pdf->SetFont('Helvetica', 'B', 8);
    $pdf->Cell(80, 4, 'ELABORADO POR', 0, 0, 'C', 1);
    $pdf->Cell(20, 4, '', 0, 0, 'C', 1);
    $pdf->Cell(80, 4, 'RECIBIDO A CONFORMIDAD', 0, 0, 'C', 1);
    $pdf->Close();
    $pdf->Output('', "algo.pdf", 'UTF8');
    
?>
