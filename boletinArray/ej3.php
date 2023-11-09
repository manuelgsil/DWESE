<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    form {
        text-align: center;
        border: 2px solid #4CAF50;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
        max-width: 400px;
        /* Ajusta el ancho máximo del formulario */
        margin: 0 auto;
        /* Centra el formulario en la página */
    }

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 600px;
        /* Ajusta el ancho máximo de la tabla */
        margin-top: 20px;
        /* Añade espaciado entre el formulario y la tabla */
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    input[type="number"] {
        width: 80%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 5px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<body>
    <pre>
        Introduce un numero al azar (entre 1-12) para obtener
        su equivalencia en mes los idiomas
        ingles, frances y aleman.
    

        Si quieres que se genere un mes aleatorio en frances,
        introduce 666
    </pre>

    <form method="post">
        <div>
            <label for="mesAzar">Inserte un mes</label>
            <input type="number"
                   name="mesAzar">
        </div>
    </form>

    <table>
        <th colspan="4">Traduccion de meses a distintos idiomas</th>
        <tbody>
            <?php cargarDatos() ?>
        </tbody>
    </table>

    <?php
    function cargarDatos()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
            // Comprobamos si las variables estan cargadas   
            if (isset($_POST["mesAzar"]) && !empty($_POST["mesAzar"])) {
                $mesAzar = $_POST["mesAzar"] - 1; // Restamos uno para que coincida con el índice del array, que empieza en 0            }
            }
        $arrayMeses = [
            ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
            ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"]
        ];
        mostrarTabla($mesAzar, $arrayMeses);
    }
    function mostrarTabla($mesAzar, $arrayMeses)
    {
        $html = "<tr>"; // creamos una variable para almacenar la estructura de tablas en html
        $mesAzarValido = $mesAzar >= 0 && $mesAzar <= 11; // Comprobamos si esta dentro de los meses 1 - 12. Devuelve true o false
        $mesAleatorioFrances = $mesAzar == 665; // -1 a la opcion indicada
    
        if ($mesAzarValido) {
            $html .= "<th>Español</th>";
            $html .= "<th>Ingles</th>";
            $html .= "<th>Frances</th>";
            $html .= "<th>Aleman </th>";
            $html .= "</tr>";
            $html .= "<tr>";
            $html .= "<td>" . $arrayMeses[0][$mesAzar] . "</td>";
            $html .= "<td>" . $arrayMeses[1][$mesAzar] . "</td>";
            $html .= "<td>" . $arrayMeses[2][$mesAzar] . "</td>";
            $html .= "<td>" . $arrayMeses[3][$mesAzar] . "</td>";
            $html .= "</tr>";
            echo $html;
            var_dump($arrayMeses);
        } elseif ($mesAleatorioFrances) {
            var_dump($arrayMeses[2]);
            shuffle($arrayMeses[2]);
            echo "<td>" . $arrayMeses[2][0] . "</td>"; // Mostrar el mes aleatorio en francés
            var_dump($arrayMeses[2]);
        } else {
            echo "introduzca un numero valido";
        }
    }
    ;
    ?>
</body>

</html>