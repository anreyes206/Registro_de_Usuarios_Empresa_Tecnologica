<?php
class Database {
    public static function conectar() {
        $config = require __DIR__ . '/config.php';
        
        try {
            $conexion = new mysqli(
            $config['host'],
            $config['usuario'],
            $config['password'],
            $config['base_datos']
        );

        $conexion->set_charset("utf8mb4");
        
        return $conexion;

    } catch (mysqli_sql_exception $e){
        error_log('Error de conexión: ' . $e->getMessage());
        http_response_code(500);      
        die('No se pudo conectar con la base de datos.');
        }
    }
}
?>
