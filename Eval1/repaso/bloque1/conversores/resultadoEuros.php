<!-- 0,0060 -->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['euroPsta']) && is_numeric($_POST['euroPsta'])) {
    $euros = $_POST['euroPsta'];
    $conversion = convertirEurosAPesetas($euros);
    echo "La cantidad en euros es: " . $conversion;
} else {
    // Redirigir al formulario en caso de datos inválidos
    header('Location: formulario.php');
    ; // Asegurar que el script se detenga después de redirigir
}

function convertirEurosAPesetas($euros)
{
    $tipoCambio = 0.0060;
    return $euros / $tipoCambio;
}