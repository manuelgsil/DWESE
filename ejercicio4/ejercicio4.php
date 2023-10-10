<!-- 4.-Realiza otro ejercicio que para 2 variables, $base y $altura, asigne a otra variable, $area, el área del triángulo.
 A continuación te deberá mostrar el siguiente mensaje:

El área del triángulo cuya base es $base y altura $altura es: $area.

Los datos de entrada se introducirán a mediante un formulario.
Habrá que cambiar el color del texto, del fondo de la página y deberá tener el siguiente texto:

CALCULAR ÁREA TRIÁNGULO

Escribe la base:      

Escribe la altura:      

El título de la página será: Área de un triángulo. -->
<?php

$base = "";
$altura = "";
$area = "";
# $colorFondo = array("green", "yellow", "red")[array_rand(array("green", "yellow", "red"))];
$colorFondo = array("green", "yellow", "red");
$colorAleatorio = $colorFondo[array_rand($colorFondo)];
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["altura"]) && isset($_POST["base"])) {
        // Ahora almacenamos los valores en las variables creadas previamente.
        $base = $_POST["base"];
        $altura = $_POST["altura"];

        // Verificar si los valores son numéricos
        if (!is_numeric($base) || !is_numeric($altura)) {
            echo "Error: inserte datos válidos";
        } else {
            $area = ($base * $altura) / 2;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  form {
    width: 400px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
}

fieldset {
    border: none;
    padding: 20px;
    background-color: <?php echo $colorAleatorio; ?>; ;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

legend {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button[name="resultado"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
}
    </style>
</head>

<body>
    <form method="post">
        <fieldset>
            <legend>Calculador de area triangulo</legend>
            <label for="altura">Inserte altura</label>
            <input type="number"
                   id="altura"
                   name="altura"
                   min="0">

            <label for="base">Inserte base</label>
            <input type="number"
                   id="base"
                   name="base"
                   min="0">


            <button type="submit"
                    name="resultado">
                RESULTADO:
                <?php echo $area; ?>
            </button>


        </fieldset>
    </form>
</body>

</html>