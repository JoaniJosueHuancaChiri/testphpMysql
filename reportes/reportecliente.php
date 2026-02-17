<?php
include "fpdf186/fpdf.php";
require "../modelo/conexion.php";
include "../modelo/clienteClase.php";
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
        $this->Cell(120,25,'Reporte Cliente',1,1,'C');
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

$pdf=new PDF();
$c=1;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->Cell(20);
//
$pdf->SetFillColor(192,192,192);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,'No',1,0,'C',1);
$pdf->Cell(100,10,'RAZON SOCIAL',1,0,'C',1);
$pdf->Cell(40,10,'CI / NIT',1,1,'C',1);

$pdf->SetFont('Arial','',10);

$cli=new Cliente("","","","");
$resultado=$cli->reporte();
while($row=$resultado->fetch_assoc()){
    $pdf->Cell(20);
    $pdf->Cell(20,6,utf8_decode($c),1,0,'C');
    $pdf->Cell(100,6,utf8_decode($row['razonSocial']),1,0,'C');
    $pdf->Cell(40,6,utf8_decode($row['nit_cli']),1,1,'C');

    $c++;
}
$pdf->Output();
?>