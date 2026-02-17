<?php
include ("../modelo/proveedorClase.php");
$pro = new Proveedor("", "", "", "", "", "", "");
$res = $pro->listarProveedor();
include ("../vista/proveedorLista.php");
?>