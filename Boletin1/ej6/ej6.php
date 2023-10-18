<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<table border="1">
    <tr>
        <th>Variable</th>
        <th>Valor Original</th>
        <th>Tipo Original</th>
        <th>Valor Convertido</th>
        <th>Tipo Convertido</th>
    </tr>
    <?php
    $variables = [
        "a1" => 347,
        "a2" => 2147483647,
        "a3" => -2147483647,
        "a4" => 23.7678,
        "a5" => 3.1416,
        "a6" => "347",
        "a7" => "3.1416",
        "a8" => "Solo literal",
        "a9" => "12.3 Literal con número"
    ];


    function convertValue($value)
    # $convertedValue = (gettype($value) === 'integer') ? (double)$value : (int)$value;          con ternaria
    {
        switch (gettype($value)) {
            case 'double':
                settype($value, 'integer');
                break;
            case 'integer':
                settype($value, 'double');
                break;
        }
        return $value;
    }

    function convertValueString($value, $position)
    {
        if ($position % 2 == 0) {
            settype($value, 'integer');
        } else {
            settype($value, 'double');
        }
        return $value;
    }

    $position = 0; // Con esta variable podremos manejar el array según llegue a la parte de los strings

    foreach ($variables as $variableName => $value) {
        echo "<tr>";
        echo "<td>$variableName</td>";
        echo "<td>$value</td>";
        echo "<td>" . gettype($value) . "</td>";

        // la funcion is_numeric no nos vale debido a como funciona esta misma. Para comprobar si tenemos algun string es mejor llamar a su funcion is_string.
        $convertedValue = is_string($value) ? convertValueString($value, $position) :  convertValue($value);

        echo "<td>$convertedValue</td>";
        echo "<td>" . gettype($convertedValue) . "</td>";
        echo "</tr>";

        $position++;
    }
    ?>
</table>
</body>

</html>