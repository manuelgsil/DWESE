<?php
class Vehiculo
{
    protected $marca;
    protected $color;
    protected $plazas;
    protected $aparcado;

    public function __construct($marca, $color)
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->plazas = 0;
        /* constructor con valor por defecto a cero para las plazas. */
        $this->aparcado = true;
    }


    public function getMarca()
    {
        return $this->marca;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getPlazas()
    {
        return $this->plazas;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setPlazas($plazas)
    {
        /*  Las plazas tienen que ser
un número entero positivo. */
        if (is_int($plazas) && $plazas >= 0) {
            $this->plazas = $plazas;
        } else {
            echo "Las plazas deben ser un número entero positivo.";
        }
    }

    public function aparcar()
    {
        $this->aparcado = true;
    }
    public function arrancar()
    {
        $this->aparcado = false;
    }
    public function isAparcado()
    {
        return $this->aparcado;
    }
    public function toString()
    {
        return "Marca: " . $this->marca . ", Color: " . $this->color . ", Plazas: " . $this->plazas . ", Aparcado: " . ($this->aparcado ? 'Sí' : 'No');
    }
}
