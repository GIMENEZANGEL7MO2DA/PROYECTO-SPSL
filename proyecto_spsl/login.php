<?php
session_start();
require 'includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Verificar si el usuario existe en la tabla de correos o teléfonos y obtener su ID de ingreso
    $sql = "SELECT ingreso_usuario.contraseña, ingreso_usuario.id_ingreso 
            FROM ingreso_usuario
            LEFT JOIN correo_creacion ON ingreso_usuario.id_correo = correo_creacion.id_correo
            LEFT JOIN telefono_creacion ON ingreso_usuario.id_telefono = telefono_creacion.id_telefono
            WHERE correo_creacion.dir_correo = ? OR telefono_creacion.numtelefono = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_contraseña, $id_ingreso);
        $stmt->fetch();

        if (password_verify($contraseña, $hashed_contraseña)) {
            $_SESSION['user_id'] = $id_ingreso;
            header("Location: paginaprincipal.php"); // Redirige a la página principal
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<!-- Formulario de inicio de sesión -->
<form action="login.php" method="POST">
    <label>Correo o Teléfono:</label>
    <input type="text" name="usuario" required><br>
    <label>Contraseña:</label>
    <input type="password" name="contraseña" required><br>
    <button type="submit">Iniciar sesión</button>
</form>
