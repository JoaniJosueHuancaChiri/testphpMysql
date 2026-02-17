<?php
// Incluye solo una vez el archivo de seguridad que inicia la sesión
include_once('../controlador/seguridad.php'); // Asegúrate de que 'seguridad.php' maneje 'session_start()' solo una vez
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Corona Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body>
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <!-- Logo -->
          <div class="logo">
            <h1>
              <?php
              // Verificación del nivel de usuario y redirección a la página correspondiente
              if ($_SESSION['nivel'] == 'administrador') {
                echo '<a href="principal.php">Sistema de Ventas Juvenil</a>';
              } else if ($_SESSION['nivel'] == 'cliente') {
                echo '<a href="principal1.php">Sistema de Ventas Juvenil</a>';
              } else {
                echo '<a href="#">Sistema de Ventas Juvenil</a>';
              }
              ?>
            </h1>
          </div>
        </div>
        <div class="col-md-2">
          <div class="row">
            <div class="col-lg-12">
              <div class="input-group form">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="usu">
            <?php echo "<br><font color='white'>" . $_SESSION['nombre'] . "</font>"; ?>
            <a href="../controlador/salir.php">(Salir)</a>
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
    <!-- End custom js for this page -->
</body>

</html>