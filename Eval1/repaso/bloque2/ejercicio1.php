<!-- Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”.
Carga el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben
almacenar los cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben
almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de
los tres arrays dispuesto en tres columnas. -->

<?php
$numero = array();
$cuadrado = array();
$cubo = array();

for ($i = 0; $i < 20; $i++) {
    $numero[$i] = random_int(0, 100);
    $cuadrado[$i] = pow($numero[$i], 2);
    $cubo[$i] = pow($numero[$i], 3);
}

echo "<table border=1px>"; // Abre la tabla aquí
echo "<th>Número</th><th>Cuadrado </th><th>Cubo</th>";
for ($i = 0; $i < count($numero); $i++) {
    echo "<tr><td>" . $numero[$i] . "</td><td>" . $cuadrado[$i] . "</td><td>" . $cubo[$i] . "</td></tr>";
}

echo "</table>"; // Cierra la tabla aquí
?>