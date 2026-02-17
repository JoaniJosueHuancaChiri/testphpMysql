<?php
include ("../modelo/proveedorClase.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_proveedor = $_POST['cod'];
    $empresa = $_POST['empresa'];
    $contacto = $_POST['contacto'];
    $mail = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $logo = $_FILES['logo']['name']; // Obtener el nombre del archivo de imagen, si hay una nueva

    // Directorio donde se almacenarán las imágenes de los proveedores
    $directorio = "../assets/images/proveedor/";

    if (!empty($logo)) {
        // Mover la imagen a la carpeta de destino
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $directorio . $logo)) {
            // Si se movió la imagen correctamente, continuar con la actualización en la base de datos
            $proveedor = new Proveedor($id_proveedor, $empresa, $contacto, $mail, $telefono, $direccion, $logo);
            $resultado = $proveedor->editarProveedor($id_proveedor, $empresa, $contacto, $mail, $telefono, $direccion, $logo);
            if ($resultado) {
                echo '<script>alert("Proveedor modificado correctamente");</script>';
                echo '<script>window.location.href = "proveedorLista.php";</script>';
                exit;
            } else {
                echo '<script>alert("Error al modificar el proveedor");</script>';
            }
        } else {
            echo '<script>alert("Error al subir la imagen del proveedor");</script>';
        }
    } else {
        // Si no hay nueva imagen, mantener la existente
        $proveedor = new Proveedor($id_proveedor, $empresa, $contacto, $mail, $telefono, $direccion, null);
        $resultado = $proveedor->editarProveedor($id_proveedor, $empresa, $contacto, $mail, $telefono, $direccion, null);
        if ($resultado) {
            echo '<script>alert("Proveedor modificado correctamente");</script>';
            echo '<script>window.location.href = "proveedorLista.php";</script>';
            exit;
        } else {
            echo '<script>alert("Error al modificar el proveedor");</script>';
        }
    }
}

// Obtener y mostrar el formulario de modificación
if (isset($_GET['cod'])) {
    $id_proveedor = $_GET['cod'];
    $proveedor = new Proveedor($id_proveedor, "", "", "", "", "", "");
    $res = $proveedor->listarProveedor($id_proveedor); // Pasa el id_proveedor
    include ("../vista/proveedorModifica.php");
} else {
    echo '<script>alert("ID de proveedor no proporcionado");</script>';
}
?>