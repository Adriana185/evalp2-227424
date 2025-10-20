<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Borrar cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruir la sesión
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url=login.php"> <!-- Redirige en 3 segundos -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrando Sesión</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff6a00, #ee0979);
            color: #fff;
            text-align: center;
        }

        .logout-container {
            background: rgba(0,0,0,0.2);
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .loader {
            border: 6px solid rgba(255,255,255,0.3);
            border-top: 6px solid #fff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg);}
            100% { transform: rotate(360deg);}
        }

        @media(max-width: 480px){
            .logout-container { padding: 30px 20px; }
            h1 { font-size: 24px; }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h1>¡Hasta luego!</h1>
        <p>Tu sesión se está cerrando...</p>
        <div class="loader"></div>
        <p>Serás redirigido al inicio de sesión en unos segundos.</p>
    </div>
</body>
</html>
