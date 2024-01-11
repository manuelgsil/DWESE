<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero"]) && isset($_POST["opcion"])) {
    $numero = intval($_POST["numero"]); // Usamos una funcion para pasar a INT 
    $opcion = $_POST["opcion"]; // Guardamos la opcion para el switch
   
    if ($numero >= 0) { // controlamos la entrada de numeros negativos
        switch ($opcion) {
            case 'calcularFor':
                echo factorialFor($numero);
                break;

            case 'calcularWhile':
                echo factorialWhile($numero);
                break;

            case 'calcularDoWhile':
                echo factorialDoWhile($numero);
                break;

            case 'calcularRecursivo':
                echo factorialRecursivo($numero);
                break;
        }
    } else {
        echo "No admitimos valores negativos";
    }
}

function factorialFor($n)
{
    $result = 1; 
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

function factorialWhile($n)
{
    $result = 1;
    $i = 1; // contador
    while ($i <= $n) {
        $result *= $i;
        $i++;
    }
    return $result;
}

function factorialDoWhile($n)
{
    $result = 1;
    $i = 1; 
    do {
        $result *= $i;
        $i++;
    } while ($i <= $n);
    return $result;
}

function factorialRecursivo($n)
{
    $limiteFactorial = 160; // utilizamos un limitador porque si el numero es demasiado grande la funcion de recursividad se sobrecarga
    $result = "";           // con los bucles salta un indicador predefinido indicando que el resultado es INF

    if ($n < 0) {
        $result = "No definido para números negativos";
    } elseif ($n > $limiteFactorial) {
        $result = "Usa una calculadora";
    } else {
        $result = ($n <= 1) ? 1 : $n * factorialRecursivo($n - 1); // Operacion ternaria para decidir la recursividad
    }

    return $result;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Calculadora de Factorial</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Calculadora de Factorial</h1>
        <form method="post">
            <label for="numero">Ingrese un número:</label>
            <input type="number" id="numero" name="numero" required>
            <label for="opcion">Seleccione un método de cálculo:</label>
            <select id="opcion" name="opcion">
                <option value="calcularFor">For</option>
                <option value="calcularWhile">While</option>
                <option value="calcularDoWhile">Do-While</option>
                <option value="calcularRecursivo">Recursivo</option>
            </select>
            <button type="submit">Calcular Factorial</button>
        </form>
    </div>
</body>

</html>