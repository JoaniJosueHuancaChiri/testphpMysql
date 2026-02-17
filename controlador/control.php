<?php
include("../vista/login.php");

if (isset($_POST['ingresar'])) {
    $us = $_POST['usr'];
    $pw = $_POST['pwd'];

    include("../modelo/usuario.php");
    $usr = new Usuario("", "", "", "", "", "", "", "", "", "", "");
    $res = $usr->obtenerUsuarioLogin($us);

    // Verifica que la consulta ha devuelto resultados
    if ($res && $reg = mysqli_fetch_array($res)) {
        $pasw = $reg['pasword'];
        $pswd = password_verify($pw, $pasw);

        // Mensaje de depuración
        var_dump($pswd);
        var_dump($rs);
        if ($pswd) {
            session_start();
            $_SESSION['ingreso'] = 'si';
            $_SESSION['id'] = $reg['id_usuario'];
            $_SESSION['nombre'] = $reg['email'];
            $_SESSION['nivel'] = $reg['tipousuario'];

            // Redirige con salida
            header("location:../vista/admin.php");
        } else {
            //header("Location: ../vista/login.php?error=1");
        }
    }
}
?>