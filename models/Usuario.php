<?php

require_once __DIR__ . '/modelo.php';

class Usuario extends modelo {
    
    public function registrar(
        string $dni,
        string $nombre_completo, 
        string $correo, 
        string $password, 
        string $telefono, 
        string $cargo, 
        string $estado
        ): bool {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (dni, nombre_completo, password, correo, telefono, cargo, estado)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("sssssss", $dni, $nombre_completo, $correo, $password, $telefono, $cargo, $estado);
        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }

    public function obtenerTodos(): array
    {
        $sql = "SELECT id, dni, nombre_completo, correo, telefono, cargo, estado, fecha_registro
                FROM usuarios
                ORDER BY id DESC";

        $resultado = $this->conexion->query($sql);
        $usuarios = [];

        if ($resultado) {
            $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
            }

        return $usuarios;
    }

    public function obtenerPorId($id): ?array
    {
        $sql = "SELECT * FROM usuarios WHERE id = ?";

        $stmt = $this->conexion->prepare($sql);

        if (!$stmt) {
            return null;
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
        $stmt->close();

        return $usuario ?: null;
    }

    public function eliminar(int $id): bool
    {
        $sql = "DELETE FROM usuarios WHERE id = ?";

        $stmt = $this->conexion->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("i", $id);
        $resultado = $stmt->execute();
        $stmt->close();

        return $resultado;
    }
}
?>