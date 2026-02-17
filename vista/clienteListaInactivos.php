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
                                <h1>Lista de Clientes Inactivos</h1>
                            </center>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr align="center">
                                        <th scope="col" class="text-white">Id Clientes</th>
                                        <th scope="col" class="text-white">Nit Ci</th>
                                        <th scope="col" class="text-white">Razon Social</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($reg = mysqli_fetch_array($res)) {
                                    echo "<tr style='color: aqua;' align='center'>";
                                    echo "<td>" . $reg['id_cliente'] . "</td>";
                                    echo "<td>" . $reg['nit_ci'] . "</td>";
                                    echo "<td>" . $reg['razonsocial'] . "</td>";

                                    echo "<td><a href='../controlador/clienteInactiva.php?cod=" . $reg['id_cliente'] . "' class='btn btn-danger'>ELIMINA</a></td>";
                                    echo "<td><a href='../controlador/clienteModifica.php?cod=" . $reg['id_cliente'] . "' class='btn btn-success'>MODIFICA</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <br>
                            <center>
                                <a href='../controlador/clienteRegistroCo.php' class="btn btn-success"> Nuevo
                                    Cliente</a>
                                <a href='../controlador/clienteBusqueda.php' class=" btn btn-info"> Buscar Cliente</a>
                                <a class="btn btn-primary" align="center" href="../controlador/reporteIn.php">
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