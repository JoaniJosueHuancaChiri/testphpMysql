<?php
// Resto del código
include ("../vista/empleadoRegistra.php");
if (isset($_POST['registrarEmpleado'])) {
    $id_cargo = $_POST['cargo'];
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $genero = $_POST['genero'];
    $interes = $_POST['interes'];
    include ("../modelo/empleadoClase.php");
    $emp = new Empleado("", $id_cargo, $ci, $nombre, $paterno, $materno, $direccion, $telefono, $fechanacimiento, $genero, $interes);
    $r = $emp->grabarEmpleado();
    if ($r) {
        ?>
        <script type="text/javascript">
            alert("Se registró correctamente");
            location.href = 'empleadoLista.php';
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("No se registró correctamente");
        </script>
        <?php
    }
}
?>