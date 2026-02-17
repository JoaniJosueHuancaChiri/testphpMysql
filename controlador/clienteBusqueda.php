<?php
if (isset($_GET['Buscar'])) {
    $rs = $_GET['razon'];
    include ("../modelo/clienteClase.php");
    $cli = new Cliente("", "", "", "");
    $res = $cli->buscarCliente($rs);
}

// Incluir la vista correspondiente
include ("../vista/clienteBusqueda.php");
?>

<?php
// Mostrar los resultados si la variable $res está definida
if (isset($res)) {
    while ($r = mysqli_fetch_array($res)) {
        ?>
        <tr>
            <td>
                <?php echo $r['nit_ci']; ?>
            </td>
            <td>
                <?php echo $r['razonsocial']; ?>
            </td>
            <td><a href='clienteModifica.php?cod=<?php echo $r[0]; ?>' class="btn btn-success"><i
                        class="glyphicon glyphicon-edit">ACTUALIZAR</i></a></td>
            <td><a href='clientelnactiva.php?cod=<?php echo $r[0]; ?>' class="btn btn-danger"><i
                        class="glyphicon glyphicon-trash">ELIMINAR</i></a></td>
        </tr>
        <?php
    }
}
?>