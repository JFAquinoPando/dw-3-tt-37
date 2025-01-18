<?php

require './../vendor/autoload.php';



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$vieneDelFormulario = $_POST["guardar_excel"];

$matriz = explode("+", $vieneDelFormulario);

for ($i=0; $i < sizeof($matriz); $i++) {
    $posicion = $i + 1; 
    $activeWorksheet->setCellValue("A{$posicion}", $matriz[$i]);
}

/* 
$activeWorksheet->setCellValue('A1', $vieneDelFormulario);
*/
$fecha = date("YmdHis");

$writer = new Xlsx($spreadsheet);
$archivo = "archivo_{$fecha}.xlsx";
$writer->save($archivo);

echo "
<a href='./{$archivo}'>Descargar</a>

";

//header("Content-type: MIME");
//header("Content-disposition: attachment;");