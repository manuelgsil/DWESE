<?php

class Deportista
{

    private $nombre;
    private $peso;
    private $altura;
    private $disciplina;
    private $edad;
    private $victorias;
    private $entrenando;

    /**
     *  author: @manuelgsil
     *  
     * @param string $nombre = Nombre del tenista
     * @param int peso del tenista TIENE QUE SER POSITIVO
     * @param int altura del tenista TIENE QUE SER POSITIVO
     * @param int edad del tenista
     * @param string (opcional) representa la disciplina del tenista
     */
    public function __construct($nombre, $peso, $altura, $edad, $disciplina = "")
    {
        $this->nombre = $nombre;
        /* ❌ OJO CON ESTE ERROR ❌ */
        /* $this->peso = setPeso($peso); */
        
        /* Tiene que ser así 🔽 */
        
        $this->setPeso($peso); /* ✔️ */
        
             /* ⬆️ */
       
            $this->setAltura($altura);
        $this->edad = $edad;
        $this->disciplina = $disciplina;
        $this->victorias = 0;
        $this->entrenando = false;
    }

    // getters
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function getAltura()
    {
        return $this->altura;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function getDisciplina()
    {
        return $this->disciplina;
    }
    public function getVictorias()
    {
        return $this->victorias;
    }

    // setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setPeso($peso)
    {
        if ($peso <= 0 || is_float($peso))
            echo "El peso no puede ser un n negativo ni decimales.  Se ha procedido a un cambio automatico, inserte un numero valido si no esta conforme";

        $this->peso = intval(abs($peso));
    }

    public function setAltura($altura)
    {
        if ($altura <= 0 || is_float($altura)) {
            echo "La altura puede ser un n negativo ni decimales. Se ha procedido a un cambio automatico, inserte un numero valido si no esta conforme";
        }

        $this->altura = $altura;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }
    public function setDisciplina($disciplina)
    {
        $this->disciplina = $disciplina;
    }

    // get y set magicos
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    // metodos específicos
    public function isEntrenando()
    {
        return $this->entrenando;
    }

    public function victoria()
    {
        $sumarVictoria = $this->isEntrenando() && !empty($this->disciplina);
        if ($sumarVictoria)
            $this->victorias++;
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
        $html .= "</table>";
        $html .= "</div>";

        return $html;
    }
}
