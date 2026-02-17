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
                  <h1>BIENVENIDO ADMINISTRADOR</h1>
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