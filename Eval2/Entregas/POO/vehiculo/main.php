<?php
require_once("vehiculo.php");

$bicicleta = new Vehiculo("bicicleta","azul");
$camion = new Vehiculo("Camion","rojo");
$quad = new Vehiculo("Quad","amarillo");
echo $bicicleta->toString()."</br>";
echo $camion->toString()."</br>";
echo $quad->toString()."</br>";
echo $quad->arrancar();
echo $quad->setPlazas(2);
echo $quad->toString()."</br>";
