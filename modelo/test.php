<?php
include("../modelo/usuario.php");

$us = 'Jhosua';
$pw = '123456';

$usr = new Usuario("", "", "", "", "", "", "", "", "", "", "");
$res = $usr->obtenerUsuarioLogin($us);

if ($res) {
    // Verifica que $res es un objeto mysqli_result
    if ($res instanceof mysqli_result) {
        $reg = mysqli_fetch_array($res);
        if ($reg) {
            $pasw = $reg['pasword'];
            if (password_verify($pw, $pasw)) {
                echo "La contraseña es correcta.";
            } else {
                echo "La contraseña es incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
    } else {
        echo "Error en la consulta: el resultado no es un objeto mysqli_result.";
    }
} else {
    echo "Error en la consulta.";
}
?>

