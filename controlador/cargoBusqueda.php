<?php
include ("../modelo/cargoClase.php");

// Verificar si el formulario ha sido enviado
if (isset($_GET['Buscar'])) {
    // El formulario ha sido enviado, procesar los datos del formulario
    $rs = $_GET['cargo'];
    $cargoObj = new Cargo("", "");
    $res = $cargoObj->buscarCargo($rs);
}

// Ahora incluir el archivo de vista
include ("../vista/cargoBusqueda.php");
?>