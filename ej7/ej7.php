<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Salario</title>
</head>

<body>
    <h1>Calculadora de Salario</h1>

    <form method="post" action="ej7.php">
        <label for="salario">Salario:</label>
        <input type="text" name="salario" id="salario" required>
        <label for="impuesto">Impuesto (%):</label>
        <input type="text" name="impuesto" id="impuesto" required>
        <br>
        <input type="submit" name="calcularSinImpuesto" value="Calcular Salario sin Impuesto">
        <input type="submit" name="calcularConImpuesto" value="Calcular Salario con Impuesto">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $salario = $_POST["salario"];
        $impuesto = $_POST["impuesto"];

        if (is_numeric($salario) && is_numeric($impuesto)) {
            $impuesto = $impuesto / 100; // Convertir el impuesto a fracción

            if (isset($_POST["calcularSinImpuesto"])) {
                echo "El salario sin descontar el impuesto: '$salario'";
            } elseif (isset($_POST["calcularConImpuesto"])) {
                $resultado = $salario - ($salario * $impuesto);
                echo "El salario '$salario' una vez descontado: $resultado";
            }
        } else {
            echo "Por favor, ingresa valores numéricos válidos.";
        }
    }
    ?>
</body>

</html>