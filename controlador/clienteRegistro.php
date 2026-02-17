<?php
include ("../vista/clienteRegistro.php");
if (isset($_POST['registrarCliente'])) {
    $nit = $_POST['nit'];
    $rs = $_POST['razon'];
    $es = 'Activo';
    include ("../modelo/clienteClase.php");
    $cli = new Cliente("", $nit, $rs, $es);
    $r = $cli->grabarCliente();
    if ($r) {
        ?>
        <script type="text/javascript">
            alert("Se registro correctamente");
            location.href = 'ClienteLista.php';
        </script>
        <?php

    } else {
        ?>
        <script type="text/javascript">
            alert("No se registro correctamente");
        </script>
        <?php
    }
}
?>