<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<h1>Bienvenido, <?= $_SESSION['user'] ?></h1>
<a href="logout.php">Cerrar sesión</a>
