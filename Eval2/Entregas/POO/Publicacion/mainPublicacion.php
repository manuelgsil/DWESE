<?php
require_once("publicacion.php");
require_once("tweet.php");
$publicacion1 = new Publicacion("Título ", "Contenido 1", "Autor123");
$tweet = new tweet("Hola", "Esto es un increible tweet", "Aurelio buendia", "X");
$tweet2 = new tweet("Hola", "- 20 caracteres", "Aurelio maldia", "X","#hashtag");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio - Publicacion </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Dashboard de Publicaciones</h1>
    </header>

    <section>
        <?php $publicacion1->imprimirPublicacion(); ?>
        <?php $tweet->imprimirPublicacion(); ?>
        <?php $tweet2->imprimirPublicacion(); ?>

    </section>
</body>

</html>