<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['pstAEuro']) && is_numeric($_POST['pstAEuro'])) {
    $pesetas = $_POST['pstAEuro'];
    $conversion = convertirPesetasAEuros($pesetas);
    echo "La cantidad en euros es: " . $conversion;
} else {
    // Redirigir al formulario en caso de datos inválidos
    header('Location: formulario.php');
    ; // Asegurar que el script se detenga después de redirigir
}

function convertirPesetasAEuros($pesetas)
{
    $tipoCambio = 166.386;
    return $pesetas / $tipoCambio;
}
