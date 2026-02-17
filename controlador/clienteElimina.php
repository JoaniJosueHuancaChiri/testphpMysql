<?php
$cod = $_GET['cod'];
include ("../modelo/clienteClase.php");
$clie = new Cliente($cod, "", "", "");
$res = $cli->eliminarCliente();
if ($res) {
    ?>
    <script type="text/javascript">
        alert("Se elimino correctamente");
        location.href = 'clienteLista.php';
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert("No se elimino Esta implicado en una venta");
    </script>
    <?php
}
?>