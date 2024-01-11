<?php
session_start(); /* Primera instruccion para iniciar la sesion */

if (!isset($_SESSION["coloresElegidos"]) || !isset($_SESSION["secuencia"]) || !isset($_SESSION["fallo"]) || !isset($_SESSION["exito"])) {
    $_SESSION["coloresElegidos"] = [];
    $_SESSION["secuencia"] = generarDivsAleatorios();
    $_SESSION["fallo"] = false;
    $_SESSION["exito"] = false;
}
?>

<head>
    <meta charset="utf-8">
    <title>
        HTML - Color botón
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    * {
        box-sizing: border-box;

    }

    .secuencia {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        width: 400px;
        gap: 5px;
        justify-items: center;

        & h1 {
            grid-column: 1 /span 3;
        }

        & div {
            width: 50px;
            border: 1px black solid;
            color: white;
            text-align: center;
            font-size: 33px;
            line-height: 5rem;
        }
    }

    .container {
        display: flex;
        justify-content: space-evenly;
    }

    form {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        padding: 20px;
        max-width: 300px;

        && fieldset {
            border: none;

            && button {
                border: none;
                background: none;
                padding: 0;
                cursor: pointer;
            }
        }

    }

    button[value="reinicio"] {
        position: absolute;
        max-height: 20px;
        top: 300px;
        left: 0;
    }


    button div {
        border: 2px solid #333;
    }

    .resultado {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        width: 400px;
        gap: 5px;
        justify-items: center;

        & h1 {
            grid-column: 1 /span 3;
        }

        & div {
            width: 50px;
            border: 1px black solid;
            color: white;
        }

    }
</style>
<?php

function generarDivsAleatorios()
{
    $numRandom = rand(2, 7);
    $coloresPosibles = ["green", "black", "red", "violet"];
    $secuencia = []; /*  Guardo la secuencia para compararlo posteriormente */

    for ($i = 0; $i < $numRandom; $i++) {
        shuffle($coloresPosibles);
        $secuencia[] = $coloresPosibles[0];
    }
    return $secuencia;
};

function imprimirSecuencia($secuenciaSesion)
{
    foreach ($secuenciaSesion as $i => $color) {
        echo '<div style="background-color: ' . $color . '; width: 100px; height: 100px;">' . ($i + 1) . '</div>';
    }
}

?>

<body>
    <div class="container">
        <div class="secuencia">
            <h1>Secuencia</h1>
            <?php imprimirSecuencia($_SESSION["secuencia"]) ?>
        </div>
        <form action="envio2.php" method="POST">
            <fieldset>
                <legend>Simon</legend>
                <button type="submit" name="eleccion" value="red">
                    <div style="background-color: red; width: 100px; height: 100px"></div>
                </button>
                <button type="submit" name="eleccion" value="green">
                    <div style="background-color: green; width: 100px; height: 100px"></div>
                </button>
                <button type="submit" name="eleccion" value="black">
                    <div style="background-color: black; width: 100px; height: 100px"></div>
                </button>
                <button type="submit" name="eleccion" value="violet">
                    <div style="background-color: violet; width: 100px; height: 100px"></div>
                </button>
            </fieldset>
            <button type="submit" name="eleccion" value="reinicio">Reiniciar</button>
        </form>
        <div class="resultado">
            <h1>Colores escogidos:</h1>
            <?php
            foreach ($_SESSION["coloresElegidos"] as $color) {
                echo '<div style="background-color: ' . $color . '; width: 100px; height: 100px;"></div>';
            }
            if ($_SESSION["exito"])
                echo "ganaste";
            /* No se como pararlo ahora? dejarlo para despues */
            if ($_SESSION["fallo"]) {
                echo "cagaste";
            }
            ?>
        </div>
    </div>


</body>

</html>