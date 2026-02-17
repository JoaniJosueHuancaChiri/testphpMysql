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
                                    <h1>Lista de Productos</h1>
                                </center>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr align="center">
                                                <th scope="col" class="text-white">Id</th>
                                                <th scope="col" class="text-white">Proveedor</th>
                                                <th scope="col" class="text-white">Nombre Producto</th>
                                                <th scope="col" class="text-white">Descripción</th>
                                                <th scope="col" class="text-white">Estado</th>
                                                <th scope="col" class="text-white">Precio</th>
                                                <th scope="col" class="text-white">Stock</th>
                                                <th scope="col" class="text-white">Tipo</th>
                                                <th scope="col" class="text-white">Imagen</th>
                                                <th colspan="2" class="text-white">Operaciones</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        while ($reg = mysqli_fetch_array($res)) {
                                            echo "<tr style='color: aqua;' align='center'>";
                                            echo "<td>" . $reg['id'] . "</td>";
                                            echo "<td>" . $reg['id_proveedor'] . "</td>";
                                            echo "<td>" . $reg['nombreproducto'] . "</td>";
                                            echo "<td>" . $reg['descripcion'] . "</td>";
                                            echo "<td>" . $reg['estado'] . "</td>";
                                            echo "<td>" . $reg['precio'] . "</td>";
                                            echo "<td>" . $reg['stock'] . "</td>";
                                            echo "<td>" . $reg['tipo'] . "</td>";
                                            echo "<td><img src='../assets/images/producto/" . $reg['imagen'] . "' alt='Imagen' style='object-fit: cover; width: 100px; height: 100px; border-radius: 0;'></td>";
                                            echo "<td><a href='../controlador/productoElimina.php?cod=" . $reg['id'] . "' class='btn btn-danger'>Eliminar</a></td>";
                                            echo "<td><a href='../controlador/productoModifica.php?cod=" . $reg['id'] . "' class='btn btn-success'>Modificar</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>
                                </div>
                                <br>
                                <center>
                                    <a href='../controlador/productoRegistro.php' class="btn btn-success">Nuevo
                                        Producto</a>
                                    <a href='../controlador/productoBusqueda.php' class="btn btn-info">Buscar
                                        Producto</a>
                                    <a class="btn btn-primary" href="../controlador/reporteProducto.php">Reporte</a>
                                    <a href='../index.php' class="btn btn-dark">Salir</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>