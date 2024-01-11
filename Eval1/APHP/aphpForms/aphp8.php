<!-- Escribe un programa que calcule el salario semanal de un trabajador en base a las horas trabajadas.
Se pagarán 12 euros por hora. -->

<?php
$hSemanales = "";
$totalSalario = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["hSemanales"])) {
        $hSemanales = $_POST["hSemanales"];
    }
    define("PAGO_HORA", 12);

    function calcularSalario()
    {
        global $hSemanales, $totalSalario; // llamamos a las variables definidas fuera del ambito local 

        /*   $totalSalario = $hSemanales > 0 && $hSemanales <= 40 ? $hSemanales * PAGO_HORA : "Error las horas semaneles deben estar..."; */

        if ($hSemanales > 0 && $hSemanales <= 40) {
            $totalSalario = $hSemanales * PAGO_HORA;
        } else {
            $totalSalario = "Error: Las horas semanales deben estar entre 1 y 40.";
        }
        return $totalSalario;
    }
    $resultadoSalario = calcularSalario();
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APHP 8</title>
</head>

<body>
    <form action="#" method="post">
        <label for="hSemanales">Introduzca sus horas a la semana</label>
        <input type="number" name="hSemanales">
        <input type="submit" value="enviar">
    </form>

    <!-- Mostrar el resultado solo después de enviar el formulario -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <p>Salario Semanal: <?php echo  $resultadoSalario; ?></p>
    <?php endif; ?>

</body>

</html>