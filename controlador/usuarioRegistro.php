<?php
$usuario =$_GET["usuario"]?? null;

if($usuario === "chef"){
    include("usuarioChefRegistro.php");
}elseif($usuario === "cliente"){
    include("usuarioClienteRegistro.php");
}elseif($usuario === "camarero"){
    include("usuarioCamareroRegistro.php");
}elseif($usuario === "cajero"){
    include("usuarioCajeroRegistro.php");
}elseif($usuario === "administrador"){
    include("usuarioAdministradorRegistro.php");
}
else{
        include("../vista/usuarioRegistro.php");

}
?>