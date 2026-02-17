<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for esta página -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for esta página -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <title>Juvenil - Registrar Producto</title>
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <form method="post" enctype="multipart/form-data" action="../controlador/productoRegistro.php">
                        <div class="card">
                            <div class="card-header bg-primary text-white mdi mdi-table-edit" style="font-size: 20px;">
                                Registrar Producto
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ID Proveedor</label>
                                    <select class="form-control" name="id_proveedor" style="color: aqua;">
                                        <?php
                                        // Incluir el archivo de conexión
                                        require_once("../modelo/conexion.php");

                                        // Crear una instancia de la conexión a la base de datos
                                        $db = new Conexion();

                                        // Consultar la lista de proveedores
                                        $query = "SELECT id_proveedor, empresa FROM proveedor";
                                        $result = $db->query($query);

                                        // Verificar si se encontraron resultados
                                        if ($result->num_rows > 0) {
                                            // Iterar sobre los resultados y crear las opciones del select
                                            while ($row = $result->fetch_assoc()) {
                                                $id_proveedor = $row['id_proveedor'];
                                                $empresa = $row['empresa'];
                                                echo "<option value='$id_proveedor'>$empresa</option>";
                                            }
                                        } else {
                                            echo "<option value=''>No hay proveedores registrados</option>";
                                        }

                                        // Liberar el resultado y cerrar la conexión
                                        $result->free();
                                        $db->close();
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nombre del Producto</label>
                                    <input type="text" class="form-control" name="nombreproducto" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select class="form-control" name="estado" style="color: aqua;">
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" name="precio" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" class="form-control" name="stock" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Tipo</label>
                                    <input type="text" class="form-control" name="tipo" style="color: aqua;">
                                </div>
                                <div class="form-group">
                                    <label>Imagen</label>
                                    <input type="file" class="form-control-file" name="imagen" style="color: aqua;">
                                </div>
                                <input type="submit" name="registrarProducto" value="Registrar Producto"
                                    class="btn btn-primary">
                                <a href="../controlador/productoLista.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
