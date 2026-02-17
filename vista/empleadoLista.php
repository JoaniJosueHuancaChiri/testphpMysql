<?php
include("head.php");

// Se incluye el navbar correcto según el nivel del usuario
if ($_SESSION["nivel"] == "administrador") {
    $navbar = "encabezado1.php";
} elseif ($_SESSION["nivel"] == "cliente") {
    $navbar = "encabezado2.php";
}
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Navbar / Sidebar -->
            <div class="col-md-2">
                <?php include($navbar); ?>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <h1>Lista de Empleados</h1>
                                </center>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr align="center">
                                                <th scope="col" class="text-white">Id Empleado</th>
                                                <th scope="col" class="text-white">Cargo</th>
                                                <th scope="col" class="text-white">CI</th>
                                                <th scope="col" class="text-white">Nombre</th>
                                                <th scope="col" class="text-white">Paterno</th>
                                                <th scope="col" class="text-white">Materno</th>
                                                <th scope="col" class="text-white">Dirección</th>
                                                <th scope="col" class="text-white">Teléfono</th>
                                                <th scope="col" class="text-white">Fecha Nacimiento</th>
                                                <th scope="col" class="text-white">Género</th>
                                                <th scope="col" class="text-white">Interés</th>
                                                <th colspan="2" class="text-white">Operaciones</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        while ($reg = mysqli_fetch_array($res)) {
                                            echo "<tr style='color: aqua;' align='center'>";
                                            echo "<td>" . $reg['id_empleado'] . "</td>";
                                            echo "<td>" . $reg['Cargo'] . "</td>";
                                            echo "<td>" . $reg['CI'] . "</td>";
                                            echo "<td>" . $reg['nombre'] . "</td>";
                                            echo "<td>" . $reg['paterno'] . "</td>";
                                            echo "<td>" . $reg['materno'] . "</td>";
                                            echo "<td>" . $reg['direccion'] . "</td>";
                                            echo "<td>" . $reg['telefono'] . "</td>";
                                            echo "<td>" . $reg['fechanacimiento'] . "</td>";
                                            echo "<td>" . $reg['genero'] . "</td>";
                                            echo "<td>" . $reg['interes'] . "</td>";
                                            echo "<td><a href='../controlador/empleadoInactiva.php?cod=" . $reg['id_empleado'] . "' class='btn btn-danger'>ELIMINA</a></td>";
                                            echo "<td><a href='../controlador/empleadoModifica.php?cod=" . $reg['id_empleado'] . "' class='btn btn-success'>MODIFICA</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>
                                    <br>
                                    <center>
                                        <a href='../controlador/empleadoRegistra.php' class="btn btn-success"> Nuevo
                                            Empleado</a>
                                        <a href='../controlador/empleadoBusqueda.php' class=" btn btn-info"> Buscar
                                            Empleado</a>
                                        <a class="btn btn-primary" align="center" href="../controlador/reporte.php">
                                            Reporte</a>
                                        <a href='../index.php' class="btn btn-dark">Salir</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
            <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="../assets/vendors/chart.js/Chart.min.js"></script>
            <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
            <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
            <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="../assets/js/off-canvas.js"></script>
            <script src="../assets/js/hoverable-collapse.js"></script>
            <script src="../assets/js/misc.js"></script>
            <script src="../assets/js/settings.js"></script>
            <script src="../assets/js/todolist.js"></script>
            <!-- endinject -->