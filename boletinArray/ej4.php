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


/* 

$linea_metro_1 = array(
    "longitud" => 10,
    "num_estaciones" => 5,
    "paradas" => array(
        array("Parada Amate", 50, 20, false),
        array("Parada La plata", 30, 10, true),
        array("Parada Cocheras", 40, 15, false)
    )
);

$linea_metro_2 = array(
    "longitud" => 15,
    "num_estaciones" => 8,
    "paradas" => array(
        array("Parada Montequinto", 60, 25, true),
        array("Parada Condequinto", 35, 15, false),
        array("Parada Muylejos", 45, 20, true)
    )
);

$lineas_metro = array($linea_metro_1, $linea_metro_2); */

function obetenerLineaMetroAzar($lineasMetro)
{

    return  $lineasMetro[array_rand($lineasMetro)];
}

$resultado = obetenerLineaMetroAzar($lineasMetroConjuntas);

$arrayResultante = array();
for ($i = 0; $i < count($resultado['paradas']); $i++) {
    $parada = array(
        'nombre' => $resultado['paradas'][$i]['nombre'],
        'numeroTotal' => $resultado['paradas'][$i]['personas_subidas'] +$resultado['paradas'][$i]['personas_bajadas'],

    );
    $arrayResultante[] = $parada;
}
var_dump($arrayResultante);
