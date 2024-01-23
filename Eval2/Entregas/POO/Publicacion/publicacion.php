<?php

class Publicacion
{
    // Propiedades
    protected $titulo;
    protected $contenido;
    protected $autor;
    protected $fechaPublicacion;
    protected $red;
    private static $numeroPublicaciones = 0; // Atributo estático
    private static $publicaciones = []; 
    /**
     * Constructor de la clase Publicacion.
     *
     * @param string $titulo     El título de la publicación.
     * @param string $contenido  El contenido de la publicación.
     * @param string $autor      El autor de la publicación.
     * @param string $red        (Opcional) La red de origen de la publicación. Por defecto, es una cadena vacía.
     */
    public function __construct($titulo, $contenido, $autor, $red = "")
    {
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->autor = $autor;
        $this->fechaPublicacion = date("Y-m-d H:i:s");
        // Incrementar el número total de publicaciones al crear una nueva instancia
        self::$publicaciones[] = $this;
        $this->red = $red;
    }

    public static function getPublicacionesHoy()
    {
        $publicacionesHoy = [];

        foreach (self::$publicaciones as $publicacion) {
            // Verificar si la fecha de publicación coincide con la fecha actual
            if (date("Y-m-d") === date("Y-m-d", strtotime($publicacion->fechaPublicacion))) {
                $publicacionesHoy[] = $publicacion;
            }
        }

        return $publicacionesHoy;
    }

    // Destructor
    public function __destruct()
    {
        $this->eliminarDePublicaciones();
    }

    // Método privado para eliminar la instancia de self::$publicaciones
    private function eliminarDePublicaciones()
    {
        $index = array_search($this, self::$publicaciones, true);

        if ($index !== false) {
            unset(self::$publicaciones[$index]);
            /* Ya que el acceso a los arrays suele ser por foreach no es necesario reordenar las claves 
            despues de borrar algun elemento */
            //  self::$publicaciones = array_values(self::$publicaciones);
        }
    }

    // Métodos de acceso
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function getFechaPublicacion()
    {
        return $this->fechaPublicacion;
    }

    // Creo que esto es redundante pero me parece intuitivo
    public function imprimirPublicacion()
    {
        echo $this->toString();
    }
    // Método estático para obtener el número total de publicaciones
    public static function getNumeroPublicaciones()
    {
        return count(self::$publicaciones);
    }

    public function toString()
    {
        $html = "<article class='publicacion'>";
        $html .= "<h2>{$this->titulo}</h2>";
        $html .= "<p class='contenido'>{$this->contenido}</p>";
        $html .= "<h3 class='autor'>{$this->autor}</h3>";
        $html .= "<p class='fecha'>Fecha de Publicación: {$this->fechaPublicacion}</p>";
        /* Aqui usamos un operador ternario por si estuviera vacia la red de origen, 
      en el caso de que lo estuviera no se crearia el elemento html correspondiente (p) */
        $html .= !empty($this->red) ? "<p class='red'>Red de origen: {$this->red}</p>" : "";
        $html .= "</article>";
        return $html;
    }
}
