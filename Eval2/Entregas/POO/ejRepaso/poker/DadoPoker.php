<?php

class DadoPoker
{
    static $figuras = ["As", "K", "Q", "J", "7", "8"];
    static $tiradas = [];
    private $figura;
    
    public function __construct()
    {
        $this->figura = "";
    }

    public function tirarDado()
    {
        $this->figura = self::$figuras[array_rand(self::$figuras, 1)];
        self::$tiradas[] = $this;
    }
    public function nombreFigura()
    {
        return self::$tiradas[array_key_last(self::$tiradas)];
    }
    public function getTiradasTotales()
    {
        return count(self::$tiradas);
    }

    public function __toString()
    {
        $html = "<h1> $this->figura</h1>";
        return $html;
    }
}
