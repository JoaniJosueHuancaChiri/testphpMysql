<?php
class Proveedor
{
    private $id_proveedor;
    private $empresa;
    private $contacto;
    private $mail;
    private $telefono;
    private $direccion;
    private $logo;

    // Constructor
    public function __construct($id_proveedor, $empresa, $contacto, $mail, $telefono, $direccion, $logo)
    {
        $this->id_proveedor = $id_proveedor;
        $this->empresa = $empresa;
        $this->contacto = $contacto;
        $this->mail = $mail;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->logo = $logo;
    }

    public function grabarProveedor()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("INSERT INTO proveedor(empresa, contacto, mail, telefono, direccion, logo) VALUES ('$this->empresa', '$this->contacto', '$this->mail', '$this->telefono', '$this->direccion', '$this->logo')");
        return $sql;
    }

    public function listarProveedor($id_proveedor = null)
    {
        include ("conexion.php");
        $db = new Conexion();
        if ($id_proveedor) {
            $sql = $db->query("SELECT * FROM proveedor WHERE id_proveedor = '$id_proveedor'");
        } else {
            $sql = $db->query("SELECT * FROM proveedor");
        }
        return $sql;
    }


    public function editarProveedor($id_proveedor, $empresa, $contacto, $mail, $telefono, $direccion, $logo)
    {
        include ("conexion.php");
        $db = new Conexion();
        if ($logo) {
            $sql = $db->query("UPDATE proveedor SET empresa='$empresa', contacto='$contacto', mail='$mail', telefono='$telefono', direccion='$direccion', logo='$logo' WHERE id_proveedor='$id_proveedor'");
        } else {
            $sql = $db->query("UPDATE proveedor SET empresa='$empresa', contacto='$contacto', mail='$mail', telefono='$telefono', direccion='$direccion' WHERE id_proveedor='$id_proveedor'");
        }
        return $sql;
    }



    public function eliminarProveedor()
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("DELETE FROM proveedor WHERE id_proveedor='$this->id_proveedor'");
        return $sql;
    }

    public function buscarProveedor($busqueda)
    {
        include ("conexion.php");
        $db = new Conexion();
        $sql = $db->query("select * from proveedor where empresa like '%$busqueda%'");
        return $sql;
    }
    public function reporte(){
        $db = new Conexion();
        $sql = $db->query("SELECT * from proveedor ");
        return ($sql);
    }

    // Getter y Setter para id_proveedor
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    public function setIdProveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;
    }

    // Getter y Setter para empresa
    public function getEmpresa()
    {
        return $this->empresa;
    }

    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }

    // Getter y Setter para contacto
    public function getContacto()
    {
        return $this->contacto;
    }

    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
    }

    // Getter y Setter para mail
    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
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

    // Getter y Setter para direccion
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    // Getter y Setter para logo
    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

}
?>