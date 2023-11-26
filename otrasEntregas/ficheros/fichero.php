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
Desde php, lee un fichero de pruebas que hayas creado y muestralo por pantalla.

-->

<?php
// Cambiar al directorio C:
chdir("C:");

// Mostrar los archivos que contiene "C:"
$archivosEnC = scandir(".");
echo "Archivos en C: <br>";
var_dump($archivosEnC);
echo "<br><br>";

// Crear un directorio "pruebas"
if (!is_dir("pruebas")) {
    echo "Como no hay directorio de pruebas, procedemos a crear uno <br> ";
    mkdir("pruebas");
}

// Entrar en el directorio "pruebas"
chdir("pruebas");

// Listar solo los archivos que contienen "2" en el nombre
$archivosCon2 = glob('*2*');
echo "Archivos que contienen un '2' en el nombre: <br> <br>";
// Si no hay archivos que contengan "2", crear un nuevo fichero
if (empty($archivosCon2)) {
    echo "No hay archivos que contengan '2' en el nombre. Creando un nuevo archivo <br> ";
    $nuevoArchivo = fopen("archivo_con_2.txt", "w");
    fwrite($nuevoArchivo, "Este fichero contiene un 2 en el nombre <br> ");
    fclose($nuevoArchivo);
    echo "Se creó un nuevo documento 'archivo_con_2.txt'<br> <br> ";
    $archivosCon2 = glob('*2*');

    var_dump($archivosCon2);
}


// Listar solo los archivos que empiecen por 'a' y terminen por 'z'
$altramuzArchivo = fopen("altramuz.txt", "w");
fwrite($altramuzArchivo, "He sido creado por instrucción");
fclose($altramuzArchivo);

$archivosAZ = preg_grep('/^a.*z\.[a-z]{3}$/', scandir('.'));
echo "Archivos que empiezan por 'a' y terminan por 'z': <br>";
var_dump($archivosAZ);
echo "<br><br>";

// Crear otro archivo que contenga un número, deberían aparecer 2
$numeroArchivo = fopen("numero5.txt", "w");
fwrite($numeroArchivo, "1234567890");
fclose($numeroArchivo);

// Listar solo los archivos que contienen números
$archivosConNumeros = preg_grep('/\d/', scandir('.'));
echo "Archivos que contienen números en el nombre: <br>";
var_dump($archivosConNumeros);
echo "<br><br>";

// Listar solo los archivos de formato pdf
$archivosPDF = glob('*.pdf');
echo "Archivos de formato PDF: <br>";
var_dump($archivosPDF);
echo "<br><br>";

// Si no hay archivos PDF, crear uno
if (empty($archivosPDF)) {
    echo "No parece haber archivos PDF, creando uno...<br>";
    $archivoPDF = fopen("Adobe.pdf", "w");
    fclose($archivoPDF);
    $archivosPDF = glob('*.pdf');
    var_dump($archivosPDF);
}

// Leer un archivo de pruebas creado y mostrarlo por pantalla
if (file_exists("altramuz.txt")) {
    $contenido = file_get_contents("altramuz.txt");
    echo "Contenido del archivo altramuz: <br>";
    echo $contenido;
} else {
    echo "El archivo de prueba no existe.";
}
?>