<?php

/* Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
los tres arrays dispuesto en tres columnas

*/
$numeros = array();
$cuadrado = array();
$cubo = array();


$html = "<table border=1px>
        <th>Números</th>
        <th>Cuadrado</th>
        <th>Cubo</th>";

for ($i = 0; $i <20; $i++) {
    $numeros[$i] = rand(1, 100);
    $cuadrado[$i] = $numeros[$i] ** 2;
    $cubo[$i] = $numeros[$i] ** 3;

    $html .= "<tr>
            <td>{$numeros[$i]}</td>
            <td>{$cuadrado[$i]}</td>
            <td>{$cubo[$i]}</td>
            </tr>";
}

$html .= "</table>";

echo $html;


echo "<pre>";
print_r($numeros);
echo "</pre>";
?>