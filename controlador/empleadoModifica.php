<?php
$cod = $_GET['cod'];
include ("../modelo/empleadoClase.php");
$emp = new Empleado($cod, "", "", "", "", "", "", "", "", "", "");
$res = $emp->listarEmpleado();
$db = new Conexion();
$sqlCargos = $db->query("SELECT * FROM cargo");
include ("../vista/empleadoModifica.php");
if (isset($_GET['Modificar'])) {
    $id_cargo = $_GET['cargo'];
    $ci = $_GET['ci'];
    $nombre = $_GET['nombre'];
    $paterno = $_GET['paterno'];
    $materno = $_GET['materno'];
    $direccion = $_GET['direccion'];
    $telefono = $_GET['telefono'];
    $fechanacimiento = $_GET['fechanacimiento'];
    $genero = $_GET['genero'];
    $interes = $_GET['interes'];

    // Llamar a la función editarEmpleado del objeto $emp
    $r = $emp->editarEmpleado($cod, $id_cargo, $ci, $nombre, $paterno, $materno, $direccion, $telefono, $fechanacimiento, $genero, $interes);

    if ($r) {
        echo "<script>
                alert('Empleado modificado correctamente');
                location.href='empleadoLista.php';
                </script>";
    } else {
        echo "<script>
                alert('No se pudo modificar el empleado');
                </script>";
    }
}

?>