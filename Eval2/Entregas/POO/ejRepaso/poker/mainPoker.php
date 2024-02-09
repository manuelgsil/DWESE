<?php 
require_once("DadoPoker.php");
 require_once("cubilete.php");

$tirada1 = new DadoPoker("");
$tirada2 = new DadoPoker("");
$tirada3 = new DadoPoker("");
$tirada4 = new DadoPoker("");
$cubilete = new Cubilete();
$arr = ["0","1","2","3","4","5"];
var_dump($arr);
echo count($arr);
unset($arr[2]);
echo count($arr);
var_dump($arr);
$arr = array_values($arr);
var_dump($arr);
 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poker</title>
</head>

<body>

</body>

</html>