<?php

require '/PDF/fpdf.php';
include_once '/clases/DaoEmpleado.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(140, 8, 'Liquidacion de Sueldo', 1, 1, 'C');
session_start();
$usuario = $_SESSION["usuario"]["user"];
$daoEmp = new DaoEmpleado();
$resultado = $daoEmp->liquidacion($usuario);
while ($row = mysqli_fetch_array($resultado)) {
    $pdf->SetFont('Arial', '', '10');
    $pdf->Cell(70, 8, 'Rut', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[0], 1, 1, 'L');
    $pdf->Cell(70, 8, 'Nombre', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[1], 1, 1, 'L');
    $pdf->Cell(70, 8, 'Cargo', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[2], 1, 1, 'L');
    $pdf->Cell(70, 8, 'Sucursal', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[3], 1, 1, 'L');
    $pdf->SetFont('Arial', 'B', '12');
    $pdf->Cell(140, 8, 'Haberes', 1, 1, 'L');
    $pdf->SetFont('Arial', '', '10');
    $pdf->Cell(70, 8, 'Gratificacion', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[5] * 0.25, 1, 1, 'L');
    $pdf->Cell(70, 8, 'Bono Locomocion', 1, 0, 'L');
    $pdf->Cell(70, 8, '30000', 1, 1, 'L');
    $pdf->SetFont('Arial', 'B', '12');
    $pdf->Cell(140, 8, 'Descuentos', 1, 1, 'L');
    $pdf->SetFont('Arial', '', '10');
    $pdf->Cell(70, 8, 'Anticipo', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[4], 1, 1, 'L');
    $pdf->Cell(70, 8, 'Salud', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[5] * 0.07, 1, 1, 'L');
    $pdf->Cell(70, 8, 'AFP', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[5] * 0.03, 1, 1, 'L');
    $pdf->Cell(70, 8, 'Sueldo', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[5], 1, 1, 'L');
    $pdf->SetFont('Arial', 'B', '12');
    $pdf->Cell(70, 8, 'Total Haberes', 1, 0, 'L');
    $pdf->Cell(70, 8, ($row[5] * 0.25)+30000, 1, 1, 'L');
    $pdf->Cell(70, 8, 'Total Descuentos', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[4]+($row[5] * 0.07)+($row[5] * 0.03), 1, 1, 'L');
    $pdf->Cell(70, 8, 'Sueldo Liquido', 1, 0, 'L');
    $pdf->Cell(70, 8, $row[5]+($row[5] * 0.25)+30000-$row[4]-($row[5] * 0.07)-($row[5] * 0.03), 1, 1, 'L');
}
    $pdf->Output();

    