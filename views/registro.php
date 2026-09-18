<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Usuarios</title>

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
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
        }

        h1,
        h2 {
            color: #1e293b;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            margin-top: 40px;
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
        }

        .formulario {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .campo {
            display: flex;
            flex-direction: column;
        }

        .campo.completo {
            grid-column: 1 / 3;
        }

        label {
            font-weight: bold;
            margin-bottom: 6px;
            color: #334155;
        }

        input,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
        }

        .guardar {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 6px;
            background: #16a34a;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .guardar:hover {
            background: #15803d;
        }

        .mensaje {
            padding: 13px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
        }

        .exito {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .tabla {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
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

        .tabla-contenedor {
            overflow-x: auto;
        }

        @media (max-width: 700px) {
            .formulario {
                grid-template-columns: 1fr;
            }

            .campo.completo {
                grid-column: 1;
            }

            .contenedor {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="contenedor">

        <div class="navegacion">
            <a href="index.php" class="boton">
                Volver al inicio
            </a>
        </div>

        <h1>Registro de Usuario</h1>

        <?php if (isset($_GET["mensaje"]) && $_GET["mensaje"] == "exito"): ?>

            <div class="mensaje exito">
                Usuario registrado correctamente.
            </div>

        <?php endif; ?>

        <?php if (isset($_GET["error"])): ?>

            <div class="mensaje error">

                <?php

                switch ($_GET["error"]) {

                    case "campos":
                        echo "Complete todos los campos obligatorios.";
                        break;

                    case "dni":
                        echo "El DNI debe contener exactamente 8 números.";
                        break;

                    case "correo":
                        echo "Ingrese un correo electrónico válido.";
                        break;

                    case "password":
                        echo "La contraseña debe tener mínimo 6 caracteres.";
                        break;

                    case "duplicado":
                        echo "El DNI o el correo ya se encuentran registrados.";
                        break;

                    case "cargo":
                        echo "El cargo seleccionado no es válido.";
                        break;

                    case "estado":
                        echo "El estado seleccionado no es válido.";
                        break;

                    default:
                        echo "Ocurrió un error al registrar el usuario.";
                        break;
                }

                ?>

            </div>

        <?php endif; ?>

        <form
            action="index.php?accion=registrar"
            method="POST"
            class="formulario">

            <div class="campo">
                <label for="dni">DNI:</label>

                <input
                    type="text"
                    id="dni"
                    name="dni"
                    maxlength="8"
                    pattern="[0-9]{8}"
                    required>
            </div>

            <div class="campo">
                <label for="nombre_completo">Nombre completo:</label>

                <input
                    type="text"
                    id="nombre_completo"
                    name="nombre_completo"
                    maxlength="100"
                    required>
            </div>

            <div class="campo">
                <label for="correo">Correo:</label>

                <input
                    type="email"
                    id="correo"
                    name="correo"
                    maxlength="150"
                    required>
            </div>

            <div class="campo">
                <label for="password">Contraseña:</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    minlength="6"
                    required>
            </div>

            <div class="campo">
                <label for="telefono">Teléfono:</label>

                <input
                    type="text"
                    id="telefono"
                    name="telefono"
                    maxlength="20">
            </div>

            <div class="campo">
                <label for="cargo">Cargo:</label>

                <select id="cargo" name="cargo" required>

                    <option value="programador">
                        Programador
                    </option>

                    <option value="jefe">
                        Jefe
                    </option>

                    <option value="soporte_tecnico">
                        Soporte técnico
                    </option>

                    <option value="disenador">
                        Diseñador
                    </option>

                    <option value="rrhh">
                        RRHH
                    </option>

                </select>
            </div>

            <div class="campo">
                <label for="estado">Estado:</label>

                <select id="estado" name="estado" required>

                    <option value="activo">
                        Activo
                    </option>

                    <option value="inactivo">
                        Inactivo
                    </option>

                </select>
            </div>

            <div class="campo completo">

                <button
                    type="submit"
                    class="guardar">
                    Guardar usuario
                </button>

            </div>

        </div>

    </div>

</body>

</html>