<?php
require_once("../modelo/productoClase.php");
if (isset($_POST['registrarProducto'])) {
    $id_proveedor = $_POST['id_proveedor'];
    $nombreproducto = $_POST['nombreproducto'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $tipo = $_POST['tipo'];
    $imagen = $_FILES['imagen']['name']; // Obtener el nombre del archivo de imagen

    // Directorio donde se almacenarán las imágenes de los productos
    $directorio = "../assets/images/producto/";

    // Mover la imagen a la carpeta de destino
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $imagen)) {
        // Si se movió la imagen correctamente, continuar con el registro en la base de datos
        include ("../modelo/productoClase.php");
        $producto = new Producto("", $id_proveedor, $nombreproducto, $descripcion, $estado, $precio, $stock, $tipo, $imagen);
        $resultado = $producto->grabarProducto();
        if ($resultado) {
            ?>
            <script type="text/javascript">
                alert("Producto registrado correctamente");
                location.href = 'ProductoLista.php';
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Error al registrar el producto");
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Error al subir la imagen del producto");
        </script>
        <?php
    }
}
?>
