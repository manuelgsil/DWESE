
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["caracter"])) {
    $caracter = $_POST["caracter"];
    $comprobacion = strlen($caracter) === 1; /* Misma logica que la validacion en JS. La ponemos por practicar */ /* Nos  da un valor booleano */

    if ($comprobacion) {
        $altura = 10; /* Podriamos poner tambien la altura como un INPUT */
        for ($i = $altura; $i >= 1; $i--) {

            for ($j = 0; $j < $altura - $i; $j++) {
                // Agregar espacios iniciales
                echo "&nbsp;&nbsp;";
            }

            // Calcular la cantidad de caracteres(impar)
            $impresionImpar = 2 * $i - 1;

            // Agregar asteriscos
            for ($k = 0; $k < $impresionImpar; $k++) {
                echo $caracter;
            }

            // Salto de línea para la próxima fila
            echo "<br>";
        }
    } /* Si no entra un caracter, no hará nada */
}
?>