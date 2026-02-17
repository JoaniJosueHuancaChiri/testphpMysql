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
                            <div class="card-header bg-primary text-white mdi mdi-table-edit" style="font-size: 20px;">
                                Registrar Proveedor
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <input type="text" class="form-control" name="empresa" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Contacto</label>
                                    <input type="text" class="form-control" name="contacto" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="email" class="form-control" name="mail" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" class="form-control" name="direccion" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control-file" name="logo" style="color: aqua;">
                                </div>
                                <input type="submit" name="registrarProveedor" value="Registrar Proveedor"
                                    class="btn btn-primary">
                                <a href="../controlador/proveedorLista.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
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