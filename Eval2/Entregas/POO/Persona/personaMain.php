<?php
require_once("persona.php");
$persona = new Persona([""]);

echo "Nombre completo: " . $persona->nombreCompleto() . "<br>";
echo "Edad: " . $persona->getEdad() . " años<br>";

if ($persona->mayorEdad()) {
    echo "Es mayor de edad.<br>";
} else {
    echo "No es mayor de edad.<br>";
}

// Cambiando la edad y mostrando el resultado
$persona->setEdad(17);
echo "Nueva Edad: " . $persona->getEdad() . " años<br>";

if ($persona->mayorEdad()) {
    echo "Ahora es mayor de edad.<br>";
} else {
    echo "Todavía no es mayor de edad.<br>";
}

?>