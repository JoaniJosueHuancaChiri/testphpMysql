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
                                Registrar Empleado
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Cargo</label>
                                    <select name="cargo" class="form-control" style="color: aqua;">
                                        <?php

                                        // Iterar sobre los resultados de la consulta y mostrar cada cargo como una opción en el select
                                        while ($cargo = mysqli_fetch_array($sqlCargos)) {
                                            echo "<option value='" . $cargo['id_cargo'] . "'>" . $cargo['cargo'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>CI</label>
                                    <input type="text" class="form-control" name="ci" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="nombre" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Paterno</label>
                                    <input type="text" class="form-control" name="paterno" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Materno</label>
                                    <input type="text" class="form-control" name="materno" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" name="direccion" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" name="telefono" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="text" class="form-control" name="fechanacimiento" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Genero</label>
                                    <input type="text" class="form-control" name="genero" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Interes</label>
                                    <input type="text" class="form-control" name="interes" style="color: aqua;">
                                </div>
                                <input type="submit" name="registrarEmpleado" value="registrarEmpleado"
                                    class="btn btn-primary">
                                <a href="../controlador/empleadoLista.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="../sets/vendors/js/vendor.bundle.base.js"></script>
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