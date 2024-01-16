Hay que tener cuidado antes de empezar a usar variables superglobales, porque los
hackers las utilizan a menudo tratando de encontrar vulnerabilidades para entrar en los
sitios web. Lo que hacen es cargar $_POST, $_GET u otras superglobales con código
malicioso, tales como comandos Unix o MySQL que pueden dañar o mostrar datos
sensibles si ingenuamente accedes a ellos.

Por lo tanto, siempre debes desinfectar las superglobales antes de usarlas. Una forma de
hacerlo es a través de la función htmlentities de PHP. Convierte todos los caracteres
en entidades HTML. Por ejemplo, los caracteres menor que y mayor que (< y>) se
    transforman en las cadenas &lt; y &gt; de modo que son inofensivos, como lo son
    todas las comillas y barras invertidas, etc

    $came_from = htmlentities($_SERVER['HTTP_REFERER']);



    // INCLUDES

    Cada vez que emites la directiva include, vuelve a incluir el archivo solicitado, incluso
    si ya lo has insertado. Por ejemplo, supongamos que library.php contiene muchas cosas
    útiles por lo que lo incluyes en tu archivo, pero también incluyes otra biblioteca que
    incluye library.php. A través del anidamiento, has incluido sin querer library.php dos
    veces. Esto producirá mensajes de error, porque estás intentando definir la misma
    constante o función varias veces. Por lo tanto, deberías utilizar include_once en lugar
    de include (ver Ejemplo 5-7).

    Así se ignorará cualquier otro intento de incluir el mismo archivo (con include o
    include_once). Para determinar si se ha ejecutado la solicitud del archivo, se
    comprueba la ruta de archivo absoluta después de resolver todas las rutas relativas, y el
    archivo se debe encontrar en la ruta que hayas especificado en include.

    Un problema potencial con include e include_once es que PHP solo intentará
    incluir el archivo solicitado. La ejecución del programa continúa incluso si no se
    encuentra el archivo.
    Cuando sea absolutamente imprescindible incluir un archivo, usa require. Por las
    mismas razones que expuse para usar include_once, recomiendo que generalmente te
    quedes con require_once cuando necesites requerir un archivo (ver el Ejemplo 5-8).


    Esta característica es la capacidad de incluir una matriz completa como parte de otra, y
    es posible repetir el proceso, como en la vieja rima: "Las pulgas grandes tienen pulgas
    más pequeñas sobre sus espaldas, que las muerden. Las pulgas pequeñas tienen pulgas
    más pequeñas, y estas otras más pequeñas, ad infinitum".
    Veamos cómo funciona esta operación en la matriz asociativa del ejemplo anterior y la
    ampliamos. Ver el Ejemplo 6-10.
    Ejemplo 6-10. Creación de una matriz asociativa de varias dimensiones
    <?php
    $products = array(
        'paper' => array(
            'copier' => "Copier & Multipurpose",
            'inkjet' => "Inkjet Printer",
            'laser' => "Laser Printer",
            'photo' => "Photographic Paper"
        ),
        'pens' => array(
            'ball' => "Ball Point",
            'hilite' => "Highlighters",
            'marker' => "Markers"
        ),
        'misc' => array(
            'tape' => "Sticky Tape",
            'glue' => "Adhesives",
            'clips' => "Paperclips"
        )
    );
    echo "<pre>";
    foreach ($products as $section => $items)
        foreach ($items as $key => $value)
            echo "$section:\t$key\t($value)<br>";
    echo "</pre>";
    ?>


    is_array
    Las matrices y variables comparten el mismo espacio de nombres. Esto significa que no
    es posible tener una variable de cadena de caracteres llamada $fred y una matriz
    también llamada $fred. Si tienes alguna duda y tu código necesita comprobar si una
    variable es una matriz, puedes usar la función is_array, así:
    echo (is_array($fred)) ? "Is an array" : "Is not an array";
    Ten en cuenta que si todavía no se ha asignado un valor a $fred, se generará el mensaje
    Undefined variable.


    count
    Aunque la función each y la estructura del bucle foreach...as son excelentes maneras
    de recorrer el contenido de una matriz, a veces necesitas saber exactamente cuántos
    elementos hay, particularmente si los vas a referenciar directamente. Para contar todos
    los elementos en el nivel superior de una matriz, utiliza un comando como este:
    echo count($fred);
    Si deseas saber cuántos elementos hay en total en una matriz de varias dimensiones,
    puedes utilizar una expresión como la siguiente:
    echo count($fred, 1);
    El segundo parámetro es opcional y configura el modo a utilizar. Debe ser 0 para limitar
    el cómputo solo al nivel superior o 1 para forzar el cómputo recursivo de todos los
    elementos de la submatriz también.


    La ordenación es tan habitual que PHP proporciona una función integrada para ella. En
    su forma más elemental, se usaría así:
    sort($fred);
    6. Matrices en PHP
    129
    A diferencia de otras funciones, sort actuará directamente sobre la matriz suministrada
    en lugar de devolver una nueva matriz de elementos ordenados. Devuelve TRUE en caso
    de éxito y FALSE en caso de error, y también utiliza algunos indicadores. Los dos
    principales que puedes usar para forzar que los elementos se ordenen bien
    numéricamente o como cadenas son los siguientes:
    sort($fred, SORT_NUMERIC); sort($fred, SORT_STRING);
    También puedes ordenar una matriz en orden inverso mediante la función rsort, así:
    rsort($fred, SORT_NUMERIC); rsort($fred, SORT_STRING);


    explode
    explode es una función muy útil con la que puedes actuar sobre una cadena que
    contenga varios elementos separados por un solo carácter (o por una cadena de
    caracteres) y colocar cada uno de estos elementos en una matriz. Un ejemplo práctico es
    dividir una oración en una matriz que contenga todas sus palabras, como en el Ejemplo
    6-12.
    Ejemplo 6-12. Separación de una cadena en una matriz por medio de espacios
    <?php
    $temp = explode(' ', "This is a sentence with seven words");
    print_r($temp);
    ?>
    Este ejemplo imprime lo siguiente (en una sola línea cuando se ve en un navegador):
    Array (
    [0] => This
    [1] => is
    [2] => a
    [3] => sentence
    [4] => with
    [5] => seven
    [6] => words
    )
    Aprender PHP, MySQL y JavaScript
    130
    El primer parámetro, el delimitador, no necesita ser un espacio ni incluso un solo
    carácter. El Ejemplo 6-13 muestra una ligera variación.
    Ejemplo 6-13. Separación de una cadena delimitada con *** en una matriz
    <?php
    $temp = explode('***', "A***sentence***with***asterisks");
    print_r($temp);
    ?>
    El código del Ejemplo 6-13 imprime lo siguiente:
    Array (
    [0] => A
    [1] => sentence
    [2] => with
    [3] => asterisks
    )

    reset
Cuando la construcción foreach...as o la función each recorren una matriz,
mantienen un puntero PHP interno que anota qué elemento de la matriz debe devolver a
continuación. Si algunas vez necesitas que tu código vuelva al inicio de una matriz,
puedes emitir un reset, que también devuelve el valor del primer elemento. Ejemplos
de cómo utilizar esta función son los siguientes:
reset($fred); // Throw away return value
$item = reset($fred); // Keep first element of the array in
$item


end
Al igual que con reset, puedes mover el puntero interno de la matriz de PHP al
elemento final de un archivo con la función end, que también devuelve el valor del
último elemento, como se puede ver en estos ejemplos:
end($fred);
$item = end($fred);
Este capítulo concluye la introducción básica a PHP, y ahora deberías ser capaz de
escribir programas bastante complejos usando las habilidades que has aprendido. En el
siguiente capítulo, veremos el uso de PHP para tareas comunes y prácticas.