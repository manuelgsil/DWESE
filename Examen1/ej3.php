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



echo "A: $secuencia1 <br>";
echo "B: $secuencia2  <br>";
echo "C: $secuencia3 <br>";

function identificarBitMasComun($a, $b, $c)
{
    $masComun0 = 0;

    for ($i = 0; $i < 10; $i++) {
        $a[$i];
        $b[$i];
        $c[$i];
        if ($a[$i] + $b[$i] + $c[$i] >= 2) {
            $masComun = 1;
        } else {
            $masComun = 0;
        }
        $arrayPosicionesMasComunes[] = $masComun;
    }
    return $arrayPosicionesMasComunes;
}

$arrayMasComun=identificarBitMasComun($a, $b, $c);

var_dump($arrayMasComun);
$secuencia4=implode(" ",$arrayMasComun);
echo $secuencia4;
?>