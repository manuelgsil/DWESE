<?php
$contador = $_POST["contador"] ?? 0;
$numeroTexto = $_POST["numeroTexto"] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $n = $_POST["n"];

    if ($contador < 10) {
        $contador++;
        $numeroTexto .= " $n";
    }
}

if ($contador == 10) {
    $numeros = array_map('intval', explode(" ", $numeroTexto));
    $numeroMinimo = min($numeros);
    $numeroMaximo = max($numeros);

    foreach ($numeros as $n) {
        if ($n == $numeroMinimo) {
            echo "$n MÍNIMO<br>";
        } elseif ($n == $numeroMaximo) {
            echo "$n MÁXIMO<br>";
        } else {
            echo "$n<br>";
        }
    }
    $contador = 0;
}
?>

<form method="POST">
    <label for="n">Introduce 10 números</label>
    <input type="number" name="n">
    <input type="hidden" name="contador" value="<?= $contador ?>">
    <input type="hidden" name="numeroTexto" value="<?= $numeroTexto ?>">
    <input type="submit" value="Enviar">
</form>


