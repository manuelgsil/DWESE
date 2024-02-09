<?php

class Persona
{
    /* 
    // Atributos privados
    private string $nombre;
    private $apellidos;
    private $edad;

    // Constructor con valores por defecto
    public function __construct($nombre = "", $apellidos = "", $edad = 18)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }
 */
    public function __construct(
        private array $datos = [
            "nombre" => "",
            "apellido" => "",
            "edad" => 0
        ]
    ) {
    }


    // Métodos de acceso (getters y setters)
    public function getNombre()
    {
        return $this->datos["nombre"];
    }

    public function setNombre($nombre)
    {
        $this->datos["nombre"] = $nombre;
    }

    // Getter and setter for "apellido"
    public function getApellido()
    {
        return $this->datos["apellido"];
    }

    public function setApellido($apellido)
    {
        $this->datos["apellido"] = $apellido;
    }

    // Getter and setter for "edad"
    public function getEdad()
    {
        return $this->datos["edad"];
    }

    public function setEdad($edad)
    {
        $this->datos["edad"] = $edad;
    }

    // Método para verificar si es mayor de edad
    public function mayorEdad()
    {
        return $this->datos["edad"] >= 18;
    }

    // Método para obtener el nombre completo
    public function nombreCompleto()
    {
        return $this->datos["nombre"] . " " . $this->datos["apellidos"];
    }
}
