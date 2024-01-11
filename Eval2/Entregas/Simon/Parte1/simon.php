<?php
session_start(); /* Primera instruccion para iniciar la sesion */

if (!isset($_SESSION["coloresElegidos"])) {
    $_SESSION["coloresElegidos"] = [];
}

?>
<!DOCTYPE html>
<html lang="es">

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
        left:0;
    }


    button div {
        border: 2px solid #333;
    }

    .resultado {
        display: flex;
        flex-wrap: wrap;
        max-width: 500px;

        & div {
            border: 1px black solid;
            margin: 10px 10px;
        }

    }
</style>

<body>
    <div class="container">
        <form action="envio.php" method="POST">
            <fieldset>
                <legend>Simon</legend>
                <button type="submit" name="eleccion" value="red">
                    <div style="background-color: red; width: 100px; height: 100px"></div>
                </button>
                <button type="submit" name="eleccion" value="green">
                    <div style="background-color: green; width: 100px; height: 100px"></div>
                </button>
                <button type="submit" name="eleccion" value="yellow">
                    <div style="background-color: yellow; width: 100px; height: 100px"></div>
                </button>
                <button type="submit" name="eleccion" value="violet">
                    <div style="background-color: violet; width: 100px; height: 100px"></div>
                </button>
            </fieldset>
            <button type="submit" name="eleccion" value="reinicio">Reiniciar</button>
        </form>
        <div class="resultado">
            <?php foreach ($_SESSION["coloresElegidos"] as $color) {
                echo '<div style="background-color: ' . $color . '; width: 100px; height: 100px;"></div>';
            }
            ?>
        </div>
    </div>


</body>

</html>