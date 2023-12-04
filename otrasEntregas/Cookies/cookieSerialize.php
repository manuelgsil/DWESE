<!DOCTYPE html>
<html>

<head>
    <title>Almacenamiento de datos con cookies</title>
</head>

<body>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <button type="submit" name="guardar">Guardar</button>
        <button type="submit" name="leer">Leer</button>
    </form>
</body>

</html>
<?php
$nombresUsuarios = [];

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    if (isset($_COOKIE['usuarios'])) {
        $nombresUsuarios = unserialize($_COOKIE['usuarios']);
        $nombresUsuarios[] = $nombre;
        setcookie('usuarios', serialize($nombresUsuarios), time() + 360000);
    } else {
        $nombresUsuarios[] = $nombre;
        setcookie('usuarios', serialize($nombresUsuarios), time() + 360000);
    }
}

if (isset($_POST['leer'])) {
    if (isset($_COOKIE['usuarios'])) {
        $nombresUsuarios = unserialize($_COOKIE['usuarios']);
        foreach ($nombresUsuarios as $nombre) {
            echo $nombre . '<br>';
        }
    } else {
        echo "No hay usuarios almacenados.";
    }
}

?>