<?php
session_start();
include("config/conexion.php");
$usuario = $_SESSION['usuario'];
$pasw = $_SESSION['pasw'];
$token = $_SESSION['token'];
$consulta = "SELECT * From usuarios where usuario='" . $usuario . "'
AND contra='" . $pasw . "'
AND token= '" . $token . "'";
$datos = mysqli_query($conexion, $consulta);
if (mysqli_num_rows($datos) == 0) {
    if($token_Antiguo != $token){
        header('Location: index.php?sw=4');
    }else{
        header('Location: index.php?sw=2');
    }
}
$uActivo = mysqli_fetch_array($datos);
$token_Antiguo=$token;
