<?php require_once("serie.php");
require_once("videojuego.php");
$serie1 = new Serie("Mr.robot", 4, "suspense");
$serie2 = new Serie("Alvin y las ardillas", 4, "infantil");
$serie3 = new Serie("Los simpsons", 21, "comedia");
$serie4 = new Serie("Succesion", 5, "suspense");
$serie5 = new Serie("True Detective", 6, "policiaca");

$arraySeries = array(
    $serie1, $serie2, $serie3, $serie4, $serie5
);

$videojuego1 = new Videojuego("The Legend of Zelda: Breath of the Wild", 50, "Aventura");
$videojuego2 = new Videojuego("FIFA 22", 20, "Deportes");
$videojuego3 = new Videojuego("Cyberpunk 2077", 60, "Rol");
$videojuego4 = new Videojuego("Super Mario Odyssey", 30, "Plataformas");
$videojuego5 = new Videojuego("Call of Duty: Warzone", 40, "Shooter");

$arrayVideojuegos = array($videojuego1, $videojuego2, $videojuego3, $videojuego4, $videojuego5);
$arrayMixto = array($videojuego1, $serie2, $serie1, $videojuego4, $serie3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Reset que vi por internet y voy a probar -->
    <link rel="stylesheet" href="reset.css">
    <!-- Estilos propios -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Mostramos series -->
    < <!-- ?php foreach ($arraySeries as $serie) { echo $serie; } ? -->
        >
        <!-- Mostramos videojuegos -->

        <<!-- ?php foreach ($arrayVideojuegos as $videojuego) { echo $videojuego; } ? -->>

            <!-- Entregamos algunos juegos y series -->
            <?php

            for ($i = 0; $i < count($arrayMixto); $i++) {
                // insertamos el metodo instanceOf para asegurarnos que sea una instancia de clase valida
                $esValido = $arrayMixto[$i] instanceof Videojuego || $arrayMixto[$i] instanceof Serie;
                if ($esValido) {
                    if ($i % 2 == 0) $arrayMixto[$i]->entregar();
                }
            } ?>


            <!-- Comprobar cuantas series y videojuegos hay entregados -->
            <?php

            // Primermos vamos a juntar los 2 arrays


            $arrayTotal = array_merge($arraySeries, $arrayVideojuegos);



            /*  // 1 º Manera de hacerlo
            $tmpSerie = 0;
            $tmpVideojuegos = 0;
            foreach ($arrayTotal as $item) {
                // como solo tenemos 2 tipos de objetos esta única variable nos permite manejar la situacion
                $esSerie = $item instanceof Serie;
                $estaEntregado = $item->isEntregado();
                if ($esSerie) {
                    // usar el ++ x la izquierda (pre-incremento)
                    $tmpSerie = $estaEntregado ? ++$tmpSerie  : $tmpSerie;
                } else {
                    $tmpVideojuegos = $item->isEntregado() ? ++$tmpVideojuegos : $tmpVideojuegos;
                }
            }
            echo "Series entregadas: $tmpSerie </br>";
            echo "Videojuegos entregados: $tmpVideojuegos </br>"; */



            /* SEGUNDA MANERA DE HACERLO */

            $tmpSeriesEntregadas = [];
            $tmpVideojuegosEntregados = [];

            foreach ($arrayTotal as $item) {
                $esSerie = $item instanceof Serie;
                $estaEntregado = $item->isEntregado();

                if ($esSerie && $estaEntregado) {
                    /*  Cuidado con como insertamos elementos en los arrays 👁️
                        $tmpSeriesEntregadas =[$item] ❌
                        $tmpSeriesEntregadas [] = $item ✔️
                      */
                    $tmpSeriesEntregadas[] = $item;
                } elseif (!$esSerie && $estaEntregado) {
                    $tmpVideojuegosEntregados[] = $item;
                }
            }


            ?>
            <!-- Podria devolverlo en el metodo anterior pero asi los muestro por pantalla -->
            <article class="contenedor-series">
                <h1>Series</h1>

                <!--  /* Cuenta cuantos Series y Videojuegos hay entregados.
             Al contarlos, devuélvelos (utiliza el método devolver). */ -->
                <?php

                /*  foreach ($tmpSeriesEntregadas as $item) {
                    echo $item;
                    $item->devolver();
                    // echo $item; --> Se puede ver si funcionó
                }
                echo " </br> Series entregadas: " . count($tmpSeriesEntregadas); */

                /* <!-- indica el videojuego tiene más horas estimadas y la serie con más temporadas.
Muestra los datos en pantalla con toda su información (usa el método toString()). */

                ?>
            </article>
            <article class="contenedor-videojuegos">
                <h1>Videojuegos</h1>
                <!--  /* Cuenta cuantos Series y Videojuegos hay entregados.
             Al contarlos, devuélvelos (utiliza el método devolver). */ -->
                <?php

                /*   foreach ($tmpVideojuegosEntregados as $item) {
                    echo $item;
                    $item->devolver();
                    // echo $item;
                }
                echo " </br> Juegos entregados: " . count($tmpVideojuegosEntregados);  */

                /* <!-- indica el videojuego tiene más horas estimadas y la serie con más temporadas.
Muestra los datos en pantalla con toda su información (usa el método toString()). */

              
                ?>

            </article>




</body>

</html>