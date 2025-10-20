<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal</title>
    <style>
        /* Reset básico */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }

        body {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .dashboard-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #0072ff;
        }

        p {
            margin-bottom: 15px;
            font-size: 16px;
        }

        .username {
            font-weight: bold;
            color: #00c6ff;
        }

        a.logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #0072ff;
            color: #fff;
