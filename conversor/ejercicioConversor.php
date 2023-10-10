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
        if (isset($_POST["conversorEurPta"]) && isset($_POST["conversorPtaEur"])) {
            // Obtener los valores ingresados por el usuario
            $cantidadEuros = $_POST["conversorEurPta"];
            $cantidadPesetas = $_POST["conversorPtaEur"];

            // Por si dejan algún campo vacío
            if (!is_numeric($cantidadEuros) || !is_numeric($cantidadPesetas)) {
                echo "<p>Por favor, rellena ambos campos con información válida.</p>";
            } else {
                // Realizar las conversiones
                $resultadoEurPta = convertirEurAPta($cantidadEuros);
                $resultadoPtaEur = convertirPtaAEur($cantidadPesetas);

                // Mostrar los resultados
                echo "<p>La conversión de Euro a Peseta es: $resultadoEurPta Pesetas</p>";
                echo "<p>La conversión de Peseta a Euro es: $resultadoPtaEur Euros</p>";
            }
        }
    }

    ?>


    <form method="post">
        <fieldset>
            <legend>Conversor de Monedas</legend>
            <label for="conversorEurPta">Conversion Euro a Peseta</label>
            <input type="number" name="conversorEurPta">
            <label for="conversorPtaEur">Conversion Peseta a Euro</label>
            <input type="number" name="conversorPtaEur">
        </fieldset>
        <input type="submit" name="submit" value="Convertir">
    </form>


</body>

</html>


<!-- Ejercicio 1.

Realiza lo siguiente en una página web.

Define 2 constantes.

EurPta con valor 166.386

PtaEur con valor 1/166.386

Y te debe mostrar por pantalla lo siguiente:

Valor de la constante "EurPta": '166.386'

Valor de la constante "PtaEur": '0.0060101210438378'


Ejercicio 1b.

Utilizando las constantes anteriores, 
escribe una página con un formulario en el que se le podrá introducir una cifra 
(que serán euros o pesetas) y mediante dos botones se podrá pasar esa cifra a pesetas o a euros. -->