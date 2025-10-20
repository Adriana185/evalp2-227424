<?php 
session_start(); 

define('USUARIO_CORRECTO', 'admin'); 
define('PASSWORD_CORRECTO', '12345'); 

$error_message = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $usuario = $_POST['usuario'] ?? ''; 
    $password = $_POST['password'] ?? ''; 

    if ($usuario === USUARIO_CORRECTO && $password === PASSWORD_CORRECTO) { 
        $_SESSION['loggedin'] = true; 
        $_SESSION['username'] = $usuario; 
        header('Location: dashboard.php'); 
        exit; 
    } else { 
        $error_message = '⚠️ Error: Usuario o contraseña incorrectos.'; 
    } 
} 

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { 
    header('Location: dashboard.php'); 
    exit; 
} 
?> 

<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title> 
    <style>
        /* Reset básico */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6b73ff, #000dff);
            color: #333;
        }

        .login-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #6b73ff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #5a63e0;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }

        .info {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        @media(max-width: 480px) {
            .login-container { padding: 30px 20px; }
        }
    </style>
</head> 
<body> 
    <div class="login-container">
        <h1>Inicio de Sesión</h1> 

        <?php if ($error_message): ?> 
            <p class="error-message"><?php echo $error_message; ?></p> 
        <?php endif; ?> 

        <form action="login.php" method="POST"> 
            <div> 
                <label for="usuario">Usuario:</label> 
                <input type="text" id="usuario" name="usuario" required> 
            </div> 
            <div> 
                <label for="password">Contraseña:</label> 
                <input type="password" id="password" name="password" required> 
            </div> 
            <button type="submit">Entrar</button> 
        </form> 


    </div>
</body> 
</html>
