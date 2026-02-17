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

<style>
    .catalogo-wrapper .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .catalogo-wrapper .card-body {
        text-align: center;
    }

    .catalogo-wrapper .container {
        padding: 20px;
    }
</style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="main-panel">
                    <div class="content-wrapper catalogo-wrapper"> <!-- Clase específica añadida aquí -->
                        <div class="card-body">
                            <h1 style="color:aqua">Catálogo de Productos</h1>
                            <div class="row">
                                <?php
                                if ($productos->num_rows > 0) {
                                    while ($producto = $productos->fetch_assoc()) {
                                        ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="../assets/images/producto/<?php echo $producto['imagen']; ?>"
                                                    class="card-img-top" alt="<?php echo $producto['nombreproducto']; ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $producto['nombreproducto']; ?></h5>
                                                    <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                                    <p class="card-text">
                                                        <strong>Precio:</strong><?php echo $producto['precio']; ?> USD</p>
                                                    <a href="#" class="btn btn-primary">Comprar</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <p>No hay productos activos disponibles.</p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Aquí van los scripts -->
            <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for esta página -->
            <script src="../assets/vendors/chart.js/Chart.min.js"></script>
            <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
            <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
            <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
            <!-- End plugin js for esta página -->
            <!-- inject:js -->
            <script src="../assets/js/off-canvas.js"></script>
            <script src="../assets/js/hoverable-collapse.js"></script>
            <script src="../assets/js/misc.js"></script>
            <script src="../assets/js/settings.js"></script>
            <script src="../assets/js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for esta página -->
            <script src="../assets/js/dashboard.js"></script>
        </div>
    </div>
    </div>
</body>

</html>