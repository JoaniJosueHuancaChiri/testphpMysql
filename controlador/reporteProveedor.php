<?php
// Incluir la biblioteca FPDF
require '../vendor/dompdf/vendor/autoload.php';

// Incluir archivos necesarios para la conexión y la clase de Proveedor
require "../modelo/conexion.php";
include "../modelo/proveedorClase.php";

// Clase para PDF con encabezado y pie de página personalizados
class PDF extends FPDF {
    // Cabecera
    function Header() {
        // Logo
        $this->Image('imagenes/incos.png', 30, 8, 25);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Mover a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(200, 25, 'Reporte Proveedores', 1, 1, 'C');
        // Salto de línea
        $this->Ln(15);
    }

    // Pie de página
    function Footer() {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Arial itálica 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Crear objeto PDF en modo horizontal
$pdf = new PDF();
$pdf->AliasNbPages(); // Configurar número total de páginas
$pdf->AddPage('L'); // Agregar una página en modo horizontal (L de Landscape)
$pdf->SetFont('Times', '', 10); // Configurar fuente
$pdf->SetFillColor(192, 192, 192); // Color de fondo

// Encabezado de la tabla con anchuras ajustadas
$pdf->SetFont('Arial', 'B', 12); // Fuente para el encabezado
$pdf->Cell(10, 10, 'No', 1, 0, 'C', 1); // Campo No
$pdf->Cell(40, 10, 'Empresa', 1, 0, 'C', 1); // Campo Empresa
$pdf->Cell(35, 10, 'Contacto', 1, 0, 'C', 1); // Campo Contacto
$pdf->Cell(35, 10, 'Email', 1, 0, 'C', 1); // Campo Email
$pdf->Cell(30, 10, 'Telefono', 1, 0, 'C', 1); // Campo Teléfono
$pdf->Cell(50, 10, 'Direccion', 1, 0, 'C', 1); // Campo Dirección
$pdf->Cell(25, 10, 'Logo', 1, 1, 'C', 1); // Campo para el Logo (Imagen)

$pdf->SetFont('Arial', '', 10); // Fuente para el contenido de la tabla

// Obtener datos de proveedores
$pro = new Proveedor("", "", "", "", "", "", "");
$resultado = $pro->reporte(); // Método para obtener datos de proveedores

$c = 1; // Contador para enumerar las filas
while ($row = $resultado->fetch_assoc()) { // Iterar sobre los resultados
    $pdf->Cell(10, 15, $c, 1, 0, 'C'); // Campo No
    $pdf->Cell(40, 15, utf8_decode($row['empresa']), 1, 0, 'C'); // Campo Empresa
    $pdf->Cell(35, 15, utf8_decode($row['contacto']), 1, 0, 'C'); // Campo Contacto
    $pdf->Cell(35, 15, utf8_decode($row['email']), 1, 0, 'C'); // Campo Email
    $pdf->Cell(30, 15, utf8_decode($row['telefono']), 1, 0, 'C'); // Campo Teléfono
    $pdf->Cell(50, 15, utf8_decode($row['direccion']), 1, 0, 'C'); // Campo Dirección

    // Incluir el logo como imagen, asegurándote de que el archivo exista
    $ruta_logo = '../assets/images/proveedor/' . $row['logo']; // Ruta del logo
    if (file_exists($ruta_logo)) {
        // Agregar la imagen al PDF (ajustar tamaño si es necesario)
        $pdf->Cell(25, 15, $pdf->Image($ruta_logo, $pdf->GetX(), $pdf->GetY(), 15, 15), 1, 1, 'C'); 
    } else {
        $pdf->Cell(25, 15, 'No disponible', 1, 1, 'C'); // Mostrar texto si no hay logo
    }

    $c++; // Incrementar contador
}

$pdf->Output(); // Generar y enviar el PDF
