<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Bienvenido al sistema SPSL</h1>
<p>Has iniciado sesión correctamente.</p>
<a href="logout.php">Cerrar sesión</a>
