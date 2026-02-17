<?php
ob_start();
include("../vista/usuarioAdmRegistro.php");
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $nombre=$_POST['nombre'];
    $apellidoPaterno=$_POST['apePat'];
    $apellidoMaterno=$_POST['apeMat'];
    $ci=$_POST['ci'];
    $nombreUsuario=$_POST['usuario'];
    $fechaNacimiento=$_POST['fechaNac'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $contraseña= password_hash($password, PASSWORD_DEFAULT);
    
    include_once("../modelo/usuario.php");
    $usuario= new Administrador("",$nombre,$apellidoPaterno,$apellidoMaterno,$ci,$nombreUsuario,$contraseña,$fechaNacimiento,"administrador",$email,"","");
    $resultado=$usuario->registrarAdministrador();
    if($resultado){
        header("Location:../controlador/usuarioRegistro.php");
    }
}   
ob_end_flush();
?>