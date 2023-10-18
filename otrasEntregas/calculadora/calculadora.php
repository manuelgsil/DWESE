<!-- a) Implementar una calculadora que realice las operaciones de sumar, restar, multiplicar y dividir.


b) Realizar la implementación anterior teniendo en cuenta  que el nombre de la función es calculadora y tiene 3 argumentos:


nombre de la función que realiza el cálculo
valor de entrada 1
valor de entrada 2. -->
<?php
$resultado="";
// Primero, procedemos a definir las funciones de la calculadora. Para ello usamos arrowFunctions de php
// suma
$suma = fn ($a, $b) => $a + $b;


// Resta
$resta = fn ($a, $b) =>  $a - $b;

// Multiplicación
$multiplicacion = fn ($a, $b) => $a * $b;


// División
/* $division = fn($a, $b) => $a / $b; */ // arrowFunction de division, desarollamos funcion completa para poder controlar las divisiones entre 0.
function dividir($a, $b) // no se me ocurre una forma de reducir esto. *Preguntar* 
{
    $resultado = "";
    if ($a == 0 || $b == 0) {
        $resultado = "No puedes dividir entre cero";
    } else {
        $resultado = $a / $b;
    }
    return $resultado;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor1 = $_POST["valor1"];
    $valor2 = $_POST["valor2"];
    $operacion = $_POST["operacion"];

    $flag = is_numeric($valor1) && is_numeric($valor2); // si no es numerico, será false

    if ($flag) { //  Esto añade robustez a la validacion de datos, ya que existen formas de saltar las restricciones de html
        switch ($operacion) {
            case "suma":
                $resultado = $suma($valor1, $valor2);
                break;
            case "resta":
                $resultado = $resta($valor1, $valor2);
                break;
            case "multiplicacion":
                $resultado = $multiplicacion($valor1, $valor2);
                break;
            case "division":
                $resultado = dividir($valor1, $valor2);
                break;
        }
        
        if (!is_string($resultado)) {
            $numeroFormateado = number_format($resultado, 2, ',', '.');
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>

</style>

<body>

    <h1 class="title">Calculadora</h1>
    <div class="container">
        <form class="form" method="post">
            <div class="gridResult">
                <input type="text" name="result" class="result" value="<?php echo isset($numeroFormateado) ? $numeroFormateado : $resultado; ?>" readonly> <!-- Bloque if para el resultado -->
            </div>
            <div class="gridInput">

                <input type="number" name="valor1" class="input" placeholder="Valor 1" required min="0"> <!--La restriccion de tipo number se puede saltar desde el navegador-->
                <input type="number" name="valor2" class="input" placeholder="Valor 2" required min="0"> <!-- Hemos puesto min 0 para que no haya problemas con la resta (solucion superficial) -->
            </div>

            <div class="gridButton">
                <button class="button" type="submit" name="operacion" value="suma">+</button>
                <button class="button" type="submit" name="operacion" value="resta">-</button>
                <button class="button" type="submit" name="operacion" value="multiplicacion">*</button>
                <button class="button" type="submit" name="operacion" value="division">/</button> <!-- He usado Submit para todo aunque entiendo que no es lo ideal. De momento no he querido añadirle JS  -->
            </div>
        </form>
    </div>
</body>

</html>