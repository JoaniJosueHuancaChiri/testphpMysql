<?php
  include("head.php");

  // Se incluye el navbar correcto según el nivel del usuario
  if($_SESSION["nivel"]=="administrador"){
    $navbar = "encabezado1.php";
  } elseif($_SESSION["nivel"]=="cliente"){
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
                                <h1>Listado de Proveedores</h1>
                            </center>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" style=>
                                    <thead>
                                        <tr align="center">
                                            <th scope="col" class="text-white">ID</th>
                                            <th scope="col" class="text-white">Empresa</th>
                                            <th scope="col" class="text-white">Contacto</th>
                                            <th scope="col" class="text-white">Correo</th>
                                            <th scope="col" class="text-white">Teléfono</th>
                                            <th scope="col" class="text-white">Dirección</th>
                                            <th scope="col" class="text-white">Logo</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    while ($reg = mysqli_fetch_array($res)) {
                                        echo "<tr style='color: aqua;' align='center'>";
                                        echo "<td>" . $reg['id_proveedor'] . "</td>";
                                        echo "<td>" . $reg['empresa'] . "</td>";
                                        echo "<td>" . $reg['contacto'] . "</td>";
                                        echo "<td>" . $reg['mail'] . "</td>";
                                        echo "<td>" . $reg['telefono'] . "</td>";
                                        echo "<td>" . $reg['direccion'] . "</td>";
                                        echo "<td><img src='../assets/images/proveedor/" . $reg['logo'] . "' alt='Logo' width='50'></td>";

                                        echo "<td><a href='../controlador/proveedorElimina.php?cod=" . $reg['id_proveedor'] . "' class='btn btn-danger'>ELIMINAR</a></td>";
                                        echo "<td><a href='../controlador/proveedorModifica.php?cod=" . $reg['id_proveedor'] . "' class='btn btn-success'>MODIFICAR</a></td>";
                                        echo "</tr>";

                                    }
                                    ?>
                                </table>
                                <br>
                                <center>
                                    <a href='../controlador/proveedorRegistro.php' class="btn btn-success">Nuevo
                                        Proveedor</a>
                                    <a href='../controlador/proveedorBusqueda.php' class=" btn btn-info">Buscar
                                        Proveedor</a>
                                    <a class="btn btn-primary" align="center"
                                        href="../reportes/reporteproveedor.php">Reporte</a>
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