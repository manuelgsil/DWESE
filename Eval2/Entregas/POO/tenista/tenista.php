<?php
require_once("deportista.php");

class Tenista extends Deportista
{
    static $marcasValidas = ["wilson", "head", "babolat"];
    static $arrayEstrellas = array(
        "zurdo babolat" => "Rafa nadal",
        "diestro head" => "Novac Djokovic",
        "diestro wilson" => "Roger Federer"
    );
    private $marcaRaqueta;
    private $manoDominante;
    public function __construct($nombre, $peso, $altura, $edad, $marcaRaqueta = "", $manoDominante)
    {
        parent::__construct($nombre, $peso, $altura, $edad);
        $this->setMarcaRaqueta($marcaRaqueta);
        $this->setManoDominante($manoDominante);
    }

    // getters
    public function getMarcaRaqueta()
    {
        return $this->marcaRaqueta;
    }
    public function getManoDominante()
    {
        return $this->manoDominante;
    }
    //setters
    public function setMarcaRaqueta($marca)
    {
        in_array($marca, self::$marcasValidas) || empty($marca) ?  $this->marcaRaqueta = $marca : "";
    }
    public function setManoDominante($mano)
    {
        $manoValida = strtolower($mano);
        if ($manoValida == "zurdo" || $manoValida == "diestro") {
            $this->manoDominante = $manoValida;
        } else
            echo "metiste algo mal";
    }

    public function estrella()
    {
        $tipoTenista = $this->manoDominante . " " . $this->marcaRaqueta;
        
        $estrella = "";
        /*    foreach (self::$arrayEstrellas as $clave => $valor) {
            if ($tipoTenista == $clave) {
                $estrella = $valor;
                break; <- Esto no me gusta, un for normal con flag podria valer
            }
        } */

        // Podria hacerlo con un for normal usando array_keys pero revisando 
        // descubrimos la  existencia de array_keys_exists, la cual nos permite
        // hacerlo otra manera mas corta, sin iteraciones.

        if (array_key_exists($tipoTenista, self::$arrayEstrellas)) {
            $estrella = self::$arrayEstrellas[$tipoTenista];
        } else $estrella = "No hay ningun tenista con tus caracteristicas en nuestra BBDD";
        return $estrella;
    }
    public function __toString()
    {

        $html = "<div class='tenista'>";
        $html .= "<h1>{$this->nombre}</h1>";
        $html .= "<table border='1'>";
        $html .= "<tr><th>Atributo</th><th>Valor</th></tr>";
        $html .= "<tr><td>Peso</td><td>{$this->peso} kg</td></tr>";
        $html .= "<tr><td>Altura</td><td>{$this->altura} cm</td></tr>";
        $html .= "<tr><td>Edad</td><td>{$this->edad} </td></tr>";
        $html .= "<tr><td>Disciplina</td><td>" . (empty($this->disciplina) ? "Aún no tiene disciplina" : $this->disciplina) . "</td></tr>";
        $html .= "<tr><td>Victorias</td><td>{$this->victorias}</td></tr>";
        $html .= "<tr><td>Entrenando</td><td>" . (($this->entrenando) ? "Entrenando" : "No entrena") . "</td></tr>";
        $html .= "<tr><td>Marca Raqueta</td><td>{$this->marcaRaqueta}</td></tr>";
        $html .= "<tr><td>Mano Dominante</td><td>{$this->manoDominante}</td></tr>";
        $html .= "</table>";
        $html .= "</div>";

        return $html;
    }
}
