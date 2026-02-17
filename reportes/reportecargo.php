<?php
include "fpdf186/fpdf.php";
require "../modelo/conexion.php";
include "../modelo/cargoClase.php";

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
        $this->Cell(120,25,'Reporte de Cargos',1,1,'C');
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
$pdf = new PDF(); // Por defecto, es vertical
$c = 1;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->Cell(20);

$pdf->SetFillColor(192,192,192);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,'No',1,0,'C',1);
$pdf->Cell(150,10,'Cargo',1,1,'C',1);

$pdf->SetFont('Arial','',10);

$car = new Cargo("", "");
$resultado = $car->reporte();

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(20);
    $pdf->Cell(20,6,utf8_decode($c),1,0,'C');
    $pdf->Cell(150,6,utf8_decode($row['cargo']),1,1,'C');

    $c++;
}
$pdf->Output();
?>
