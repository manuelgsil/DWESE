<?php



/* 1 
Un número negativo
*/
$RegExpNumeroNegativo = "/-\d+/";


/* 2
Número de teléfono
*/
$RegExpNumeroTelefono = "/^(6|7)+[0-9]{7}$/";

/* 3
Dni con la letra correspondiente
*/
$RegExpDNI = "/[0-9]{8}[aA-zZ]$/";

/* 4
Una dirección ip
^(?:[0-9]{1,3}\.){3}[0-9]{1,3}$

 */

$validarIP = "/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/";
/* 
^                                     # Inicio de la cadena.
(?:                                   # Grupo de no captura.
  (?:                                 # Segundo grupo de no captura para los bloques de números.
    25[0-5]                           # Los números del 250 al 255.
    |                                 # Alternativa.
    2[0-4][0-9]                       # Los números del 200 al 249.
    |                                 # Alternativa.
    [01]?[0-9][0-9]?                  # Los números del 0 al 199, con o sin un cero inicial.
  )                                   # Fin del segundo grupo de no captura.
  \.                                  # Punto que separa los bloques de números.
){3}                                  # Repetir el grupo anterior tres veces (para los cuatro bloques de números).
(?:                                   # Otro grupo de no captura.
  25[0-5]                             # Similar al primer grupo, para el último bloque de números.
  |                                   # Alternativa.
  2[0-4][0-9]                         # Similar al segundo grupo, para el último bloque de números.
  |                                   # Alternativa.
  [01]?[0-9][0-9]?                    # Similar al tercer grupo, para el último bloque de números.
)                                     # Fin del último grupo de no captura.
$                                     # Fin de la cadena.
*/

/* 5
 Comienza con c ó C y no tiene más de 5 caracteres
  */

$RegExpComienzaCcy5 = "/^[cC].{4}$/";

/* 6
Validar una variable php
 */
$validarVariable = "abcde123";
$patronValidacionVariable = "/^[a-zA-Z0-9]+$/";

/* 7
Contener mayúsculas en cualquier posición, excepto la primera y última
 *

/* Con el cuantificador + le indicamos que puede haber 1 o mas elementos. 
Al colocar el match de apertura y cierre terminamos de
concretar que solo puede ser una cadena que contenga numeros y texto.
 NO ADMITE NI ESPACIOS NI PUEDE ESTAR VACIA NI TAMPOCO PUEDE CONTENER SIMBOLOS ESPECIALES
 */

$contenerMayusculasPrincipioFinal = "/^(?!^[A-Z])[a-zA-Z]*(?<![A-Z])$/";
/* En esta expresion tenemos dos negaciones al principio y al final de la cadena.
  ^(?!^[A-Z])
con este subgrupo le indicamos que la cadena no puede comenzar con una letra mayus
 
[a-zA-Z] Aqui le indicamos
 que la cadena puede contener cualquier letra minuscula o mayuscula
* (0 o más)

con el asterisco ubicariamos un cuantificador que especifica que pueden haber o no letras mayusculas
o minusculas entre el principio o el final

(?<![A-Z])$
  con este subgrupo le indicamos que la cadena no puede terminar con una letra mayus
*/

/* 8
Validar un dirección http ó https ((Tengo dudas acerca de esta, tengo que validar una URL ENTERA?))
*/
$validarHTTP = "/^(http|https):\/\//"; // ^https? :\/\/  

/* 9
Validar una dirección de correo para gmail.com, outlook.es y g.educaand.es 
 */
$validarCorreos = "/^[a-zA-Z0-9._%+-]+@(gmail\.com|outlook\.es|g\.educaand\.es)$/";
/* Incorporamos unos cuantos caracteres especiales al princpio de la cadena 
y no senfocamos en crear subgrupos para los diferentes dominios */

function validarExpresion($expresionRegular, $prueba)
{
  if (preg_match($expresionRegular, $prueba)) {
    echo " $prueba cumple con el patrón proporcionado.</br>";
  } else {
    echo "$prueba NO cumple con el patrón proporcionado.</br>";
  }
}

validarExpresion($RegExpNumeroNegativo, "-123"); // Un número negativo

validarExpresion($RegExpNumeroTelefono, "612345678"); // Número de teléfono

validarExpresion($RegExpDNI, "12345678A"); // DNI con la letra correspondiente

validarExpresion($validarIP, "192.168.1.1"); // Una dirección IP

validarExpresion($RegExpComienzaCcy5, "Cabcd"); // Comienza con c ó C y no tiene más de 5 caracteres

validarExpresion($patronValidacionVariable, "abcde123"); // Validar una variable PHP

validarExpresion($contenerMayusculasPrincipioFinal, "AbcDefgH"); // Contener mayúsculas en cualquier posición, excepto la primera y última

validarExpresion($validarHTTP, "https://www.example.com"); // Validar una dirección HTTP o HTTPS

validarExpresion($validarCorreos, "ejemplo@g.educaand.es"); // Validar una dirección de correo para gmail.com, outlook.es y g.educaand.es
