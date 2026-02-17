<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg"
                        alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <<?php
                                $directorio = "storage/users/";
                                // Verificar si 'id' está definido en $uActivo y no es nulo
                                if (isset($uActivo['id'])) {
                                    $id = $uActivo['id'];
                                    $nombre_archivo = $id . '.jpg';

                                    // Verificar si el archivo existe antes de mostrar la imagen
                                    if (file_exists($directorio . $nombre_archivo)) {
                                        echo 'img class="img-xs rounded-circle" src="' . $directorio . $nombre_archivo . '?' . time() . '" alt="Imagen de perfil">';
                                    } else {
                                        echo 'Error: El archivo ' . $nombre_archivo . ' no existe en ' . $directorio;
                                    }
                                } else {
                                    echo 'Error: No se encontró la información de usuario.';
                                }

                                ?>
                            <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">
                                    <?= $uActivo['nombre'] ?>
                                </h5>
                                <?php if ($uActivo['rol'] == 'A') { ?>
                                    <span>Administrador</span>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="inicio.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <?php
                if ($uActivo['rol'] == 'A') {
                    ?>
                    <li class="nav-item menu-items">
                        <a class="nav-link" data-toggle="collapse" href="#usuarios" aria-expanded="false"
                            aria-controls="cadenas">
                            <span class="menu-icon">
                                <i class="mdi mdi-account-multiple"></i>
                            </span>
                            <span class="menu-title">Administracion</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="usuarios">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="user_show.php"> Usuarios </a></li>
                            </ul>
                        </div>
                    </li>
                    <?php
                }
                ?>

                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#productos" aria-expanded="false"
                        aria-controls="cadenas">
                        <span class="menu-icon">
                            <i class="mdi mdi-cart-outline"></i>
                        </span>
                        <span class="menu-title">Productos</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="productos">
                        <ul class="nav flex-column sub-menu">
                            <?php
                            if ($uActivo['rol'] == 'A' || $uActivo['rol'] == 'O') {
                                ?>
                                <li class="nav-item"> <a class="nav-link" href="product_create.php"> Crear
                                    </a></li>
                                <?php
                            }
                            ?>
                            <li class="nav-item"> <a class="nav-link" href="product_show.php"> Show </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#proveedores" aria-expanded="false"
                        aria-controls="cadenas">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-card-details"></i>
                        </span>
                        <span class="menu-title">Proveedores</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="proveedores">
                        <ul class="nav flex-column sub-menu">
                            <?php
                            if ($uActivo['rol'] == 'A' || $uActivo['rol'] == 'O') {
                                ?>
                                <li class="nav-item"> <a class="nav-link" href="proveedores_create.php"> Crear
                                    </a></li>
                                <?php
                            }
                            ?>
                            <li class="nav-item"> <a class="nav-link" href="proveedores_show.php"> Show </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#clientes" aria-expanded="false"
                        aria-controls="cadenas">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-multiple"></i>
                        </span>
                        <span class="menu-title">Clientes</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="clientes">
                        <ul class="nav flex-column sub-menu">
                            <?php
                            if ($uActivo['rol'] == 'A' || $uActivo['rol'] == 'O') {
                                ?>
                                <li class="nav-item"> <a class="nav-link" href="clientes_create.php"> Crear
                                    </a></li>
                                <?php
                            }
                            ?>
                            <li class="nav-item"> <a class="nav-link" href="clientes_show.php"> Show </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#solicitudes" aria-expanded="false"
                        aria-controls="cadenas">
                        <span class="menu-icon">
                            <i class="mdi mdi-table-large"></i>
                        </span>
                        <span class="menu-title">Solicitudes</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="solicitudes">
                        <ul class="nav flex-column sub-menu">
                            <?php
                            if ($uActivo['rol'] == 'A' || $uActivo['rol'] == 'O') {
                                ?>
                                <li class="nav-item"> <a class="nav-link" href="solicitudes_create.php"> Crear
                                    </a></li>
                                <?php
                            }
                            ?>
                            <li class="nav-item"> <a class="nav-link" href="solicitudes_show.php"> Show </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#categorias" aria-expanded="false"
                        aria-controls="cadenas">
                        <span class="menu-icon">
                            <i class="mdi mdi-table"></i>
                        </span>
                        <span class="menu-title">Categorias</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="categorias">
                        <ul class="nav flex-column sub-menu">
                            <?php
                            if ($uActivo['rol'] == 'A' || $uActivo['rol'] == 'O') {
                                ?>
                                <li class="nav-item"> <a class="nav-link" href="categorias_create.php"> Crear
                                    </a></li>
                                <?php
                            }
                            ?>
                            <li class="nav-item"> <a class="nav-link" href="categorias_show.php"> Show </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#gastos" aria-expanded="false"
                        aria-controls="cadenas">
                        <span class="menu-icon">
                            <i class="mdi mdi-cash-usd"></i>
                        </span>
                        <span class="menu-title">Gastos</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="gastos">
                        <ul class="nav flex-column sub-menu">
                            <?php
                            if ($uActivo['rol'] == 'A' || $uActivo['rol'] == 'O') {
                                ?>
                                <li class="nav-item"> <a class="nav-link" href="gastos_create.php"> Crear
                                    </a></li>
                                <?php
                            }
                            ?>
                            <li class="nav-item"> <a class="nav-link" href="gastos_show.php"> Show </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#reportes" aria-expanded="false"
                        aria-controls="cadenas">
                        <span class="menu-icon">
                            <i class="mdi mdi-chart-areaspline"></i>
                        </span>
                        <span class="menu-title">Reportes</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="reportes">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="reportes_show.php"> Show </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" data-toggle="collapse" href="#productos" aria-expanded="false"
                        aria-controls="cadenas">
                        <span class="menu-icon">
                            <i class="mdi mdi-cart-outline"></i>
                        </span>
                        <span class="menu-title">Tarea 1 2024</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="productos">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="producto_show.php"> Producto </a>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="categoria_show.php"> Categoria </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <<?php
                                    $directorio = "storage/users/";
                                    // Verificar si 'id' está definido en $uActivo y no es nulo
                                    if (isset($uActivo['id'])) {
                                        $id = $uActivo['id'];
                                        $nombre_archivo = $id . '.jpg';

                                        // Verificar si el archivo existe antes de mostrar la imagen
                                        if (file_exists($directorio . $nombre_archivo)) {
                                            echo 'img class="img-xs rounded-circle" src="' . $directorio . $nombre_archivo . '?' . time() . '" alt="Imagen de perfil">';
                                        } else {
                                            echo 'Error: El archivo ' . $nombre_archivo . ' no existe en ' . $directorio;
                                        }
                                    } else {
                                        echo 'Error: No se encontró la información de usuario.';
                                    }

                                    ?>
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                            <?= $uActivo['usuario'] ?>
                                        </p>
                                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="user_edit.php?id=<?= $uActivo['id'] ?>">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Settings</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="logout.php">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <p class="p-3 mb-0 text-center">Advanced settings</p>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>