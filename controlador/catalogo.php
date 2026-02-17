<?php
include ("../modelo/productoClase.php");

$producto = new Producto();
$productos = $producto->mostrarProductosActivos();

include ("../vista/catalogo.php");
?>
