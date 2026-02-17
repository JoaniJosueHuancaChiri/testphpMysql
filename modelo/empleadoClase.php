<?php
class Empleado
{
    private $id;
    private $id_cargo;
    private $CI;
    private $nombre;
    private $paterno;
    private $materno;
    private $direccion;
    private $telefono;
    private $fechanacimiento;
    private $genero;
    private $interes;

    // Constructor
    public function __construct($id, $id_cargo, $CI, $nombre, $paterno, $materno, $direccion, $telefono, $fechanacimiento, $genero, $interes)
    {
        $this->id = $id;
        $this->id_cargo = $id_cargo;
        $this->CI = $CI;
        $this->nombre = $nombre;
        $this->paterno = $paterno;
        $this->materno = $materno;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->fechanacimiento = $fechanacimiento;
        $this->genero = $genero;
        $this->interes = $interes;
    }
    public function grabarEmpleado()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("INSERT INTO empleado(id_cargo, CI, nombre, paterno, materno, direccion, telefono, fechanacimiento, genero, interes) VALUES ('$this->id_cargo', '$this->CI', '$this->nombre', '$this->paterno', '$this->materno', '$this->direccion', '$this->telefono', '$this->fechanacimiento', '$this->genero', '$this->interes')");
        return $sql;
    }

    public function listarEmpleado()
    {
        include ("conexion.php");
        $db = new Conexion();

        // Consulta SQL para obtener los datos de los empleados junto con el nombre del cargo
        $sql = $db->query("SELECT empleado.*, cargo.cargo AS Cargo FROM empleado INNER JOIN cargo ON empleado.id_cargo = cargo.id_cargo");

        return $sql;
    }


    public function editarEmpleado($id, $id_cargo, $CI, $nombre, $paterno, $materno, $direccion, $telefono, $fechanacimiento, $genero, $interes)
    {
        $db = new Conexion();
        // Actualiza tanto el id_cargo como los demás campos
        $sql = $db->query("UPDATE empleado SET id_cargo='$id_cargo', CI='$CI', nombre='$nombre', paterno='$paterno', materno='$materno', direccion='$direccion', telefono='$telefono', fechanacimiento='$fechanacimiento', genero='$genero', interes='$interes' WHERE id_empleado='$id'");
        return $sql;
    }


    public function eliminarEmpleado()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM empleado WHERE id_empleado='$this->id'");
        return $sql;
    }

    public function buscarEmpleado($busqueda)
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM empleado WHERE nombre LIKE '%$busqueda%' OR paterno LIKE '%$busqueda%' OR materno LIKE '%$busqueda%' OR CI LIKE '%$busqueda%'");
        return $sql;
    }

    // Getter y Setter para id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter y Setter para id_cargo
    public function getIdCargo()
    {
        return $this->id_cargo;
    }

    public function setIdCargo($id_cargo)
    {
        $this->id_cargo = $id_cargo;
    }

    // Getter y Setter para CI
    public function getCI()
    {
        return $this->CI;
    }

    public function setCI($CI)
    {
        $this->CI = $CI;
    }

    // Getter y Setter para nombre
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    // Getter y Setter para paterno
    public function getPaterno()
    {
        return $this->paterno;
    }

    public function setPaterno($paterno)
    {
        $this->paterno = $paterno;
    }

    // Getter y Setter para materno
    public function getMaterno()
    {
        return $this->materno;
    }

    public function setMaterno($materno)
    {
        $this->materno = $materno;
    }

    // Getter y Setter para direccion
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    // Getter y Setter para telefono
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    // Getter y Setter para fechanacimiento
    public function getFechaNacimiento()
    {
        return $this->fechanacimiento;
    }

    public function setFechaNacimiento($fechanacimiento)
    {
        $this->fechanacimiento = $fechanacimiento;
    }

    // Getter y Setter para genero
    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    // Getter y Setter para interes
    public function getInteres()
    {
        return $this->interes;
    }

    public function setInteres($interes)
    {
        $this->interes = $interes;
    }

}
?>