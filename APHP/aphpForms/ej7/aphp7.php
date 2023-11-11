<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escribe un programa que calcule el total de una factura a partir de la base imponible. </title>
</head>

<body>

    <?php
    $ivaDelProducto = ""; // para que no muestre error al principio
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["subtotal"])) {
            $subtotal = $_POST["subtotal"];
        }
        define("IVA", 0.21);
        $ivaDelProducto = IVA * $subtotal;
        $totalmasIva = $ivaDelProducto + $subtotal;
    }
    function plantillaDesglose()
    {
        global $ivaDelProducto, $totalmasIva, $subtotal;

        $tablaHTML = "<table border='1'>
        <tr>
            <th>Subtotal</th>
            <th>IVA del Producto</th>
            <th>Total con IVA</th>
        </tr>
        <tr>
            <td>$subtotal</td>
            <td>$ivaDelProducto</td>
            <td>$totalmasIva</td>
        </tr>
    </table>";
        echo $tablaHTML;
    }
    ?>

    <form action="#" method="post">
        <label for="subtotal">Introduzca el precio base de su producto</label>
        <input type="number" name="subtotal" required min="0">
    </form>

    <?php plantillaDesglose() ?>
</body>

</html>