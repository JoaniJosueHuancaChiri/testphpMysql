<?php
    $cod=$_GET['cod'];
    include("../modelo/clienteClase.php");
    $cli=new Cliente($cod,"","","");
    $res=$cli->activarCliente();
    if($res){
?>   
        <script type="text/javascript">
        alert("Se Activo correctamente");
        location.href='clienteListaInactiva.php';
        </script>
        <?php     
    }else{
        ?>
        <script type="text/javascript">
            alert("No se activo");
            </script>
            <?php 
    }
    ?><
