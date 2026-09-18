<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa Tecnológica</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
        }

        .contenedor {
            width: 90%;
            max-width: 700px;
            margin: 100px auto;
            background: white;
            padding: 50px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        h1 {
            margin-bottom: 10px;
            color: #1e293b;
        }

        p {
            color: #64748b;
            margin-bottom: 35px;
        }

        .botones {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .boton {
            display: inline-block;
            min-width: 200px;
            padding: 15px 25px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.2s;
        }

        .boton:hover {
            background: #1d4ed8;
        }

        .boton.lista {
            background: #16a34a;
        }

        .boton.lista:hover {
            background: #15803d;
        }
    </style>
</head>

<body>

    <div class="contenedor">

        <h1>Registro de Usuarios</h1>

        <p>Empresa Tecnológica</p>

        <div class="botones">

            <a href="index.php?pagina=registro" class="boton">
                Registrar
            </a>

            <a href="index.php?pagina=usuarios" class="boton lista">
                Lista de usuarios
            </a>

        </div>

    </div>

</body>

</html>