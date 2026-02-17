<?php
$cod = $_GET['cod'];
include ("../modelo/proveedorClase.php");
$proObj = new Proveedor($cod, "","","","","","");
$res = $proObj->eliminarProveedor();
if ($res) {
    ?>
    <script type="text/javascript">
        alert("Se eliminó correctamente");
        location.href = 'proveedorLista.php';
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert("No se pudo eliminar. El cargo puede estar asociado a alguna entidad.");
    </script>
    <?php
}
?>