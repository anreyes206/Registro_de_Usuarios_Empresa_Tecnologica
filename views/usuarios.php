<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Usuarios</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
        }

        .contenedor {
            width: 95%;
            max-width: 1400px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        h1 {
            text-align: center;
            color: #1e293b;
            margin-bottom: 30px;
        }

        .navegacion {
            margin-bottom: 25px;
        }

        .boton {
            display: inline-block;
            padding: 10px 16px;
            color: white;
            background: #2563eb;
            text-decoration: none;
            border-radius: 6px;
            margin-right: 8px;
        }

        .boton:hover {
            background: #1d4ed8;
        }

        .tabla-contenedor {
            overflow-x: auto;
        }

        .tabla {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        .tabla th,
        .tabla td {
            border: 1px solid #cbd5e1;
            padding: 10px;
            text-align: center;
            white-space: nowrap;
        }

        .tabla th {
            background: #2563eb;
            color: white;
        }

        .tabla tr:nth-child(even) {
            background: #f8fafc;
        }

        .eliminar {
            display: inline-block;
            padding: 7px 12px;
            background: #dc2626;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .eliminar:hover {
            background: #b91c1c;
        }
    </style>
</head>

<body>

    <div class="contenedor">

        <div class="navegacion">

            <a href="index.php" class="boton">
                Volver al inicio
            </a>

            <a href="index.php?pagina=registro" class="boton">
                Registrar usuario
            </a>

        </div>

        <h1>Lista de Usuarios</h1>

        <div class="tabla-contenedor">

            <table class="tabla">

                <thead>

                    <tr>
                        <th>DNI</th>
                        <th>Nombre completo</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Cargo</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if (!empty($usuarios)): ?>

                        <?php foreach ($usuarios as $usuario): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($usuario["dni"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario["nombre_completo"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario["correo"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario["telefono"] ?? "") ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario["cargo"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario["estado"]) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario["fecha_registro"]) ?>
                                </td>

                                <td>

                                    <a
                                        href="index.php?accion=eliminar&id=<?= $usuario["id"] ?>"
                                        class="eliminar"
                                        onclick="return confirm('¿Desea eliminar este usuario?');">
                                        Eliminar
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="10">
                                No hay usuarios registrados.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>