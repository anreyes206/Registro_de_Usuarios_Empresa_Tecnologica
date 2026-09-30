<?php
require_once __DIR__ . '/../config/database.php';

abstract class modelo
{
    protected $conexion;

    public function __construct()
    {
        $this->conexion = Database::conectar();
    }
}
?>