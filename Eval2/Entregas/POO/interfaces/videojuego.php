<?php
require_once("entregable.php");
class Videojuego implements Entregable
{
    private $titulo;
    private $horasEstimadas;
    private $entregado;
    private $genero;

    /**
     * @manuelgsil constructor de clase:
     * 
     * @param string  $titulo  = titulo pelicula
     * @param int $horasEstimadas = horas de duracion
     * @param bool $entregado (opcional)  por defecto FALSE
     * @param string $genero = genero film
     */
    public function __construct($titulo, $horasEstimadas, $genero, $entregado = false)
    {
        $this->titulo = $titulo;
        $this->horasEstimadas = $horasEstimadas;
        $this->genero = $genero;
        $this->entregado = $entregado;
    }

    // getters
    public function getTitulo(){return $this->titulo;}
    public function getHorasEstimadas(){return $this->horasEstimadas;}
    public function getGenero(){return $this->genero;}
    //setters
    public function setTitulo($titulo){$this->titulo = $titulo;}
    public function sethorasEstimadas($horasEstimadas)
    {$this->horasEstimadas = $horasEstimadas;}
    public function setGenero($genero){$this->genero = $genero;}

    // Metodos interfaz
    public function entregar(){$this->entregado=true;}
    public function devolver(){$this->entregado=false;}
    public function isEntregado(){return $this->entregado;}

    public function __toString()
    { // Recordar concatenar con .= y no +=
        $html = "<div class='videojuego'>";
        $html .= "<h2>Juego: {$this->titulo}</h2>";
        $html .= "<p>Horas Juego: {$this->horasEstimadas}</p>";
        $html .= "<span> Genero: {$this->genero}</span>";
        $html .= "<p> Entregado: " . ($this->isEntregado() ? "Está entregado" : "No está entregado") . "</p>";
        $html .= "</div>";
        return $html;
    }
}
