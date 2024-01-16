<?php
require_once("vehiculo.php");
require_once("coche.php");

/* $bicicleta = new Vehiculo("bicicleta", "azul");
$camion = new Vehiculo("Camion", "rojo");
$quad = new Vehiculo("Quad", "amarillo");
echo $bicicleta->toString() . "</br>";
echo $camion->toString() . "</br>";
echo $quad->toString() . "</br>";
echo $quad->arrancar();
echo $quad->setPlazas(2);
echo $quad->toString() . "</br>"; */

echo "hemos creado un coche con dos plazas </br>";
$coche1 = new Coche(2);
$coche1->setColor("rojo");
$coche1->setMarca("Kia");


echo $coche1->getColor() . "</br>";
echo $coche1->setMatricula("1234 DDD") . "</br>";
var_dump($coche1);
echo "Matricula:" . $coche1->getMatricula() . "</br>";
echo $coche1->puedeCircular() ? " Puede circular" : " No puede circular";

$coche1->arrancar();
echo $coche1->viajar(2);
var_dump($coche1);
