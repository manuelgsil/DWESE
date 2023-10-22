<?php
include 'logicaphp\Pokemon.php';

// Lee el contenido serializado del archivo
$serializedPokemons = file_get_contents('logicaphp/filtradoCSV/pokemon_data.txt');

// Deserializa el array de Pokémon
$arrayPokemons = unserialize($serializedPokemons);

/* Pokemon::displayPokemonTable($arrayPokemons);
 */


?>

<!DOCTYPE html>
<html>
<head>
    <title>Estadio Pokémon</title>
</head>
<body>
    <h1>Estadio Pokémon</h1>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Stats</th>
            <th>Sprite</th>
        </tr>
        <tr>
            <?php Pokemon::pokemonAleatorio($arrayPokemons) ?> 
        </tr>
    </table>
</body>
</html>





