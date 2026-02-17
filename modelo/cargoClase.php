<?php
class Cargo
{
    private $id;
    private $cargo;

    public function __construct($i, $c)
    {
        $this->id = $i;
        $this->cargo = $c;
    }

    public function grabarCargo()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("INSERT INTO cargo(cargo) VALUES ('$this->cargo')");
        return $sql;
    }

    public function listarCargo($id = null)
    {
        include ("conexion.php");
        $db = new Conexion();
        if ($id) {
            $sql = $db->query("SELECT * FROM cargo WHERE id_cargo = '$id'");
        } else {
            $sql = $db->query("SELECT * FROM cargo");
        }
        return $sql;
    }

    public function editarCargo($i, $c)
    {
        $db = new Conexion();
        $sql = $db->query("UPDATE cargo SET cargo='$c' WHERE id_cargo='$i'");
        return $sql;
    }

    public function eliminarCargo()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM cargo WHERE id_cargo='$this->id'");
        return $sql;
    }
    public function buscarCargo($busqueda)
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("select * from cargo where cargo like '%$busqueda%'");
        return ($sql);
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

    // Setter y Getter para el cargo
    public function setCargo($c)
    {
        $this->cargo = $c;
    }

    public function getCargo()
    {
        return $this->cargo;
    }
}
?>