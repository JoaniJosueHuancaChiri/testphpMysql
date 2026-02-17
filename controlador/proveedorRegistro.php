<?php
include ("../vista/proveedorRegistro.php");

if (isset($_POST['registrarProveedor'])) {
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $mail = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $logo = $_FILES['logo']['name']; // Obtener el nombre del archivo de imagen

    // Directorio donde se almacenarán las imágenes de los proveedores
    $directorio = "../assets/images/proveedor/";

    // Mover la imagen a la carpeta de destino
    if (move_uploaded_file($_FILES['logo']['tmp_name'], $directorio . $logo)) {
        // Si se movió la imagen correctamente, continuar con el registro en la base de datos
        include ("../modelo/proveedorClase.php");
        $proveedor = new Proveedor("", $empresa, $contacto, $mail, $telefono, $direccion, $logo);
        $resultado = $proveedor->grabarProveedor();
        if ($resultado) {
            ?>
            <script type="text/javascript">
                alert("Proveedor registrado correctamente");
                location.href = 'ProveedorLista.php';
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Error al registrar el proveedor");
            </script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Error al subir la imagen del proveedor");
        </script>
        <?php
    }
}
?>