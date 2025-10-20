<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Figuras</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        form { margin-bottom: 20px; }
        input[type="number"] { width: 100px; }
        .result { margin-top: 20px; font-weight: bold; }
        .container { display: flex; gap: 50px; }
        .box { border: 1px solid #ccc; padding: 20px; border-radius: 8px; }
    </style>
</head>
<body>
    <h1>Calculadora de Figuras</h1>
    <div class="container">
        <!-- Cilindro -->
        <div class="box">
            <h2>Cilindro</h2>
            <form method="post">
                <label>Radio: <input type="number" step="0.01" name="c_radio" required></label><br><br>
                <label>Altura: <input type="number" step="0.01" name="c_altura" required></label><br><br>
                <input type="submit" name="calcular_cilindro" value="Calcular">
            </form>

            <?php
            if (isset($_POST['calcular_cilindro'])) {
                $r = floatval($_POST['c_radio']);
                $h = floatval($_POST['c_altura']);
                $area = 2 * pi() * $r * ($r + $h);
                $volumen = pi() * $r * $r * $h;
                echo "<div class='result'>Área: " . round($area, 2) . "<br>Volumen: " . round($volumen, 2) . "</div>";
            }
            ?>
        </div>

        <!-- Rectángulo -->
        <div class="box">
            <h2>Rectángulo</h2>
            <form method="post">
                <label>Largo: <input type="number" step="0.01" name="r_largo" required></label><br><br>
                <label>Ancho: <input type="number" step="0.01" name="r_ancho" required></label><br><br>
                <input type="submit" name="calcular_rectangulo" value="Calcular">
            </form>

            <?php
            if (isset($_POST['calcular_rectangulo'])) {
                $l = floatval($_POST['r_largo']);
                $a = floatval($_POST['r_ancho']);
                $area = $l * $a;
                $perimetro = 2 * ($l + $a);
                echo "<div class='result'>Área: " . round($area, 2) . "<br>Perímetro: " . round($perimetro, 2) . "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
