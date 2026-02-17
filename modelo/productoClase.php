<?php

class Producto
{
    private $id;
    private $id_proveedor;
    private $nombreproducto;
    private $descripcion;
    private $estado;
    private $precio;
    private $stock;
    private $tipo;
    private $imagen;

    public function __construct($i = null, $id_prov = null, $nombre = null, $desc = null, $estado = null, $precio = null, $stock = null, $tipo = null, $imagen = null)
    {
        $this->id = $i;
        $this->id_proveedor = $id_prov;
        $this->nombreproducto = $nombre;
        $this->descripcion = $desc;
        $this->estado = $estado;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->tipo = $tipo;
        $this->imagen = $imagen;
    }

    public function grabarProducto()
    {
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("INSERT INTO producto(id_proveedor, nombreproducto, descripcion, estado, precio, stock, tipo, imagen) VALUES ('$this->id_proveedor', '$this->nombreproducto', '$this->descripcion', '$this->estado', '$this->precio', '$this->stock', '$this->tipo', '$this->imagen')");
        return $sql;
    }

    public function listarProducto($id = null)
    {
        include("conexion.php");
        $db = new Conexion();
        if ($id) {
            $sql = $db->query("SELECT * FROM producto WHERE id = '$id'");
        } else {
            $sql = $db->query("SELECT * FROM producto");
        }
        return $sql;
    }

    public function editarProducto($i, $id_prov, $nombre, $desc, $estado, $precio, $stock, $tipo, $imagen)
    {
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("UPDATE producto SET id_proveedor='$id_prov', nombreproducto='$nombre', descripcion='$desc', estado='$estado', precio='$precio', stock='$stock', tipo='$tipo', imagen='$imagen' WHERE id='$i'");
        return $sql;
    }

    public function eliminarProducto()
    {
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM producto WHERE id='$this->id'");
        return $sql;
    }

    public function buscarProducto($busqueda)
    {
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM producto WHERE nombreproducto LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%'");
        return $sql;
    }
    public function mostrarProductosActivos()
    {
        include("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM producto WHERE estado = 'ACTIVO'");
        return $sql;
    }
    public function verificarStock($id, $cantidad)
    {
        include_once("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT stock FROM producto WHERE id='$id'");
        $producto = mysqli_fetch_array($sql);
        if ($producto['stock'] >= $cantidad) {
            return true; // Hay suficiente stock
        } else {
            return false; // No hay suficiente stock
        }
    }

    public function actualizarStock($id, $cantidad)
    {
        include_once("conexion.php");
        $db = new Conexion();
        // Restar el stock después de la compra
        $sql = $db->query("UPDATE producto SET stock = stock - '$cantidad' WHERE id='$id'");
        return $sql;
    }


    // Setters y Getters para los atributos
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIdProveedor($id_prov)
    {
        $this->id_proveedor = $id_prov;
    }

    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    public function setNombreProducto($nombre)
    {
        $this->nombreproducto = $nombre;
    }

    public function getNombreProducto()
    {
        return $this->nombreproducto;
    }

    public function setDescripcion($desc)
    {
        $this->descripcion = $desc;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
}
