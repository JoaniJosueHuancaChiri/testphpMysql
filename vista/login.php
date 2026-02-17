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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>

<body>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg" style="background-image: url('https://i.pinimg.com/originals/bf/cf/48/bfcf48d206e2d19c27705b476a8bfa04.gif'); 
                    background-size: cover; background-position: center;">

                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h5 class="card-title text-center mb-3">SISTEMA DE VENTAS JUVENIL</h5>
                            <h5 class="card-title text-center mb-3">INGRESO DE USUARIO</h5>
                            <form method="POST" >
                                <!-- Asegúrate de que el formulario envíe los datos a login.php -->
                                <div class="form-group">
                                    <label>Username or email</label>
                                    <input type="email" name="usr" id="usr" class="form-control"
                                        style="color:aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" name="pwd" id="pwd" class="form-control"
                                        style="color:aqua;">
                                </div>
                                <br>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" value="Ingresar" name="ingresar">
                                </div>
                                <p class="sign-up">No tienes cuenta?<a href="#"> Crear Cuenta</a></p>
                                   <span class="label label-success">
                                        <?php
                                        if (isset($_GET['error'])) {
                                            $e = $_GET['error'];
                                            if  ($e == 1) {
                                                echo 'Usuario o password incorrecto';
                                            } elseif ($e == 2) {
                                                echo 'Otro error'; // Asegúrate de manejar otros errores si es necesario
                                            }
                                        }
                                        ?>
                                    </span>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/css/maps/style.css.map"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>