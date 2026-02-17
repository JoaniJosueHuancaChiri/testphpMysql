<?php
include ("../modelo/cargoClase.php");
if (isset($_GET['cod'])) {
$id = $_GET['cod'];
$cargoObj = new Cargo($id, "");
$res = $cargoObj->listarCargo($id);
include("../vista/cargoModifica.php");
}
if (isset($_GET['Modificar'])) {
    $cargo=$_GET['cargo'];
    $r=$cargoObj->editarCargo($id,$cargo);
    if($r){
        echo "
        <script>
        alert('Se modifico');
        location.href='cargoLista.php';
        </script>";
    }else {
        echo "
        <script>
        alert('No se modifico');
        </script>";
    }
}
?>