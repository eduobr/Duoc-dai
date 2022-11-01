<?php

require '/PDF/fpdf.php';

class PDF extends FPDF {

    //metodo de carga del archivo csv
    function LoadData($file) {
        // Leer las líneas del fichero
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }

    //metodo generador de la tabla
    function BasicTable($header, $data) {
        // Cabecera
        foreach ($header as $col)
        //$this->Cell(40, 7, $col, 1);
            $this->Ln();
        // Datos
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(35, 6, $col, 1);
            $this->Ln();
        }
    }
}
/*$pdf = new PDF();
$cabecera =array('Codigo','Rut','Fono','Sala','Peliculas','Adultos','Niños','Total');
$datos = $pdf->LoadData('listado.csv');
$pdf->SetFont('Arial', '', 10);
$pdf->AddPage("L");
$pdf->BasicTable($cabecera, $datos);
$pdf->Output();*/
