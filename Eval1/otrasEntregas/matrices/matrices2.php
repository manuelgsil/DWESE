<!DOCTYPE html>
<html>

<head>
    <title>Operaciones con matrices</title>
</head>

<body>
    <?php
    // Definir dos matrices de dimensiones 3x3
    $matriz1 = array(
        array(1, 2, 3),
        array(4, 5, 6),
        array(7, 8, 9)
    );

    $matriz2 = array(
        array(9, 8, 7),
        array(6, 5, 4),
        array(3, 2, 1)
    );

    // Mostrar las matrices definidas
    echo "<h2>Matriz 1:</h2>";
    mostrarMatriz($matriz1);

    echo "<h2>Matriz 2:</h2>";
    mostrarMatriz($matriz2);
    echo "<br>";
    // Función para mostrar una matriz
    function mostrarMatriz($matriz)
    {
        echo "<table border='1'>";
        foreach ($matriz as $fila) {
            echo "<tr>";
            foreach ($fila as $elemento) {
                echo "<td>" . $elemento . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    function sumarMatrices($matriz1, $matriz2)
    {
        $filas = count($matriz1);
        $columnas = count($matriz1[0]);
        $matrizSuma = array_fill(0, $filas, array_fill(0, $columnas, 0));

        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $columnas; $j++) {
                $matrizSuma[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
            }
        }

        return $matrizSuma;
    }

    function multiplicarMatrices($matriz1, $matriz2)
    {
        $filas = count($matriz1);
        $columnas = count($matriz1[0]);
        $matrizMultiplicacion = array_fill(0, $filas, array_fill(0, $columnas, 0));
    
        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $columnas; $j++) {
                $matrizMultiplicacion[$i][$j] = $matriz1[$i][$j] * $matriz2[$i][$j];
            }
        }
    
        return $matrizMultiplicacion;
    }    
    

    
    
    
    ?>


    <form method="post">
        <button type="submit" name="operacion" value="suma">Sumar matrices</button>
        <button type="submit" name="operacion" value="multiplicacion">Multiplicar matrices</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $resultado;
        $tipoOperacion = $_POST["operacion"];
        switch ($tipoOperacion) {
            case 'suma':
                $resultado = sumarMatrices($matriz1, $matriz2);
                echo "<h2>Resultado de la Suma:</h2>";
                mostrarMatriz($resultado);
                break;
            case 'multiplicacion':
                $resultado = multiplicarMatrices($matriz1, $matriz2);
                echo "<h2>Resultado de la multiplicacion:</h2>";
                mostrarMatriz($resultado);
                break;
            default:
                break;
        }
    }
    ?>