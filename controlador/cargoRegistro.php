<?php
include ("../vista/cargoRegistro.php");

if (isset($_POST['registrarCargo'])) {
    $cargo = $_POST['cargo'];

    include ("../modelo/cargoClase.php");
    $cargoObj = new Cargo("", $cargo);
    $resultado = $cargoObj->grabarCargo();

    if ($resultado) {
        ?>
        <script type="text/javascript">
            alert("Se registró el cargo correctamente");
            location.href = 'CargoLista.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Error al registrar el cargo");
        </script>
        <?php
    }
}
?>