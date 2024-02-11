<?php
require_once("../utiles/database.php");
require_once("../utiles/funciones.php");
// Incluye ficheros de variables y funciones
$campos = ["nombre", "apellidos", "email", "hijos", "salario", "nacionalidad", "departamento", "sede"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de empleados</title>
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>

<body>
  <h1>Listado de empleados (filtrar por salario y/o número de hijos)</h1>
  <div style="margin-bottom: 1em">
    <fieldset style="width:50%">
      <legend>Filtrado</legend>
      <form name="filtrar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p><label for="texto">Texto <input type="text" name="texto"></label>
        </p>
        <p><label for="salarioMinimo">Salario mínimo <input type="number" step="0.01" name="salarioMinimo" min="0"></label>
          <label for="salarioMaximo">Salario Máximo <input type="number" step="0.01" name="salarioMaximo" min="0"></label>
        </p>
        <p>Hijos: <select name="hijos">
            <option value="">Seleccione el número de hijos</option>
            <?php
            for ($i = 0; $i <= 10; $i++) :
            ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
            endfor;
            ?>
          </select>
        </p>
        <input type="submit" value="Filtrar">
      </form>
    </fieldset>
  </div>
  <?php

  // Realiza la conexion a la base de datos a través de una función 
  $dataBase = new Database();
  $dbh = $dataBase->getDbh();

  // Obtenemos los valores del formulario de filtrado

  $texto = $_POST["texto"] ?? "";
  $salarioMinimo = $_POST["salarioMinimo"] ?? "";
  $salarioMaximo = $_POST["salarioMaximo"] ?? "";
  $numeroHijos = $_POST["hijos"] ?? "";

  // Crea las condiciones de filtrado


  // Realiza la consulta a ejecutar en la base de datos en una variable
  $query =
    $dbh->prepare("
  SELECT 
      empleados.nombre, apellidos, email,
      salario, hijos, departamentos.nombre as departamento,
      paises.nacionalidad, sede_id as sede 
  FROM empleados 
  INNER JOIN paises ON empleados.pais_id = paises.id 
  INNER JOIN departamentos ON empleados.departamento_id = departamentos.id 
  WHERE 
  (empleados.nombre LIKE :texto OR empleados.apellidos LIKE :texto OR :texto= '')
  AND (empleados.salario >= :salarioMinimo OR :salarioMinimo = '')
  AND (empleados.salario <= :salarioMaximo OR :salarioMaximo = '')
  AND (empleados.hijos = :numeroHijos OR :numeroHijos = '')
");
  /*  Si no usamos parentesis, no alteramos el orden lógico de lectura/preferencia y da lugar a resultados inesperados 
 Del mismo modo, cuando establecemos OR $variable ='' la condicion se evaluará como verdadera y la consulta
 recuperará los registros sin aplicar la restricción en el campo mencionado*/

  /* --> 👎 Esta consulta es poco eficiente, debería usar los where segun los campos que rellene el usuario */

  /*  ¿ Qué hacen los métodos bind ?
            
Los métodos bindParam y bindValue en PHP PDO se utilizan 
para enlazar valores a parámetros en una sentencia preparada 
ANTES de ejecutarla en la base de datos. 
          
¿Qué diferencia hay entre VALUE Y PARAM ?
          
          1.bindParam: Este método enlaza un parámetro a una variable.
          Significa que si el valor de la variable CAMBIA después de llamar a bindParam,
          el valor pasado a la consulta también cambiará. 
          
          2.bindValue: Este método enlaza un valor específico al parámetro en el momento en que se llama a bindValue. 
          Si el valor de la variable cambia más tarde, no afectará al valor pasado a la consulta
*/
  $query->bindParam(':texto', $texto);
  $query->bindParam(':salarioMinimo', $salarioMinimo);
  $query->bindParam(':salarioMaximo', $salarioMaximo);
  $query->bindParam(':numeroHijos', $numeroHijos);

  $query->execute();

  if ($query instanceof PDOStatement) {
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
  }

  // Obten el resultado de ejecutar la consulta para poder recorrerlo. El resultado es de tipo PDOStatement


  // Muestra los criterios de búsqueda
  $criterios = [
    "texto a buscar" => $texto,
    "salario Minimo" => $salarioMinimo,
    "salario Máximo" => $salarioMaximo,
    "Numero hijos" => $numeroHijos
  ];

  var_dump($criterios); /* DE MOMENTO LO DEJAMOS ASI A ESPERA DE SABER SI PODEMOS TOCAR EL HTML O NO */

  ?>

  <table border="1" cellpadding="10">
    <thead>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Correo electrónico</th>
      <th>Nº hijos</th>
      <th>Salario</th>
      <th>Nacionalidad</th>
      <th>Departamento</th>
      <th>Sede</th>
    </thead>
    <tbody>

      <!-- Muestra los datos -->
      <?php
      echo presentarConsulta($resultados, $campos);

      ?>
    </tbody>
  </table>

  <div class="contenedor">
    <div class="enlaces">
      <a href="../index.html">Volver a página de listados</a>
    </div>
  </div>

  <?php
  // Libera el resultado y cierra la conexión
  $dataBase->__destruct();
  ?>
</body>

</html>