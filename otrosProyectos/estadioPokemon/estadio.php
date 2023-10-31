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
    $totalCeldas = 20; // Número total de celdas en tu tabla
    $numCeldasLlenas = rand(1, $totalCeldas); // Genera un número aleatorio de celdas a llenar

    for ($fila = 0; $fila < 4; $fila++) {
        echo "<tr>";
        for ($columna = 0; $columna < 5; $columna++) {

            echo "<td>";
            if ($numCeldasLlenas > 0) {
                $pokemon = $arrayPokemons[array_rand($arrayPokemons)];
                echo '<img src="' . $pokemon->getSpriteUrl() . '">';
                $numCeldasLlenas--;
            }
            echo "</td>";

            /*  $pokemon = $arrayPokemons[array_rand($arrayPokemons)];
             echo '<td><img src="' . $pokemon->getSpriteUrl() . '"></td>';
             
             */
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