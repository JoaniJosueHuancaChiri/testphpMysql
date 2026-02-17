<?php
include("head.php");

// Se incluye el navbar correcto según el nivel del usuario
if ($_SESSION["nivel"] == "administrador") {
    $navbar = "encabezado1.php";
} elseif ($_SESSION["nivel"] == "cliente") {
    $navbar = "encabezado2.php";
}

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Manejo de agregar al carrito
if (isset($_POST['agregar_carrito'])) {
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$id_producto])) {
        $_SESSION['carrito'][$id_producto]['cantidad'] += $cantidad;
    } else {
        // Agregar nuevo producto al carrito
        $_SESSION['carrito'][$id_producto] = [
            'nombre' => $_POST['nombre_producto'],
            'precio' => $_POST['precio'],
            'cantidad' => $cantidad
        ];
    }
}

?>
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
            <!-- Navbar / Sidebar -->
            <div class="col-md-2">
                <?php include($navbar); ?>
            </div>
            <div class="col-md-10">
                <div class="main-panel">
                    <div class="content-wrapper catalogo-wrapper">
                        <div class="card-body">
                            <h1 style="color:aqua">Catálogo de Productos</h1>
                            <!-- Mostrar catálogo de productos -->
                            <div class="row">
                                <?php
                                if ($productos->num_rows > 0) {
                                    while ($producto = $productos->fetch_assoc()) {
                                ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <img src="../assets/images/producto/<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombreproducto']; ?>">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $producto['nombreproducto']; ?></h5>
                                                    <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                                                    <p class="card-text"><strong>Precio:</strong> <?php echo $producto['precio']; ?> USD</p>
                                                    <form method="post" action="" onsubmit="return validarStock(this)">
                                                        <input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?>">
                                                        <input type="hidden" name="nombre_producto" value="<?php echo $producto['nombreproducto']; ?>">
                                                        <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                                                        <input type="number" name="cantidad" value="1" min="1" max="<?php echo $producto['stock']; ?>" class="form-control mb-2" style="width: 80px; display:inline-block; color:aqua" data-stock="<?php echo $producto['stock']; ?>">
                                                        <button type="submit" name="agregar_carrito" class="btn btn-primary">Añadir al Carrito</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "<p>No hay productos activos disponibles.</p>";
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Mostrar carrito de compras -->
                        <div class="card mt-4">
                            <div class="card-body">
                                <h3>Carrito de Compras</h3>
                                <?php
                                if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
                                ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="color: yellow">Producto</th>
                                                <th style="color: yellow">Cantidad</th>
                                                <th style="color: yellow">Precio Unitario</th>
                                                <th style="color: yellow">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_carrito = 0;
                                            foreach ($_SESSION['carrito'] as $id => $producto_carrito) {
                                                $total = $producto_carrito['precio'] * $producto_carrito['cantidad'];
                                                $total_carrito += $total;
                                            ?>
                                                <tr style="color: aqua">
                                                    <td><?php echo $producto_carrito['nombre']; ?></td>
                                                    <td><?php echo $producto_carrito['cantidad']; ?></td>
                                                    <td><?php echo $producto_carrito['precio']; ?> USD</td>
                                                    <td><?php echo $total; ?> USD</td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <h4>Total del Carrito: <?php echo $total_carrito; ?> USD</h4>
                                    <form method="post" action="finalizarCompra.php">
                                        <button type="submit" class="btn btn-success">Finalizar Compra</button>
                                    </form>
                                <?php
                                } else {
                                    echo "<p>El carrito está vacío.</p>";
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
            <script>
                function validarStock(form) {
                    var stockDisponible = form.querySelector('input[name="cantidad"]').getAttribute('data-stock');
                    var cantidadSolicitada = form.querySelector('input[name="cantidad"]').value;

                    if (parseInt(cantidadSolicitada) > parseInt(stockDisponible)) {
                        alert("La cantidad solicitada supera el stock disponible.");
                        return false; // Detiene el envío del formulario
                    }
                    return true; // Permite el envío del formulario
                }
            </script>

        </div>
    </div>
</body>

</html>