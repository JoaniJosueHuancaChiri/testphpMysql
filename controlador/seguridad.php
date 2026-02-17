<?php
session_start();
if ($_SESSION['ingreso'] != "si") {
    header("location:control.php?error=2");
}
?>