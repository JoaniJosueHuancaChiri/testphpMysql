<?php
include ("../modelo/productoClase.php");

// Crear una instancia de la clase Producto
$producto = new Producto();

// Listar productos (puedes cambiar esto si necesitas aplicar algún filtro)
$res = $producto->listarProducto();

// Incluir la vista para mostrar los productos
include ("../vista/productoLista.php");
?>
