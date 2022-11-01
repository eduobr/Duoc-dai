<?php

require_once './crearPDF.php';

$pdf = new PDF();
$cabecera =array('Codigo','Rut','Fono','Sala','Peliculas','Adultos','Niños','Total');
$datos = $pdf->LoadData('listado.csv');
$pdf->SetFont('Arial', '', 10);
$pdf->AddPage("L");
$pdf->BasicTable($cabecera, $datos);
$pdf->Output();
