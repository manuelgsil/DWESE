<?php 
require_once("DadoPoker.php");
 require_once("cubilete.php");

$tirada1 = new DadoPoker("");
$tirada2 = new DadoPoker("");
$tirada3 = new DadoPoker("");
$tirada4 = new DadoPoker("");
$cubilete = new Cubilete();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poker</title>
</head>

<body>

    <?php echo $cubilete ?>
    <?php echo $tirada4->tirarDado()?>
    <?php echo $tirada4->getTiradasTotales()?>
</body>

</html>