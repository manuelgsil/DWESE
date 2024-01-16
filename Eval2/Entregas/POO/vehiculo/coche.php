<?php
require_once("vehiculo.php");
class Coche extends Vehiculo
{
    protected $matricula;
    protected $kilometros;

    public function __construct($plazas, $matricula = "")
    {
        parent::__construct($plazas);
        $this->setMatricula($matricula);
        $this->kilometros = 0;
    }
    public function puedeCircular()
    {
        /*Creamos un booleano que nos resuma la informacion */
        $boolean = true;
        if ($this->matricula == "") {
            $boolean = false;
        }
        return $boolean;
    }
    public function viajar($kmViaje)
    {
        /* Este método recibe los kilómetros que vamos a viajar y actualiza este
        atributo de nuestra clase siempre que podamos circular y el coche se encuentre
        arrancado. No podemos viajar un número de kilómetros negativos.
         */
        if ($this->puedeCircular() && !$this->isAparcado() && $kmViaje > 0) {
            $this->kilometros = $kmViaje;
            echo "</br>km añadidos " . $this->kilometros;
        }
    }
    public function validarMatricula($matricula)
    {
        /*  Una matrícula es válida si tiene el siguiente formato: 4
números, un espacio en blanco y tres letras en mayúsculas. Dentro de las letras no pueden
aparecer las siguientes: A, E, I, Ñ, O, Q, U. */
        $matricula = strtoupper($matricula); //pasamos el string a mayusculas
        $patron = '/^[0-9]{4}[" "][^AEIÑOQU]{3}$/';
        if (preg_match($patron, $matricula)) {
            $this->matricula = $matricula;
        } else {
            $this->matricula = "";
        }
    }

    public function ToString()
    {
        return "Marca: " . $this->marca . ", Color: " . $this->color . ", Plazas: " . $this->plazas .
            ", Aparcado: " . ($this->aparcado ? 'Sí' : 'No' . "Matricula: " . $this->matricula . "KM:" . $this->kilometros);
    }

    public function getMatricula()
    {
        return $this->matricula;
    }


    public function setMatricula($matricula)
    {
        $this->validarMatricula($matricula);
        if ($this->matricula == "") {
            echo "Todavia no tiene numero de matricula </br>";
        }
    }
}