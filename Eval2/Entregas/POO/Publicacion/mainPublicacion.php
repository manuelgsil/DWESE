<?php
require_once("publicacion.php");
$publicacion1 = new Publicacion("Título 1", "Contenido 1", "Autor123");
$publicacion2 = new Publicacion("Título 2", "Contenido 2", "Autor456");

$publicacion1->imprimirPublicacion();
echo "<br>";
echo "<br>";
$publicacion2->imprimirPublicacion();
echo "<br>";
echo "<br>";

echo "Número total de publicaciones: " . Publicacion::getNumeroPublicaciones() . "<br>";

// Obtener publicaciones de hoy
$publicacionesHoy = Publicacion::getPublicacionesHoy();
echo "Número de publicaciones de hoy: " . count($publicacionesHoy) . "<br>";


?>