<?php
ob_start();
include("../vista/usuarioClienteRegistro.php");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apePat'];
    $apellidoMaterno = $_POST['apeMat'];
    $ci = $_POST['ci'];
    $nombreUsuario = $_POST['usuario'];
    $fechaNacimiento = $_POST['fechaNac'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $razon = $_POST['razon'];
    $nit = $_POST['nit'];
    
    $contraseña = password_hash($password, PASSWORD_DEFAULT);

    include_once("../modelo/usuario.php");
    $cliente = new Cliente("", $nombre, $apellidoPaterno, $apellidoMaterno, $ci, $nombreUsuario, $contraseña, $fechaNacimiento, "cliente", $email, "", "", $razon, $nit);

    $resultado = $cliente->registrarCliente();
    if($resultado){
        header("Location: ../controlador/usuarioRegistro.php");
    }
}   
ob_end_flush();
?>
