<?php
class Cliente
{
    private $id;
    private $nit;
    private $razon;
    private $estado;

    public function __construct($i, $n, $ra, $es)
    {
        $this->id = $i;
        $this->nit = $n;
        $this->razon = $ra;
        $this->estado = $es;
    }

    public function grabarCliente()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("INSERT INTO cliente(nit_ci, razonsocial, estado) VALUES ('$this->nit', '$this->razon', '$this->estado')");
        return $sql;
    }

    public function listarCliente()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM cliente WHERE estado = 'Activo'");

        return ($sql);
    }

    public function listarClienteInactivos()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM cliente WHERE estado = 'Inactivo'");

        return ($sql);
    }

    public function inactivarCliente()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("update cliente set
        estado='Inactivo' where id_cliente='$this->id'");
        return ($sql);
    }
    public function editarCliente($co, $rs, $n)
    {
        $db = new Conexion();
        $sql = $db->query("UPDATE cliente set
        razonsocial='$rs',nit_ci='$n' where
        id_cliente='$co'");
        return ($sql);
    }
    public function listarClienteId()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("select * from cliente where estado='Activo' and id_cliente='$this->id' ");
        return ($sql);
    }
    public function buscarCliente($busqueda)
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("select * from cliente where razonsocial like '%$busqueda%' and estado='Activo' ");
        return ($sql);
    }
    public function reporte()
    {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM cliente WHERE estado = 'Activo'");
        return ($sql);
    }
    public function reporteIna()
    {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM cliente WHERE estado = 'Inactivo'");
        return ($sql);
    }
    public function eliminarCliente()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM cliente WHERE id_cliente='$this->id'");
        return $sql;
    }
    // Setter y Getter para el id
    public function setId($ide)
    {
        $this->id = $ide;
    }

    public function getId()
    {
        return $this->id;
    }

    // Setter y Getter para el nit
    public function setNit($n)
    {
        $this->nit = $n;
    }

    public function getNit()
    {
        return $this->nit;
    }

    // Setter y Getter para la razon
    public function setRazon($ra)
    {
        $this->razon = $ra;
    }

    public function getRazon()
    {
        return $this->razon;
    }

    // Setter y Getter para el estado
    public function setEstado($es)
    {
        $this->estado = $es;
    }

    public function getEstado()
    {
        return $this->estado;
    }
}
?>