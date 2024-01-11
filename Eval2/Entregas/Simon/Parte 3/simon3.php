<?php
session_start(); /* Primera instruccion para iniciar la sesion */

if (!isset($_SESSION["coloresElegidos"]) || !isset($_SESSION["secuencia"]) || !isset($_SESSION["fallo"]) || !isset($_SESSION["exito"])) {
   header("location: pagina1.php");
   exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
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
                border: 2px solid #333;
                background: none;
                padding: 0;
                cursor: pointer;
            }
        }

    }
</style>
<body>
<form action="envio3.php" method="POST">
            <fieldset>
                <legend>Simon</legend>
                <button type="button" name="eleccion" value="red">
                    <div style="background-color: red; width: 100px; height: 100px"></div>
                </button>
                <button type="button" name="eleccion" value="green">
                    <div style="background-color: green; width: 100px; height: 100px"></div>
                </button>
                <button type="button" name="eleccion" value="black">
                    <div style="background-color: black; width: 100px; height: 100px"></div>
                </button>
                <button type="button" name="eleccion" value="violet">
                    <div style="background-color: violet; width: 100px; height: 100px"></div>
                </button>
            </fieldset>
            <button type="submit" name="eleccion" value="reinicio">Reiniciar</button>
        </form>
</body>
</html>