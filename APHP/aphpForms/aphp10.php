<?php
define("MB_A_KB", 1024);
define("KB_A_MB", 0.001);

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado las variables necesarias
    if (isset($_POST["cantidad"]) && isset($_POST["direccion"])) {
        $cantidad = $_POST["cantidad"];
        $tipoConversion = $_POST["direccion"];

        if (is_numeric($cantidad)) {
            // Realizar la conversión según la opción seleccionada
            switch ($tipoConversion) {
                case 'MBtoKB':
                    $resultado = number_format($cantidad * MB_A_KB, 2, ',', '.'); // Formato con 2 decimales
                    break;

                case 'KBtoMB':
                    $resultado = number_format($cantidad * KB_A_MB, 2, ',', '.'); // Formato con 2 decimales
                    break;

                default:
                    $resultado = "Opción de conversión no válida";
            }
        } else {
            $resultado = "Por favor, introduzca un valor numérico válido.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
</head>

<body>
    <h1>Conversor de MB a KB y viceversa</h1>
    <form action="#" method="post">
        <label for="cantidad">Introduzca la cantidad a convertir</label>
        <input type="number" name="cantidad" required>
        <label for="direccion">Seleccione la conversión</label>
        <select name="direccion" required>
            <option value="MBtoKB">MB a KB</option>
            <option value="KBtoMB">KB a MB</option>
        </select>
        <br>
        <button type="submit">Convertir</button>
    </form>

    <!-- Mostrar el resultado solo si está definido -->
    <?php if (!empty($resultado)) : ?>
        <p>Resultado: <?php echo $resultado; ?></p>
    <?php endif; ?>
</body>

</html>