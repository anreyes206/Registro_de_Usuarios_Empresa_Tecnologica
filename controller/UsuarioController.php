<?php
class BancoController {
    
    private $usuario;

    public function __construct() 
    {
        $this->modelo = new UsuarioModel();
    }
    
    public function registrar() 
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: index.php?pagina=registro");
            exit;
        }

        $dni = trim($_POST["dni"] ?? "");
        $nombre_completo = trim($_POST["nombre_completo"] ?? "");
        $correo = trim($_POST["correo"] ?? "");
        $password = $_POST["password"] ?? "";
        $telefono = trim($_POST["telefono"] ?? "");
        $cargo = $_POST["cargo"] ?? "programador";
        $estado = $_POST["estado"] ?? "activo";

        $cargos = [
            "jefe",
            "programador",
            "soporte_tecnico",
            "disenador",
            "rrhh"
        ];

        $estados = [
            "activo",
            "inactivo"
        ];

        if (
            empty($dni) ||
            empty($nombre_completo) ||
            empty($correo) ||
            empty($password)
        ) {
            header("Location: index.php?pagina=registro&error=campos");
            exit;
        }

        if (!preg_match("/^[0-9]{8}$/", $dni)) {
            header("Location: index.php?pagina=registro&error=dni");
            exit;
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            header("Location: index.php?pagina=registro&error=correo");
            exit;
        }

        if (strlen($password) < 6) {
            header("Location: index.php?pagina=registro&error=password");
            exit;
        }

        if (!in_array($cargo, $cargos)) {
            header("Location: index.php?pagina=registro&error=cargo");
            exit;
        }

        if (!in_array($estado, $estados)) {
            header("Location: index.php?pagina=registro&error=estado");
            exit;
        }

        try {
            $resultado = $this->usuario->registrar(
                $dni,
                $nombre_completo,
                $correo,
                $password,
                $telefono,
                $cargo,
                $estado
            );

            if ($resultado) {
                header("Location: index.php?pagina=registro&mensaje=exito");
                exit;
            }

            header("Location: index.php?pagina=registro&error=general");
            exit;

        } catch (mysqli_sql_exception $e) {

            if ($e->getCode() == 1062) {
                header("Location: index.php?pagina=registro&error=duplicado");
                exit;
            }

            header("Location: index.php?pagina=registro&error=general");
            exit;
        }
    }

    public function listar()
    {
        return $this->usuario->obtenerTodos();
    }

    public function eliminar()
    {
        if (isset($_GET["id"])) {

            $id = intval($_GET["id"]);

            if ($id > 0) {
                $this->usuario->eliminar($id);
            }
        }

        header("Location: index.php?pagina=usuarios");
        exit;
    }
}
?>