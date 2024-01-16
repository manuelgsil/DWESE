<?php
class Coche extends Vehiculo
{
    protected $matricula;
    protected $kilometros;

    public function __construct($marca, $color, $matricula = "")
    {
        parent::__construct($marca, $color);
        $this->validarMatricula($matricula);
        $this->kilometros = 0;
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
}
