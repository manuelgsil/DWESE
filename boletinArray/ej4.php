<?php

$lineaMetro1 = array(
    "longitud" => 10,
    "num_estaciones" => 5,
    "paradas" => array(
        array(
            "nombre" => "Parada Amate",
            "personas_subidas" => 50,
            "personas_bajadas" => 20,
            "transbordo" => false
        ),
        array(
            "nombre" => "Parada La plata",
            "personas_subidas" => 30,
            "personas_bajadas" => 10,
            "transbordo" => true
        ),
        array(
            "nombre" => "Parada Cocheras",
            "personas_subidas" => 40,
            "personas_bajadas" => 15,
            "transbordo" => false
        )
    )
);

$lineaMetro2 = array(
    "longitud" => 15,
    "num_estaciones" => 8,
    "paradas" => array(
        array(
            "nombre" => "Parada Montequinto",
            "personas_subidas" => 60,
            "personas_bajadas" => 25,
            "transbordo" => true
        ),
        array(
            "nombre" => "Parada Condequinto",
            "personas_subidas" => 35,
            "personas_bajadas" => 15,
            "transbordo" => false
        ),
        array(
            "nombre" => "Parada Muylejos",
            "personas_subidas" => 45,
            "personas_bajadas" => 20,
            "transbordo" => true
        )
    )
);
$lineasMetroConjuntas = array($lineaMetro1, $lineaMetro2);

var_dump($lineasMetroConjuntas[0], $lineasMetroConjuntas[1]);


function obetenerLineaMetroAzar($lineasMetro)
{

    return  $lineasMetro[array_rand($lineasMetro)];
}

$metrosAzar = obetenerLineaMetroAzar($lineasMetroConjuntas);

/* A partir de una línea de metro al azar obtener 
un array con los nombres de las paradas y el número total
de viajeros que han hecho uso de la misma (subido o bajado en esa parada). */

function totalPasajerosyParadas($metroAzar)
{
    $arrayResultante = array();

    foreach ($metroAzar['paradas'] as $paradaActual) {
        // $paradaActual es el array asociativo de la parada actual en la iteración

        $parada = array(
            'nombre' => $paradaActual['nombre'],
            'numeroTotal' => $paradaActual['personas_subidas'] + $paradaActual['personas_bajadas']
        );

        $arrayResultante[] = $parada;
    }

    return $arrayResultante;
}

$arrayTotalPasajerosParadas = totalPasajerosyParadas($metrosAzar);
/* Ordenar el array anterior por números de pasajeros. */


var_dump($arrayTotalPasajerosParadas);
// Con esto seria de menor a mayor.
function compararPorNumeroTotal($a, $b)
{
    return $a['numeroTotal'] - $b['numeroTotal'];
}

usort($arrayTotalPasajerosParadas, 'compararPorNumeroTotal');

var_dump($arrayTotalPasajerosParadas);

/* Contar el número de paradas de todas las líneas del metro que hacen transbordo con otra línea. */

$arrayParadasConTransbordo = array();

foreach ($lineasMetroConjuntas as $linea) {
    foreach ($linea['paradas'] as $paradaActual) {
        if ($paradaActual['transbordo'] === true) {
            $parada = array(
                'nombre' => $paradaActual['nombre'],
                'transbordo' => $paradaActual['transbordo']
            );
            $arrayParadasConTransbordo[] = $parada;
        }
    }
}

// $arrayParadasConTransbordo ahora contiene todas las paradas con transbordo
var_dump($arrayParadasConTransbordo);
?>