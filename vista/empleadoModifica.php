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
                                <h1>Modificar Empleado</h1>
                            </center>
                            <?php
                            while ($reg = mysqli_fetch_array($res)) {
                                ?>
                                <form method="get" action="empleadomodifica.php">
                                    <input type="text" hidden name="cod" value="<?php echo $reg[0]; ?>" class="form-control"
                                        style="color: aqua;">
                                    <!-- Mostrar todos los cargos disponibles en el select -->
                                    <label> Cargo</label>
                                    <select name="cargo" class="form-control" style="color:aqua;">
                                        <?php
                                        // Iterar sobre los resultados de la consulta y mostrar cada cargo como una opción en el select
                                        while ($cargo = mysqli_fetch_array($sqlCargos)) {
                                            echo "<option value='" . $cargo['id_cargo'] . "'>" . $cargo['cargo'] . "</option>";
                                        }
                                        ?>
                                    </select>

                                    <!-- Agregar los campos restantes -->
                                    <label> CI</label>
                                    <input type="text" name="ci" value="<?php echo $reg['CI']; ?>" class="form-control"
                                        style="color: aqua;">
                                    <label> Nombre</label>
                                    <input type="text" name="nombre" value="<?php echo $reg['nombre']; ?>"
                                        class="form-control" style="color: aqua;">
                                    <label> Paterno</label>
                                    <input type="text" name="paterno" value="<?php echo $reg['paterno']; ?>"
                                        class="form-control" style="color: aqua;">
                                    <label> Materno</label>
                                    <input type="text" name="materno" value="<?php echo $reg['materno']; ?>"
                                        class="form-control" style="color: aqua;">
                                    <label> Dirección</label>
                                    <input type="text" name="direccion" value="<?php echo $reg['direccion']; ?>"
                                        class="form-control" style="color: aqua;">
                                    <label> Teléfono</label>
                                    <input type="text" name="telefono" value="<?php echo $reg['telefono']; ?>"
                                        class="form-control" style="color: aqua;">
                                    <label> Fecha de Nacimiento</label>
                                    <input type="date" name="fechanacimiento" value="<?php echo $reg['fechanacimiento']; ?>"
                                        class="form-control" style="color: aqua;">
                                    <label> Género</label>
                                    <input type="text" name="genero" value="<?php echo $reg['genero']; ?>"
                                        class="form-control" style="color: aqua;">
                                    <label> Interés</label>
                                    <input type="text" name="interes" value="<?php echo $reg['interes']; ?>"
                                        class="form-control" style="color: aqua;">
                                    <!-- Agrega los demás campos aquí -->
                                    <input type="submit" name="Modificar" id="Modificar" value="Modificar"
                                        class="btn btn-success">
                                    <a href="../controlador/empleadoLista.php" class="btn btn-secondary">Cancelar</a>
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
</body>

</html>