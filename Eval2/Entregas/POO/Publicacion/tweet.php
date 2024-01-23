<?php
require_once("publicacion.php");

class Tweet extends Publicacion
{
    private static $limiteCaracteres = 20; 
    private $caracteresPublicacion;
    private $hashtag;/* Esto podria ser un array y tratarlo en un toString  */

    /* Añadimos un Javadoc para cuando llamemos al constructor nos acordemos de que tenemos que meter y en que orden */
    /**
     * Constructor de la clase Tweet.
     *
     * @param string $titulo      El título del tweet.
     * @param string $contenido   El contenido del tweet.
     * @param string $autor       El autor del tweet.
     * @param string $red         La red de origen del tweet.
     * @param string $hashtag     El hashtag asociado al tweet.
     */
    public function __construct($titulo, $contenido, $autor, $red, $hashtag = "")
    {
        parent::__construct($titulo, $contenido, $autor, $red);
        $this->setContenido($contenido);
        $this->caracteresPublicacion = strlen($contenido);
        $this->hashtag = $hashtag;
    }

    public function getLimiteCaracteres()
    {
        return self::$limiteCaracteres;
    }

    public function setLimiteCaracteres($limiteCaracteres)
    {
        self::$limiteCaracteres = $limiteCaracteres;
    }

    public function setContenido($contenido)
    {
        $contenidoProcesado = $this->validarContenido($contenido);
        $this->contenido = $contenidoProcesado;
    }
    private function validarContenido($contenido)
    {
        return strlen($contenido) > self::$limiteCaracteres ? "<span style='color: red;'>demasiado texto</span>" : $contenido;
    }
    public function toString()
    {

        $html = "<article class='tweet'>";
        $html .= "<h2>{$this->titulo}</h2>";
        $html .= "<p class='contenido'>{$this->contenido}</p>";
        $html .= "<h3 class='autor'>{$this->autor}</h3>";
        $html .= "<p class='fecha'>Fecha de Publicación: {$this->fechaPublicacion}</p>";
        $html .= "<p>Hashtag: {$this->hashtag}</p>";
        $html .= "<p '>Caracteres: {$this->caracteresPublicacion}</p>";
        $html .= !empty($this->red) ? "<p class='red'>Red de origen: {$this->red}</p>" : "";

        $html .= "</article>";
        return $html;
    }
}
