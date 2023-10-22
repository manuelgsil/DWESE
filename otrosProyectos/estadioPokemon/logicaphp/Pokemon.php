<?php

class Pokemon
{
    private $id;
    private $name;
    private $type1;
    private $type2;
    private $total;
    private $hp;
    private $attack;
    private $defense;
    private $spAtk;
    private $spDef;
    private $speed;
    private $generation;
    private $legendary;
    private $sprite_url;

    public function __construct(
        $id,
        $name,
        $type1,
        $type2,
        $total,
        $hp,
        $attack,
        $defense,
        $spAtk,
        $spDef,
        $speed,
        $generation,
        $legendary,
        $sprite_url
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->type1 = $type1;
        $this->type2 = $type2;
        $this->total = $total;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->spAtk = $spAtk;
        $this->spDef = $spDef;
        $this->speed = $speed;
        $this->generation = $generation;
        $this->legendary = $legendary;
        $this->sprite_url = $sprite_url;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType1()
    {
        return $this->type1;
    }

    public function getType2()
    {
        return $this->type2;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function getSpAtk()
    {
        return $this->spAtk;
    }

    public function getSpDef()
    {
        return $this->spDef;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getGeneration()
    {
        return $this->generation;
    }

    public function isLegendary()
    {
        return $this->legendary;
    }

    public function getSpriteUrl()
    {
        return $this->sprite_url;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setType1($type1)
    {
        $this->type1 = $type1;
    }

    public function setType2($type2)
    {
        $this->type2 = $type2;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    public function setAttack($attack)
    {
        $this->attack = $attack;
    }

    public function setDefense($defense)
    {
        $this->defense = $defense;
    }

    public function setSpAtk($spAtk)
    {
        $this->spAtk = $spAtk;
    }

    public function setSpDef($spDef)
    {
        $this->spDef = $spDef;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function setGeneration($generation)
    {
        $this->generation = $generation;
    }

    public function setLegendary($legendary)
    {
        $this->legendary = $legendary;
    }

    public function setSpriteUrl($sprite_url)
    {
        $this->sprite_url = $sprite_url;
    }

    public static function displayPokemonTable($pokemonList)
    {
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Nombre</th>';
        echo '<th>Tipo 1</th>';
        echo '<th>Tipo 2</th>';
        echo '<th>Total</th>';
        echo '<th>HP</th>';
        echo '<th>Ataque</th>';
        echo '<th>Defensa</th>';
        echo '<th>Sp. Atk</th>';
        echo '<th>Sp. Def</th>';
        echo '<th>Velocidad</th>';
        echo '<th>Generación</th>';
        echo '<th>Legendario</th>';
        echo '<th>URL del sprite</th>';
        echo '</tr>';

        foreach ($pokemonList as $pokemon) {
            echo '<tr>';
            echo '<td>' . $pokemon->getId() . '</td>';
            echo '<td>' . $pokemon->getName() . '</td>';
            echo '<td>' . $pokemon->getType1() . '</td>';
            echo '<td>' . $pokemon->getType2() . '</td>';
            echo '<td>' . $pokemon->getTotal() . '</td>';
            echo '<td>' . $pokemon->getHp() . '</td>';
            echo '<td>' . $pokemon->getAttack() . '</td>';
            echo '<td>' . $pokemon->getDefense() . '</td>';
            echo '<td>' . $pokemon->getSpAtk() . '</td>';
            echo '<td>' . $pokemon->getSpDef() . '</td>';
            echo '<td>' . $pokemon->getSpeed() . '</td>';
            echo '<td>' . $pokemon->getGeneration() . '</td>';
            echo '<td>' . ($pokemon->isLegendary() ? 'Sí' : 'No') . '</td>';
            echo '<td><img src="' . $pokemon->getSpriteUrl() . '"></td>';
            echo '</tr>';
        }

        echo '</table>';
    }

    public static function pokemonAleatorio($pokemonList)
    {
        $indiceAleatorio = array_rand($pokemonList);
        $pokemonAleatorio = $pokemonList[$indiceAleatorio];
        echo '<td>' . $pokemonAleatorio->getName() . '</td>';
        echo '<td>' . $pokemonAleatorio->getTotal() . '</td>';
        echo '<td><img src="' . $pokemonAleatorio->getSpriteUrl() . '" width="50" height="50"></td>';
        
        return $pokemonAleatorio;
    }
};
