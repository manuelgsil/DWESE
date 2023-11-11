<?php

class Util
{

    // Función para generar un número aleatorio entre un rango dado
    public static function generarNumeroAleatorio($min, $max)
    {
        return mt_rand($min, $max);
    }

    // Función para obtener la fecha actual
    public static function obtenerFechaActual()
    {
        return date("Y-m-d");
    }
    public static function esPrimo($n)
    {
        $comprobador = true;
        if ($n <= 1) {
            $comprobador = false;
        }
        for ($i = 2; $i <= sqrt($n); $i += 2) {
            if ($n % $i == 0) {
                $comprobador = false;
            }
        }
        return $comprobador;
    }
    public static function imprimirTablaPares($tabla)
    { {
            for ($i = 0; $i < count($tabla); $i += 2) {
                print "<tr>" .
                    "<td>" . $tabla[$i] . "</td>" .
                    "<td>" . $tabla[$i + 1] . "</td>" .
                    "</tr>";
            }
        }
    }

    public static function mostrarTabla($datos)
    {
        echo "<table border='1'>";
        foreach ($datos as $fila) {
            echo "<tr>";
            foreach ($fila as $elemento) {
                echo "<td>$elemento</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
