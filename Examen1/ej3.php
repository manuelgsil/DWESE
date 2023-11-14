<!-- 
    
En este ejercicio se tiene que escribir un programa que muestre tres secuencias aleatorias de 10 bits y
una cuarta secuencia que indique cuál es el bit más común en esa posición.
Muestre también el número total de bits a 1 que hay entre todas las secuencias incluida la última.

-->
<?php
function escribirSecuencia()
{

    for ($i = 0; $i < 10; $i++) {
        $bit = rand(0, 1);
        $secuencia[] = $bit;
    }
    return $secuencia;
}

$a = escribirSecuencia();
$secuencia1 = implode(" ", $a);
$b = escribirSecuencia();
$secuencia2 = implode(" ", $b);
$c = escribirSecuencia();
$secuencia3 = implode(" ", $c);



echo "<h3> A: $secuencia1 </h3>";
echo "<h3> B: $secuencia2 </h3>";
echo "<h3> C: $secuencia3 </h3>";

function identificarBitMasComun($a, $b, $c)
{
    $masComun = 0;
    $contador1 = 0;
    $sumaDeUnos = 0;
    for ($i = 0; $i < 10; $i++) {
        $sumaDeUnos += $a[$i] + $b[$i] + $c[$i];
        if ($a[$i] + $b[$i] + $c[$i] >= 2) {
            $masComun = 1;
            $sumaDeUnos++;
        } else {
            $masComun = 0;
        }
        $arrayPosicionesMasComunes[] = $masComun;
    }

    $secuencia4 = implode(" ", $arrayPosicionesMasComunes);
    echo "<h3> R: $secuencia4 </h3>";
    echo "<h2> el bit 1 aparece $sumaDeUnos </h2>";
}

identificarBitMasComun($a, $b, $c);


?>