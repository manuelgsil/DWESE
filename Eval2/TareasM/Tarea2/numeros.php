<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nOpciones = $_POST["textNumero"];

    echo "<select>";
    for ($i = 1; $i <= $nOpciones; $i++) {
        echo  "<option value=\"$i\">Opción $i</option>";
    }
    echo "</select>";
}
?>