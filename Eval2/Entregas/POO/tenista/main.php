<?php require_once("deportista.php");
require_once("tenista.php");
$deportista = new deportista("manolo", 80, 100, 30);
$tenista = new tenista("raudo", 100, 190, 23, "Head", "zurdo");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php echo $deportista ?>
    <?php $deportista->__set("entrenando", true);
    $deportista->setDisciplina("culo");
    $deportista->victoria();

    echo $tenista->setManoDominante("zurdo");
    echo $tenista->setMarcaRaqueta("babolat");
    echo $tenista;
    echo $tenista->estrella();
    echo $tenista->__set("entrenando", true);
    $tenista->setDisciplina("culo");
    echo $tenista->victoria();
    echo $tenista;

    ?>


</body>