<?php
$cod = $_GET['cod'];
include ("../modelo/empleadoClase.php");
$emp = new Empleado($cod, "", "", "", "", "", "", "", "", "", "");
$res = $emp->eliminarEmpleado();
if ($res) {
    ?>
    <script type="text/javascript">
        alert("El empleado se eliminó correctamente");
        location.href = 'empleadoLista.php';
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert("No se puede eliminar este empleado, está implicado en una operación");
    </script>
    <?php
}
?>