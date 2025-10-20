<?php
session_start();
$error = '';

$usuario_valido = 'admin@clinica.com';
$pass_valida = '123456';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $usuario_valido && $password === $pass_valida) {
        $_SESSION['user'] = $email;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="w-full max-w-md bg-white shadow-xl rounded-lg p-6">
    <h2 class="text-2xl font-bold text-center mb-4">Iniciar Sesión</h2>
    <?php if ($error): ?>
        <p class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" class="w-full mb-3 p-2 border rounded" required>
        <input type="password" name="password" placeholder="Contraseña" class="w-full mb-3 p-2 border rounded" required>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white p-2 rounded w-full">Entrar</button>
    </form>
</div>
</body>
</html>
