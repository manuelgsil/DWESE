<?php

/* 

Un número negativo

Número de teléfono

Dni con la letra correspondiente

Una dirección ip

Comienza con c ó C y no tiene más de 5 caracteres

Validar una variable php

Contener mayúsculas en cualquier posición, excepto la primera y última

Validar un dirección http ó https

Validar una dirección de correo para gmail.com, outlook.es y g.educaand.es 

*/

$RegExpNumeroNegativo = "/-\d/";
$RegExpNumeroTelefono = "/(6|7)*([0-9]{8})/";
$RegExpDNI = "/[0-9]{8}[aA-zZ]/";
$RegExpComienzaCcy5 = "/[cC].{4}/";
$validarVariablePhP = "//";
$contenerMayusculasPrincipioFinal = "/^[a-z].*[a-z]$/";
$validarHTTP = "/(http:|https:)*/";
$validarGmail = "//";


?>