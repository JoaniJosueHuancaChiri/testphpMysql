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
                                <h1>Modificar Proveedor</h1>
                            </center>
                            <?php
                            while ($reg = mysqli_fetch_array($res)) {
                                ?>
                                <form method="post" enctype="multipart/form-data" action="proveedorModifica.php">
                                <input type="text" hidden name="cod" value="<?php echo $reg[0]; ?>"class="form-control">  
                                    <div class="form-group">
                                        <label>Empresa</label>
                                        <input type="text" name="empresa" value="<?php echo $reg['empresa']; ?>" class="form-control" style="color: aqua;">
                                    </div>
                                    <div class="form-group">
                                        <label>Contacto</label>
                                        <input type="text" name="contacto" value="<?php echo $reg['contacto']; ?>" class="form-control" style="color: aqua;">
                                    </div>
                                    <div class="form-group">
                                        <label>Correo</label>
                                        <input type="email" name="mail" value="<?php echo $reg['mail']; ?>" class="form-control" style="color: aqua;">
                                    </div>
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" name="telefono" value="<?php echo $reg['telefono']; ?>" class="form-control" style="color: aqua;">
                                    </div>
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input type="text" name="direccion" value="<?php echo $reg['direccion']; ?>" class="form-control" style="color: aqua;">
                                    </div>
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="form-control-file" name="logo" style="color: aqua;">
                                        <?php if (!empty($reg['logo'])) { ?>
                                            <img src="../assets/images/proveedor/<?php echo $reg['logo']; ?>" alt="Logo actual" width="100">
                                        <?php } ?>
                                    </div>
                                    <input type="submit" name="Modificar" id="Modificar" value="Modificar" class="btn btn-success">
                                    <a href="../controlador/proveedorLista.php" class="btn btn-secondary">Cancelar</a>
                                </form>
                                <?php
                            }
                            ?>
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
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>
