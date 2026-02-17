<?php
include("../modelo/productoClase.php");
// Inicializar la variable de productos
$producto = new Producto();
$productos = $producto->mostrarProductosActivos(); // Obtener productos activos

// Manejo de agregar al carrito
if (isset($_POST['agregar_carrito'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    // Verificar el stock disponible antes de agregar
    if ($producto->verificarStock($id_producto, $cantidad)) {
        // Verificar si el producto ya está en el carrito
        if (isset($_SESSION['carrito'][$id_producto])) {
            $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad;
        } else {
            // Agregar nuevo producto al carrito
            $_SESSION['carrito'][$id_producto] = [
                'nombre' => $_POST['nombre_producto'],
                'precio' => $_POST['precio'],
                'cantidad' => $cantidad
            ];
        }
    } else {
        // Si no hay suficiente stock, almacenar un mensaje de error
        $_SESSION['error'] = "No hay suficiente stock para agregar $cantidad unidades.";
    }
}
include("../vista/carrito.php");

