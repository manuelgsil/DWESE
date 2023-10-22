<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piramide impar invertida</title>
    <link rel="stylesheet" href="style.css">
    <!--  <script src="script.js">  </script> -->
    <!-- Si referencio el script aqui no funciona, tiene que ser en el body (?) => preguntar -->
</head>

<body>

    <form action="#" method="post" onsubmit="validarEntrada()"> <!-- Con esto validamos en cliente -->
        <label for="caracter">Introduce el caracter a dibujar </label>
        <input type="text" name="caracter">
        <button type="submit">Enviar</button>
    </form>

    <div class="piramide"> <!-- Asi colocamos la piramide al lado del formulario -->
        <?php include('logicaPiramide.php'); ?>
    </div>

    <script src="script.js">
    </script> <!-- Si lo hago aquí, sí. -->

</body>


</html>