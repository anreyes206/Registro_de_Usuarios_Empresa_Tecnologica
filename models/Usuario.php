<?php
class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function registrar($dni, $nombre_completo, $correo, $password, $telefono, $cargo, $estado)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios
                (dni, nombre_completo, correo, password, telefono, cargo, estado)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            "sssssss",
            $dni,
            $nombre_completo,
            $correo,
            $password,
            $telefono,
            $cargo,
            $estado
        );

        $resultado = $stmt->execute();

        $stmt->close();

        return $resultado;
    }

    public function obtenerTodos()
    {
        $sql = "SELECT id, dni, nombre_completo, correo, password,
                       telefono, cargo, estado, fecha_registro
                FROM usuarios
                ORDER BY id DESC";

        $resultado = $this->conexion->query($sql);

        $usuarios = [];

        if ($resultado) {
            while ($fila = $resultado->fetch_assoc()) {
                $usuarios[] = $fila;
            }
        }

        return $usuarios;
    }

    public function obtenerPorId($id)
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

        return $usuario;
    }

    public function eliminar($id)
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