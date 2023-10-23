<?php
include 'logicaphp\Pokemon.php';

// Lee el contenido serializado del archivo
$serializedPokemons = file_get_contents('logicaphp/filtradoCSV/pokemon_data.txt');

// Deserializa el array de Pokémon
$arrayPokemons = unserialize($serializedPokemons);

/*  Pokemon::displayPokemonTable($arrayPokemons);
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
        <thead>
            <td colspan="5">ESTADIO POKEMON</td>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        <tfoot>
            <td colspan="5"> TENGO SUEÑO</td>
        </tfoot>
    </table>
</body>

</html>