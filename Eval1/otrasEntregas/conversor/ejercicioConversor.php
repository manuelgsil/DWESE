<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<style>
    form,
    label {
        display: block;
    }
</style>

<body>

    <?php
    // Definir las constantes
    define('EurPta', 166.386);
    define('PtaEur', 1 / 166.386);
    // Función para convertir de euros a pesetas
    function convertirEurAPta($cantidadEuros)
    {
        return $cantidadEuros * EurPta;
    }
    // Función para convertir de pesetas a euros
    // Función para convertir de pesetas a euros
    function convertirPtaAEur($cantidadPesetas)
    {
        return $cantidadPesetas * PtaEur;
    }

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["cantidad"]) && isset($_POST["conversion"])) {
            // Obtener los valores ingresados por el usuario
            $cantidad = $_POST["cantidad"];
            $conversion = $_POST["conversion"];
        }

        // Por si dejan el campo de cantidad vacío o no es numérico
        if (!is_numeric($cantidad)) {
            echo "<p>Por favor, ingresa una cantidad válida.</p>";
        } else {
            // Realizar la conversión en función del botón presionado
            $resultado = 0;
            if ($conversion === "eurToPta") {
                $resultado = convertirEurAPta($cantidad);
            } elseif ($conversion === "ptaToEur") {
                $resultado = convertirPtaAEur($cantidad);
            }
            // Mostrar los resultados
            echo "El resultado de la conversión es: $resultado";
        }
    }

    ?>


    <form method="post">
        <fieldset>
            <legend>Conversor de Monedas</legend>
            <label for="cantidad">Cantidad a Convertir</label>
            <input type="number" name="cantidad">
            <button type="submit" name="conversion" value="eurToPta">Convertir Euro a Peseta</button>
            <button type="submit" name="conversion" value="ptaToEur">Convertir Peseta a Euro</button>
        </fieldset>
    </form>


</body>

</html>