<?php
require 'includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id_creacion'])) {
    $id_creacion = $_GET['id_creacion'];
    $edad = $_POST['edad'];
    $descripcion = $_POST['descripcion'];
    $experiencia = $_POST['experiencia'];
    $formacion = $_POST['formacion'];
    $id_profesion = $_POST['profesion'];
    $id_especialidad = $_POST['especialidad'];

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO usuario_apartado (id_creacion, edad, descripcion, experiencia, formacion, id_profesion, id_especialidad) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("iisssii", $id_creacion, $edad, $descripcion, $experiencia, $formacion, $id_profesion, $id_especialidad);

    if ($stmt->execute()) {
        header("Location: pagina_principal.php");
        exit(); // Redirigir a la página principal
    } else {
        echo "Error al completar el perfil: " . $stmt->error;
    }
}

// Obtener opciones de las tablas profesion y especialidad
$profesiones = $conn->query("SELECT id_profesion, nombre_profesion FROM profesion");
$especialidades = $conn->query("SELECT id_especialidad, nombre_especialidad FROM especialidad");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Apartado</title>
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
            max-width: 500px;
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
        input[type="number"],
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input[type="number"]:focus,
        input[type="text"]:focus,
        textarea:focus,
        select:focus {
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
            input[type="number"],
            input[type="text"],
            textarea,
            select {
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
        <h2>Registro de Apartado</h2>
        <form action="registro_apartado.php?id_creacion= <? php echo $_GET['id_creacion']; ?>"method="POST"> 
            <label>Edad (opcional):</label>
            <input type="number" name="edad"><br>

            <label>Descripción personal:</label>
            <textarea name="descripcion" required></textarea><br>

            <label>Experiencia:</label>
            <textarea name="experiencia" required></textarea><br>

            <label>Formación:</label>
            <input type="text" name="formacion" required><br>

            <label>Profesión:</label>
            <select name="profesion" required>
                <option value="">Selecciona una profesión</option>
                <?php while ($row_profesion = $profesiones->fetch_assoc()): ?>
                    <option value="<?php echo $row_profesion['id_profesion']; ?>"><?php echo $row_profesion['nombre_profesion']; ?></option>
                <?php endwhile; ?>
            </select><br>

            <label>Especialidad:</label>
            <select name="especialidad" required>
                <option value="">Selecciona una especialidad</option>
                <?php while ($row_especialidad = $especialidades->fetch_assoc()): ?>
                    <option value="<?php echo $row_especialidad['id_especialidad']; ?>"><?php echo $row_especialidad['nombre_especialidad']; ?></option>
                <?php endwhile; ?>
            </select><br>

            <button type="submit">Finalizar Registro</button>
        </form>
    </div>
</body>
</html>
