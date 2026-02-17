<?php
class Usuario
{
    protected $id;
    protected $nombre;
    protected $apePat;
    protected $apeMat;
    protected $ci;

    protected $nombreUsuario;
    protected $contraseña;
    protected $fechaNacimiento;
    protected $tipoUsuario;
    protected $email;

    protected $estado;

    public function __construct(
        $id,
        $nombre,
        $apePat,
        $apeMat,
        $ci,
        $nombreUsuario,
        $contraseña,
        $fechaNacimiento,
        $tipoUsuario,
        $email,
        $estado
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apePat = $apePat;
        $this->apeMat = $apeMat;
        $this->ci = $ci;

        $this->nombreUsuario = $nombreUsuario;
        $this->contraseña = $contraseña;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->tipoUsuario = $tipoUsuario;
        $this->email = $email;

        $this->estado = $estado;
    }
    public function registrarUsuario()
    {
        include_once("conexion.php");
        $db = new Conexion();
        $db->query("INSERT INTO usuarios (nombreusuario, pasword, tipousuario, estado, nombre, paterno, materno, fecha, ci, email) 
        VALUES ('$this->nombreUsuario', '$this->contraseña', '$this->tipoUsuario', '$this->estado', '$this->nombre', '$this->apePat', '$this->apeMat', '$this->fechaNacimiento', '$this->ci', '$this->email')");
        return $db;
    }
    public function obtenerUsuarioLogin($email) {
        include_once("conexion.php");
        $db = new Conexion();
        
        // Realiza la consulta
        $query = $db->query("SELECT * FROM usuarios WHERE email = '$email'");
        return $query;
    }    
    public function verificar()
    {
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM usuarios WHERE email='$this->email' and pasword='$this->contraseña'");
        return ($sql);
    }

}

class Cliente extends Usuario
{
    private $idCliente;
    private $razon;
    private $nit;

    public function __construct(
        $id,
        $nombre,
        $apePat,
        $apeMat,
        $ci,
        $nombreUsuario,
        $contraseña,
        $fechaNacimiento,
        $tipoUsuario,
        $email,
        $estado,
        $idCliente,
        $razon,
        $nit
    ) {
        parent::__construct(
            $id,
            $nombre,
            $apePat,
            $apeMat,
            $ci,
            $nombreUsuario,
            $contraseña,
            $fechaNacimiento,
            $tipoUsuario,
            $email,
            $estado
        );
        $this->idCliente = $idCliente;
        $this->razon = $razon;
        $this->nit = $nit;
    }

    public function registrarCliente()
    {
        // Registrar el usuario primero
        $db = parent::registrarUsuario();
        $idUsuario = mysqli_insert_id($db);

        // Registrar el cliente con el mismo id_usuario
        $query = $db->query("INSERT INTO cliente (id_cliente, razonsocial, nit_ci, estado) 
        VALUES ('$idUsuario', '$this->razon', '$this->nit', 'Activo')");

        return $query;
    }

}



class Administrador extends Usuario
{
    private $idAdministrador;
    public function __construct(
        $id,
        $nombre,
        $apePat,
        $apeMat,
        $ci,
        $nombreUsuario,
        $contraseña,
        $fechaNacimiento,
        $tipoUsuario,
        $email,
        $estado,
        $idAdministrador
    ) {
        parent::__construct(
            $id,
            $nombre,
            $apePat,
            $apeMat,
            $ci,
            $nombreUsuario,
            $contraseña,
            $fechaNacimiento,
            $tipoUsuario,
            $email,
            $estado
        );
        $this->idAdministrador = $idAdministrador;
    }
    public function registrarAdministrador()
    {
        $db = parent::registrarUsuario();
        // mysqli_insert_id devuelve el valor generado para una columna AUTO_INCREMENT por la última consulta    
        $idUsuario = mysqli_insert_id($db);
        // Usamos 'idadministrador' como la columna en la tabla 'administrador'
        $query = $db->query("INSERT INTO administrador (idadministrador) VALUES ('$idUsuario');");

        return $query;
    }




}
?>