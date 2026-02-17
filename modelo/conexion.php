<?php
class Conexion extends mysqli
{
    public function __construct()
    {
        parent::__construct("localhost", "root", "", "juvenil");
        if ($this->connect_error) {
            die("Error de conexión: " . $this->connect_error);
        }
    }
}
?>