<?php
require './../vendor/autoload.php';
require "conexion.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$inputFileType = 'Xlsx';
$inputFileName = __DIR__.'/../leer/archivo.xlsx';
/**  Create a new Reader of the type defined in $inputFileType  **/
$lector = IOFactory::createReader($inputFileType);
/**  Advise the Reader that we only want to load cell's that contain actual content  **/
$lector->setReadEmptyCells(false);
/**  Load $inputFileName to a Spreadsheet Object  **/
$excel = $lector->load($inputFileName);
$hojaTrabajo = $excel->getActiveSheet();
$filas = $hojaTrabajo->toArray();

$datos = "";

//var_dump($filas);

$valores = [];
for ($i=1; $i < sizeof($filas); $i++) {
    $valor = $filas[$i][0];
    /* if ($valor === "numero") {
        continue;
    }  */
    array_push($valores, $valor);
    
}
$datosSQL = implode("'), ('", $valores);
$sql = "INSERT INTO datos (valor) values ('$datosSQL')";

echo $sql;
//$conexion->query($sql);
echo "Datos guardados, revisa tu tabla";