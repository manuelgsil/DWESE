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
    ?>

    <form method="post">
        <button type="submit"
                name="operacion"
                value="suma">Sumar matrices</button>
        <button type="submit"
                name="operacion"
                value="multiplicacion">Multiplicar matrices</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $resultado;
        $tipoOperacion = $_POST["operacion"];
        switch ($tipoOperacion) {
            case 'suma':
                $resultado = sumaMatriz($matriz1) + sumaMatriz($matriz2);
                echo $resultado;
                break;
            case 'multiplicacion':
                $resultado = multiplicarMatriz($matriz1) * multiplicarMatriz($matriz2);
                echo $resultado;
                break;
            default:
                break;
        }
    }

    function sumaMatriz($matriz1)
    {
        $sumatorio = 0;
        foreach ($matriz1 as $fila) {
            foreach ($fila as $elemento) {
                $sumatorio += $elemento;
            }
        }
        return $sumatorio;
    }
    
    function multiplicarMatriz($matriz1)
    {
        $sumatorio = 1; // Inicializar en 1 
        foreach ($matriz1 as $fila) {
            foreach ($fila as $elemento) {
                $sumatorio *= $elemento; // Acumul
            }
        }
        return $sumatorio;
    }
    ?>

</body>

</html>