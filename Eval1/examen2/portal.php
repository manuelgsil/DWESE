<?php session_start() ?>

<?php
if (isset($_SESSION["datos"])) {
    $claveUsuario = $_SESSION["datos"]["password"];
    $nombreUsuario = $_SESSION["datos"]["nombre"]; /* Aqui he vuelto a perder el tiempo porque habia declarado la variable de sesion con 2 SS */
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    switch (true) { /* El tema de lectura de archivos me lleva tiempo, porque no conozco las funciones asociadas y quiero hacer mas de lo que se */
        case isset($_POST["leer"]):
            if (file_exists("usuarios.txt")) {
                $archivo = fopen("usuarios.txt", "r");
                echo "<table> <tr> <th>correo</th> <th>nombre</th> <th>edad</th> </tr>";

                while (!feof($archivo)) {
                    $linea = fgets($archivo);
                    $datos = explode(",", $linea); // Separar los datos por la coma

                    if (count($datos) === 3) { // Verificar si hay tres elementos en la línea
                        list($correo, $nombre, $edad) = $datos; // Asignar los datos a variables

                        // Mostrar los datos en la tabla
                        echo "<tr> <td>$correo</td> <td>$nombre</td> <td>$edad</td> </tr>";
                    }
                }
            } else {
                echo "El archivo no existe";
            }
            break;

            break;
        case isset($_POST["cerrar"]):
            session_destroy();
            header("location: login.php");
            break;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Portal de usuario</h1>
    <p>Hola <?php echo $nombreUsuario ?>, tu clave es <?php echo $claveUsuario ?> </p>
    <form method="POST"> <!-- Pongo mucho action = POST, cuidado -->
        <button type="submit" name="leer">leer usuarios</button> <button type="submit" name="cerrar">Cerrar sesion</button>

    </form>
</body>

</html>