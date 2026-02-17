<?php
include ("../modelo/proveedorClase.php");

// Verificar si el formulario ha sido enviado
if (isset($_GET['Buscar'])) {
    // El formulario ha sido enviado, procesar los datos del formulario
    $rs = $_GET['empresa'];
    $proObj = new Proveedor("", "", "", "", "","","");
    $res = $proObj->buscarProveedor($rs);
}

// Ahora incluir el archivo de vista
include ("../vista/proveedorBusqueda.php");
?>