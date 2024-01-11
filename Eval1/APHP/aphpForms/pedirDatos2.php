<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Números Ingresados</title>
</head>

<body>

    <?php
// no funciona
    
    // Inicializamos la variable de números
    $numeros = isset($_POST['numeros']) ? $_POST['numeros'] : [];

    // Verificamos si se ha enviado un nuevo número
    if (isset($_POST['n'])) {
        $nuevoNumero = $_POST['n'];
        // Agregamos el nuevo número a la lista
        $numeros[] = intval($nuevoNumero);
    }

    ?>

    <!-- Formulario para ingresar nuevos números -->
    <?php if (count($numeros) < 6) : ?>
        <form action="#" method="post">
            Introduzca un número:
            <input type="number" name="n" autofocus>
            <input type="hidden" name="numeros" value="<?= implode(' ', $numeros) ?>">
            <input type="submit" value="OK">
        </form>
    <?php endif; ?>

</body>

</html>