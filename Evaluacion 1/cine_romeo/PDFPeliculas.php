<?php

require_once './crearPDF.php';

$pdf = new PDF();
$cabecera =array('Codigo','Titulo','Genero','Categoria','Precio','Boletos');
$datos = $pdf->LoadData('listado-peliculas.csv');
$pdf->SetFont('Arial', '', 10);
$pdf->AddPage("L");
$pdf->BasicTable($cabecera, $datos);
$pdf->Output();

