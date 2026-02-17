<?php
$cod = $_GET['cod'];
include ("../modelo/cargoClase.php");
$cargoObj = new Cargo($cod, "");
$res = $cargoObj->eliminarCargo();
if ($res) {
    ?>
    <script type="text/javascript">
        alert("Se eliminó correctamente");
        location.href = 'cargoLista.php';
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