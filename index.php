<?php
require_once 'config/conexion.php';
require_once 'models/Usuario.php';
require_once 'controllers/UsuarioController.php';

$controlador = new UsuarioController();

$pagina = $_GET["pagina"] ?? "inicio";
$accion = $_GET["accion"] ?? "";

if ($accion === "registrar") {
    $controlador->registrar();

} elseif ($accion === "eliminar") {
    $controlador->eliminar();

} elseif ($pagina === "registro") {
    $usuarios = $controlador->listar();
    require_once __DIR__ . "/views/registro.php";

} elseif ($pagina === "usuarios") {
    $usuarios = $controlador->listar();
    require_once __DIR__ . "/views/usuarios.php";

} else {
    require_once __DIR__ . "/views/inicio.php";
}
?>