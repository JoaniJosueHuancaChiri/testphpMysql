<?php
include("../controlador/seguridad.php");

if ($_SESSION['nivel'] == "administrador") {
    header("Location: principal.php");
} else {
    if ($_SESSION['nivel'] == "cliente") {
        header("Location: principal2.php");
    }
}
?>