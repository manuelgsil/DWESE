<!-- Realizar un programa que muestre los archivos que contiene "C:"
Cambia a la carpeta c:/
Crea un directorio "pruebas".
    Entra en él.
    Lista solo los archivos que contengan una "2" en el nombre. 
    Si no hay ninguno, en php:
    Crea un nuevo fichero
    Introduce texto "este fichero contiene un 2 en el nombre".
    Cierra el fichero.
    Lista el fichero usando el filtro "contiene un 2 en el nombre".

Lista solo los archivos que empiecen por a y terminen por z.
    Crea un fichero en el directorio para comprobarlo (puedes hacerlo desde el sistema operativo).
Lista solo los archivos que contengan números.
    Crea un fichero en el directorio para comprobarlo (puedes hacerlo desde el sistema operativo).
Lista solo los archivos de formato pdf.
    Crea un fichero en el directorio para comprobarlo (puedes hacerlo desde el sistema operativo).
Desde php, lee un fichero de pruebas que hayas creado y muestralo por pantalla. -->

<?php

chdir('C:'); /* Nos cambiamos al directorio C */
mkdir('pruebas'); /* Creamos la carpeta pruebas */
if (file_exists('pruebas')) { /* Si existe pruebas */
    chdir('pruebas'); /* Nos metemos en ella */
    $archivos = scandir(".");
    if (empty($archivos)) { /* Si esta vacio */
        $archivo2 = fopen("2.txt", "w"); /* creamos con fopen el archivo 2 */
        fwrite($archivo2, "Este fichero contiene un 2 en el nombre");
        fclose($archivo2);
    }
}

?>