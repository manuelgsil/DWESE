<?php
include 'logicaphp\Pokemon.php';

// Lee el contenido serializado del archivo
$serializedPokemons = file_get_contents('logicaphp/filtradoCSV/pokemon_data.txt');

// Deserializa el array de Pokémon
$arrayPokemons = unserialize($serializedPokemons);

Pokemon::displayPokemonTable($arrayPokemons);

?>