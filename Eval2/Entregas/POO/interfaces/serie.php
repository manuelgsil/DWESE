<?php
require_once("entregable.php");

class Serie
{
    private $titulo;
    private $numeroTemporadas;
    private $entregado;
    private $genero;

    /**
     * @manuelgsil constructor de clase:
     * 
     * @param string  $titulo  = titulo pelicula
     * @param int $numeroTemporadas = temporadas de la serie
     * @param bool $entregado (opcional)  por defecto FALSE
     * @param string $genero = genero film
     */
    public function __construct($titulo, $numeroTemporadas, $genero, $entregado = false)
    {
        $this->titulo = $titulo;
        $this->numeroTemporadas = $numeroTemporadas;
        $this->genero = $genero;
        $this->entregado = $entregado;
    }

        // getters
        public function getTitulo(){return $this->titulo;}
        public function getNumeroTemporadas(){return $this->numeroTemporadas;}
        public function getGenero(){return $this->genero;}
        //setters
        public function setTitulo($titulo){$this->titulo = $titulo;}
        public function setNumeroTemporadas($numeroTemporadas){$this->numeroTemporadas = $numeroTemporadas;}
        public function setGenero($genero){$this->genero = $genero;}

     // Metodos interfaz
     public function entregar(){$this->entregado=true;}
     public function devolver(){$this->entregado=false;}
     public function isEntregado(){return $this->entregado;}

    public function __toString()
    { // Recordar concatenar con .= y no +=
        $html = "<div class='serie'>";
        $html .= "<h2>Serie: {$this->titulo}</h2>";
        $html .= "<p>Temporadas: {$this->numeroTemporadas}</p>";
        $html .= "<span> Genero: {$this->genero}</span>";

        $html .= "<p> Entregado: " . ($this->isEntregado() ? "Está entregado" : "No está entregado") . "</p>";
        $html .= "</div>";

        return $html;
    }
}
