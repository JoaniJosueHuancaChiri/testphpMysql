<?php
include "fpdf186/fpdf.php";
require "../modelo/conexion.php";
include "../modelo/empleadoClase.php";

class PDF extends FPDF{
    //cabecera
    function Header(){
        //logo
        $this->Image('imagenes/incos.png',30,8,25);
        //Arial bold 15
        $this->SetFont('Arial','B',15);
        //mover a la derecha
        $this->Cell(60);
        //titulo
        $this->Cell(120,25,'Reporte Empleado',1,1,'C');
        //salto de linea
        $this->Ln(15);
    }
    //pie de pagina
    function Footer(){
        //posicion
        $this->SetY(-15);
        //letra
        $this->SetFont('Arial','I',8);
        //numero de pagina
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

//creacion del objeto de la clase heredada
$pdf = new PDF('L', 'mm', 'A4');
$c = 1;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->Cell(20);

$pdf->SetFillColor(192,192,192);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,'No',1,0,'C',1);
$pdf->Cell(30,10,'CI',1,0,'C',1);
$pdf->Cell(30,10,'Paterno',1,0,'C',1);
$pdf->Cell(30,10,'Materno',1,0,'C',1);
$pdf->Cell(25,10,'Nombre',1,0,'C',1);
$pdf->Cell(35,10,'Direccion',1,0,'C',1);
$pdf->Cell(25,10,'Telefono',1,0,'C',1);
$pdf->Cell(30,10,'F. Nac',1,0,'C',1);
$pdf->Cell(25,10,'Genero',1,1,'C',1);

$pdf->SetFont('Arial','',10);

$emp = new Empleado("", "", "", "", "", "", "", "", "", "", "");
$resultado = $emp->reporte();

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(20);
    $pdf->Cell(20,6,utf8_decode($c),1,0,'C');
    $pdf->Cell(30,6,utf8_decode($row['ci']),1,0,'C');
    $pdf->Cell(30,6,utf8_decode($row['paterno']),1,0,'C');
    $pdf->Cell(30,6,utf8_decode($row['materno']),1,0,'C');
    $pdf->Cell(25,6,utf8_decode($row['nombre']),1,0,'C');
    $pdf->Cell(35,6,utf8_decode($row['direccion']),1,0,'C');
    $pdf->Cell(25,6,utf8_decode($row['telefono']),1,0,'C');
    $pdf->Cell(30,6,utf8_decode($row['fechanacimiento']),1,0,'C');
    $pdf->Cell(25,6,utf8_decode($row['genero']),1,1,'C');

    $c++;
}
$pdf->Output();
?>
