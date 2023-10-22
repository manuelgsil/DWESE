<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post" onsubmit="validarEntrada()">
        <label for="caracter">Introduce el caracter a dibujar: </label>
        <input type="text" name="caracter">
        <button type="submit">Enviar</button>
    </form>

</body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["caracter"])) {
    $caracter = $_POST["caracter"];
    $comprobacion = strlen($caracter) === 1; /* Misma logica que la validacion en JS. La ponemos por practicar */

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
    }
}

?>
<!-- Aqui usamos JS para validar el envio del formulario -->
<script>
    const input = document.querySelector('input[name="caracter"]');
    const validarEntrada = () => {
        const comprobador = input.value.length === 1; /* Comparador de igualdad estricta (Ojo, hay que acceder al VALOR)*/
        if (!comprobador) {
            alert("Por favor, introduce un solo caracter");
        }
        return comprobador;
    }
</script>


</html>