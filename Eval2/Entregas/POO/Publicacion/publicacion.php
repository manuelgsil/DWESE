<?php

class Publicacion
{
    // Propiedades
    private $titulo;
    private $contenido;
    private $autor;
    private $fechaPublicacion;
    private static $numeroPublicaciones = 0; // Atributo estático
    private static $publicaciones = []; // No se si la implicacion de memoria es mas desafortunada que la anterior pero desde luego da mas juego

    // Constructor
    public function __construct($titulo, $contenido, $autor)
    {
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->autor = $autor;
        $this->fechaPublicacion = date("Y-m-d H:i:s");

        // Incrementar el número total de publicaciones al crear una nueva instancia
        self::$publicaciones[] = $this;
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

    // Otros métodos
    public function imprimirPublicacion()
    {
        echo "Título: " . $this->titulo . "<br>";
        echo "Contenido: " . $this->contenido . "<br>";
        echo "Autor: " . $this->autor . "<br>";
        echo "Fecha de Publicación: " . $this->fechaPublicacion . "<br>";
    }
    // Método estático para obtener el número total de publicaciones
    public static function getNumeroPublicaciones()
    {
        return count(self::$publicaciones);
    }
}



