<?php

if (isset($_POST['buscar'])) {
    $array = [5, 10, 18, 23, 27, 43, 50]; // Declaracion convencional de array
    $inicio = 0; // Longitud del incio del array
    $fin = count($array) - 1; // Con esto sabemos el tamaño. Le restamos -1 por que empieza en 0
    $encontrado = false; //bandera para controlar el bucle
    $indice = -1; // Con esto almacenamos la posicion del indice
    $numeroBuscado = $_POST['numero']; 

    while ($inicio <= $fin && !$encontrado) {
        $medio = floor(($inicio + $fin) / 2); // con esta formula nos aseguramos  de la posicion sea la mitad (sumando el inicio o fin segun las condiciones posteriores)

        if ($array[$medio] == $numeroBuscado) { // si la busqueda binaria da con el número 
            $encontrado = true;//actualizamos la bandera
            $indice = $medio; // y también el indice
        } elseif ($array[$medio] < $numeroBuscado) { // Si el valor a la mitad es menor, se suma +1 para buscar por la parte de arriba
            $inicio = $medio + 1;
        } else { // si no,
            $fin = $medio - 1; //logica inversa
        }
    }

    if ($encontrado) {
        echo "El número $numeroBuscado ha sido encontrado en el índice $indice del array."; 
    } else {
        echo "El número $numeroBuscado no ha sido encontrado en el array.";
    }

}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>busqueda</title>
    <style>
        .form-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
        }

        .form-container input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button[type="submit"] {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button[type="submit"]:hover {
            background-color: blue;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form method="POST">
            <input type="number"
                   name="numero"
                   placeholder="Ingrese un número">
            <button type="submit"
                    name="buscar">Buscar</button>
        </form>
    </div>

</body>

</html>