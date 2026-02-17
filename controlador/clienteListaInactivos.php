<?php
include("../modelo/clienteClase.php");
$cli = new Cliente("", "", "", "");
$res = $cli->listarClienteInactivos();
include("../vista/clienteListaInactivos.php");   
?>