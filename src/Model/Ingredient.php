<?php

namespace Model;

class Ingredient
{
    // Attributes
    private $ingredient_id;
    private $name;

    // Constructors
    public function __construct($ingredient_id, $name) {
        $this->ingredient_id = $ingredient_id;
        $this->name = $name;
    }

    // Getters
    public function getId() {
        return $this->ingredient_id;
    }

    public function getName() {
        return $this->name;
    }

    // Setters
    public function setName($name) {
        $this->name = $name;
    }
}

?>