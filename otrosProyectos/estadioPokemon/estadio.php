<?php
include 'logicaphp\Pokemon.php';

// Lee el contenido serializado del archivo
$serializedPokemons = file_get_contents('logicaphp/filtradoCSV/pokemon_data.txt');

// Deserializa el array de Pokémon
$arrayPokemons = unserialize($serializedPokemons);

Pokemon::displayPokemonTable($arrayPokemons);

/* echo '<table border="1">';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Nombre</th>';
echo '<th>Tipo 1</th>';
echo '<th>Tipo 2</th>';
echo '<th>Total</th>';
echo '<th>HP</th>';
echo '<th>Ataque</th>';
echo '<th>Defensa</th>';
echo '<th>Sp. Atk</th>';
echo '<th>Sp. Def</th>';
echo '<th>Velocidad</th>';
echo '<th>Generación</th>';
echo '<th>Legendario</th>';
echo '<th>URL del sprite</th>';
echo '</tr>';

foreach ($arrayPokemons as $pokemon) {
    echo '<tr>';
    echo '<td>' . $pokemon->getId() . '</td>';
    echo '<td>' . $pokemon->getName() . '</td>';
    echo '<td>' . $pokemon->getType1() . '</td>';
    echo '<td>' . $pokemon->getType2() . '</td>';
    echo '<td>' . $pokemon->getTotal() . '</td>';
    echo '<td>' . $pokemon->getHp() . '</td>';
    echo '<td>' . $pokemon->getAttack() . '</td>';
    echo '<td>' . $pokemon->getDefense() . '</td>';
    echo '<td>' . $pokemon->getSpAtk() . '</td>';
    echo '<td>' . $pokemon->getSpDef() . '</td>';
    echo '<td>' . $pokemon->getSpeed() . '</td>';
    echo '<td>' . $pokemon->getGeneration() . '</td>';
    echo '<td>' . ($pokemon->isLegendary() ? 'Sí' : 'No') . '</td>';
    echo '<td><img src="' . $pokemon->getSpriteUrl() . '"></td>';
    echo '</tr>';
}

echo '</table>'; */