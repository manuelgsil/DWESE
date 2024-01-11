<?php
// Leer los datos del archivo de los Pokémon
$datosPokemon = file('pokemon.csv', FILE_IGNORE_NEW_LINES);

// Leer los datos del archivo de las URL de los sprites
$spritesPokemon = file('metadata.csv', FILE_IGNORE_NEW_LINES);

// Crear una matriz para almacenar los datos filtrados y combinados
$datosFiltrados = [];

foreach ($datosPokemon as $fila) {
    $datos = str_getcsv($fila);
    $nombrePokemon = $datos[1]; // Asi obtenemos el nombre de los pokemon (2columna)
    
    foreach ($spritesPokemon as $filaSprite ) {
        $datosSprite = str_getcsv($filaSprite);
        $urlSprite = $datosSprite[1];

        if (stripos($urlSprite, $nombrePokemon)) {
            $fila .= ',' . $urlSprite; // Se agrega a la fila existente
            break; // Para que no siga el bucle y aunque no soy fan del break, aqui no se me ocurre otra cosa. No hay nombres 
                    // de pokemon repetidos asi que entiendo que ni tan mal.
        }
    }
    // Verifica si la fila contiene una URL de sprite antes de agregarla al resultado.
    // con esto nos quitamos los pokemons que no tienen imagen
    if (strpos($fila, 'http') && $datos[11] === '1' ) {
        $datosFiltrados[] = $fila;
    }
}

// Guarda el resultado en un nuevo archivo CSV
file_put_contents('resultado.csv', implode(PHP_EOL, $datosFiltrados));

$rutaArchivo = 'resultado.csv';

$abrirArchivo = fopen($rutaArchivo, 'r');

$arrayInfoPokemon = [];

while ($linea = fgets($abrirArchivo)) {
    $datos = str_getcsv($linea);
    $arrayInfoPokemon[] = $datos;
}

fclose($abrirArchivo);

include '../Pokemon.php';

$arrayPokemons = [];

foreach ($arrayInfoPokemon as $pokemonData) {
    if (count($pokemonData) >= 14) { /* Controlamos que esten todos los campos */
        $pokemon = new Pokemon(
            $pokemonData[0],  // ID
            $pokemonData[1],  // Nombre
            $pokemonData[2],  // Tipo 1
            $pokemonData[3],  // Tipo 2
            $pokemonData[4],  // Total
            $pokemonData[5],  // HP
            $pokemonData[6],  // Ataque
            $pokemonData[7],  // Defensa
            $pokemonData[8],  // Sp. Atk
            $pokemonData[9],  // Sp. Def
            $pokemonData[10], // Velocidad
            $pokemonData[11], // Generación
            $pokemonData[12], // Legendario
            $pokemonData[13]  // URL del sprite
        );

        $arrayPokemons[] = $pokemon;
    }
};

$serializedPokemons = serialize($arrayPokemons);
file_put_contents('pokemon_data.txt', $serializedPokemons);