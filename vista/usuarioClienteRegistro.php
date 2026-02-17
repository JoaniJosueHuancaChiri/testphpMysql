<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Juvenil - Registrar Cliente</title>
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container h1 {
            margin-bottom: 20px;
            margin-top: 40px; /* Ajuste del margen superior */
        }
        .form-label {
            font-size: 1rem;
            font-weight: 600;
        }

        .form-control {
            font-size: 0.9rem;
            padding: 8px;
            margin-bottom: 15px;
            color: green;
        }

        form {
            max-width: 900px;
            width: 100%;
            padding: 20px;
            background-color: black;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            margin-top: 10px;
        }

        @media (min-width: 992px) {
            .row {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .col-md-4,
            .col-md-6 {
                margin-bottom: 15px;
            }

            .col-md-4 {
                flex: 0 0 32%;
                max-width: 32%;
            }

            .col-md-6 {
                flex: 0 0 48%;
                max-width: 48%;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1 class="text-center w-100 bg-dark text-primary p-3 fw-bolder">REGISTRAR CLIENTE</h1>
        <div class="col-sm-8 col-mt-5 rounded-1">
            <form method="POST" class="shadow-lg p-5">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. David"
                            style="color:aqua;">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="apePat" class="form-label">Apellido Paterno:</label>
                        <input type="text" class="form-control" id="apePat" name="apePat" placeholder="Ej. Quispe"
                            style="color:aqua;">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="apeMat" class="form-label">Apellido Materno:</label>
                        <input type="text" class="form-control" id="apeMat" name="apeMat" placeholder="Ej. Mamani"
                            style="color:aqua;">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="ci" class="form-label">Cédula de Identidad:</label>
                        <input type="text" class="form-control" id="ci" name="ci" placeholder="Ej. 10954490"
                            style="color:aqua;">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="usuario" class="form-label">Nombre de Usuario:</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ej. Dav"
                            style="color:aqua;">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Ej. abel12" style="color:aqua;">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="fechaNac" class="form-label">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fechaNac" name="fechaNac"
                            placeholder="Ej. 19/07/2024" style="color:aqua;">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Ej. ejemplo@gmail.com" style="color:aqua;">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono"
                            placeholder="Ej. 73252747" style="color:aqua;">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="direccion" class="form-label">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion"
                            placeholder="Ej. Calle Falsa 123" style="color:aqua;">
                    </div>
                </div>
                <input type="submit" name="registraCliente" value="Registrar" class="btn btn-primary">
                <a href="../vista/principal.php" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
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
</body>

</html>
