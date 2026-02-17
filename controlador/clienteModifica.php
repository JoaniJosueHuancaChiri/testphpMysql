<?php
$cod = $_GET['cod'];
include ("../modelo/clienteClase.php");
$cli = new Cliente($cod, "", "", "");
$res = $cli->listarClienteId();
include ("../vista/clienteModifica.php");
if (isset($_GET['Modificar'])) {
    $rs = $_GET['razon'];
    $ni = $_GET['nit'];
    $r = $cli->editarCliente($cod, $rs, $ni);
    if ($r) {
        echo "
        <script>
        alert('Se modifico');
        location.href='clienteLista.php';
        </script>";
    } else {
        echo "
        <script>
        alert('No se modifico');
        </script>";
    }
}
?>