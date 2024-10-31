<?php
require 'includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['usuario_id'])) {
    $usuario_id = $_GET['usuario_id'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña']; // Usamos "contraseña" para coincidir con la base de datos
    
    // Hash de la contraseña para mayor seguridad
    $hashed_contraseña = password_hash($contraseña, PASSWORD_BCRYPT);

    // Preparar la consulta SQL para insertar el teléfono y la contraseña
    $sql = "INSERT INTO telefono_creacion (id_creacion, numtelefono, contraseña) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("iss", $usuario_id, $telefono, $hashed_contraseña);

    if ($stmt->execute()) {
        // Redirige al último paso del perfil
        header("Location: registro_apartado.php?usuario_id=" . $usuario_id);
        exit();
    } else {
        echo "Error al registrar el teléfono: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Teléfono</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #555;
            margin-bottom: 20px;
        }
        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 6px;
            display: block;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            h2 {
                font-size: 18px;
            }
            input[type="text"],
            input[type="password"] {
                font-size: 14px;
            }
            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro de Teléfono</h2>
        <form action="registro_telefono.php?usuario_id=<?php echo $_GET['usuario_id']; ?>" method="POST">
            <label>Teléfono:</label>
            <input type="text" name="telefono" required><br>

            <label>Contraseña:</label>
            <input type="password" name="contraseña" required><br>

            <button type="submit">Continuar</button>
        </form>
    </div>
</body>
</html>