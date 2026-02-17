<?php
ob_start();
include ("../vista/usuarioAdmRegistro.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apePat'];
    $apellidoMaterno = $_POST['apeMat'];
    $ci = $_POST['ci'];
    $nombreUsuario = $_POST['usuario'];
    $fechaNacimiento = $_POST['fechaNac'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $contraseña = password_hash($password, PASSWORD_DEFAULT);

    include_once ("../modelo/usuariosClase.php");
    $usuario = new Administrador("", $nombreUsuario, $contraseña, "administrador", "activo", "", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $ci, $email);
    $resultado = $usuario->registrarAdministrador();
    if ($resultado) {
        header("Location: ../controlador/usuariolista.php");
    }
}
ob_end_flush();
?>
