<?php
include("head.php");

// Se incluye el navbar correcto según el nivel del usuario
if ($_SESSION["nivel"] == "administrador") {
    $navbar = "encabezado1.php";
} elseif ($_SESSION["nivel"] == "cliente") {
    $navbar = "encabezado2.php";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];

    if ($usuario == 'administrador') {
        header("Location: ../controlador/usuarioAdmRegistro.php");
        exit();
    } elseif ($usuario == 'cliente') {
        header("Location: ../controlador/usuarioClienteRegistro.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content here -->
    <style>
        .main-panel {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .content-wrapper {
            width: 100%;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button-container .col-4 {
            max-width: 30%;
        }

        .btn {
            padding: 20px;
        }

        .card-img-top {
            width: 100%;
            height: auto;
        }

        .card-title {
            font-size: 2rem;
        }
    </style>
</head>

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
                                    <h2 style="color: aqua;">¿QUE USUARIO DESEA REGISTRAR?</h2>
                                </center>
                                <form method="POST">
                                    <div class="button-container mt-3">
                                        <div class="col-5">
                                            <button type="submit" class="text-center btn shadow w-100" name="usuario"
                                                value="administrador">
                                                <img src="../assets/images/administrador.png" alt="img_adm"
                                                    class="card-img-top">
                                                <h7 class="card-title text-center fs-3 fw-bolder text-danger mt-3">
                                                    ADMINISTRADOR</h7>
                                            </button>
                                        </div>
                                        <div class="col-5">
                                            <button type="submit" class="text-center btn shadow w-100" name="usuario"
                                                value="cliente">
                                                <img src="../assets/images/cliente.png" alt="img_adm"
                                                    class="card-img-top">
                                                <h7 class="card-title text-center fs-3 fw-bolder text-danger mt-3">
                                                    CLIENTES</h7>
                                            </button>
                                        </div>
                                    </div>
                                </form>
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