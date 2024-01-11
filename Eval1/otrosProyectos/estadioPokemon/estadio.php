<?php
include 'logicaphp\Pokemon.php';

// Lee el contenido serializado del archivo
$serializedPokemons = file_get_contents('logicaphp/filtradoCSV/pokemon_data.txt');

// Deserializa el array de Pokémon
$arrayPokemons = unserialize($serializedPokemons);

/*  Pokemon::displayPokemonTable($arrayPokemons);
 */



function generarPokemon($arrayPokemons)
{
    $totalCeldas = 20;
    $numCeldasLlenas = rand(1, $totalCeldas); /* Se me sale del indice del array */
    $indicesAleatorios = array_rand(range(0, $totalCeldas - 1), $numCeldasLlenas);

    for ($fila = 0; $fila < 4; $fila++) {
        echo "<tr>";
        for ($columna = 0; $columna < 5; $columna++) {
            /*  Para calcular el índice de una celda en una matriz bidimensional,
             se puede utilizar la siguiente fórmula: índice = (fila * número_de_columnas) + columna 
             */
            echo "<td>";
            echo in_array(($fila * 5) + $columna, $indicesAleatorios) ?
                '<img src="' . $arrayPokemons[array_rand($arrayPokemons)]->getSpriteUrl() . '">'
                : '';
            echo "</td>";
        }
        echo "</tr>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Estadio</title>
    <link rel="stylesheet"
          href="estilo.css">
</head>

<body>
    <div>
        <table border="1">
            <thead>
                <th colspan="5">ESTADIO POKEMON</th>
            </thead>
            <tbody>
                <?php generarPokemon($arrayPokemons); ?>
            </tbody>
            <tfoot>
                <td colspan="5"> TENGO SUEÑO</td>
            </tfoot>
        </table>
    </div>
    <input type="reset"
           value="resetear"
           onclick="resetearFuncion()">
</body>

<script>
    function resetearFuncion() {
        location.reload(); // Recargar la página
    }
</script>
</body>

</html>