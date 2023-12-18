<!DOCTYPE html>
<html lang="en">
<!--  Codigo php que cambia el color de fondo en la linea 72-->
<!-- Logica php para cookies y almacenar info de 79-85 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias de Color</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        fieldset {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            width: 60%;
            margin: 0 auto;
        }

        legend {
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        label {
            display: inline-block;
            margin-right: 10px;
            font-weight: bold;
            color: #333;
        }

        input{
            margin-right: 5px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            margin-top: 40px;
            border-collapse: collapse;
            border: 1px solid #ccc;
            width: 60%;
            margin: 0 auto;
        }

        table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            background-color: <?php echo $_COOKIE["preferenciaColor"] ?>;

        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["color"])) {
            $color = $_POST['color'];
            setcookie("preferenciaColor", $color, time() + 10);
            echo "Su preferencia se ha guardado" . "</br>" . "la próxima vez que recargue la página aparecerá el color";
        }
    }
    ?>

    <form action="#" method="post">
        <fieldset>
            <legend>Escoja un color para ponerle a la tabla</legend>
            <label for="blue"><input type="radio" name="color" value="blue" id="blue"> Azul</label>
            <label for="green"><input type="radio" name="color" value="green" id="green"> Verde</label>
            <label for="yellow"><input type="radio" name="color" value="yellow" id="yellow"> Amarillo</label>
            <input type="submit" value="OK">
        </fieldset>
    </form>

    <table>
        <tr>
            <td>celda</td>
            <td>celda</td>
            <td>celda</td>
        </tr>
        <tr>
            <td>celda</td>
            <td>celda</td>
            <td>celda</td>
        </tr>
        <tr>
            <td>celda</td>
            <td>celda</td>
            <td>celda</td>
        </tr>
    </table>
</body>

</html>